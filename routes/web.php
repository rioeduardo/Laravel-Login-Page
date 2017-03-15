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

Route::get('login_view_admin','AdminController@index');

Route::post('verify_login','AdminController@verifyLogin');
Route::get('login_view_admin/{error}', ['as' => 'login_view_admin_view', 'uses' => 'AdminController@errorLogin']);

Route::get('welcome_admin','AdminController@welcomeLogin');
Route::get('logout_login','AdminController@logoutLogin');


