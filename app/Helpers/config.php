<?php 
if (!function_exists("getStatusBovin")) {
	function getStatusBovin() {
		return [
			'En quarantine' => 'En quarantine',
			'Actif' => 'Actif',
			'Non actif' => 'Non actif',
			'Vendu' => 'Vendu'
		];	
	}
}
if (!function_exists("getElementStockType")) {
	function getElementStockType() {
		return [
			'Medicaments' => 'Medicaments',
			'Norritures' => 'Norritures',
		];	
	}
}