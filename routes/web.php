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
    return view('users.index');
});

Auth::routes();
Route::resource('users', 'UserController');
Route::resource('gudanguser', 'GudangUserController');
Route::get('approve/{user}', 'UserController@approve')->name('users.approve');
Route::get('disapprove/{user}', 'UserController@disapprove')->name('users.disapprove');
