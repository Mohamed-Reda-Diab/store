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
//prefix admin for all admin route
//admin must be authenticate
Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function () {
 Route::get('/','Admin\AdminController@index')->name('admin.index');

});

//login Admin if not auth
//if admin auth the url 'admin/login' cant be reached can reach if admin not auth and redirect here if not auth

Route::group(['namespace' => 'Dashboard',  'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@login')->name('admin.login');
    Route::post('postlogin', 'LoginController@postlogin')->name('admin.postlogin');
});




