<?php

class UserModel {
    
    public function verifyLogin($login){
        $bdd = new PDO("mysql:host=localhost;dbname=idw-02_nathanhyp_BLOG;charset=utf8","nathanhyp","9b815242OGZhZDI4ODgyNGM2NWYyMWViZmU0Nzg00207a88a");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $requete = $bdd->prepare("SELECT * FROM user WHERE login = ? ");
        $requete->execute(array($login));
        $user = $requete->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
}