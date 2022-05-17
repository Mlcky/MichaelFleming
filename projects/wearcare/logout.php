<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Logging out</title>

</head>
<body>
<h1>WearCare</h1>
    <p>Nothing to see here anymore</p>
    <hr>
<?php

    session_start();
    //destroy the session and display logged out message
    session_destroy(); 
    echo("Successfully logged out.");

?>
</body>
</html>
