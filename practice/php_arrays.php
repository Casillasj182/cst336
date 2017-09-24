<?php

function displaysymbol($symbol)
{
    echo "<img src='../labs/lab2/img/$symbol.png' width='70'/>";
}

$symbols=array("lemon", "orange", "cherry");

//print_r($symbols); //displays array contents fror debugging purposes.

//echo $symbols[0]; //displays the frst element in the array
//displaySymbol($symbols);



$symbols[]="grapes"; // adds element to the end of array

array_push($symbols,"seven");

//displaySymbol($symbols[4]);

for($i=0; $i<5; $i++)
{
    displaysymbol($symbols[$i]);
}



sort($symbols);//sorts in ascending order
print_r($symbols);

//shuffle($symbols);
echo "<hr>";
print_r($symbols);
echo "<hr>";




$lastSymbol=array_pop($symbol);
displaySymbol($lastSymbol);
echo "<hr>";

print_r($symbols);



foreach($symbols as $symbol)
{
    displaysymbol($symbol);
}


unset($symbols[2]);
echo"<hr>";
print_r($symbols);

$symbols=array_values($symbols);
echo"<hr>";
print_r($symbols)


displaySymbol($symbols[rand(0,count($symbols)-1)]);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Arrays</title>
             <meta charset="utf-8"/>
    </head>
    <body>
        
        
    </body>
    
    </html>