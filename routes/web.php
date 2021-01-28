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

// Route::get('/', 'DashboardController@index')->name('dashboard');
// Route::get('/filter', 'DashboardController@filter')->name('dashboard-filter');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/filter', 'DashboardController@filter')->name('dashboard-filter');
});

Route::get('/yajra')->name('yajra.index')->uses('DashboardController@datatablesIndex');
