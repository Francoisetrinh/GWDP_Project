<?php

use \appli\repository\ProductsRepository;
use \appli\repository\UserRepository;


$oAllProductsRepository = new ProductsRepository;
$aProducts = $oAllProductsRepository -> getProducts(20);

$oAllUsersRepository = new UserRepository;
$aAllUsers = $oAllUsersRepository::getUsers();


//Chargement de la vue 
$sTitle = 'Projet Green Wedding Dress';
$sContent = 'admin';
include_once VIEWS_DIR . '/template.phtml';