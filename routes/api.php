<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//API Compras
/*
 O Laravel usa originalmente os métodos PUT e DELETE para Update e Destroy,
 respectivamente no Controller do tipo Resource. Optei por utilizar apenas GET e POST
 para facilidar o teste da API
*/
//Para testar no Postman DEVE-SE!!! adicionar o Header Accept: application/json

Route::get('/compra/', 'Api\CompraController@index'); //Index
Route::get('/compra/{id}', 'Api\CompraController@show'); //Show
Route::get('/compra/material/{id}', 'Api\CompraController@getByMaterial'); //ByMaterial
Route::post('/compra/store', 'Api\CompraController@store')->name('api.compra.store'); //Store
Route::post('/compra/update/{id}', 'Api\CompraController@update')->name('api.compra.update'); //Update
Route::get('/compra/delete/{id}', 'Api\CompraController@destroy'); //Delete
