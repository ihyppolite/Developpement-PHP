<?php

require "autoloader.php";
$userSession = new UserSession();

if(empty($_SESSION["connexion"])){
   header('Location: authentification.php');
}

$cat= new CategoriesOfArticle();
$categories=$cat->SelectCategories();

$template = "View/admin.phtml";
require "View/layout.phtml";
