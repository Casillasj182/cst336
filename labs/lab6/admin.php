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
    $sql = "SELECT * 
            FROM tc_user
            ORDER BY lastName";
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
        <div>
            <center>
        <title>Admin Page </title>
          <script>
            
            function confirmDelete(firstName) 
            {
                
                return confirm("Are you sure you want to delete " + firstName + "?");
            }
        </script>
    </head>
    <body>

        <h1> TCP ADMIN PAGE </h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        
        <hr>
        
        <form action="addUser.php">
            
            <input type="submit" value="Add new User" />
            
        </form>
        
          
        <form action="logout.php">
            
            <input type="submit" value="Logout" />
            
        </form>
        
        <br /><br />
        
        <?php
        
        $users =displayUsers();
        
      foreach($users as $user) 
      {
             $name = $user['firstName'] . "  " . $user['lastName'];
            echo $user['userId'] . '  ' . $user['firstName'] . "  " . $user['lastName'];
           // echo "[<a href= . $user['firstName']";
           echo "[<a href='updateUser.php?userId=".$user['userId']."'> Update </a> ]";
            echo "[<a href='userinfo.php?userId=".$user['userId']."'> $name </a> ]";
           
           //this is what im trying to make wo
            //echo "[<a href='userinfo.php?variableName=$_GET['variable']".$user['userId']."'> Update </a> ]";
            // echo "<a href='userinfo.php?userId=".$user['userId']."'> . $user['firstName']"'.  </a> ";
           
            
            
           //  echo "<a href='userinfo.php?". "<a href=' . $user['firstName']" i. $_GET['firstName']."'></a> ]";
            //echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
           // echo "<a class='name' href='usernfo.php?userId=".$user['userId']."'> $name </a> ";
          echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                     <input type='hidden' name='userId' value='".$user['userId']."' />
                     <input type='submit' value='Delete'>
                     
                  </form>
                ";
            
            echo "<br />";
            
        }
        
        
        ?>
        </div>
        </center>
    </body>     
</html>