<?php 
require "autoloader.php";

if(!empty($_POST)){
    
$username=$_POST["username"];
$password=$_POST["password"];



$userModel = new UserModel();
    $user = $userModel->verifyLogin($_POST["username"]);



 if(empty($user)){
       $notification = "Login introuvable.";
    }else{
        if(password_verify($_POST["password"], $user["password"])){
            
            $userSession = new UserSession();
            $userSession->create($user["idUser"],$user["login"],$user["firstname"],$user["lastname"],$user["role"]);
            
            header("Location: admin.php");
            exit();
        }else{
            $notification = "Mot de passe incorrect.";
        }
    }
   
}
 

$template = "View/authentification.phtml";
require "View/layout.phtml";