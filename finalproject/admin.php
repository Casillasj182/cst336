<?php
session_start();

if (!isset($_SESSION['userName'])) { 
    
    header("Location: index.php");
    exit();
}

include '../dbConnection.php';
$conn = getDatabaseConnection();

function displayGames() {
    global $conn;
    $sql = "SELECT * 
            FROM games GROUP BY gameName
            ORDER BY gameName";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $users;
 
}

?>
<!DOCTYPE html>
<html>
    <head>
         <link href="css/style.css" rel="stylesheet" type="text/css">
     
        <div>
            <center>
        <title>GAME Admin Page </title>
          <script>
            function confirmDelete(gameName) 
            {
                
                return confirm("Are you sure you want to delete " + gameName + "?");
            }
        </script>
    </head>
    <body>

        <h1> Game ADMIN PAGE </h1>
        <h2> Welcome Admin! </h2>
        
        <hr>
        
        <form action="insert.php">
            <input type="submit" value="Insert A New Game" />
        </form>
       
        <form action="index.php">
            <input type="submit" value="Admin Logout" />
        </form>
        <br /><br/>
        
    <?php
        $users = displayGames();
        
      foreach($users as $user) 
            {
            echo $user['gameId'] . '  ' . $user['gameName'] . "  " . $user['rating'];
            echo "[<a href='updateUser.php?userId=".$user['gameId']."'> Update </a> ]";
            echo "<form action='delete.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                         <input type='hidden' name='gameId' value='".$user['gameId']."' />
                         <input type='submit' value='Delete'>
                  </form>";
            echo "<br />";
        }
    ?>
        </div>
        </center>
    </body>     
</html>