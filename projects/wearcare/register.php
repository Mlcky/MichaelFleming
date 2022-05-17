<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register as a patient</title>
</head>
<body>
    
<h1>WearCare</h1>
<?php

    //Defining the variables
    $firstname = "";
    $surname = "";
    $email = "";
    $user_password = "";
    $tel = "";
    $house = "";
    $street = "";
    $town = "";
    $postcode = "";
    $dob = "";
    $practice = "";

if ($_SERVER['REQUEST_METHOD']== 'POST'){
    include "dbconnect.php";

    if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['firstname'])){
        exit();
    }
    //TODO
    //save POST values
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $user_password = $_POST['user_password'];
    $tel = $_POST['tel'];
    $house = $_POST['house'];
    $street = $_POST['street'];
    $town = $_POST['town'];
    $postcode = $_POST['postcode'];
    $dob = $_POST['dob'];
    $practice = $_POST['practice'];

    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //TODO
        // prepare sql and bind parameters
        $sql = $conn->prepare("SELECT * from patients WHERE email = ?");
        $sql -> bindValue(1, "$email");
        $sql -> execute();

        // Validation that each user must have their own email address
        if($sql->rowCount())
        {
            echo("user already exist, please select a different email address");
        }
        else
        {
            // Insert all the user inputted values into the database
            $sql = $conn->prepare("INSERT INTO patients (firstname, surname, email, user_password, tel, house, street, town, postcode, dob, practice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $sql -> bindValue(1, "$firstname");
            $sql -> bindValue(2, "$surname");
            $sql -> bindValue(3, "$email");
            $sql -> bindValue(4, "$user_password");
            $sql -> bindValue(5, "$tel");
            $sql -> bindValue(6, "$house");
            $sql -> bindValue(7, "$street");
            $sql -> bindValue(8, "$town");
            $sql -> bindValue(9, "$postcode");
            $sql -> bindValue(10, "$dob");
            $sql -> bindValue(11, "$practice");

            $sql -> execute();

        }
    
        // Display a confirmation message
        echo "Well done - you have now registered as a WearCare patient";
    } 
    
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}
else{
    echo "you're here by mistake";
}

?>
</body>
</html>