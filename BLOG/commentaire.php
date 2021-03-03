<?php
require "autoloader.php";

$num=$_GET["numero"];

$pseudo=$_POST["pseudo"];
$message=$_POST["message"];

$bdd = new PDO("mysql:host=localhost;dbname=idw-02_nathanhyp_BLOG;charset=utf8","nathanhyp","9b815242OGZhZDI4ODgyNGM2NWYyMWViZmU0Nzg00207a88a");

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$requete1 = $bdd->prepare("INSERT INTO `comment` (`idComment`, `pseudo`, `idArticle`, `message`, `dateComment`) VALUES (NULL, ?, ?, ?, CURRENT_DATE());");

$requete1->execute(array($pseudo,$num,$message));



 header("Location:article.php?numero=$num");

