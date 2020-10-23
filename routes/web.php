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


    Route::group(['middleware'=>'checkAdmin','prefix'=>'admin','namespace' => 'Admin'],function (){

        Route::get('user','UserController@index')->name('admin.user.index');
        Route::get('user/create','UserController@create')->name('admin.user.create');
        Route::post('user','UserController@store')->name('admin.user.store');
        Route::get('user/{id}/edit','UserController@edit')->name('admin.user.edit');
        Route::post('user/{id}','UserController@update')->name('admin.user.update');
        Route::get('user/{id}','UserController@show')->name('admin.user.show');
        Route::get('user/{id}/delete','UserController@delete')->name('admin.user.delete');

        Route::get('book','BookController@index')->name('admin.book.index');
        Route::get('book/create','BookController@create')->name('admin.book.create');
        Route::post('book','BookController@store')->name('admin.book.store');
        Route::get('book/{id}/edit','BookController@edit')->name('admin.book.edit');
        Route::post('book/{id}','BookController@update')->name('admin.book.update');
        Route::get('book/{id}/delete','BookController@delete')->name('admin.book.delete');

        Route::get('loan-slip','LoanSlipController@index')->name('admin.loan_slips.index');
        Route::get('loan-slip/{id}','LoanSlipController@update')->name('admin.loan_slips.update');
        Route::get('loan-slip-create','LoanSlipController@create')->name('admin.loan_slips.create');
        Route::post('loan-slip','LoanSlipController@store')->name('admin.loan_slips.store');
        Route::get('loan-slip/{id}/delete','LoanSlipController@delete')->name('admin.loan_slips.delete');
        Route::get('loan-slip/{id}/show','LoanSlipController@show')->name('admin.loan_slips.show');
    });
    Route::group(['middleware'=>'checkUser','prefix'=>'user','namespace' => 'User'],function () {
        Route::get('book','BookController@index')->name('user.book.index');

        Route::get('loan-slip','LoanSlipController@index')->name('user.loan_slips.index');
        Route::get('loan-slip/{id}/show','LoanSlipController@show')->name('user.loan_slips.show');
        Route::get('loan-slip/create','LoanSlipController@create')->name('user.loan_slips.create');
        Route::post('loan-slip','LoanSlipController@store')->name('user.loan_slips.store');


    });
    Route::post('get-list-book','User\LoanSlipController@getListBook')->name('user.loan_slips.getList');
});
