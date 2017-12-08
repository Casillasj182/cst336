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
   $sql = "SELECT COUNT(gameName), developerName, directorName from directors NATURAL JOIN games where developerName LIKE 
   '%Infinity Ward%'";
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
  <h1 class="chrome">Director who has developed Most</h1>
    <body background="mario1.jpg">
        <div>
<center>
        
      
        
        <hr>
        
        
            
            
            
        </form>
        
       
        
        <br /><br />
         <fieldset id="color2" style="width: 500px; height: 390px;  opacity: 0.9;">
       <?php
        
        $users=displayUsers();
        
      foreach($users as $user) {
            echo "<h1></h1>";
            echo "<strong>";
           
            echo"<br></br>";
             echo "</strong>";
                echo "The Director who has directed the most games is: " ."<strong>". $user['directorName'] . "</strong>". "<br>";
               echo $user['directorName'] . " "  . "works for "   .$user['developerName'] .   "</strong>" ."<br> " ;
         
           
            echo " He has directed: " ." " .$user['COUNT(gameName)'] . " " . "games" ."<br> " ;
    
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