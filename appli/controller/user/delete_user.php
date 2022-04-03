<?php

    $id = $_GET['id'];
    $oPdo->deleteUser($id);
    header('Location:?action=home');

$sContent = 'home';
include_once VIEWS_DIR . '/template.phtml';