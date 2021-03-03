<?php

class Update {
    
    public function ModiferArticle( string $title ,string $content , $uploadfile,int $num){
       $bdd = new PDO("mysql:host=localhost;dbname=idw-02_nathanhyp_BLOG;charset=utf8","nathanhyp","9b815242OGZhZDI4ODgyNGM2NWYyMWViZmU0Nzg00207a88a");

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $requete = $bdd->prepare("UPDATE `article` SET `title` = ?, `content` = ?,`image` = ?, `dateArticle` = CURRENT_TIME() WHERE `article`.`idArticle` = ?;");
        
        $requete->execute(array($title,$content,$uploadfile,$num));
       
    }  
}

