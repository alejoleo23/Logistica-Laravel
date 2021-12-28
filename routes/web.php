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
Route::get('customer/list','CustomerController@list')->name('customer.list');
Route::get('customer/edit/{id}','CustomerController@edit')->name('customer.edit');
Route::put('customer/update/{id}','CustomerController@update')->name('customer.update');
Route::get('/customer/delete/{id}','CustomerController@delete')->name('customer.delete');
Route::get(('cancelarCustomer'), function(){
    return redirect()->route('customer.index')->with('datos', 'Acción Cancelada');
})->name('cancelarCustomer');

//Supplier

Route::get('supplier/index','SupplierController@index')->name('supplier.index');
Route::get('supplier/create','SupplierController@create')->name('supplier.create');
Route::post('supplier/store','SupplierController@store')->name('supplier.store');
Route::get('supplier/list','SupplierController@list')->name('supplier.list');
Route::get('supplier/edit/{id}','SupplierController@edit')->name('supplier.edit');
Route::put('supplier/update/{id}','SupplierController@update')->name('supplier.update');
Route::get('/supplier/delete/{id}','SupplierController@delete')->name('supplier.delete');
Route::get(('cancelarSupplier'), function(){
    return redirect()->route('supplier.index')->with('datos', 'Acción Cancelada');
})->name('cancelarSupplier');

//Product

Route::get('product/index','ProductController@index')->name('product.index');
Route::get('product/create','ProductController@create')->name('product.create');
Route::post('product/store','ProductController@store')->name('product.store');
Route::get('product/list','ProductController@list')->name('product.list');
Route::get('product/edit/{id}','ProductController@edit')->name('product.edit');
Route::put('product/update/{id}','ProductController@update')->name('product.update');
Route::get('/product/delete/{id}','ProductController@delete')->name('product.delete');
Route::get(('cancelarProduct'), function(){
    return redirect()->route('product.index')->with('datos', 'Acción Cancelada');
})->name('cancelarProduct');

//Inventary

Route::get('inventory/entrada/index','InventaryController@entrada')->name('entrada.index');
Route::get('inventory/salida/index','InventaryController@salida')->name('salida.index');
Route::get('EncontrarProducto/{id}','InventaryController@encontrarProducto');

//Employee

Route::get('mantenimiento/empleado/index','EmployeeController@index')->name('empleado.index');
Route::get('mantenimiento/empleado/create','EmployeeController@create')->name('empleado.create');
Route::get(('cancelarEmpleado'), function(){
    return redirect()->route('empleado.index')->with('datos', 'Acción Cancelada');
})->name('cancelarEmpleado');

//User

Route::get('mantenimiento/usuario/index','UserController@index')->name('usuario.index');
Route::get('mantenimiento/usuario/create','UserController@create')->name('usuario.create');
Route::get(('cancelarUsuario'), function(){
    return redirect()->route('usuario.index')->with('datos', 'Acción Cancelada');
})->name('cancelarUsuario');

//Document

Route::get('mantenimiento/documento/index','DocumentController@index')->name('documento.index');
Route::get('mantenimiento/documento/create','DocumentController@create')->name('documento.create');
Route::get(('cancelarDocumento'), function(){
    return redirect()->route('documento.index')->with('datos', 'Acción Cancelada');
})->name('cancelarDocumento');

//Comprobante

Route::get('venta/comprobante/index','ComprobanteController@index')->name('comprobante.index');
Route::get('venta/comprobante/create','ComprobanteController@create')->name('comprobante.create');
Route::get('venta/comprobante/configuracion/index','ComprobanteController@cindex')->name('configuracion.index');
Route::get(('cancelarComprobante'), function(){
    return redirect()->route('comprobante.index')->with('datos', 'Acción Cancelada');
})->name('cancelarComprobante');

//Entrada

Route::get('compra/entrada/index','EntradaController@index')->name('entrada.index');
Route::get(('cancelarEntrada'), function(){
    return redirect()->route('home')->with('datos', 'Acción Cancelada');
})->name('cancelarEntrada');



