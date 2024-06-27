<?php
session_start();

include_once '../../connection.php';

//checking if its a post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //checking if girl aint [empty]
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoName = $_FILES['photo']['name'];
        $photoTempName = $_FILES['photo']['tmp_name'];
        $photoSize = $_FILES['photo']['size'];

        $wantedDirectory = 'images/';
        $wantedPath = $wantedDirectory . $photoName;

        if(move_uploaded_file($photoTempName, $wantedPath)) {
            $sql = "INSERT INTO portfolio (photo) VALUES (?)";
            $insertqry = $conn->prepare($sql);

            if ($insertqry === false) {
                echo mysqli_error($conn);
            } else {
                $photo = $wantedPath;
                $insertqry->bind_param('s', $photo); 
                if ($insertqry->execute()) {
                    //if it succesfully adds the thing
                    header("Location: index.php");
                } else {
                    //if it fails 
                    echo "Error adding photo: " . $insertqry->error;
                } 
            }
            $insertqry->close();
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>
