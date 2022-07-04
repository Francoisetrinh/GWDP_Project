<?php

use \appli\framework\PDOConnection;
use \appli\repository\UserRepository;


if (!$oUserSession->isConnected()) {
    header('Location:?action=login');
    exit;
}


$oUser = UserRepository::getUser($oUserSession->getId());

//Chargement de la vue 
$sTitle = 'profil de l\'utilisateur';
$sContent = 'my_profile';
include_once VIEWS_DIR . '/template.phtml';
