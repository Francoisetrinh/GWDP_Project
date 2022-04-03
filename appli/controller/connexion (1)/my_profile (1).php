<?php

use \appli\repository\UserSession;
use \appli\framework\PDOConnection;
use \appli\repository\UserRepository;

$userSession = new UserSession();

if ( ($userId = $userSession->getId() ) === null ) {
    header('Location:?action=login');
    exit;
}


$oUser = UserRepository::getUser($userId);
// var_dump($userId);
// var_dump($oUser -> getName());

//Chargement de la vue 
$sTitle = 'profil de l\'utilisateur';
$sContent = 'my_profile';
$content = 'mon profil';
include_once VIEWS_DIR . '/template.phtml';
