<?php 
require "autoloader.php";

$userSession = new UserSession();
$num=$_GET["numero"];

$cat= new CategoriesOfArticle();
$categories=$cat->SelectCategories();

$affichage = new Afficher();

$articlesdetail  = $affichage->AfficherArticle($num);





$template = "View/update.phtml";
require "View/layout.phtml";