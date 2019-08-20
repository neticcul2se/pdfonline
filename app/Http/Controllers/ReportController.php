<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    //
    //
    // $data = [
		// 	'foo' => 'bar'
		// ];
    

    public function demoPDF()
  {
		$pdf = PDF::loadView('doc');
		return $pdf->stream('document.pdf');
  }
}
