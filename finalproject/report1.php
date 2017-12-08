


<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
      <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
      
     

         
        <center>
        <div>
        <title>Report 1</title>
    </head>
    <body background="mario1.jpg">
     <div id="wrapper">
  <h1 class="chrome">Average Team Size</h1>
  
 

  
  </div>
</div>
        <div>
<center>
        
        <hr>
        </form>
      
        <br /><br />
         <fieldset id="color2" style="width: 390px; height: 200px;   opacity: 0.9;">
             <div id="result"></div>
        <script>
	var Count=$("#teamSize").val();
   function getCount() 
    {
        
       
        $.ajax({
            type: "GET",
            url: "getCount.php",
            dataType: "json",
            data: {
                    
                   },
            success: function(data,status) {    
        
               $("#result").html("<strong>"+"The Average Team Size is " +" " + data.count + " Programmers"  + "</strong>");
                 
               
              
               // $("#result7").html(data[0].creationDate);
            },
            
            complete: function(data,status) {
            }
        
        });
    
    }
</script>
       <?php
        /*
        $users=displayUsers();
        
      foreach($users as $user) {
            echo "<h1></h1>";
            //echo " There is" . $user['COUNT(developerId']."'s";
            echo " The Average Team Size is: " . "<strong>". $user['AVG(teamSize)'] . " Programmers". "</strong>" ."<br> " ;
        }
        */
       
        ?>
        
        </div>
        </fieldset>
       
        </center>
        </div>
         <form>
            	<input type="Button" value="Show" onclick="getCount()">
            	
            	 <div id="result2"></div>
        </form>
        
        <center>
            <br></br>
        <form action="admin.php">
            <input type="submit" id="color" value="Go Back To Admin Page" />
        </form>
        </center>
    </body>     
</html>