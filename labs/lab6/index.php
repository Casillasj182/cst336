<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <div>
        <title id="center"> Lab 6: Admin Login Page </title>
         <meta charset="utf-8">
          
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
    </head>
    <center>
    <body>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
          <link href="css/main.css" rel="stylesheet" type="text/css" />
           <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        
       <h1> Admin Login </h1>
        
        <form method="POST" action="loginProcess.php" action="admin.php">
            
            Username: <input type="text" name="userName"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
                 <?php
                    if(isset($_SESSION["error"]))
                    {
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?> 
            
        </form>
       </div>
       </center>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
<?php
    unset($_SESSION["error"]);
?>