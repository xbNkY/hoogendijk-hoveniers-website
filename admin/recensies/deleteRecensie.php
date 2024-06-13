<?php
session_start();

include_once '../../connection.php';

//checking if its a GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  //checking if it's not empty
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    //the sql command
    $sql = "DELETE FROM recensies WHERE id = ?";

    $stmt = $conn->prepare($sql);
    //bind the question mark in the sql command to the variable. very useful my friend 
    $stmt->bind_param("s", $id);

    //checkin if its bein executed
    if ($stmt->execute()) {
      //to see if there was any of the things affected, and if it isnt, it'll display an error  
      if ($stmt->affected_rows > 0) {
        header("Location: index.php");
      } else {
        //error message 
        echo "No recensie found with the ID provided";
      }
    } else {
      //other error message :D
      echo "Error deleting recensie: " . $conn->error;
    }

    $stmt->close();
  } else {
    //yuupp, shows if there's nothing filled in
    echo "recensie ID is required";
  }
}

$conn->close();
?>