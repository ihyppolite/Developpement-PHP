<?php

class LogArticle {
    
    public function LogArticle(){
        $bdd = new PDO("mysql:host=localhost;dbname=idw-02_nathanhyp_BLOG;charset=utf8","nathanhyp","9b815242OGZhZDI4ODgyNGM2NWYyMWViZmU0Nzg00207a88a");

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $bdd->query("SELECT article.*, categorie.name, user.lastname,user.firstname FROM `article`, categorie, user WHERE article.idCategorie = categorie.idCategorie AND article.idUser = user.idUser ORDER BY dateArticle DESC");
        

        $articles = $requete->fetchAll(PDO::FETCH_ASSOC);
        
        return $articles;
    }
}