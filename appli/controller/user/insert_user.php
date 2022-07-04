<?php


// Variable valeur vide
$id = '';
                               
// Création d'un tableau avec les clés.
$user = [
    'name' => '',
    'firstname' => '',
    'address'=> '',
    'postalcode' => '',
    'city' => '',
    'phone' => '',
    'email' => '',
    'login' => '',
    'password' => '',
];

// Chargement des erreurs dans les champs.
$classError = [ ];
foreach($user as $users) {
    $classError[$users] = '';
}

// Si post du formulaire, on vérifie les valeurs saisies.
if (!empty($_POST)) {
    $user = [
        'name' => $_POST['name'],
        'firstname' => $_POST['firstname'],
        'address'=> $_POST['address'],
        'postalcode' => $_POST['postalcode'],
        'city' => $_POST['city'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'login' => $_POST['login'],
        'password' => $_POST['password']
    ];
    $oPdo->insertUser($user);
}

$sTitle = 'Insérer un nouvelle utilisateur';
$sContent = 'user_account';
include_once VIEWS_DIR . '/template.phtml';
