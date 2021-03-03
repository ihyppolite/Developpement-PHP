<?php
require "autoloader.php";

$art = new LogArticle();
$articles = $art->LogArticle();
 
$template = "View/home.phtml";
require "View/layout.phtml";
