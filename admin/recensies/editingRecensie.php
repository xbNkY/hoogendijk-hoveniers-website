<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT id, naam, opmerking FROM recensies WHERE id = ?";

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

    <!-- form for editing recensies -->
    <div class="editRecensies">
        <p>Edit a recensie</p>

        <?php
                $stmt = $conn->prepare($sql);

                if ($stmt === false) {
        
                    echo mysqli_error($conn);
        
                } else {
        
                    $stmt->bind_param("i", $id);
        
                    if ($stmt->execute()) {
        
                        $stmt->bind_result($id, $naam, $adres, $opmerking);
        
                        if ($stmt->fetch()) {
                ?>            
                
        
        <form action="editRecensie.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">

            <label for="naam">Naam:</label><br>
            <input type="text" id="naam" name="naam" value="<?= $naam ?>"><br>

            <label for="opmerking">opmerking:</label><br>
            <input id="opmerking" name="opmerking" value="<?= $opmerking ?>"></input><br><br>

            <?php
                        } else {
                            echo 'No products found';
                        }
                    } else {
                        echo 'Failed to Excecute: ' . $stmt->error;
                    }
                    $stmt->close();

            }
        }
    }

            ?>

            <input type="submit" value="Edit Recensie">
        </form>
    </div>


</body>

</html> 