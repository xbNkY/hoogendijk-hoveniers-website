<?php
session_start();
include_once '../../connection.php';

//checking if its a post/get
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //setting the things as the posts so we acc got sum to work with   
    $id = $_GET['id'];
    $naam = $_POST['naam'];
    $opmerking = $_POST['opmerking'];

            //sql command 
            $sql = "UPDATE recensies SET naam = ? = ?, opmerking = ? WHERE id = ?";
            $updateqry = $conn->prepare($sql);

            //if there aint a update querry, show an error 
            if ($updateqry === false) {
                echo mysqli_error($conn);
            } else {
                //else it just updates
                $updateqry->bind_param('ssi', $naam, $opmerking, $id);
                if ($updateqry->execute()) {
                    header("Location: index.php");
                } else {
                    echo "Error updating recensie: " . $updateqry->error;
                }
            }

            $updateqry->close();
        }

$conn->close();
?>