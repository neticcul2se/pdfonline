<?php

namespace App\Http\Controllers;
use App\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Excel;

use DB;

class ImportExcelController2 extends Controller
{
    //

    function index()
        {
          $data = Data::orderBy('order_no', 'DESC')->get();

        // $data = DB::table('data')->orderBy('CustomerID', 'DESC')->get();
         return view('testreport', compact('data'));
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
                          $arr[] = ['order_no' => $value->order_no, 'name' => $value->name,'address_1' => $value->address_1,'district' => $disfull,'province' =>  $value->province];
                        }

              }



          if(!empty($arr))
          {
           Data::insert($arr);
          }
        }

         return back()->with('success', 'Excel Data Imported successfully.');
        }
    }
