<?php
session_start();
include_once '../../connection.php';

//checking if its a post/get
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //setting the things as the posts so we acc got sum to work with    
    $id = $_GET['id'];
    $sql = "SELECT photo FROM portfolio WHERE id = ?";

    $selectqry = $conn->prepare($sql);
    $selectqry->bind_param('i', $id);
    $selectqry->execute();
    $selectqry->bind_result($oudeAfbeelding);
    $selectqry->fetch();
    $selectqry->close();

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoName = basename($_FILES['photo']['name']);
        $photoTempName = $_FILES['photo']['tmp_name'];
        $wantedDirectory = 'Images/';
        $wantedPath = $wantedDirectory . $photoName;

        if (move_uploaded_file($photoTempName, $wantedPath)) {
            if (file_exists($oudeAfbeelding)) {
                unlink($oudeAfbeelding);
            }
            $photo = $wantedPath;
        } else{
            $photo = $oudeAfbeelding;
        } 
    } else{
        $photo = $oudeAfbeelding;
    } 
    
            //sql command
            $sql = "UPDATE portfolio SET photo = ? WHERE id = ?";
            $updateqry = $conn->prepare($sql);

            //if there aint a update querry, show an error
            if ($updateqry === false) {
                echo mysqli_error($conn);
            } else {
                //else it just updates!! :DD
                $updateqry->bind_param('si', $photo, $id);
                if ($updateqry->execute()) {
                    header("Location: index.php");
                } else {
                    echo "Error updating product: " . $updateqry->error;
                }
            }

            $updateqry->close();
        }

$conn->close();
?>