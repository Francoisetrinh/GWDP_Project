<?php
use appli\repository\ProductsRepository;
use appli\repository\SizeRepository;

$oProductItemRepository = new ProductsRepository;
$oProductItem = $oProductItemRepository -> getProduct($_GET['id']);

$oProductSizeRepository = new SizeRepository;
$aProductSize = $oProductSizeRepository -> getSizes();
// var_dump($aProductSize);

//Chargement de la vue 
$sTitle = 'Description products';
$sContent = 'product_description';
$content = 'description des produits';
include_once VIEWS_DIR . '/template.phtml';