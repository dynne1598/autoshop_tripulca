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

Route::post('/', ['uses' => 'Auth\LoginController@login', 'as' => 'login.custom']);

Route::get('/home', 'HomeController@index')->name('home');

//Supplier route
Route::get('/supplier', 'SupplierController@index')->name('supplier');
Route::resource('supplier','SupplierController');

//Stocks route
Route::get('/stocks', 'StocksController@index')->name('stocks');
Route::resource('stocks','StocksController');
Route::post('/stocks/buy/{id}', 'StocksController@buy')->name('stocks.buy');

//Sales routes
Route::get('/sales', 'SalesController@index')->name('sales');
Route::resource('sales','SalesController');
Route::post('/sales/getdate', ['uses' => 'SalesController@getDateFrom', 'as' => 'sales.getDateFrom']);


//Logs routes
Route::get('/log_manager', 'LogsController@index')->name('logs');
Route::resource('logs','LogsController');


//Invoice routes
Route::get('/invoice', 'InvoiceController@index')->name('invoice');

//route para sa register
Route::get('/register/destroy/{id}', 'Auth\RegisterController@destroy')->name('register.destroy');
Route::get('/register/edit/{id}', 'Auth\RegisterController@edit')->name('register.edit');
Route::post('/register/{id}', ['uses' => 'Auth\RegisterController@update', 'as' => 'register.update']);
// Route::resource('register', 'Auth\RegisterController');
// Edit Specific supply
// Route::get('/supplier/{id}/edit',['uses' => 'SupplierController@edit','as' => 'supply.edit']);



// //nadungag
// //password reset routes
// Route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm');
// Route::post('password/email','Auth\ResetPasswordController@sendResetLinkEmail');
// Route::post('password/reset','Auth\ResetPasswordController@reset');