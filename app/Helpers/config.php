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
if (!function_exists("getPertTypes")) {
	function getPertTypes() {
		return [
			'Voler' => 'Voler',
			'Mort' => 'Mort',
			'Autre' => 'Autre'
		];	
	}
}
if (!function_exists("getInitPourcentages")) {
	function getInitPourcentages() {
		return [
			'10' => '10 %',
			'15' => '15 %',
			'20' => '20 %',
			'25' => '25 %',
			'30' => '30 %',
			'35' => '35 %',
		];	
	}
}