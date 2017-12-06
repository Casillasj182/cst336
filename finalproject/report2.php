<?php
session_start();

if (!isset($_SESSION['userName'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}


include '../dbConnection.php';
$conn = getDatabaseConnection();


function displayUsers() {
    global $conn;
    $sql = "SELECT AVG(gamePrice),COUNT(gameId) from games";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchALL(PDO::FETCH_ASSOC);
    //print_r($users);
    return $users;
}



?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
      
         
        <center>
        <div>
       
    </head> <head>
    
  </head>
  <div id="wrapper">
  <h1 class="chrome">Average Cost of Game</h1>
    <body background="mario1.jpg">
        <div>
<center>
        
      
        
        <hr>
        
        
            
            
            
        </form>
        
       
        
        <br /><br />
         <fieldset style="width: 500px; height: 390px;  opacity: 0.9;">
       <?php
        
        $users=displayUsers();
        
      foreach($users as $user) {
            echo "<h1></h1>";
            echo "<strong>";
            echo "Report";
            echo"<br></br>";
             echo "</strong>";
            echo "There Is A Total Of: " ."<strong>". $user['COUNT(gameId)']  ." " . "Video Games In The Library" . "</strong>". "<br>";
            echo"<br></br>";
            echo " The Average Price Of All The Video Game Is: " . "<strong>" ."$"  .$user['AVG(gamePrice)'] .   "</strong>" ."<br> " ;
        }
       
        ?>
        </fieldset>
        </div>
        </center>
        </div>
        <center>
            <br><br>
        <form action="admin.php">
          <input type="submit"  id="color" value="Go Back To Admin Page" color:"blue" />
        </form>
        </center>
    </body>     
</html>