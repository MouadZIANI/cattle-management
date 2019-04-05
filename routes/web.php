<?php

use App\Models\Fournisseur;
use App\Models\BovinTransport;
use App\Models\Transport;
use App\Models\Bovin;
use App\Models\Frais;
use App\Models\Achat;

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
Route::get('/', 'DashboardController@index');
Route::resource('dashboard', 'DashboardController', [
    'only' => ['index', 'store', 'destroy']
]);
Route::resource('achat', 'AchatController');
Route::resource('fournisseur', 'FournisseurController');
Route::resource('pert', 'PertController');
Route::resource('bovin', 'BovinController');
Route::get('available-bovin', 'BovinController@availableBovin');
Route::post('available-bovin', 'BovinController@searchAvailableBovin')->name('searchAvailableBovin');
Route::get('exports/available-bovin', 'BovinController@exportAvailableBovins');
Route::resource('visite', 'VisiteController');
Route::resource('veterinaire', 'VeterinaireController');
Route::resource('stock', 'VeterinaireController');
Route::resource('stockelement', 'StockElementController');
Route::get('total', function () {
	$to = Carbon\Carbon::createFromFormat('Y-m-d H:s:i', "2019-01-20 02:14:08");
    $from = Carbon\Carbon::now();
    $diff_in_days = $to->diffInMonths($from);
    dd($diff_in_days);
	dd(Carbon\Carbon::now());
	foreach (Achat::all() as $key => $achat) {
		dump($achat->montantTotalTransportAchat);
	}
});