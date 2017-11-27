<?php

include '../dbConnection.php';

$conn = getDatabaseConnection();

function getToppings() // to display the toppings for the user
{
    global $conn;
    $sql = "SELECT distinct(topping)
            FROM `toppings`
            ORDER BY toppings";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) 
    {
        
        echo "<option> "  . $record['toppings'] . "</option>";
    }
}

function getPizzas() //get pre made reccomended pizzas, need to implement this in the database still 
{
    global $conn;
    $sql = "SELECT distinct(name of value for pre made pizzas)
            FROM `movie` 
            ORDER BY release_year";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record)
    {
        
        echo "<option> "  . $record['name of value for pre made pizzas'] . "</option>";
    }
}

   
   
   
?>
</table>
<!DOCTYPE html>
<html>
    <head>
        <title>CSUMB Pizza Store</title>
    </head>
    <body>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

          <link href="css/styles.css" rel="stylesheet" type="text/css" />
          <div class="col-md-2"></div>
          <div>
        <h1>CSUMB Pizza Store</h1>
        

        <form>
            Pizzas: <input type="text" name="preMade" placeholder="type here"/> 
            <br></br>
            Length (mins): 
            <select name="length">
                <option value="">Select One</option>
                <?=getMovieLength()?>
            </select>
            <br></br>
            
            
             <br></br>
                 Sort by:
          <input type="radio" name="asc" value="ASC" /> Ascending
          <input type="radio" name="asc" value="DESC"/> Descending<br />
            
            
           
          
            <br></br>
            <input type="submit" value="Search for a Movie!" name="submit" >
            
            <br></br>
             <input type ="button" value="Shopping Cart" name="shoppingcart" onclick="location.href='shoppingcart.php'"/>
              <br></br>  
        </form>
        
        
        <hr>
        <div class="col-md-2"></div>
        <div id="movieList" class="col-md-6">

        <?=displayMovies()?>

</div>

</div>

    </body>
</html>