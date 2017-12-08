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
         
     <link href="css/styles.css" rel="stylesheet" type="text/css" />
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
     <div id="wrapper">
  <h1 class="chrome">Admin Page</h1>
    <body background="mario2.jpg">
      
 <br></br>
  <br></br>
 
          <fieldset id="color2"  style="width: 650px; height: 120px;  opacity: 0.9;">
               <h1>Menu </h1>
        <form  id="form" method="POST"  action="insert.php" >
            <input type="submit"  id="color" value="Insert A New Game" />
        </form>
      
        <form id="form" action="index.php">
            <input type="submit"  id="color" value="Admin Logout" />
        </form>
        <div>
          <form id="form" action="report1.php">
            <input type="submit"  id="color" value="Average Team Size " />
        </form>
        <form id="form" action="report2.php">
            <input type="submit" id="color" value="Average Game Cost " />
        </form>
         <form id="form" action="report3.php">
            <input type="submit" id="color" value="Most Experienced Director" />
        </form>
        </div>
        </fieldset>
         <hr>
          <fieldset style="width: 500px; height: 920px;  opacity: 0.9;">
              
              
              <table>
        <tr>
            <th>ID</th>
          &emsp;
            <th>Title</th>
           &emsp;
            <th>Rating</th>
           &emsp;
          
        </tr>
    <?php
        $users = displayGames();
         echo "<strong>";
            echo "<center>";
            echo "Edit Game Library";
            echo "<br></br>";
            echo "</echo>";
            echo "</strong>";
      foreach($users as $user) 
            {
            echo "<tr>" .  "<td>" .$user['gameId'] .  "<td>"   . $user['gameName'] . "</td>"   . "<td>" . $user['rating'] .  "<td>";
            echo "|<a href='update.php?gameId=".$user['gameId']."'> Update </a> |";
            echo "<form action='delete.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                         <input type='hidden' name='gameId' value='".$user['gameId']."' />
                         <input type='submit' value='Delete'>
                  </form>";
            echo "<br />";
        }
    ?>
    </fieldset>
        </div>
        </center>
    </body>     
</html>