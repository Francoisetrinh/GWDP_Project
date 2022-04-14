<?php

use appli\repository\ProductsRepository;
use appli\repository\CategoryRepository;
use appli\entity\Product;

// on créer l'instance Object Repository du Product
$oPdo = new ProductsRepository();
$oCategoryRepository = new CategoryRepository();

$oProduct = $oPdo->getProduct($_GET['id']);

if ($oProduct === NULL) {
    header('Location: index.php?action=admin');
    exit();
}

// Création d'un tableau avec les clés.
$product = [
    'img' => '',
    'title' => '',
    'description'=> '',
    'price' => '',
    'coefficient' => '',
];

$token = generateRandomString(30);

$aCategories = $oCategoryRepository->getCategories();

// Si post du formulaire, on vérifie les valeurs saisies.

if(!empty($_POST) && $_POST['token'] == $oUserSession -> getToken('edit_product')) {
    $product = [
        'id' => $_POST['modelGeneralId'],
        'img' => '',
        'title' => $_POST['modelGeneralTitle'],
        'description'=> $_POST['modelGeneralDescription'],
        'price' => $_POST['modelGeneralPrice'],
        'coefficient' => $_POST['modelGeneralCoefficient'],
        'category_id' => $_POST['modelGeneralCategory'],
    ];

    $oProduct->hydrate($product);

    $oPdo->updateProduct($oProduct);

    header('Location: index.php?action=admin');
    exit();
}

$oUserSession -> setToken('edit_product', $token);

$sTitle = 'Update product';
$sContent = 'edit_product';
include_once VIEWS_DIR . '/template.phtml';
