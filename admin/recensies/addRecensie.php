<?php
session_start();

include_once '../../connection.php';

//checking if its a post 
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    //checking if it isn't empty
    $naam = $_POST['naam'];
    $opmerking = $_POST['opmerking'];

            $sql = "INSERT INTO recensies (naam, opmerking) VALUES (?, ?)";
            $insertqry = $conn->prepare($sql);

            if ($insertqry === false) {
                echo mysqli_error($conn);
            } else {
                $insertqry->bind_param('ss', $naam, $opmerking); 
                if ($insertqry->execute()) {
                    //if it succesfully adds the thing
                    header("Location: index.php");
                } else {
                    //if it fails
                    echo "Error adding recensie: " . $insertqry->error;
                }
            }
            $insertqry->close();
        
        } else {
            echo "Fill in all required spaces.";
        }


$conn->close();
?>
