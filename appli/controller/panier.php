<?php

use \appli\repository\OrdersRepository;
use \appli\repository\OrdersDetailsRepository;
use \appli\repository\ProductsRepository;
use \appli\repository\SizeRepository;
use \appli\entity\Order;
use \appli\entity\OrderDetails;
use \appli\entity\User;
use \appli\entity\Size;

//Chargement de la vue 
$sTitle = 'Panier';
$sContent = 'panier';

if (!empty($_POST) && isset($_POST['action'])) {
    if ($_POST['action'] == 'infoPanier') {
        // INFORMATION DU PANIER
        $oProductRepository = new ProductsRepository;
        $oSizeRepository = new SizeRepository;

        $aPanierInfo = [];

        foreach ($_POST['panier'] as $aDataPanier) {
            $oProduct = $oProductRepository -> getProduct($aDataPanier['id']);
            $oSize = $oSizeRepository -> getSize($aDataPanier['size']);

            if ($oProduct) {
                $aPanierInfo[] = [
                    'title' => $oProduct->getTitle(),
                    'price' => $oProduct->getPrice(),
                    'size' => $oSize->getSizeEu() . ' (' . $oSize->getSizeUs() . ')'
                ];
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($aPanierInfo);

        exit();
    } else if ($_POST['action'] == 'validatePanier' && $oUserSession->isConnected()) {
        // ENREGISTREMENT DU PANIER
        $oOrdersRepository = new OrdersRepository;
        $oOrdersDetailsRepository = new OrdersDetailsRepository;
        $oProductRepository = new ProductsRepository;
        $oSizeRepository = new SizeRepository;

        $oCurrentTime = new \DateTime('NOW');

        $oOrder = new Order();

        $oUser = new User();

        $oUser->setId($oUserSession->getId());

        $oOrder->setUser($oUser);
        $oOrder->setFlags('pending');
        $oOrder->setDate($oCurrentTime);
        $oOrder->setDateQuote($oCurrentTime);

        $iOrderId = $oOrdersRepository->addOrder($oOrder);

        foreach ($_POST['panier'] as $aDataPanier) {
            $oProduct = $oProductRepository -> getProduct($aDataPanier['id']);
            $oSize = $oSizeRepository -> getSize($aDataPanier['size']);

            if ($oProduct) {
                $oOrderDetails = new OrderDetails();
                $oOrderDetails
                    -> setProduct($oProduct)
                    -> setQuantity($aDataPanier['quantity'])
                    -> setPrice($oProduct->getPrice())
                    -> setSize($oSize)
                ;

                $oOrdersDetailsRepository->addDetail($oOrderDetails, $iOrderId);
            }
        }

        exit();
    }
}

include_once VIEWS_DIR . '/template.phtml';
