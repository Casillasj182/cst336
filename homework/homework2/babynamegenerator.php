
<!DOCTYPE html>
<html>
    <head>
        <title> Baby Name Generator</title>
        
        <meta charset="utf-8"/>
    </head>
    
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <body>
        
        <h1 id="center"> Baby Name Generator</h1>
        
        <img src="boy.png"  height="250" width="200" alt="Picture of a baby boy">
        <div>
         <img class="img2" src="girl.png"  id="cheese" height="250" width="200" alt="Picture of a baby boy">
        </div>
   
            
       <center>    
     <?php
           
   
         $boynames = array(
    '     Christopher         ','           Ryan    ','           Ethan    ', '           John    ','         Jackson  ','        Aiden  ','         Lucas  ', '        Liam  ','         Noah  '
    ,'        Riley     ','          Mason    ','         Chase    ','          Grayson  ','          Gary    ','           Mike  ','         Joel  ','  Kanye         '
    ,'   Zeke       ','    Blaze        ','     Jax      ','     Zander        ','   Ajax        ',' Maddox        ','Nixon       '
    ,'      Paul         ','      Ryan         ','      Daniel         ','      Kevin         ','      Kevin        ',
    '      Tom         ','      Derek         ','      Marcus         ','      Drew         ','      Benjamin         ','     Brett         ');
    
       
 $girlnames = array(
   '     Zoey             ', '      Sarah           ', '        Michelle      ','      Alejandra        ',
    '      Jacky         ','      Reyna         ','      Charlotte         ','       Maria         ','     Stephaine        ','  Tiffany        ',
    '  Jasmine        ','  Silvia        ','   Naomi       ', '   Naomi       ','      Mia         ','      Juanita         ','      Jacky         '
    ,'      Josefina         ','      Evelyn        ','     Martha        ','Camerina','     Roslyn        ','      Michelle         ',
    '      Vanessa        ','      Clarissa        ','      Tabitha         ','      Krystal         ');
       array_unique($boynames);
       
       shuffle($boynames);
      
  for($i=0;$i<1;$i++)
    {
      if($boynames!=null)
   {
        echo "  ";
      $random_name = $boynames[rand(0, sizeof($boynames) - 1)];
       echo "               ";
       echo "&nbsp";
       echo "&nbsp"; 
       echo "&nbsp";
        echo "&nbsp";
      
      
        
    } 
     else
   {
    echo "Error: No boy names in array";
     reset($boynames);
   }
   
   
    echo "<font size=7>";
     echo $random_name;
     echo "</font>";
    }
       
   shuffle($girlnames);
   
    array_unique($girlnames);
  for($ii=0;$ii<1;$ii++)
  {
   if($girlnames!=null)
   {
       echo "  ";
        $random_name2 = $girlnames[rand(0, sizeof($girlnames) - 1)];
       echo "               ";
       echo "&nbsp";
       echo "&nbsp"; 
       echo "&nbsp";
        echo "&nbsp";
        echo "&nbsp";
       echo "&nbsp"; 
       echo "&nbsp";
        echo "&nbsp";
   }
   
   
   else
   {
    echo "Error: No girl names in array";
    reset($girlnames);
   }
   
       
} 
 echo "<font size=7>";
     echo $random_name2;
     echo "</font>";
  ?>
   
 
     <br>
       <form>
        <font size=5>
    <input type='submit' value='Generate a Boy and Girl Name'/>
    
</form>
</center>
       
       <br>
       <br>
       <br>
       <br>
      
       
        <footer>
           
            <hr>
            CSUMB 2017&copy; Casillas <br/>
            <strong>
                Disclaimer.
            </strong>
            <small>
            This is for academic puposes only. <br/>
            </small>
            
            <br>
            <br>
            
            
           
            
        </footer>
   
       
    
    
    </body>
    
    </html>