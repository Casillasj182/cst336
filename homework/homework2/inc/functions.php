<?php
/*
      
function displaySymbol($randomValue, $pos){
               switch($randomValue){
        
            case 0: $symbol= "girl";
                 break;
            case 1: $symbol ="boy";
                    break;
            }
         echo  "<img id='reel$pos'  src='img/$symbol.png' alt='$symbol' title='$symbol' width='70' />";
        }
      
   
         
        

        
function displayName($randomValue1,$randomValue2)
        {
            
            if($randomValue1==$randomValue2)
            {
                switch($randomValue1)
                {
                    case 0: $randomValue1='Boy';
                            echo "<h1>It's a Boy</h1>";
                            break;
                    case 1: $randomValue2='Girl';
                             echo "<h1>It's a Girl</h1>";
                           break;
                    
                }
                
            }else{
                " <h3> Try again</h3> ";
            }
            echo " </div> ";
        }
        
        
        
*/
 function NameGenerator()
 {
 $names = array(
    'Christopher','Ryan','Ethan', 'John', 'Zoey', 'Sarah', 'Michelle', 'Samantha','Sophia','Emma','Olivia','Jackson','Aiden','Lucas', 'Liam','Noah','Isabella');
  
  $random_name = $names[mt_rand(0, sizeof($names) - 1)];
 };
  /*
function namegenerator()
         {
             
         for($i=1;$i<4;$i++)
        {
            ${"randomValue" . $i} =rand(0,4);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        
        
        displayPoints($randomValue1,$randomValue2,$randomValue3);
    
             
             
         }


*/
?>