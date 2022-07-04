<?php

use \appli\repository\UserSession;
use \appli\framework\PDOConnection;
use \appli\repository\UserRepository;

// Si soumission d'un formulaire.
if (!empty($_POST)) 
{
    if (     
        !empty($_POST['loginoremail'] )
        && !empty($_POST['password'] )
    ) {
    
        // Récupération des données
        $email = $_POST['loginoremail'];
        $password = $_POST['password'];

        // Vérification des identifiants.
        $oPdo = PDOConnection::get();
        var_dump($email);
        $oUser = UserRepository::getUserByLoginOrEmail($email);
        // $requestsql = 'SELECT * FROM gwdp_users WHERE u_email = ?';
        // $query = $oPdo -> prepare($requestsql);
        // $query -> execute([$email]);
        // $oUser = $query -> fetch();

        // Test du mot de passe.
        if ( $oUser && password_verify( $password, $oUser->getPassword() ) ) {
            // Le mot de passe est correct => connexion de l'utilisateur.
            // Etape 2 : Enregistrement des données en session de l'utilisateur.
            // Si aucune session, on démarre une nouvelle session.
            $userSession = new UserSession();
            $userSession->register($oUser->getId(), $oUser->getFirstname(), $oUser->getName(), $oUser->getLogin(), $oUser->getEmail(), $oUser->getRole());
            // var_dump($_SESSION);
            // die();
    
            //Connexion à la session si utilisateur existant
            $isConnected = $userSession->isConnected();

            session_start();
            $userSession = 
            $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté(e)';

            // session_start();
            // include ('bdd.php');
            
            // if(empty($_SESSION['id']))
            //     {
            //         header("Location: index.php");
            //         die("Redirecting to index.php");
            //     }
            
        

            // Redirection
            header('Location: index.php?action=my_profile');
            exit;

        }     
        else 
        {
            // MDP introuvable
            $error = 'Identification incorrecte';
            var_dump('password incorrect');
        }

    } 
    else 
    {
        // Email introuvable
        $error = 'Identification incorrecte';
        var_dump('email incorrect');
    }
}



//Chargement de la vue 
$sTitle = 'Connexion de l\'utilisateur';
$sContent = 'login';
include_once VIEWS_DIR . '/template.phtml';