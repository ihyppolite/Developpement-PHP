<?php

class CategoriesOfArticle {
    
    public function SelectCategories(){
        $bdd = new PDO("mysql:host=localhost;dbname=idw-02_nathanhyp_BLOG;charset=utf8","nathanhyp","9b815242OGZhZDI4ODgyNGM2NWYyMWViZmU0Nzg00207a88a");

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $bdd->query("SELECT `idCategorie`,`name` FROM `categorie`;");

        $categories= $requete->fetchAll(PDO::FETCH_ASSOC);
       
        
        return  $categories;
    }
}