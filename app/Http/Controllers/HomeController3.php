<?php

namespace App\Http\Controllers;
use App\Data;
use Illuminate\Http\Request;
use PDF;

use DB;
ini_set('max_execution_time', 300);
class HomeController extends Controller
{
  public function demoGeneratePDF()
{
set_time_limit(1500);


$data = ['title' => 'invoice'];

$pdf = PDF::loadView('invoice', $data);

return $pdf->download('demo.pdf');

//return $pdf->stream('test.pdf'); //แบบนี้จะ stream มา preview
      //return $pdf->download('test.pdf'); //แบบนี้จะดาวโหลดเลย
}

public function getPdf(Request $request)

{
$type = 'stream';
  $start=$request->get('start');
  $stop=$start+49;
  $data = Data::whereBetween('numinv',[$start,$stop])->get();

    $pdf = app('dompdf.wrapper')->loadView('invoice2', ['data' => $data]);

    if ($type == 'stream') {
        return $pdf->stream('invoice.pdf');
    }

    if ($type == 'download') {
        return $pdf->download('invoice.pdf');
    }
    //return $order->getPdf(); // Returns stream default
    //return $order->getPdf('download'); // Returns the PDF as download
}


}
