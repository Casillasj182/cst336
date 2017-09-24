<?php

function getrandomColor()

{
    
     return "rgba (".rand(0,255). ",".rand(0,255).",".rand(0,255).",".rand(0.01,99).");";
    
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Random Background Color </title>
            <meta charset="utf-8"/>
            
            
            <style>
                
                
                body{
                    
                    
                    /*background-color:rgba(105,20,800,.5);*/
                    
                    <?php
                    /*
                    $red=rand(0,255);
                    $green=rand(0,255);
                    $blue=rand(0,255);
                    $alpha=rand(0.01,99);
                    
                    $red=rand(0,255);
                    */
                    echo "background-color:rgba(".rand(0,255). ",".rand(0,255).",".rand(0,255).",".rand(0.01,99).");";
                    
                    ?>
                }
                
                h1{
                    
                    
                    /*background-color:rgba(105,20,800,.5);*/
                    
                    <?php
                   
                    
                    $red=rand(0,255);
                    
                    echo "color:rgba(".rand(0,255). ",".rand(0,255).",".rand(0,255).",".rand(0.01,99).");";
                    echo "background-color:function . getrandomColor();
                    ?>
                }
            </style>
    </head>
    <body>
        
        <h1>
           
            Welcome!!!
        </h1>
        
        <h2>
           background-color: <?=getgndomColor()?>
        </h2>

    </body>
</html>