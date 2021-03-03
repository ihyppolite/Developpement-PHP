<?php

require "autoloader.php";

$num=$_GET["numero"];

$affichage = new Afficher();

$articlesdetail  = $affichage->AfficherArticle($num);

$commentaires  = $affichage->AfficherCommentaire($num);


$template = "View/article.phtml";
require "View/layout.phtml";