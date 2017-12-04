<div>
    <h1>Photo Gallery</h1>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php

  $files = scandir("gallery/", 1);
    
 
   if($_FILES['myFile']['size'] > 10000)
  {
      //echo"<center>";
      echo "<h1> Error : The file size too big </h1>";
      //echo"</center>";
  }
  else
  {
       //echo "<h1> Testing : It works! </h1>";
       
         move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES['myFile']['name'] );
          for ($i = 0; $i < count($files) - 2; $i++) {
        //echo"<div id='big-image'>";
     echo "<img  src='gallery/" .   $files[$i] . "' width='90' images =".$files[$i]."  >";
   // echo "<div";
      
  }
     }
      echo"<br>";
      
      
?>

  
        

</div>
<div id="changesize">

    </div>  
<br></br>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    </head>
    
   

       <link  href="css/styles.css" rel="stylesheet" type="text/css" />
    <body>

 
        //to increase and decrease the pictures
        <script>
            $(document).ready(function() {
                
                $("img").click(function() {
                  $("#changesize").empty()
                  $("#changesize").prepend("<img src='gallery/" + $(this).attr("images") +  "' width = 300/>")
                });
            
          } ); 
        
        </script>
        
    <form method="POST" enctype="multipart/form-data"> 
 
        

        <input type="file" name="myFile" /> 
        
        <input type="submit" value="Upload File!" size="600px" />

    </form>
    <br></br>
     <br></br>
      <br></br>
       <br></br>
        <br></br>
         <br></br>
          <br></br>
           <br></br>
            <br></br>
        <footer>
            <hr>
            CSUMB 2017&copy; Casillas <br/>
            <strong>
            Disclaimer.
            </strong>
            This is for academic puposes only. <br/>
        </footer>
      

    </body>
     
</html>
