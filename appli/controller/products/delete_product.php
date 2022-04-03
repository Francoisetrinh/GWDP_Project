<?php

    $id = $_GET['id'];
    $oPdo->deleteProduct($id);
    header('Location:?action=products');

$sContent = 'products';
include_once VIEWS_DIR . '/template.phtml';