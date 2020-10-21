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
Route::post('user','User\LoginController@store')->name('user.store');
Route::post('login','User\LoginController@index')->name('user.login');
Route::get('confirm_register/{email}/{id}/{code}','User\LoginController@confirm');
Route::group(['middleware'=>['checkLogin']],function(){
    Route::get('logout','User\LoginController@logout')->name('user.logout');
    Route::get('/home', 'User\HomeController@index')->name('user.home');
    Route::get('user','UserController@index')->name('user.index');
    Route::get('user/create','UserController@create')->name('user.create');
    
});
