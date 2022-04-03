<?php

// Variable valeur vide
$product_id = '';

// Création d'un tableau avec les clés.
$product = [
    'img' => '',
    'title' => '',
    'description'=> '',
    'price' => '',
    'coefficient' => '',
];

$token = generateRandomString(30);
$oUserSession -> setToken('insert_product', $token);

// Si post du formulaire, on vérifie les valeurs saisies.
// if (!empty($_POST)) {
//     $product = [
//         'img' => $_POST['image'],
//         'title' => $_POST['title'],
//         'description'=> $_POST['description'],
//         'price' => $_POST['price'],
//         'coefficient' => $_POST['coefficient'],
//     ];
//     $oPdo->insertProduct($product);
// }
// var_dump($_POST);
if(!empty($_POST) && $_POST['token'] == $oUserSession -> getToken('insert_product')) {
    echo 'Ca fonctionne!';
}

$sTitle = 'Insert new product';
$sContent = 'insert_product';
include_once VIEWS_DIR . '/template.phtml';
