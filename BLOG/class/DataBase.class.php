<?php
class Database{
        
        public function __construct(){
             try{ 
                $this->bdd = new PDO("mysql:host=localhost;dbname=idw-02_BLOG;charset=utf8","nicolasdesachy","9137dfbbNWM4ZWQ3MmVjMTIwZjgzNDFiNWIxZDQ30d8bd42b");
                $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             }catch(Exception $e){
                 echo "Problème de connexion à la base de données.";
                 exit(1);
             } 
        }
        
        public function queryOne ( string $sql, $criterias ) :array{
            
         $requete = $this->bdd->prepare($sql);
          $requete->execute($criterias);
          $data = $requete->fetch(PDO::FETCH_ASSOC);
          return $data;
          
        }
        
        public function queryAll(string $sql,  $criterias){
        
         $requete = $this->bdd->prepare($sql);
          $requete->execute($criterias);
          $data = $requete->fetchAll(PDO::FETCH_ASSOC);
          return $data;
            
        }
        
        public function executeSql(){
            
        }
        
        
    
        
}
        