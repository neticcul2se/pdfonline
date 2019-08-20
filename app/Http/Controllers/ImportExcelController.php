<?php

namespace App\Http\Controllers;
use App\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Excel;

use DB;

class ImportExcelController extends Controller
{
    //

    function index()
        {
          $data = Data::orderBy('inv')->get();

        // $data = DB::table('data')->orderBy('CustomerID', 'DESC')->get();

         return view('import_excel', compact('data'));

        }

        function checkExcelFile($file_ext){
                $valid=array(
                    'csv','xls','xlsx' // add your extensions here.
                );
                return in_array($file_ext,$valid) ? true : false;
            }
        function import(Request $request)
        {
          if( Input::file('select_file') ) {
            if ($this->checkExcelFile($request->file('select_file')->getClientOriginalExtension()) == false)
              {
                  //return validator with error by file input name
                  return back()->with('error', 'The file must be a file of type: csv, xlsx, xls');
              }

          } else {
              return back()->with('error', 'The file must be a file of type: csv, xlsx, xls');

          }


         //$this->validate($request, ['select_file'  => 'mimetypes:xls|xlsx']);

         $path = $request->file('select_file')->getRealPath();

         $data = Excel::load($path)->get();

         if($data->count() > 0)
         {
           //$results= DB::table('data',1)->max('numinv');


           $results = Data::orderBy('numinv', 'DESC')->limit(1)->value('numinv');


              if($results=="")
              {
                 $countid=1;


              }else {
                $countid=((int)$results+1);



              }


                         $inv1=1;
                         $inv2=1;
                         $invtemp=1;
                         $invtemp2=1;
           foreach ($data as $key => $value) {
                          //echo($value);

                          if($value->order_no==""){
                          //echo("null weyyyy");
                        }else {


                          //print_r (explode(" ",$value->district));
                            if($value->province=="กรุงเทพมหานคร"){
                          $dis=explode(" ",$value->district);
                          $disfull="แขวง ".implode(" เขต ",$dis);
                            }
                            else{
                              $dis=explode(" ",$value->district);
                              $disfull="ต.".implode(" อ. ",$dis);
                            }
                             $net=($value->quantity*$value->price)-$value->discount;


                                $inv1=$value->order_no;


                                if($inv1==$invtemp){


                                    $invlast=$inv2;
                                    $countid=$inv2;

                                }
                                else {
                                  $inv=$inv1;

                                     $invlast=$countid;


                                     }

                            $genid=$this->genid($countid);

                          $arr[] = ['order_no' => $value->order_no,'order_date'=>$value->order_date ,
                          'name' => $value->name,'address_1' => $value->address_1,'district' => $disfull,
                          'province' =>  $value->province,'zip' =>  $value->zip,'quantity' =>  $value->quantity,
                          'price' =>  $value->price,'ProductName' =>  $value->product_name,'order_net'=>$net,
                          'discount'=>$value->discount,'inv'=>$genid,'numinv'=>$countid];


                          $invtemp=$inv1;
                              $inv2=$countid;

                          $countid=$countid+1;
                        }


              }




          if(!empty($arr))
          {
           Data::insert($arr);
          }
        }

         return back()->with('success', 'Excel Data Imported successfully.');
        }


        public static function genid($ids){

                $txt="INV". date("Y")."07";


                        $MaksID = $ids;

                        if($MaksID < 10) $ID = "0000".$MaksID; // value under 10
                        else if($MaksID < 100) $ID = "000".$MaksID; // value under 100
                        else if($MaksID < 1000) $ID = "00".$MaksID; // value under 1000
                        else if($MaksID < 10000) $ID = "0".$MaksID; // value under 10000
                        else $ID = $MaksID; // lebih dari 10000
                        return $genid=$txt.$ID;


          }

    }
