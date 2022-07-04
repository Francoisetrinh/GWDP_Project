<?php
use appli\repository\ProductsRepository;

if (!$oUserSession->isConnected() || $oUserSession->getRole() != 'admin') {
    header('Location:?action=login');
    exit;
}

$id = $_GET['id'];
$oPdo = new ProductsRepository();
$oPdo->deleteProduct($id);
header('Location:?action=admin');
exit;
