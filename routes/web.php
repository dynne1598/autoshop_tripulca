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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Supplier route
Route::get('/supplier', 'SupplierController@index')->name('supplier');
Route::resource('supplier','SupplierController');

//Stocks route
Route::get('/stocks', 'StocksController@index')->name('stocks');

//Sales routes
Route::get('/sales', 'SalesController@index')->name('sales');

//Logs routes
Route::get('/log_manager', 'LogsController@index')->name('logs');
Route::resource('logs','LogsController');


//Invoice routes
Route::get('/invoice', 'InvoiceController@index')->name('invoice');


// Edit Specific supply
// Route::get('/supplier/{id}/edit',['uses' => 'SupplierController@edit','as' => 'supply.edit']);

//Update Specific supply
Route::post('/supplier/update',['uses' => 'SupplierController@update','as' =>'supply.update']);



// //nadungag
// //password reset routes
// Route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm');
// Route::post('password/email','Auth\ResetPasswordController@sendResetLinkEmail');
// Route::post('password/reset','Auth\ResetPasswordController@reset');