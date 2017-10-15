<div>
<?php


function displayCheckoutHistory() {
    //echo "<title> Device Checkout </title>";
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `tc_checkout` 
            NATURAL JOIN tc_device
            NATURAL JOIN tc_user 
            WHERE deviceId = :deviceId";
    
    $namedParam = array(":deviceId"=>$_GET['deviceId']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<div>";
    foreach ($records as $record) {
        
        echo  $record['firstName'] . " " . $record['lastName'] ." " . $record['deviceName'] . "<br />";
        
    }
     echo "</div>";
    
}

?>
</div>

<!DOCTYPE html>
<html>
    <head>
        <title> Checkout History </title>
    </head>
    <body>
        
        <h2> Checkout History </h2>


        <?=displayCheckoutHistory()?>

    </body>
</html>