<?php

require "autoloader.php";


$userSession = new UserSession();
$title=$_POST["title"];
$content=$_POST["content"];
$categorie=$_POST["idCategorie"];

$directory = 'uploads/';
$uploadfile = $directory.basename($_FILES['image']['name']);




if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
} else {
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}


$articleModel = new ArticleModel();
$articleModel->createArticle($title,$content,$uploadfile,$categorie);


header('Location: admin.php');