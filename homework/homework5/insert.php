<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();

$zipcode=$_GET['zip'];


//This works good it seems

$sql = "INSERT INTO `zip` (`zip_code`) 
VALUES (" . $zipcode .")";  


$stmt = $conn->prepare($sql);
$stmt->execute();
//$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record


echo json_encode($record);
?>
