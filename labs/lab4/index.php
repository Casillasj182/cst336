<?php

$backgroundImage = "img/sea.jpg";

if (isset($_GET['keyword'])) { //checks if the URL has a parameter called "keyword"
    echo "Keyword typed: " . $_GET['keyword'];
    
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLs($_GET['keyword']);
    
    //print_r($imageURLs);
    
    //Display last 5 images!
    
    
    
} else {
    echo "<h2> Type a keyword to display a slideshow 
        with random images from Pixabay.com</h2>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Carousel </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       
        <style>
           @import url("css/styles.css");
           
           body {
               
               background-image: url(<?=$backgroundImage?>);
               
           }
           
         </style>
    </head>
    <body>

        

        <form>
            
            <input type="text" name="keyword" placeholder="Type keyword"/>
            <input type="submit" value="Go!" name="submitBtn" />
            
        </form>


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>
</html>