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
    $sql = "SELECT gameName FROM games NATURAL JOIN developers
    where developerName='Infinity Ward'";
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
          <link href="css/main.css" rel="stylesheet" type="text/css" />
           <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <center>
        <div>
        <title>User Info </title>
          <script>
            
            function confirmDelete(firstName) 
            {
                
                return confirm("Are you sure you want to delete " + firstName + "?");
            }
        </script>
    </head>
    <body>
        <div>
<center>
        <h1> User Info </h1>
      
        
        <hr>
        
        
            
            
            
        </form>
        
          
        <form action="logout.php">
            
            <input type="submit"  id="color" value="Logout" />
            
        </form>
        
        <br /><br />
        
        <?php
        
        $users =displayUsers();
        
      foreach($users as $user) {
            
            echo " Name: " . $user['gameName'];
        }
        
        
        ?>
        </div>
        </center>
        </div>
    </body>     
</html>