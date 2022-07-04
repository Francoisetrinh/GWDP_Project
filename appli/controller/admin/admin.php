<?php

use \appli\repository\ProductsRepository;
use \appli\repository\UserRepository;

use \appli\repository\OrdersRepository;
use \appli\repository\OrdersDetailsRepository;

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