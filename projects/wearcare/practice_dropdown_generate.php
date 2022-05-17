<?php

    include "dbconnect.php";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //preparing an sql statement to select all practice names
        $sql = $conn->prepare("SELECT practice_name FROM practice");

        $sql -> execute(); //execute the statement
        
        if($sql->rowCount()) { //check if we have results by counting rows
            while ($row = $sql->fetch()) //loop through the results to display them as a drop down value
                {
                    
                    echo '<option value ="'.$row['practice_name'].'">'.$row['practice_name'].'</option> ';
                }
            }
        else
            {
                //blank value for drop down
                echo '<option value ="No practices">No practices to select</option> ';
            }
            
        }
    catch(PDOException $e)
        {
        echo $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
        }
    ?>