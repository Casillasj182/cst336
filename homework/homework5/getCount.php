<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT count(creationDate) FROM zip WHERE zip_code=93905"; 

$namedParameters = array();
$namedParameters[':zip'] = $_GET['zip'];
       
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record


echo json_encode($record);
?>
