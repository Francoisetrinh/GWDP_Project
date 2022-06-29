<?php

use appli\repository\ProductsRepository;
use appli\repository\CategoryRepository;
use appli\entity\Product;

// Variable valeur vide
$product_id = '';

// on créer l'instance Object Repository du Product
$oPdo = new ProductsRepository();
$oCategoryRepository = new CategoryRepository();

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

if(!empty($_POST) && $_POST['token'] == $oUserSession -> getToken('insert_product')) {
    $oProduct = new Product();

    $product = [
        'id' => 0,
        'img' => '',
        'title' => $_POST['modelGeneralTitle'],
        'description'=> $_POST['modelGeneralDescription'],
        'price' => $_POST['modelGeneralPrice'],
        'coefficient' => $_POST['modelGeneralCoefficient'],
        'category_id' => $_POST['modelGeneralCategory'],
    ];

    $oProduct->hydrate($product);

    $oPdo->insertProduct($oProduct);

    header('Location: index.php?action=admin');
    exit();
}

$oUserSession -> setToken('insert_product', $token);

$sTitle = 'Insert new product';
$sContent = 'insert_product';
$content = 'insérer mon produit';
include_once VIEWS_DIR . '/template.phtml';
