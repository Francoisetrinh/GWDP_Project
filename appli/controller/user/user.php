<?php

use appli\repository\UserRepository;

$oUserRepository = new UserRepository;

$aUsers = $oUserRepository -> getUsers(10);

if ($aUsers === false) {
    throw new Exception("Error Processing Request", 10);
}

//Chargement de la vue 
$sTitle = 'Projet Green Wedding Dress';
$sContent = 'my_profile';
$content = 'mon profil';
include_once VIEWS_DIR . '/template.phtml';