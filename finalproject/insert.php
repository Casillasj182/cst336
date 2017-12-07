<?php
session_start();

//makes sure user is signed in and cant acces directly  with link
if(!isset($_SESSION['userName']))
{
    header("Location: index.php");
}
 include("../dbConnection.php");
 $conn = getDatabaseConnection();

function getGameInfo(){
    global $conn;        
    $sql = "SELECT gameName, gameId 
            FROM games
            ORDER BY gameName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}


if (isset($_GET['addUserForm'])){
    //the administrator clicked on the "Add User" button
    $gameName = $_GET['gameName'];
    $gameId = $_GET['gameId'];
    $releaseyear    = $_GET['release_year'];
    $rating   = $_GET['rating'];
    $genre   = $_GET['genre'];
    $developerName   = $_GET['developerName'];
    $gamePrice = $_GET['gamePrice'];
    

    
    $sql = "INSERT INTO games
            (gameName, gameId, release_year, rating, genre, developerName, gamePrice)
            VALUES
            (:gName, :gId, :release, :rating, :genre, :developer, :gamePrice)";
    $namedParameters = array();
    $namedParameters[':gName'] =  $gameName;
    $namedParameters[':gId'] =  $gameId;
    $namedParameters[':release'] =  $releaseyear;
    $namedParameters[':rating'] =  $rating;
    $namedParameters[':genre'] = $genre;
    $namedParameters[':developer']  = $developerName;
    $namedParameters[':gamePrice']  = $gamePrice;
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <center>
        
        <title> Admin: Adding New Games </title>
    </head>
    <body background="mario1.jpg">
        <div>
         <link href="css/styles.css" rel="stylesheet" type="text/css" />
         <link href="css/main.css" rel="stylesheet" type="text/css" />
         <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <div id="wrapper">
  <h1 class="chrome" size="40px">Add Game To Library</h1>
   
   <br></br>
      <br></br>
    <fieldset id="color2" style="width: 450px; height: 220px; opacity: 0.9;">
     
      
        
        <form>
            
            Game Name: <input type="text" name="gameName"  placeholder="Enter Game Name"/> <br>
            Release Year: <input type="text" name="release_year"  placeholder="Enter Release Year"/> <br>
            Rating: <input type="text" name="rating"  placeholder="Enter Rating"/> <br>
            Genre: <input type="text" name="genre"  placeholder="Enter Genre"/> <br>
           Developer: <input type="text" name="developerName"  placeholder="Enter Developer "/> <br>
            Game Price: <input type="text" name="gamePrice"  placeholder="Enter Game Price "/> <br>
                   
            <br />
                        </select>
                        <br />
                <input type="submit" id="color" name="addUserForm" value="Add Game!"/>
        </form>
        <form method="POST" class="even2" action="index.php">
            <div>
            <input type="submit" id="color" name="login" value="Return To The Home Page"/>
            </div>
        </form>
        
    </fieldset>

</center>
</div>
    </body>
</html>