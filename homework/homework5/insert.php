<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();


$sql = "SELECT *
        FROM zip
        WHERE creationDate = :creationDate"; 

$namedParameters = array();
$namedParameters[':creationDate'] = $_GET['creationDate'];
       
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record


echo json_encode($record);
?>
