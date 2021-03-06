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

Auth::routes();

Route::prefix('admin')->group(function(){
	Route::resource('/portfolio', 'PortfolioController');
	Route::post('/contact', 'PagesController@contact')->name('contact.store');
	Route::get('/onas', 'PagesController@updateOnas')->name('onas.update');
	Route::put('/onas', 'PagesController@storeOnas')->name('onas.store');
	Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
