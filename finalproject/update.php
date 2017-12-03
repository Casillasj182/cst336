<?php
session_start();

if (!isset($_SESSION['userName'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../dbConnection.php");
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT gameName, gameId 
            FROM games 
            ORDER BY gameName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}
 function checkIfSelected($option)
    {
        
        if ($option == $_GET['role'])
        {
            
            return "selected";
            
        }
        
    }


if (isset($_GET['gameId'])) {
    
    $userInfo = getUserInfo($_GET['gameId']);
    
    
}

if (isset($_GET['updateUserForm'])) { //admin has submitted form to update user, needs to update rest of the stuff
    
    $sql = "UPDATE games
            SET gameName = :gName,
                gameId = :gId',
                release_year = :release,
               rating = :rating,
                genre = :genre,
                developerName = :developer
			WHERE gameId = :gameId";
 
    $namedParameters = array();
    $namedParameters[':gName'] =  $gameName;
    $namedParameters[':gId'] =  $gameId;
    $namedParameters[':release'] =  $releaseyear;
    $namedParameters[':rating'] =  $rating;
    $namedParameters[':genre'] = $genre;
    $namedParameters[':developer']  = $developerName;
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
}
function getGameInfo($userId) {
    global $conn;    
    $sql = "SELECT * 
            FROM games
            WHERE gameId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}



?>

<!DOCTYPE html>
<html>
    <head>
        
        <center>
        
        <title> Admin: Updating Game  </title>
    </head>
    <body>
        <div>

    <h1> Admin Section </h1>
    <h2> Updating Game Info </h2>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
          <link href="css/main.css" rel="stylesheet" type="text/css" />
           <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <fieldset>
        
        <legend> Update Game </legend>
        
        <form>
            <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
            First Name: <input type="text" name="firstName" required value="<?=$userInfo['firstName']?>" /> <br>
            Last Name: <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/> <br>
            Email: <input type="text" name="email" required value="<?=$userInfo['email']?>"/> <br>
            University Id: <input type="text" name="universityId" required value="<?=$userInfo['universityId']?>"/> <br>
            Phone: <input type="text" name="phone" required value="<?=$userInfo['phone']?>"/> <br>
            Gender: <input type="radio" name="gender" value="F" id="genderF"  <?=($userInfo['gender']=='F')?"checked":"" ?> required/> 
                    <label for="genderF">Female</label>
                    <input type="radio" name="gender" value="M" id="genderM"  <?=($userInfo['gender']=='M')?"checked":"" ?> required/> 
                    <label for="genderM">Male</label><br>
                    
            Role:   <select name="role">
                        <option value="" > Select One </option>
                        <option <?=($userInfo['role'] == 'Faculty' ) ? "selected" :"" ?> value="faculty">Faculty</option>
                        <option  <?=($userInfo['role'] == 'Student' ) ? "selected" :"" ?>>Student</option>
                        <option  <?=($userInfo['role'] == 'Staff' ) ? "selected" :"" ?>>Staff</option>
                    </select>
            <br />
            Department: <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                                $check=
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record)
                                {
                                    echo "<option value='$record[departmentId]' ".(($userInfo['deptId'] == $record['departmentId'] ) ? "selected" : "") ." >$record[deptName]</option>";
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="updateUserForm" value="Update User!"/>
        </form>
        
    </fieldset>

</center>
</div>
    </body>
</html>