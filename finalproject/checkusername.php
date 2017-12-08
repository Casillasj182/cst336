<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();


$sql = "SELECT *
        FROM admin
        WHERE userName = :userName"; 

$namedParameters = array();
$namedParameters[':username'] = $_GET['userName'];
       
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);

echo json_encode($record);
?>
