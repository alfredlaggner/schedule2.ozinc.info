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
Route::get('get_bccRetailer', array('as' => 'get_bccRetailer', 'uses' => 'BccRetailerController@get_bccRetailer'));

Route::get('get_odoo/{from}/{to}', array('as' => 'get_odoo', 'uses' => 'OdooController@getOdoo'));
Route::get('get_margins/{from}/{to}', array('as' => 'get_margins', 'uses' => 'OdooController@getMargins'));
Route::get('run_margins', array('as' => 'run_margins', 'uses' => 'OdooController@runMargins'));
Route::get('get_salesorders/{from}/{to}', array('as' => 'get_salesorders', 'uses' => 'OdooController@getSalesOrders'));
Route::get('get_order_lines/{from}/{to}', array('as' => 'get_order_lines', 'uses' => 'OdooController@getOrderLines'));
Route::get('get_products_per_day', array('as' => 'get_products_per_day', 'uses' => 'OdooController@calcProductsPerDay'));
Route::get('list_margins/{percent}', array('as' => 'list_margins', 'uses' => 'MarginController@listMargins'));
Route::get('get_customers', array('as' => 'get_customers', 'uses' => 'OdooController@getCustomers'));
Route::get('get_users', array('as' => 'get_users', 'uses' => 'OdooController@getUsers'));
Route::get('get_stock/{from}/{to}', array('as' => 'get_stock', 'uses' => 'OdooController@getStock'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'MarginController@test')->name('test');
Route::get('/merge', 'MarginController@calcProductsPerDay')->name('merge');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/salesorders', 'TestSaleInvoiceController@salesorders')->name('salesorders');
Route::get('/invoicelines', 'TestSaleInvoiceController@invoicelines')->name('invoicelines');

Route::get('/test', 'OdooController@getBrands')->name('test');
Route::get('span', 'TimespanController@so_time_span')->name('span');
