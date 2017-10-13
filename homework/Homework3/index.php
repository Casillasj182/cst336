<?php
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
$backgroundImage="img/weather1.jpg";


require 'vendor/autoload.php';

// Language of data 
$lang = 'en';

// Metric=Celsius and Imperial=Fahrneheit
//$choice=$_GET['measurement'];
$units = $_GET['weather'];

//stores api in owm
$apikey='522771b33652137e1675df1b6b82acb8';
$owm = new OpenWeatherMap($apikey);

//uses the url with the api to get the low and max weather for the day
$url = "http://api.openweathermap.org/data/2.5/weather?q='Location'&appid=522771b33652137e1675df1b6b82acb8";

//stores the location into destination
$keyword = $_GET['Location'];

//stores the destination into the location
$location=$keyword;




if(!empty($_GET['Location']))
{
try
    {
            $weather = $owm->getWeather($location, $units, $lang,$weather);
    } 
catch(OWMException $e)
    {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
    }
catch(\Exception $e) 
    {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
    }
    
        $keyword = $_GET['Location'];
     
    }
else 
    {
        echo "<h2 style='color:red'> Error! You must enter a location to get the weather </h2>";
    }
    
    if(empty($_GET['weather']))
    {
         echo "<h2 style='color:red'> Error! Please choose a unit for the weather </h2>";
    }
     
?>

<!DOCTYPE html>
<html>
    <head>
    <title id="hell">Weather Search</title>
    <meta charset="utf-8">
      
<style>
    @import url("css/styles.css");
    body
    {
    background-image: url(<?=$backgroundImage?>);
    }
</style>
</head>
<body>
       
       
       
       
  
    <p style="font-family:georgia;" id="css">Weather Search</p>
  
     <br>
     <br>
 

 <form>
      <?php
 if(($_GET['weather']=='Metric'))
 {
     $checkmark="checked";
   
 }
 else if(($_GET['weather']=='imperial'))
 {
     $checkmark1="checked";
   
 }
 else 
 {
    $checkmark2="checked";
   
 }
 ?>
           
            <input type="radio" name="weather" value="Metric" <?= $checkmark ?> >
            <label for="weather">Celsius </label>
            &nbsp;
            &nbsp;
            &nbsp;
            <input type="radio"  name="weather" value="imperial" <?= $checkmark1 ?>>
            <label for="weather"> Fahrenheit </label>
            &nbsp;
            &nbsp;
            &nbsp;
            <input type="radio"  name="weather"  value="default" <?= $checkmark2 ?> >
            <label for="weather"> Kelvin </label>
            <br>
            <br>
            <input type="text" name="Location" style="height:50px; width:500px " placeholder="Enter Location" value="<?=$_GET['Location']?>" />
             
  <br><br>
  <input type="reset" value="reset" name="reset" />
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;
  <input type="submit" value="Get Weather">

  <br>
  <br>
  <br>
  <br>
  <font size="30">
  <div>
 <?php
 if(($_GET['weather']=='Metric'))
 {
     $checkmark="checked";
    echo "The Temperature in  " . $_GET['Location'] . " is " . $weather->temperature;
    echo "<br>";
    echo "<br>";
    echo "The min temperature " . " is " . $weather->temperature->min;
    echo "<br>";
    echo "<br>";
    echo "The max temperature " . " is " . $weather->temperature->max;
    echo "<br>";
    echo "<br>";
 }
 else if(($_GET['weather']=='imperial'))
 {
     $checkmark1="checked";
    echo "The Temperature in  " . $_GET['Location'] . " is " . $weather->temperature;
    echo "<br>";
    echo "<br>";
    echo "The min temperature " . " is " . $weather->temperature->min;
    echo "<br>";
    echo "<br>";
    echo "The max temperature " . " is " . $weather->temperature->max;
    echo "<br>";
    echo "<br>";
 }
 else 
 {
    $checkmark2="checked";
    echo "The Temperature in  " . $_GET['Location'] . " is " . $weather->temperature;
    echo "<br>";
    echo "<br>";
    echo "The min temperature " . " is " . $weather->temperature->min;
    echo "<br>";
    echo "<br>";
    echo "The max temperature " . " is " . $weather->temperature->max;
    echo "<br>";
    echo "<br>";
 }
 ?>
    </div>
    </font>
    <br>
    </form  align="center">
    <!--/*BEGIN Added by Erik Ring-Walters 10/11/2017*/-->
  
   <img id="buddyVerified" src="img/buddy_verified.png" alt="Buddy verified"/>
   
       <!--/*END Added by Erik Ring-Walters 10/11/2017*/-->

    </body>
</html>