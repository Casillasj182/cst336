<?php
session_start();
//print_r($_POST);


$username = $_POST["userName"];
$error = "username/password incorrect";

if($username == $_GET['userName']){
    $_SESSION["userName"] = $username;
    header("Location:admin.php"); //send user to homepage, for example.
}else{
    $_SESSION["error"] = $error;
    header("Location: index.php"); //send user back to the login page.
}



include '../../dbConnection.php';
$conn = getDatabaseConnection();

//print_r($conn);

$username = $_POST['userName'];
$password = sha1($_POST['password']);



//The following SQL allows SQL injection
// $sql = "SELECT *
//         FROM tc_admin
//         WHERE username = '$username' 
//         AND   password = '$password'";

$sql = "SELECT *
        FROM tc_admin
        WHERE userName = :userName 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':userName'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);
//$_SESSION['message'] = 'Error: wrong';

if (empty($record)) {
    
    echo "wrong username or password!";
    
} else {
    
    //echo "right credentials!";
    $_SESSION['userName'] = $record['userName'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    //echo $_SESSION['adminFullName'] . "<br>";
    //echo $record['firstName'] . " " . $record['lastName'];
   header("Location: admin.php"); //redirecting to admin portal
}
?>