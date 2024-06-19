<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT id, photo FROM portfolio WHERE id = ?";

        include_once '../../connection.php';
?>

<!DOCTYPE html>
 <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing</title>
</head>

<body>

    <!-- form for editing photo-->
    <div class="editPhoto">
        <p>Edit a photo</p>

        <?php
                $stmt = $conn->prepare($sql);

                if ($stmt === false) {
        
                    echo mysqli_error($conn);
        
                } else {
        
                    $stmt->bind_param("i", $id);
        
                    if ($stmt->execute()) {
        
                        $stmt->bind_result($id, $photo);
        
                        if ($stmt->fetch()) {
                ?>            
                
        
        <form action="editPicture.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">

            <label for="photo">Photo:<img src="<?= $photo; ?>" style="height: 25%; width: 15%;"></label><br>
            <input type="file" id="photo" name="photo" value="<?= $photo ?>"><br><br>

            <?php
                        } else {
                            echo 'No photo found';
                        }
                    } else {
                        echo 'Failed to Excecute: ' . $stmt->error;
                    }
                    $stmt->close();

            }
        }
    }

            ?>

            <input type="submit" value="Edit photo">
        </form>
    </div>


</body>

</html> 