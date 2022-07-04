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
$content = 'mon profil';
include_once VIEWS_DIR . '/template.phtml';
