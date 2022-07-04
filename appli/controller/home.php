<?php
use \appli\repository\ProductsRepository;

$oProductsRepository = new ProductsRepository;
$allProducts = $oProductsRepository -> getProducts();

//Chargement de la vue 
$sTitle = 'Projet Green Wedding Dress';
$sContent = 'home';
include_once VIEWS_DIR . '/template.phtml';