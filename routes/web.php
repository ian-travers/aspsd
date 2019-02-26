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
//Route::get('/nsi', 'NSIController@index')->middleware('auth')->name('nsi');
//Route::get('/adm', 'AdmController@index')->middleware('auth')->name('adm');

Route::group(
    [
        'prefix' => 'nsi',
        'as' => 'nsi.',
        'namespace' => 'NSI',
        'middleware' => ['auth'],
    ],
    function () {
        Route::get('/', 'NSIController@index');
        Route::resource('/clients', 'ClientController');
    }
);


Route::group(
    [
        'prefix' => 'adm',
        'as' => 'adm.',
        'namespace' => 'Adm',
        'middleware' => ['auth'],
    ],
    function () {
        Route::get('/', 'AdmController@index');
        Route::patch('/users/change-password-modal', 'UserController@changePasswordModal')->name('users.change-password-modal');
        Route::resource('/users', 'UserController');
        Route::resource('/projects', 'ProjectController');
    }
);


