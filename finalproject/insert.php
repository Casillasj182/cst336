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
    
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
    
    $sql = "INSERT INTO games
            (gameName, gameId, release_year, rating, genre, developerName)
            VALUES
            (:gName, :gId, :release, :rating, :genre, :developer)";
    $namedParameters = array();
    $namedParameters[':gName'] =  $gameName;
    $namedParameters[':gId'] =  $gameId;
    $namedParameters[':release'] =  $releaseyear;
    $namedParameters[':rating'] =  $rating;
    $namedParameters[':genre'] = $genre;
    $namedParameters[':developer']  = $developerName;
   
    
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
    <body>
        <div>
         <link href="css/styles.css" rel="stylesheet" type="text/css" />
         <link href="css/main.css" rel="stylesheet" type="text/css" />
         <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <h1> Admin Section </h1>
   

    <fieldset>
        
        <legend> Add New Game</legend>
        
        <form>
            
            Game Name: <input type="text" name="gameName"  placeholder="Enter Game Name"/> <br>
            Release Year: <input type="text" name="release_year"  placeholder="Enter Release Year"/> <br>
            Rating: <input type="text" name="rating"  placeholder="Enter Rating"/> <br>
            Genre: <input type="text" name="genre"  placeholder="Enter Genre"/> <br>
           Developer: <input type="text" name="developerName"  placeholder="Enter Developer "/> <br>
                   
            <br />
                        </select>
                        <br />
                <input type="submit" name="addUserForm" value="Add Game!"/>
        </form>
        <form method="POST" class="even2" action="index.php">
            <div>
            <input type="submit" name="login" value="Return To The Home Page"/>
            </div>
        </form>
        
    </fieldset>

</center>
</div>
    </body>
</html>