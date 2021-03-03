<?php
function PairOuImpair(){
    $num=rand(1,10);
    
if ($num%2)

    echo "J'ai choisi le nombre $num. est  C'est un nombre impair";

else

    echo  "J'ai choisi le nombre $num. est  C'est un nombre pair";
}


function BadorNot(){
    
   $trueNature= rand(1,3);
   $mot="";
   
   switch ($trueNature)
   {
    case 1:
        $mot= " Vous voulez un café ? ";
        break;
    case 2:
         $mot= " Vous voulez un café ? ";
        break;
    case 3:
          $mot="Extermination ! Extermination !";
        break;
   }
   return $mot;
}
    
?>