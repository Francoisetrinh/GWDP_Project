<?php

use \appli\repository\OrdersRepository;
use \appli\repository\ProductsRepository;
use \appli\entity\Order;
use \appli\entity\User;

//Chargement de la vue 
$sTitle = 'Panier';
$sContent = 'panier';

if (!empty($_POST) && isset($_POST['action'])) {
    if ($_POST['action'] == 'infoPanier') {
        // INFORMATION DU PANIER
        $oProductRepository = new ProductsRepository;

        $aPanierInfo = [];

        foreach ($_POST['panier'] as $aDataPanier) {
            $oProduct = $oProductRepository -> getProduct($aDataPanier['id']);

            if ($oProduct) {
                $aPanierInfo[] = [
                    'title' => $oProduct->getTitle(),
                    'price' => $oProduct->getPrice()
                ];
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($aPanierInfo);

        exit();
    } else if ($_POST['action'] == 'validatePanier' && $oUserSession->isConnected()) {
        // ENREGISTREMENT DU PANIER
        $oOrdersRepository = new OrdersRepository;

        $oCurrentTime = new \DateTime('NOW');

        $oOrder = new Order();

        $oUser = new User();

        $oUser->setId($oUserSession->getId());

        $oOrder->setUser($oUser);
        $oOrder->setFlags('pending');
        $oOrder->setDate($oCurrentTime);
        $oOrder->setDateQuote($oCurrentTime);

        $oOrdersRepository->addOrder($oOrder);

        exit();
    }
}

include_once VIEWS_DIR . '/template.phtml';
