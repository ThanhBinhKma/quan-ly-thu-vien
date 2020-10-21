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

Route::get('/','HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::post('login','User\LoginController@index')->name('user.login');

Route::group(['middleware'=>['verified']],function(){
    Route::get('logout','User\LoginController@logout')->name('user.logout');

    Route::get('/home', 'User\HomeController@index')->name('user.home');

    Route::get('user','UserController@index')->name('user.index');
});
