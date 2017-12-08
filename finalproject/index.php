<?php

include '../dbConnection.1.php';

$conn = getDatabaseConnection("final");

function getGenres() {
    global $conn;
    $sql = "SELECT DISTINCT(genre)
            FROM `games` 
            ORDER BY genre";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['genre'] . "</option>";
        
    }
}



function displayGames(){
    global $conn;
    
    $sql = "SELECT * FROM games WHERE 1 ";
    
    
    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        
        if (!empty($_GET['gameName'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND gameName LIKE :gameName"; //using named parameters
            $namedParameters[':gameName'] = "%" . $_GET['gameName'] . "%";

         }
         
        if (!empty($_GET['genre'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND genre = :genre"; //using named parameters
            $namedParameters[':genre'] =  $_GET['genre'] ;

         }     
     
    }//endIf (isset)
    
  ?>
    <table>
        <tr>
            <th>ID</th>
          &emsp;
            <th>Title</th>
           &emsp;
            <th>Rating</th>
           &emsp;
            <th>Developer</th>
           &emsp;
        </tr>
    <?php
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
        echo "<strong>";
        echo"<center>";
        echo "Game Library";
        echo"</center>";
        echo"</strong>";
        echo "<br>";
     foreach ($records as $record) {
       echo "<tr>".
       "<td>" .$record['gameId'] . "</td> " . "<td> " .$record['gameName'] . "</td> " .
        "</td>" . "<td> " .$record['rating'] ."</td>". "<td>". $record['developerName']. "</td>".
        "</tr>";
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
         <link  href="css/styles.css" rel="stylesheet" type="text/css" />
                 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <title>GameStore </title>
    </head>
  <script>
       
    var username = $('#userName').val();
$('#userName').change(function() {
   $.ajax({
      url: "checkusername.php",
      type: 'POST',
      data: 'userName=' + userName,
      success: function(result){
                 if(result > 0){
                    $('#checkusername').html("Username is available")
                 }
                 else{
                      $('#checkusername').html("Username isnt available")
                 }
               }
      });
});
    $(document).ready( function(){
        
         //$("#userName").change( function() { checkUsername(); } ); 
        
    } ); //documentReady


  
   
    
    
    </script>
    <body background="mario1.jpg">
        
       
        
        <center>
             <div id="wrapper">
  <h1 class="chrome"> Game Library</h1>
    <fieldset id="color2" style="width: 1000px; height: 180px;  opacity: 0.9;">
   
     
        <form id="even">
            <h1>User Section</h1>
            Games: <input type="text" name="gameName" placeholder="Game Name"/>
            Genre: <select name="genre">
                <option value="">Select One</option>
              <?=getGenres()?>
            </select>
            <br>
            <input type="submit" id="color" value="Search!" name="submit" >
           
        </form>
       
     
        <form id="even2" method="POST" class="even2" action="loginProcess.php" action="admin.php">
            <h1> Admin Login Section </h1>
            Username: <input type="text" id="username" name="userName"/> <br />
              <span id="checkusername"></span>
            Password: <input type="password" id="password" name="password"/> <br />
            
            <input type="submit"  id="button" id="color" name="login" value="Login">
            
              
        </form>
      </fieldset>
        </center>
        
        </fieldset>
          <center>
              <div>
                  <br></br>
                  <fieldset style="width: 500px; height: 620px;  opacity: 0.9;">
        <?php
       


        displayGames();
        ?>
        </div>
        </fieldset>
        </center>
      
    </body>
</html>
<?php
    unset($_SESSION["error"]);
?>