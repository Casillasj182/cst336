<?php

include '../dbConnection.1.php';

$conn = getDatabaseConnection("final");

function getGenres() {
    global $conn;
    $sql = "SELECT DISTINCT(genre)
            FROM `games` 
            ORDER BY genre";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['genre'] . "</option>";
        
    }
}



function displayGames(){
    global $conn;
    
    $sql = "SELECT * FROM games WHERE 1 ";
    
    
    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        
        if (!empty($_GET['gameName'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND gameName LIKE :gameName"; //using named parameters
            $namedParameters[':gameName'] = "%" . $_GET['gameName'] . "%";

         }
         
        if (!empty($_GET['genre'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND genre = :genre"; //using named parameters
            $namedParameters[':genre'] =  $_GET['genre'] ;

         }     
     
    }//endIf (isset)
    
  ?>
    <table>
        <tr>
            <th>ID</th>
          &emsp;
            <th>Title</th>
           &emsp;
            <th>Rating</th>
           &emsp;
            <th>Developer</th>
           &emsp;
        </tr>
    <?php
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
        echo "<strong>";
        echo"<center>";
        echo "Game Library";
        echo"</center>";
        echo"</strong>";
        echo "<br>";
     foreach ($records as $record) {
       echo "<tr>".
       "<td>" .$record['gameId'] . "</td> " . "<td> " .$record['gameName'] . "</td> " .
        "</td>" . "<td> " .$record['rating'] ."</td>". "<td>". $record['developerName']. "</td>".
        "</tr>";
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
         <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <title>GameStore </title>
    </head>
    <body>
        
        <center>
        <h1> GameStore User Section</h1>
      <div class="button-container">
        <form class="even">
            <div>
            Games: <input type="text" name="gameName" placeholder="Game Name"/>
            Genre: <select name="genre">
                <option value="">Select One</option>
              <?=getGenres()?>
            </select>
            <br>
            <input type="submit" value="Search!" name="submit" >
            </div>
        </form>
        <h1> Admin Login Section </h1>
        
        <form method="POST" class="even2" action="loginProcess.php" action="admin.php">
            <div>
            Username: <input type="text" name="userName"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
            </div>
        </form>
        </div>
        
        <hr>
        
     
        </center>
          <center>
        <?php
      
        displayGames();
        ?>
        </center>
        
        
        



    </body>
</html>