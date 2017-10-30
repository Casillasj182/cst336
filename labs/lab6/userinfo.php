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
            FROM tc_user a
            INNER JOIN tc_department b 
            ON a.deptId = b.departmentId
            WHERE userId=" .$_GET['userId'];
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
<center>
        <h1> User Info </h1>
      
        
        <hr>
        
        
            
            
            
        </form>
        
          
        <form action="logout.php">
            
            <input type="submit" value="Logout" />
            
        </form>
        
        <br /><br />
        
        <?php
        
        $users =displayUsers();
        
      foreach($users as $user) {
            
            echo " ID: " . $user['userId'] . "<br> " . ' First Name: '  .$user['firstName']   .  "<br> ". " Last Name: "  . $user['lastName'] .  "<br> " . "  Phone: "  . $user['phone']
            .  "<br> ". " Email: ". $user['email'] .  "<br> " ." Role: ". $user['role'] .  "<br> " . " Gender: " . $user['gender'] 
            .  "<br> " . " Department: " . $user['deptId'] .  "<br> " . " University ID: " . $user['universityId'];
           // echo "[<a href= . $user['firstName']";
          // echo "[<a href='updateUser.php?userId=".$user['userId']."'> Update </a> ]";
            
           
           //this is what im trying to make wo
            //echo "[<a href='userinfo.php?variableName=$_GET['variable']".$user['userId']."'> Update </a> ]";
            // echo "<a href='userinfo.php?userId=".$user['userId']."'> . $user['firstName']"'.  </a> ";
           
            
//$name = $user['firstName'] . "  " . $user['lastName'];
           //  echo "<a href='userinfo.php?". "<a href=' . $user['firstName']" i. $_GET['firstName']."'></a> ]";
            //echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
           // echo "<a class='name' href='usernfo.php?userId=".$user['userId']."'> $name </a> ";
          
            
        }
        
        
        ?>
        </div>
        </center>
    </body>     
</html>