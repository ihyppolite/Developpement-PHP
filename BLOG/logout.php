<?php 
require "autoloader.php";

$userSession = new UserSession();
$userSession ->destroy();

header('Location: authentification.php');