<?php

include("../dbConnection.php");
$conn = getDatabaseConnection();
$sql="DELETE FROM games
WHERE gameId=" . $_GET['gameId'];

$stmt=$conn->prepare($sql);
$stmt->execute();

header("Location: admin.php");

//if(isset[''])
?>
