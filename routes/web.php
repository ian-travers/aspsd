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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/nsi', 'NSIController@index')->name('nsi');
Route::get('/adm', 'AdmController@index')->name('adm');
Route::resource('/nsi/clients', 'NSI\ClientController', ['as' => 'nsi']);
Route::resource('/adm/users', 'Adm\UserController', ['as' => 'adm']);
