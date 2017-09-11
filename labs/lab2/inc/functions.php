<?php

      
function displaySymbol($randomValue, $pos)
        {
               switch($randomValue){
        
            case 0: $symbol= "seven";
                 break;
            case 1: $symbol ="lemon";
                    break;
            case 2: $symbol ="grapes";
                    break;
            case 3: $symbol= "orange";
                    break;
            case 4: $symbol = "bar";
            }
         echo  "<img id='reel$pos'  src='img/$symbol.png' alt='$symbol' title='$symbol' width='70' />";
        }
      
   
         
        

        
function displayPoints($randomValue1,$randomValue2,$randomValue3)
        {
            
            if($randomValue1==$randomValue2&&$randomValue2==$randomValue3)
            {
                switch($randomValue1)
                {
                    case 0: $totalPoints=1000;
                            echo "<h1>Jackpot!</h1>";
                            break;
                    case 1: $totalPoints=500;
                           break;
                    case 2: $totalPoints=250;
                            break;
                    case 3: $totalPoints=900;
                            break;
                    case 4: $totalPoints=400;
                            break;
                }
                echo "<h2> You Won $totalPoints points!</h2>";
            }else{
                " <h3> Try again</h3> ";
            }
            echo "</div>";
        }
        
        
  
function play()
         {
             
         for($i=1;$i<4;$i++)
        {
            ${"randomValue" . $i} =rand(0,4);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        
        
        displayPoints($randomValue1,$randomValue2,$randomValue3);
    
             
             
         }


?>