<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register as a new patient</title>
</head>
<body>
<a href="admin.php">Admin area</a>
<h1>WearCare</h1>
<h3>Register as a new patient</h3>

<form action="register.php" method="POST">
<label for="firstname">Firstname</label>
<p id="name-error"></p>
<input type="text" name="firstname" id="firstname" onfocus="this.value=''" placeholder="Luke">
<label for="surname">Surname</label>
<input type="text" name="surname" id="surname" onfocus="this.value=''" placeholder="Skywalker">
<label for="email">Email</label>
<input type="text" name="email" id="email" onfocus="this.value=''" placeholder="tooshorttobeastormtrooper@email.com">
<label for="password">Password</label>
<input type="password" name="user_password" id="password" onfocus="this.value=''" placeholder="">
<label for="tel">Telephone number</label>
<input type="text" name="tel" id="tel" onfocus="this.value=''" placeholder="07123456789">
<label for="house">House number / Name</label>
<input type="text" name="house" id="house" onfocus="this.value=''" placeholder="16a">
<label for="street">Street</label>
<input type="text" name="street" id="street" onfocus="this.value=''" placeholder="Sand Alley">
<label for="town">Town</label>
<input type="text" name="town" id="town" onfocus="this.value=''" placeholder="Mos Eisley">
<label for="postcode">Postcode</label>
<input type="text" name="postcode" id="postcode" onfocus="this.value=''" placeholder="MS94 5MF">
<label for="dob">Date of Birth</label>
<input type="date" name="dob" id="dob" placeholder="">
<label for="practice">Practice</label>
<select name="practice" id="pracice">
<?php
    include "practice_dropdown_generate.php";
?>

</select>
<input type="submit" value="Register">

</form>
    
</body>
</html>