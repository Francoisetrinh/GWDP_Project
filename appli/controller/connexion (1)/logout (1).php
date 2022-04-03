<?php

use appli\repository\UserSession;

$userSession = new UserSession();
$userSession->logout();

// Redirection
header('Location:?action=index');
exit;