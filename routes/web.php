<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/import_excel', 'ImportExcelController@index');
Route::post('/import_excel/import', 'ImportExcelController@import');

Route::get('/testreport', 'ImportExcelController2@index');
Route::post('/testreport/import', 'ImportExcelController@import');

Route::get('/clear', 'deleteController@index');


Route::get('/report', function () {
    return view('invoice');
});
Route::post('/getPdf', 'HomeController@getPdf');

Route::get('/getPdf','HomeController@getPdf');

Route::get('demo-generate-pdf','HomeController@demoGeneratePDF');
Route::get('pdf','ReportController@demoPDF');
