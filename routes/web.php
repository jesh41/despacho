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

    return redirect()->route('login');
/*    return view('auth.login');*/
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {


Route::get('/home', 'DespachoController@index')->name('home');
Route::get('carga', 'HomeController@carga');
Route::get('/historial', 'DespachoController@historial');
Route::get('/form_despacho/{arg}', 'DespachoController@formdespacho');
Route::post('/despachar', 'DespachoController@despachar');
Route::get('/busqueda', 'HomeController@busqueda');

    Route::group(['middleware' => ['role:Administrator']], function () {
        Route::get('/roles', 'RolesController@index');
        Route::post('/Asignar', 'RolesController@asignarol');
    });



});