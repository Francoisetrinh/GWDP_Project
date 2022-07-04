<?php

use \appli\repository\ProductsRepository;
use \appli\repository\UserRepository;

use \appli\repository\OrdersRepository;
use \appli\repository\OrdersDetailsRepository;

if (!$oUserSession->isConnected() || $oUserSession->getRole() != 'admin') {
    header('Location:?action=login');
    exit;
}

$oAllProductsRepository = new ProductsRepository;
$aProducts = $oAllProductsRepository -> getProducts(20);

$oAllUsersRepository = new UserRepository;
$aAllUsers = $oAllUsersRepository::getUsers();

$oOrdersRepository = new OrdersRepository;
$aOrders = $oOrdersRepository->getOrders();

//Chargement de la vue 
$sTitle = 'Projet Green Wedding Dress';
$sContent = 'admin';
include_once VIEWS_DIR . '/template.phtml';