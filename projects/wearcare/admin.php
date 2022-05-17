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
    <title>WearCare Admin area</title>
</head>
<body>
    <h1>Welcome to the WearCare admin area</h1>
    <p>This area of the website is strictly confidential.</p>
    <p>Ensure there are no shoulder surfers in your vacinity and that you log out when you are done.</p>
    <p>Failure to logout is unnacceptable but also completly untraceable.</p>
    <a href="select_patients.php"> View all patients here </a>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>