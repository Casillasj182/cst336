<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();
$zipcode=$_GET['zip'];
$sql = "SELECT creationDate FROM zip WHERE zip_code=" . $zipcode; 


    
$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record
//echo $record;

echo json_encode($record);
?>