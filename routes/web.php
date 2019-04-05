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
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'DashboardController@index');
	Route::resource('achat', 'AchatController');
	Route::resource('fournisseur', 'FournisseurController');
	Route::resource('pert', 'PertController');
	Route::resource('bovin', 'BovinController');
	Route::get('available-bovin', 'BovinController@availableBovin')->name('available-bovin');
	Route::post('available-bovin', 'BovinController@searchAvailableBovin')->name('searchAvailableBovin');
	Route::get('exports/available-bovin', 'BovinController@exportAvailableBovins');
	Route::resource('visite', 'VisiteController');
	Route::resource('veterinaire', 'VeterinaireController');
	Route::resource('stock', 'VeterinaireController');
	Route::resource('nourriture', 'NourritureController');
	Route::resource('stockelement', 'StockElementController');
	Route::resource('dashboard', 'DashboardController', [
	    'only' => ['index', 'store', 'destroy']
	]);
});