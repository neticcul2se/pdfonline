<?php
namespace App\Http\Controllers;
use Redirect;

use App\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class deleteController extends Controller
{
    //
    function index()
        {
          DB::table('data')->delete();
        // $data = DB::table('data')->orderBy('CustomerID', 'DESC')->get();

        return redirect()->back();

        }
}
