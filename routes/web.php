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
    return redirect('/login');
});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home', function () {
	return redirect('/admin/dashboard');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function(){

	Route::get('/', function() {
		return redirect('/admin/dashboard');
	});

	Route::group(['namespace' => 'Dashboard'], function() {
		Route::get('dashboard', 'IndexController@index')->name('dashboard');
	});



	Route::group(['namespace' => 'Vendor'], function (){
		Route::get('vendors', 'VendorController@index')->name('vendors.index');
		Route::get('vendors/create', 'VendorController@create')->name('vendors.create');
		Route::post('vendors', 'VendorController@store')->name('vendors.store');
	    Route::get('vendors/{id}/edit', 'VendorController@edit')->name('vendors.edit');
	    Route::get('vendors/{id}/view', 'VendorController@view')->name('vendors.view');
		Route::post('vendors/{id}', 'VendorController@update')->name('vendors.update');
		Route::any('vendors/{id}/destroy', 'VendorController@destroy')->name('vendors.destroy');
	});



	Route::group(['namespace' => 'Admin'], function (){
		Route::get('admins', 'AdminController@index')->name('admins.index');
		Route::get('admins/create', 'AdminController@create')->name('admins.create');
		Route::post('admins', 'AdminController@store')->name('admins.store');
	    Route::get('admins/{id}/edit', 'AdminController@edit')->name('admins.edit');
	    Route::get('admins/{id}/view', 'AdminController@view')->name('admins.view');
		Route::post('admins/{id}', 'AdminController@update')->name('admins.update');
		Route::any('admins/{id}/destroy', 'AdminController@destroy')->name('admins.destroy');
	});



	Route::group(['namespace' => 'Employee'], function (){
		Route::get('employees', 'EmployeeController@index')->name('employees.index');
		Route::get('employees/create', 'EmployeeController@create')->name('employees.create');
		Route::post('employees', 'EmployeeController@store')->name('employees.store');
	    Route::get('employees/{id}/edit', 'EmployeeController@edit')->name('employees.edit');
	    Route::get('employees/{id}/view', 'EmployeeController@view')->name('employees.view');
		Route::post('employees/{id}', 'EmployeeController@update')->name('employees.update');
		Route::any('employees/{id}/destroy', 'EmployeeController@destroy')->name('employees.destroy');
	});



	Route::group(['namespace' => 'Customer'], function (){
		Route::get('customers', 'CustomerController@index')->name('customers.index');
		Route::get('customers/create', 'CustomerController@create')->name('customers.create');
		Route::post('customers', 'CustomerController@store')->name('customers.store');
	    Route::get('customers/{id}/edit', 'CustomerController@edit')->name('customers.edit');
	    Route::get('customers/{id}/view', 'CustomerController@view')->name('customers.view');
		Route::post('customers/{id}', 'CustomerController@update')->name('customers.update');
		Route::any('customers/{id}/destroy', 'CustomerController@destroy')->name('customers.destroy');
	});



	Route::group(['namespace' => 'Product'], function (){
		Route::get('products', 'ProductController@index')->name('products.index');
		Route::get('products/create', 'ProductController@create')->name('products.create');
		Route::post('products', 'ProductController@store')->name('products.store');
	    Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
	    Route::get('products/{id}/view', 'ProductController@view')->name('products.view');
		Route::post('products/{id}', 'ProductController@update')->name('products.update');
		Route::any('products/{id}/destroy', 'ProductController@destroy')->name('products.destroy');
	});



	Route::group(['namespace' => 'FillingStock'], function (){
		Route::get('fillingStocks', 'FillingStockController@index')->name('fillingStocks.index');
		Route::get('fillingStocks/create', 'FillingStockController@create')->name('fillingStocks.create');
		Route::post('fillingStocks', 'FillingStockController@store')->name('fillingStocks.store');
	    Route::get('fillingStocks/{id}/edit', 'FillingStockController@edit')->name('fillingStocks.edit');
	    Route::get('fillingStocks/{id}/view', 'FillingStockController@view')->name('fillingStocks.view');
		Route::post('fillingStocks/{id}', 'FillingStockController@update')->name('fillingStocks.update');
		Route::any('fillingStocks/{id}/destroy', 'FillingStockController@destroy')->name('fillingStocks.destroy');
	});



	Route::group(['namespace' => 'StockInOut'], function (){
		Route::get('stockInOuts', 'StockInOutController@index')->name('stockInOuts.index');
		Route::get('stockInOuts/create', 'StockInOutController@create')->name('stockInOuts.create');
		Route::post('stockInOuts/store', 'StockInOutController@store')->name('stockInOuts.store');
	    Route::get('stockInOuts/{id}/edit', 'StockInOutController@edit')->name('stockInOuts.edit');
	    Route::get('stockInOuts/{id}/view', 'StockInOutController@view')->name('stockInOuts.view');
		Route::post('stockInOuts/{id}', 'StockInOutController@update')->name('stockInOuts.update');
		Route::any('stockInOuts/{id}/destroy', 'StockInOutController@destroy')->name('stockInOuts.destroy');
		Route::post('stockInOuts', 'StockInOutController@search')->name('stockSearch');
	});




	Route::group(['namespace' => 'StockBalance'], function (){
		Route::get('stockBalances', 'StockBalanceController@index')->name('stockBalances.index');
	});




	Route::group(['namespace' => 'Investment'], function (){
		Route::get('investments', 'InvestmentController@index')->name('investments.index');
		Route::get('investments/create', 'InvestmentController@create')->name('investments.create');
		Route::post('investments', 'InvestmentController@store')->name('investments.store');
	    Route::get('investments/{id}/edit', 'InvestmentController@edit')->name('investments.edit');
	    Route::get('investments/{id}/view', 'InvestmentController@view')->name('investments.view');
		Route::post('investments/{id}', 'InvestmentController@update')->name('investments.update');
		Route::any('investments/{id}/destroy', 'InvestmentController@destroy')->name('investments.destroy');
	});




	Route::group(['namespace' => 'Expenditure'], function (){
		Route::get('expenditures', 'ExpenditureController@index')->name('expenditures.index');
		Route::get('expenditures/create', 'ExpenditureController@create')->name('expenditures.create');
		Route::post('expenditures', 'ExpenditureController@store')->name('expenditures.store');
	    Route::get('expenditures/{id}/edit', 'ExpenditureController@edit')->name('expenditures.edit');
	    Route::get('expenditures/{id}/view', 'ExpenditureController@view')->name('expenditures.view');
		Route::post('expenditures/{id}', 'ExpenditureController@update')->name('expenditures.update');
		Route::any('expenditures/{id}/destroy', 'ExpenditureController@destroy')->name('expenditures.destroy');
	});




	Route::group(['namespace' => 'AreaAssign'], function (){
		Route::get('areaAssigns', 'AreaAssignEmployeeController@index')->name('areaAssigns.index');
        Route::get('areaAssigns/create', 'AreaAssignEmployeeController@create')->name('areaAssigns.create');
        Route::post('areaAssigns/store', 'AreaAssignEmployeeController@store')->name('areaAssigns.store');
        Route::get('areaAssigns/{id}/edit', 'AreaAssignEmployeeController@edit')->name('areaAssigns.edit');
        Route::get('areaAssigns/{id}/view', 'AreaAssignEmployeeController@view')->name('areaAssigns.view');
        Route::post('areaAssigns/{id}', 'AreaAssignEmployeeController@update')->name('areaAssigns.update');
        Route::any('areaAssigns/{id}/destroy', 'AreaAssignEmployeeController@destroy')->name('areaAssigns.destroy');
	});



});

