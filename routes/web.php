<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Customer

Route::get('customer/index','CustomerController@index')->name('customer.index');
Route::get('customer/create','CustomerController@create')->name('customer.create');
Route::post('customer/store','CustomerController@store')->name('customer.store');
Route::get('customer/edit/{id}','CustomerController@edit')->name('customer.edit');
Route::put('customer/update/{id}','CustomerController@update')->name('customer.update');


Route::get(('cancelarCustomer'), function(){
    return redirect()->route('customer.index')->with('datos', 'Acción Cancelada');
})->name('cancelarCustomer');