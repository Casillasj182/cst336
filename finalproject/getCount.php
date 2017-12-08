<?php


include '../dbConnection.php';
$conn = getDatabaseConnection();



    $sql = "SELECT AVG(teamSize) as count from developers";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetch(PDO::FETCH_ASSOC);

  

echo json_encode($users);


?>