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
    <title>View patients</title>


    <script>
            function updateResults() 
            {
                // Get the values from the form and assign them to variables
                var firstname = document.getElementById("firstname").value;
                var surname = document.getElementById("surname").value;
                var searchName = document.getElementById("practice").value;

                var xmlhttp = new XMLHttpRequest();

                // Update the variables
                xmlhttp.open("GET","select_patients.php?q="+firstname+","+surname+","+practice,true);
                xmlhttp.send();
            
            }

    </script>


</head>

<body>
    <h1>WearCare</h1>
    <p>Viewing all of the registered patients</p>
    <p>You can search for specific patients or filter results here</p>
    <form>
    <label for="firstname">Firstname: </label>    
    <input type="text" name="firstname" id="firstname">
    <label for="surname">Surname: </label>    
    <input type="text" name="surname" id="surname">
    <label for="practice">Practice</label>
    <input type="text" name="practice:" id="practice">
    <button onclick(updateResults)>Search</button>
    </form>
    <hr>

    <?php
        
        include "dbconnect.php";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Selecting multiple rows from a MySQL database using the PDO::query function.

            // Thought that the best option for adding search functionality would be in the update/delete page as opposed to a seperate page 
            // as it provides not only the funcitonality to search and view the data but also to allow for easier updating or deletion of the records


            // Get the variables from the GET request
            $firstname = $_GET['firstname'];
            $surname = $_GET['surname'];
            $practice = $_GET['practice'];

            //Start the sql statement
            $sqlString = "SELECT * from patients ";

            // Check which if any of the search inputs have values and concatinate the SQL string with any search requests
            // Very sorry for this mad code
            if($firstname != "" || $surname != "" || $practice != ""){
                $sqlString .= "WHERE ";
                if($firstname != ""){
                    $sqlString .= "firstname LIKE '%" . $firstname . "%' ";
                    if ($surname != "" || $surname != "")
                    {
                        $sqlString .= "AND ";
                    }
                }
                if($surname != ""){
                    $sqlString .= "surname LIKE '%" . $surname . "%' ";
                    if($practice != ""){
                        $sqlString .= "AND ";
                    }
                }
                if($practice != ""){
                    $sqlString .= "practice LIKE '%" . $practice . "%' ";
                } 
            }

            $sqlString .= "ORDER BY id DESC";

            //For each result that we return, loop through the result and perform the echo statements.
            //$row is an array with the fields for each record returned from the SELECT
                foreach($conn->query($sqlString, PDO::FETCH_ASSOC) as $row){
                    
                    //TODO
                    //show all patient info here
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
                    echo 'Doctor: '.$row['doctor'].'<br>';
                    echo '<a href="update_patient.php?patient_id='.$row['id'].'" class="button">Update this patient</a><br>';
                    echo '<a href="delete_patient.php?patient_id='.$row['id'].'" class="dbutton" onclick="return confirm(\'Are you sure you want to delete this patient?\');">Delete this patient</a>';
                    echo '<hr><br>';
                }
            
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful we will see an error
            }
        ?>


</body>
</html>
















<!--Made you look-->