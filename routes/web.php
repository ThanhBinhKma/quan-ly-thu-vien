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
Route::post('forget/password','User\LoginController@postForget')->name('user.postForget');
Route::get('forget/password','User\LoginController@forget')->name('user.forget');
Route::get('confirm_register/{email}/{id}/{code}','User\LoginController@confirm');
Route::get('reset_password/{email}/{code}','User\LoginController@resetPassword');
Route::post('reset_password','User\LoginController@postResetPassword')->name('resetpasswordPost');
Route::group(['middleware'=>['checkLogin']],function(){
    Route::get('logout','User\LoginController@logout')->name('user.logout');
    Route::get('/home', 'User\HomeController@index')->name('user.home');
    Route::get('user','UserController@index')->name('user.index');
    Route::get('user/create','UserController@create')->name('user.create');


    Route::group(['prefix'=>'admin','namespace' => 'Admin'],function (){
        Route::get('user','UserController@index')->name('admin.user.index');
        Route::get('user/create','UserController@create')->name('admin.user.create');
        Route::post('user','UserController@store')->name('admin.user.store');
        Route::get('user/{id}/edit','UserController@edit')->name('admin.user.edit');
        Route::post('user/{id}','UserController@update')->name('admin.user.update');
        Route::get('user/{id}/delete','UserController@delete')->name('admin.user.delete');
    });
});
