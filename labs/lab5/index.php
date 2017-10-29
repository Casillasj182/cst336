
<?php

include '../../dbConnection.php';



$conn = getDatabaseConnection();

function printsql() 
{
    global $conn;
    $sql = "SELECT DISTINCT(deviceType)
            FROM `tc_device` 
            ORDER BY deviceType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record[''] . "</option>" ;
        
    }
}


function displayDevices(){
    global $conn;
    
    $sql = "SELECT * FROM tc_device WHERE 1 ";
    
    
    if (isset($_GET['submit']))
    {
        
        $namedParameters = array();
        
        
        if (!empty($_GET['deviceName']))
        {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";

         }
         
        if (!empty($_GET['deviceType'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND deviceType = :dType"; //using named parameters
            $namedParameters[':dType'] =   $_GET['deviceType'] ;

         }     
         
         if (isset($_GET['available'])) 
         {
              $sql .= " AND status = 'A' "; //using named parameters
            //$namedParameters[':available'] =   $_GET['available'] ;
         }
         
         if (isset($_GET['name'])) 
         {
              $sql .= " ORDER BY deviceName"; //using named parameters
            //$namedParameters[':available'] =   $_GET['available'] ;
         }
         if (isset($_GET['price'])) 
         {
              $sql .= " ORDER BY price"; //using named parameters
            //$namedParameters[':available'] =   $_GET['available'] ;
         }
      
       
        
        
    }//endIf (isset)
    
    //If user types a deviceName
     //   "AND deviceName LIKE '%$_GET['deviceName']%'";
    //if user selects device type
      //  "AND deviceType = '$_GET['deviceType']";
    
    //echo "<div>";
    echo "<br>";
     echo "<br>";
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
     foreach ($records as $record) 
     {
        
        echo  $record['deviceName'] . " " . $record['deviceType'] . " " .
              $record['price'] .  "  " . $record['status'] . " " . 
              $record['available']. " " .
              "<a target='checkoutHistory' href='checkoutHistory.php?deviceId=".
              $record['deviceId']."'> Checkout History </a> <br />";
        
    }
    // echo "</div>";
    
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Device Search </title>
         <style>
            @import url("css/styles.css");
            
            body {
                background-image: url(<?=$backgroundImage?>);
            }
            </style>
    </head>
    <body>
        
        <div>
        <h1> Technology Center: Checkout System </h1>
        <br>
        <br>
        <br>
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name"/>
            Type: 
            <select name="deviceType">
                <option value="">Select One</option>
                <?=getDeviceTypes()?>
            </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available"> Available </label>
            
            <br>
            Order by:
            <input type="radio" name="name" id="orderByName" value="name" <?= $checkmark ?>/> 
             <label for="oderByName"> Name </label>
            <input type="radio" name="price" id="orderByPrice" value="price" <?= $checkmark1 ?>/> 
             <label for="oderByPrice"> Price </label>
            
            
            
            <input type="submit" value="Search!" name="submit" >
        </form>
        </div>
        
        
        <hr>
        
        <?=displayDevices()?>
       
        <iframe name="checkoutHistory"  id= css width="400" height="400"></iframe>
        

    </body>
</html>