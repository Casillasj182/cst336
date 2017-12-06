<?php
session_start();

if (!isset($_SESSION['userName'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}


include '../../dbConnection.php';
$conn = getDatabaseConnection();


function displayUsers() {
    global $conn;
    $sql = "SELECT * FROM `movie` JOIN director on 
    movie.directorId = director.directorId 
    JOIN genre 
    ON movie.genreId = genre.genreId 
    where movie.movieId=" . $_GET['movieId'];
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
            
            echo " ID: " . $user['userId'] . "<br> " . ' First Name: '  .$user['firstName']   .  "<br> ". " Last Name: "  . $user['lastName'] .  "<br> " . "  Phone: "  . $user['phone']
            .  "<br> ". " Email: ". $user['email'] .  "<br> " ." Role: ". $user['role'] .  "<br> " . " Gender: " . $user['gender'] 
            .  "<br> " . " Department: " . $user['deptId'] .  "<br> " . " University ID: " . $user['universityId'];
            
        }
        
        
        ?>
        </div>
        </center>
        </div>
    </body>     
</html>