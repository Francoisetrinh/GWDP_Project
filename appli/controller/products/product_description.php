<?php
use appli\repository\ProductsRepository;
use appli\repository\SizeRepository;

$oProductItemRepository = new ProductsRepository;
$oProductItem = $oProductItemRepository -> getProduct($_GET['id']);

$oProductSizeRepository = new SizeRepository;
$aProductSize = $oProductSizeRepository -> getSizes();
// var_dump($aProductSize);

//Chargement de la vue 
$sTitle = 'Description du produit';
$sContent = 'product_description';
include_once VIEWS_DIR . '/template.phtml';