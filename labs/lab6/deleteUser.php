<?php

// This will delete a user from the database
include("../../dbConnection.php");
$conn = getDatabaseConnection();
$sql="DELETE FROM tc_user
WHERE userId=" . $_GET['userId'];

$stmt=$conn->prepare($sql);
$stmt->execute();

header("Location: admin.php");

//if(isset[''])
?>
