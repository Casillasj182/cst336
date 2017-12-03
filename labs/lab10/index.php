<?php

  //print_r($_FILES);
  //echo "File size " . $_FILES['myFile']['size'];
  move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
  
  $files = scandir("gallery/", 1);
 // print_r($files);
  
  for ($i = 0; $i < count($files) - 2; $i++) {
     
     echo "<img src='gallery/" .   $files[$i] . "' width='50' >";
      
  }
  

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
    </head>
    <body>

    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" /> 
        
        <input type="submit" value="Upload File!" />

    </form>


    </body>
</html>
<?php

  $files = scandir("gallery/", 1);

 
   if($_FILES['myFile']['size'] > 1000000)
  {
      echo "<h1> Error : The file size too big </h1>";
  }
  else
  {
       //echo "<h1> Testing : It works! </h1>";
         move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES['myFile']['name'] );
     }
  
  
?>