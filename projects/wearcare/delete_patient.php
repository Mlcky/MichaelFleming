<?php
session_start(); // important function to allow session variables  

if ($_SESSION["loggedIn"] != "admin") {

    header("Location: login_form.html"); //send them to the form to login

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Delete patient</title>

</head>
<body>
<h1>WearCare</h1>
    <p>Delete a patient</p>
    <hr>
    <?php
        
        // Connect to the database
        include "dbconnect.php";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
    
            //TODO
            //save query from URL 
            //write query to delete patient 
            $patient_id = $_GET["patient_id"]; 

            // SQL statement to delete the data for the patient with the matching ID
            $sql = $conn->prepare("DELETE FROM patients WHERE id = ?;");
            $sql -> bindValue(1, "$patient_id"); //we bind this variable to the first ? in the sql statement
            $sql -> execute(); //execute the statement

            echo "Patient successfully deleted";
        }
        catch(PDOException $e)
            {
            echo $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }
        ?>


</body>
</html>