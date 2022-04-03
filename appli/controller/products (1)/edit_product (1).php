<?php
$content = 'éditer un produit';

// Vérification de l'id
$product_id = array_key_exists('product_id', $_POST) ? $_POST['product_id']:$_GET['product_id'];

$aProduct = $oPdo ->getProducts();

// Chargement des erreurs pour les champs invalides 
$classError = [ ];
foreach($aProduct as $aEditProduct) {
    $classError[$aEditProduct] = '';
}

// Stockage des données et si le formulaire n'est pas vide, tester le remplissage du formulaire.
if (!empty($_POST)) 
{
    // if(
    //     !empty($_POST[''])
    // )
    $aProduct = $_POST;
}

// Chargement de la vue
$sTitle = 'Update product';
$sContent = 'products';
include_once VIEWS_DIR . '/template.phtml';