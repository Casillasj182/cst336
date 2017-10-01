<?php

function yearList($startYear=1500, $endYear=2000)
{
    $total=0;
     $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    for ($i = $startYear; $i <= $endYear; $i++)
    {
        for($i=1900;$i<=2000;$i++)
        {
            if($i==1900)
            {
           
           echo $zodiac[$i] . $startYear;

            }
        }
        $yearSum=$startYear[$i]+$endYear;
         echo "<li> Year $i </li>";
         
        
    }
  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Practice: Chinese Zodiac Years</title>
    </head>
    <body>
        
        <h1>Chinese Zodiac List </h1>

        <ul>
            
            <?=yearList()?>
            
        </ul>
    </body>
</html>