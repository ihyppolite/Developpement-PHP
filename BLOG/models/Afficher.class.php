<?php

class Afficher {
    
    public function AfficherArticle( int $num){
        $bdd = new PDO("mysql:host=localhost;dbname=idw-02_nathanhyp_BLOG;charset=utf8","nathanhyp","9b815242OGZhZDI4ODgyNGM2NWYyMWViZmU0Nzg00207a88a");

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $bdd->prepare("SELECT `title`,`content`,`image`,`dateArticle`,`idArticle` FROM `article` WHERE `idArticle`=?;");

        $requete->execute(array($num));

         $articlesdetail = $requete->fetch(PDO::FETCH_ASSOC);
         
        return $articlesdetail;
    }
    
    
    public function AfficherCommentaire( int $num){
         $bdd = new PDO("mysql:host=localhost;dbname=idw-02_nathanhyp_BLOG;charset=utf8","nathanhyp","9b815242OGZhZDI4ODgyNGM2NWYyMWViZmU0Nzg00207a88a");

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete2 = $bdd->prepare("SELECT `pseudo`,`message`,`dateComment` FROM `comment` WHERE `idArticle`=?;");
        
        $requete2->execute(array($num));
        
        $commentaires = $requete2->fetchAll(PDO::FETCH_ASSOC);

        return  $commentaires;
    }
}