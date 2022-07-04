<?php

use \appli\repository\OrdersRepository;
use \appli\repository\OrdersDetailsRepository;

$oOrdersRepository = new OrdersRepository;
$aOrders = $oOrdersRepository->getOrders();

//Chargement de la vue 
$sTitle = 'Mes Commandes';
$sContent = 'orders';
include_once VIEWS_DIR . '/template.phtml';
