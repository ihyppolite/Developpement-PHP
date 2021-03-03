<?php
class UserSession{
    
    private  int $User_Id;
    private  string $User_email;
    private  string$User_firstname;
    private  string$User_lastname;
    private  string $User_role;
    
    public function __construct(){
        //initialisation des sessions seulement si elles ne l'ont pas déjà été
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        //si mon user est connecté, je remplis mes propriétés avec les valeurs des sessions
        if($this->isConnected()){//HYDRATATION
            $this->id = $_SESSION["user"]["id"];
            $this->email = $_SESSION["user"]["email"];
            $this->firstname = $_SESSION["user"]["firstname"];
        }
        
    }
    
    
    public function getId(){
            return $this->User_Id;
        }
        
    public function setId($new_User_Id): int {
            $this->User_Id = $new_User_Id;
        }
        
        
    public function getEmail(){
            return $this->User_email;
        }
        
    public function setEmail($new_User_email) : string {
            $this->User_email = $new_User_emaile;
        }
        
    public function getPrenom(){
            return $this->User_firstname;
        }
        
    public function setPreom($new_User_firstname) : string{
            $this->User_firstname = $new_User_firstname;
        }
        
    
    public function getNom(){
            return $this->User_lastname;
        }
        
    public function setNom($new_User_lastname) : string{
            $this->User_lastname = $new_User_lastname;
        }
        
    
    public function getRole(){
            return $this->User_role;
        }
        
    public function setRole($new_User_role) : string{
            $this->User_role = $new_User_role;
        }
        
    public function isConnected():bool{
        
        if(empty($_SESSION["user"])){
            return false;
        }
        
        else{
            return true;
        }
    }
    
    public function destroy(){
        unset($_SESSION["user"]);//détruire la variable de session
    }
    
     public function create($id,$email,$fristname,$lastname,$role){
         
        $_SESSION["connexion"] = "OK";
        $_SESSION["idUser"] = $id;
        $_SESSION["idLogin"] = $email;
        $_SESSION["username"] = $fristname;
        $_SESSION["username1"] = $lastname;
        $_SESSION["role"] = $role;
       
       
    }
    
}