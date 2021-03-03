<?php
require "functions/robot_functions.php";
require "functions/generic_functions.php";



$ResultatFinal="";
$FinalLetter="";
$FinalNumber="";

    
    if(!empty($_GET["name-robot"]))
    {

       $ResultatFinal=$_GET["name-robot"];

    }
   
   else
    {

       $FinalLetter=randomlLetter();
        
       $FinalNumber=RandomNumber();
    
       $ResultatFinal = $FinalLetter ."-".$FinalNumber;
        
    }
    
    
    
/*   if(!empty($_GET["mental"])){
     
      $LeChiffre=$_GET["mental"];
    
   if(  $LeChiffre == 1){
       $messageMental= "Extermination ! Extermination !";
    }
    elseif( $LeChiffre == 2){
     
        $messageMental=  " Vous voulez un café ? ";
    }
    
    elseif ( $LeChiffre == 3)
    {
       $messageMental= BadorNot();
    }
    
    }
    
*/   

 if(!empty($_GET["mental"])){
  
  if($_GET["mental"] =="good"){
   
        $messageMental=  " Vous voulez un café ? ";
  }
  elseif($_GET["mental"] == "evil"  )
  {
   
       $messageMental= "  <style>
      p {
      color:red;
      font-weight:bold;
      }
     </style> 
     <p>Extermination ! Extermination !<p>";
  }
  elseif($_GET["mental"] == "random"){
   
       $messageMental= BadorNot();
  }
 }




require "View/homepage.phtml";
?>


