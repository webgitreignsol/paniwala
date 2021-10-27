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

	Route::group(['namespace' => 'User'], function (){
		Route::get('users', 'UserController@index')->name('users.index');
		Route::get('users/create', 'UserController@create')->name('users.create');
		Route::post('users', 'UserController@store')->name('users.store');
        Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
        Route::get('users/{id}/view', 'UserController@view')->name('users.view');
		Route::put('users/{id}', 'UserController@update')->name('users.update');
		Route::any('users/{id}/destroy', 'UserController@destroy')->name('users.destroy');
	});

});
