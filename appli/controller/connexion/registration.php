<?php

use \appli\repository\UserRepository;
use appli\entity\User;

// Chargement des données.
$oUserRepository = new UserRepository;

// $aUser = UserRepository::getUsers();

$classError = [
    'name' => null,
    'firstname' => null,
    'address' => null,
    'city' => null,
    'phone' => null,
    'email' => null,
    'login' => null,
    'password' => null,
    'confirmpassword' => null,
];

// Fonction de la requête - appel de cette fonction.
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
        $oUser = UserRepository::getUser($_POST['email']);
        if (($_POST['password'] == $_POST['confirmpassword'])
        &&
        $oUser == NULL) 
        {
            $oUser = new User;
            $oUser
            -> setName($_POST['name'])
            -> setFirstname($_POST['firstname'])
            -> setAddress($_POST['address'])
            -> setPostalcode($_POST['postalcode'])
            -> setCity($_POST['city'])
            -> setPhone($_POST['phone'])
            -> setLogin($_POST['login'])
            -> setEmail($_POST['email'])
            -> setPassword( password_hash($_POST['password'], PASSWORD_DEFAULT))
            ;

            $id = UserRepository::insertUser($oUser);
            // $oUserRepository->insertUser($oUser);
            header('Location:index.php?action=login');
            exit;
        }
    }
  
}


/*** TEST 1
    // {
    //     if (isset($_POST['registration'])) 
    //     {
    //         // Vérification de l'enregistrement des données.
    //         if (checkRegistration('login') && checkRegistration('password') && checkRegistration('confirmpassword') && checkRegistration('email')
    //         ) {
    //             // Récupération des données.
    //             $email =  $_POST['email'];
    //             $login = $_POST['login'];
    //             $password = $_POST['password'];
    //             $confirmpassword = $_POST['confirmpassword'];
                
    //             $oPdo = PDOConnection::get();
    //             if ($password  == $confirmpassword && !get($login, $email)) {
    //                 get($login) &&
    //                 password_hash($password, PASSWORD_DEFAULT) ==
    //                 password_hash($confirmpassword, PASSWORD_DEFAULT) && $email;
    //             }
    //             header ()
    //             exit;
    //         }
    //     }
    // }
*/


//Chargement de la vue 
$sTitle = 'Enregistrement d\'un utilisateur';
$sContent = 'registration';
$content = 'enregistrement de l\'utilisateur';
include_once VIEWS_DIR . '/template.phtml';