<?php

use \appli\repository\OrdersRepository;
use \appli\repository\OrdersDetailsRepository;

if (!$oUserSession->isConnected()) {
    header('Location:?action=login');
    exit;
}

$oOrdersRepository = new OrdersRepository;
$aOrders = $oOrdersRepository->getOrdersUser($oUserSession->getId());

//Chargement de la vue 
$sTitle = 'Mes Commandes';
$sContent = 'orders';
include_once VIEWS_DIR . '/template.phtml';
