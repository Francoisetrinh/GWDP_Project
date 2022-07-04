<?php

use appli\repository\ProductsRepository;

// var_dump($_GET);

$oProductRepository = new ProductsRepository;
$aProducts = $oProductRepository -> getProducts(15);

if ( $aProducts === false) {
    throw new Exception("Error Processing Request", 10);
}

//Chargement de la vue 
$sTitle = 'Liste des produits';
$sContent = 'products';
include_once VIEWS_DIR . '/template.phtml';