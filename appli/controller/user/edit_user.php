<?php

use \appli\repository\UserRepository;

use appli\entity\User;


$sUsers =  $oPdo ->getUsers();

// Chargement des erreurs pour les champs invalides 
$classError = [ ];
foreach($sUsers as $sEditUser) {
    $classError[$sEditUser] = '';
}

// Stockage des données et si le formulaire n'est pas vide, tester le remplissage du formulaire.
if (!empty($_POST))
{
    if ( 
        !empty($_POST['name'] )
        && !empty($_POST['firstname'] )
        && !empty($_POST['address'] )
        && !empty($_POST['postalcode'] )
        && !empty($_POST['city'] )
        && !empty($_POST['phone'] )
        && !empty($_POST['login'] )
        && !empty($_POST['email'] )
        && !empty($_POST['password'] )
        && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {

    }
    $oPdo->updateUser($user);
}

// Chargement de la vue
$sTitle = 'Update user';
$sContent = 'user_account';
$content = 'modification utilisateur';
include_once VIEWS_DIR . '/template.phtml';