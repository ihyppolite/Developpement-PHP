<?php
function randomlLetter(){

$letters = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I',
        'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
        'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];

$lettre=""; 

    
for($i=0;$i<2;$i++){
    
   $indice = array_rand($letters);
   $lettre = $lettre.$letters[$indice];
 
}

return $lettre ;

}




function RandomNumber(){
    $numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    
    $chiffre=""; 

for($j=0;$j<4;$j++) {
    
   $number = array_rand($numbers);
   $chiffre = $chiffre.$numbers[$number];
 
 
}

return $chiffre ;



}







?>