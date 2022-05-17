<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php
        
        include "dbconnect.php";
        
        // Validate the site was accessed by a post requrest, if not display an error message
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Store the login information
                $userEmail = $_POST['userEmail'];
                $userPassword = $_POST['userPassword'];
                //TODO
                //Write query to search for user in the users table
                                
                //preparing an sql statement to search email and password for whatever the user has typed
                $sql = $conn->prepare("SELECT * FROM users WHERE user_email = ? AND user_password = ?");
                $sql -> bindValue(1, "$userEmail"); //we bind this variable to the first ? in the sql statement
                $sql -> bindValue(2, "$userPassword"); //we bind this value to the second ? in the sql statement
                $sql -> execute(); //execute the statement


                if($sql->rowCount()) 
                { //check if we have results by counting rows
                    
                    
                    //set session variables
                    $_SESSION["login"] = "true";
                    $_SESSION["loggedIn"] = "admin";

                    //redirect the user to admin.php
                    header("Location: /wearcare/admin.php");
                    
                }    
                else
                {
                    echo 'Wrong username or password'; //message to display if the search returned no results
                }
                
                }
            catch(PDOException $e)
                {
                echo $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
                }
        }
        else
        {
            echo "You're here by mistake" ;
        }
        ?>


</body>
</html>