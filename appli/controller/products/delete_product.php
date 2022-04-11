<?php
use appli\repository\ProductsRepository;

$id = $_GET['id'];
$oPdo = new ProductsRepository();
$oPdo->deleteProduct($id);
header('Location:?action=admin');
exit;
