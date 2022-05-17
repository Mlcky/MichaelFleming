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
    <title>Update a patient</title>
    
</head>
<body>
<h1>WearCare</h1>
    <p>Update this patient</p>
    <hr>
    <?php
    /**
    * For the brave souls who get this far: You are the chosen ones,
    * the valiant knights of programming who toil away, without rest,
    * fixing our most awful code. To you, true saviors, gods among mortals,
    * I say this: never gonna give you up, never gonna let you down,
    * never gonna run around and desert you. Never gonna make you cry,
    * never gonna say goodbye. Never gonna tell a lie and hurt you.
    */    
    include "dbconnect.php";
        
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST') //has the submit button been pressed therefor the patient has been updated
            {
                
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //TODO
                //Store variables from POST
                //Construct query, bind parameters and execute
                $doctor = $_POST['doctor']; // POST variable for doctor
                $patient_id = $_POST['patient_id']; // POST variable for the patients id
                $sql = $conn->prepare("UPDATE patients SET doctor = ? WHERE patients.id = ?;");
                $sql -> bindValue(1,"$doctor"); //we bind this value to the first ? in the sql statement
                $sql -> bindValue(2,"$patient_id"); //we bind this value to the second ? in the sql statement

                 $sql -> execute(); //execute the statement
                
                echo "Patient updated";

            }
            else{
                // Patient hasn't been updated yet and we need to display the existing patient info from the table

                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $patient_id = $_GET['patient_id']; //the ID of the patient we want to edit from the URL obtained from the page before
                
                // Get the patients inforamtion from teh database
                $sql = $conn->prepare("SELECT * FROM patients WHERE id = ?");
                $sql -> bindValue(1, $patient_id); //we bind this variable to the first ? in the sql statement

                $sql -> execute(); //execute the statement

                $row = $sql->fetch();
                
                //********* Pre-populate drop down logic *********//
                /*Depending on the value from the database, we pre populate the selected value of 
                the doctor drop down accordingly by echoing either selected = "selected" or
                an empty string*/
                //When I wrote this, only God and I understood what I was doing
                //Now, God only knows

                if ($row['doctor'] == 'Dr Solo') {
                    $solo = 'selected = "selected"';
                }else{
                    $solo = '';
                }

                if ($row['doctor'] == 'Dr Kenobi') {
                    $kenobi = 'selected = "selected"';
                }else{
                    $kenobi = '';
                }

                if ($row['doctor'] == 'Dr Fett') {
                    $fett = 'selected = "selected"';
                }else{
                    $fett = '';
                }
                //********* END Pre-populate drop down magic *********//

                
                //echo all information about the patient
                echo 'Patient ID: '.$row['id'].'<br>';
                echo 'Firstname: '.$row['firstname'].'<br>';
                echo 'Surname: '.$row['surname'].'<br>';
                echo 'Email: '.$row['email'].'<br>';
                echo 'Telephone Number: '.$row['tel'].'<br>';
                echo 'House: '.$row['house'].'<br>';
                echo 'Street: '.$row['street'].'<br>';
                echo 'Town: '.$row['town'].'<br>';
                echo 'Postcode: '.$row['postcode'].'<br>';
                echo 'Date of Birth: '.$row['dob'].'<br>';
                echo 'Practice: '.$row['practice'].'<br>';
                echo 'Doctor: ';

                //the above information can't be changed by an admin so it is not included in the form

                //using an include to seperate the echo statement that handles the form
                //this allows us to seperate code so it is easier to manage
                include "update_patient_form.php";

                echo '<hr><br>';
                
            }
        }
        catch(PDOException $e)
            {
            echo $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }
        ?>


</body>
</html>































<!-- What you looking down here for, code is up there ^ -->