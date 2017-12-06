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
    $sql = "SELECT AVG(teamSize) from developers";
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
        <title>Report 1</title>
    </head>
    <body background="mario1.jpg">
     <div id="wrapper">
  <h1 class="chrome">Average Team Size</h1>
  
 

  
  </div>
</div>
        <div>
<center>
        
        <hr>
        </form>
      
        <br /><br />
         <fieldset style="width: 400px; height: 190px;  opacity: 0.9;">
       <?php
        
        $users=displayUsers();
        
      foreach($users as $user) {
            echo "<h1></h1>";
            //echo " There is" . $user['COUNT(developerId']."'s";
            echo " The Average Team Size is: " . "<strong>". $user['AVG(teamSize)'] . " Programmers". "</strong>" ."<br> " ;
        }
       
        ?>
        </div>
        </fieldset>
        </center>
        </div>
        <center>
            <br></br>
        <form action="admin.php">
            <input type="submit" id="color" value="Go Back To Admin Page" />
        </form>
        </center>
    </body>     
</html>