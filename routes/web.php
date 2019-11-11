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
Route::get('/imoveis', 'ImoveisController@index');
Route::get('/imovel/show/{imovel}', 'ImoveisController@show');
Route::delete('/imovel/delete/{imovel}', 'ImoveisController@destroy');

Route::post('/imovel/create', 'ImoveisController@store');
Route::post('/imovel/update/{imovel}', 'ImoveisController@update');
Route::post('/imovel/filter', 'ImoveisController@filter');
