<?php
session_start();

include_once '../../connection.php';

//checking if its a GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  //checking if it isn't empty
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    //setting the thing as the post so we acc got sum to work with
    $id = $_GET['id'];

    $sql = "SELECT photo FROM portfolio WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    $stmt->bind_result($photo);
    $stmt->fetch();
    $stmt->close();

    $sql = "DELETE FROM portfolio WHERE id = ?";

    $stmt = $conn->prepare($sql);
    //bind the question mark in the sql command to the variable. very useful my friend 
    $stmt->bind_param("s", $id);

    //checkin if its bein executed
    if ($stmt->execute()) {
      //to see if there was any of the things affected, and if it isnt, it'll display an error  
      if ($stmt->affected_rows > 0) {
        // Delete the image file
        if (file_exists($photo)) {
          unlink($photo);
        }
        header("Location: index.php");
      } else {
        echo "No photo found with the ID provided";
      }
    } else {
      echo "Error deleting photo: " . $conn->error;
    }

    $stmt->close();
  } else {
    //shows if there's nothing filled in
    echo "photo ID is required";
  }
}

$conn->close();
?>