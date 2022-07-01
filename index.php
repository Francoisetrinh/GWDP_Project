<?php
use \appli\repository\UserSession;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    
include __DIR__ .'/config/config.php';

// Chargement automatique des classes 
spl_autoload_register(function($sClassName) {
    $sFileName = str_replace('\\', '/', $sClassName) . '.php';

    require_once __DIR__ . '/' . $sFileName;
});

// Déclaration de titre des pages
$sTitle = 'GreenWeddingDress';
$oUserSession = new UserSession();

function generateRandomString(int $iLength = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $iLength; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Contenu du main selon les pages
// $sTemplate = 'header';

$action = array_key_exists('action', $_GET) ? $_GET['action'] : 'home';
    switch ($action) {
    //     // page HOME
        case 'home':
            // echo 'home';
            require CONTROLLER_DIR .'/home.php';
            // $sContent = 'home';
            break;
            // page ADMIN
        case 'admin':
            require CONTROLLER_DIR . '/admin/admin.php';
            break;
        case 'insert_product':
            require CONTROLLER_DIR . '/products/insert_product.php';
            break;
        case 'edit_product':
            require CONTROLLER_DIR . '/products/edit_product.php';
            break;
        case 'delete_product': 
            require CONTROLLER_DIR . '/products/delete_product.php';
            break;
            // page USER ACCOUNT
        case 'registration':
            require CONTROLLER_DIR . '/connexion/registration.php';
            break;
        case 'login':
            require CONTROLLER_DIR . '/connexion/login.php';
            break;
        case 'my_profile':
            require CONTROLLER_DIR . '/connexion/my_profile.php';
            break;
        case 'edit_user':
            require CONTROLLER_DIR . '/user/edit_user.php';
            break;
            // page USER LOGOUT
        case 'logout':
            session_destroy();
            $_SESSION = [];
            include CONTROLLER_DIR . '/home.php';
            break;
            // page HISTORY
        case 'history':
            require CONTROLLER_DIR . '/history.php';
            break;
        case 'news':
            require CONTROLLER_DIR . '/news.php';
            break;
            // page PRODUCTS
        case 'products':
            require CONTROLLER_DIR . '/products/products.php';
            break;
        case 'search_products':
            require CONTROLLER_DIR . '/products/search_products.php';
            break;
        case 'orders':
            require CONTROLLER_DIR . '/orders.php';
            break;
        case 'product_description':
            require CONTROLLER_DIR . '/products/product_description.php';
            break;
        case 'panier':
            require CONTROLLER_DIR . '/panier.php';
            break;
        default :
            header('Location:?action=home');
            exit;
    }

