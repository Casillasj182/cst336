<?php
session_start();

if (!isset($_SESSION['userName'])) 
{ 
    header("Location: index.php");
}
include("../dbConnection.php");
$conn = getDatabaseConnection();
$gameInfo = getGameInfo($_GET['gameId']);
    
if (isset($_GET['updateUserForm'])) 
{
    
    $sql = "UPDATE games
            SET gameName = :gName,
                release_year = :release_year,
                gameId = :gameId,
                rating = :rating,
                developerName = :developerName,
                gamePrice=:gamePrice
			WHERE gameId =:gameId";
	$namedParameters = array();
	$namedParameters[":gName"] = $_GET['gameName'];
	$namedParameters[":release_year"] = $_GET['release_year'];
	$namedParameters[":gameId"] = $_GET['gameId'];
	$namedParameters[":rating"] = $_GET['rating'];
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
<fieldset style="width: 400px; height: 190px;  opacity: 0.9;">
   
    <form>
    <input type="hidden" name="gameId" value="<?=$gameInfo['gameId']?>" />
        Game Name: <input type="text" name="firstName" required value="<?=$gameInfo['gameName']?>" /> <br>
        rating: <input type="text" name="email" required value="<?=$gameInfo['rating']?>"/> <br>
        release year: <input type="text" name="universityId" required value="<?=$gameInfo['release_year']?>"/> <br>
        Developer: <input type="text" name="phone" required value="<?=$gameInfo['developerName']?>"/> <br>
        <br />
        <br />
    <input type="submit" id="color" name="updateUserForm" value="Update User!"/>
    </form>
     <form action="index.php">
            <input type="submit" id="color" value="Admin Logout" />
        </form>
</fieldset>
</center>
</body>
</html>