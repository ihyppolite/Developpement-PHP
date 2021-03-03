<?php 

class ArticleModel{


    public function createArticle( string $title, string $content, $uploadfile, int $categorie){
         
        $bdd = new PDO("mysql:host=localhost;dbname=idw-02_nathanhyp_BLOG;charset=utf8","nathanhyp","9b815242OGZhZDI4ODgyNGM2NWYyMWViZmU0Nzg00207a88a");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $requete = $bdd->prepare("INSERT INTO `article` (`idArticle`, `title`, `content`, `image`, `idCategorie`, `idUser`, `dateArticle`) VALUES (NULL, ?, ?, ?, ?,'1', NOW());");
        $requete->execute(array($title,$content,$uploadfile,$categorie));
       
    
    }

}