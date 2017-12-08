<?php
session_start();

if (!isset($_SESSION['userName'])) 
{ 
    header("Location: index.php");
}

include("../dbConnection.php");
$conn = getDatabaseConnection();


if (isset($_GET['gameId'])) {
    
   $gameInfo = getGameInfo($_GET['gameId']);
    
    
}

    
if (isset($_GET['updateUserForm'])) 
{
    /*
    
    UPDATE `games` SET `gameName`=[value-1],`gameId`=[value-2],`release_year`=[value-3],
    `rating`=[value-4],`genre`=[value-5],`developerName`=[value-6],`gamePrice`=[value-7] WHERE 1
    */
    
    $sql = "UPDATE games
            SET gameName = :gName,
            gameId = :gameId,
                release_year = :release_year,
                rating = :rating,
                genre= :genre,
                developerName = :developerName,
                gamePrice=:gamePrice
			WHERE gameId =:gameId";
			
			
	$namedParameters = array();
	$namedParameters[":gName"] = $_GET['gameName'];
	$namedParameters[":release_year"] = $_GET['release_year'];
	$namedParameters[":gameId"] = $_GET['gameId'];
	$namedParameters[":rating"] = $_GET['rating'];
	$namedParameters[":genre"] = $_GET['genre'];
	$namedParameters[":developerName"] = $_GET['developerName'];
	$namedParameters[":gamePrice"] = $_GET['gamePrice'];
	
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
}

function getGameInfo($gameId)
{
    global $conn;    
    $sql = "SELECT * 
            FROM games
            WHERE gameId =$gameId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating Game Information </title>
    </head>
    <body background="mario1.jpg">
        <div>
             <div id="wrapper">
  <h1 class="chrome">Update Game</h1>

 
   
<link href="css/styles.css" rel="stylesheet" type="text/css" />
 <br></br>        
  <br></br>         
<center>
<fieldset id="color2" style="width: 400px; height: 220px;  opacity: 0.9;">
   
    <form>
    <input type="hidden" name="gameId" value="<?=$gameInfo['gameId']?>" />
        Game Name: <input type="text" name="gameName" required value="<?=$gameInfo['gameName']?>" /> <br>
        Rating: <input type="text" name="rating" required value="<?=$gameInfo['rating']?>"/> <br>
        Release year: <input type="text" name="release_year" required value="<?=$gameInfo['release_year']?>"/> <br>
        Developer: <input type="text" name="developerName" required value="<?=$gameInfo['developerName']?>"/> <br>
        Genre: <input type="text" name="genre" required value="<?=$gameInfo['genre']?>"/> <br>
        Price: <input type="text" name="gamePrice" required value="<?=$gameInfo['gamePrice']?>"/> <br>
        
        <br />
        <br />
    <input type="submit" id="color" name="updateUserForm" value="Update Game!"/>
    </form>
     <form action="admin.php">
            <input type="submit" id="color" value="Logout" />
        </for3m>
</fieldset>
</center>
</body>
</html>