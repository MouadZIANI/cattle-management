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
Route::resource('achat', 'AchatController');
Route::resource('fournisseur', 'FournisseurController');
Route::resource('bovin', 'BovinController');
Route::get('total', function () {
	foreach (Achat::all() as $key => $achat) {
		dump($achat->montantTotalTransportAchat);
	}
});