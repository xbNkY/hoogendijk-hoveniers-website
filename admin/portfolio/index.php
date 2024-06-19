<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
</head>

<body>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>photo</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT id, photo FROM portfolio;";
      include_once '../../connection.php';

      $liqry = $conn->prepare($sql);
      if ($liqry === false) {
        echo mysqli_error($conn);
      } else {
        if ($liqry->execute()) {
          $liqry->bind_result($id, $photo);
          while ($liqry->fetch()) {
      ?>
            <tr>
              <td><?= $id ?></td>
              <td><img src="<?= $photo; ?>" style="height: 25%; width: 15%;"></td>
              <td><a href='editingPicture.php?id=<?= $id ?>'>Edit</a></td>
              <td><a href='deletePicture.php?id=<?= $id ?>'>Delete</a></td>
            </tr>
      <?php
          }
        }
        $liqry->close();
      }
      ?>
    </tbody>
  </table>

  <!-- form for adding Photo -->
  <div class="addPhoto">
    <p>Add a Photo</p>
    <form action="addPicture.php" method="post" enctype="multipart/form-data">

      <label for="photo">Photo:</label><br>
      <input type="file" id="photo" name="photo" required><br>

      <input type="submit" value="Add Photo">
    </form>
  </div>

</body>

</html>