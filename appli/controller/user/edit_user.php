<?php

use \appli\repository\UserRepository;
use appli\entity\User;

$oUserRepository = new UserRepository;
$aUsers =  $oUserRepository ->getUsers();

// Chargement des erreurs pour les champs invalides 
$classError = [];

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
        // $oUserRepository->updateUser($user);
    }
}

// Chargement de la vue
$sTitle = 'Modification Utilisateur';
$sContent = 'edit_user';
include_once VIEWS_DIR . '/template.phtml';