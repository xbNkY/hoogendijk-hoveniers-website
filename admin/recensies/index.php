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
        <th>Naam</th>
        <th>Opmerking</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT id, naam, opmerking FROM recensies";
      include_once '../../connection.php';

      $liqry = $conn->prepare($sql);
      if ($liqry === false) {
        echo mysqli_error($conn);
      } else {
        if ($liqry->execute()) {
          $liqry->bind_result($id, $naam, $opmerking);
          while ($liqry->fetch()) {
      ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $naam; ?></td>
              <td><?= $opmerking; ?></td>
              <td><a href='editingRecensie.php?id=<?= $id ?>'>Edit</a></td>
              <td><a href='deleteRecensie.php?id=<?= $id ?>'>Delete</a></td>
            </tr>
      <?php
          }
        }
        $liqry->close();
      }
      ?>
    </tbody>
  </table>

  <!-- form voor recensies toe te voegen-->
  <div class="addRecensie">
    <p>Voeg een recensie toe</p>
    <form action="addRecensie.php" method="post" enctype="multipart/form-data">

      <label for="naam">naam:</label><br>
      <input type="text" id="naam" name="naam" required><br>

      <label for="opmerking">opmerking:</label><br>
      <textarea type="text" id="opmerking" name="opmerking" required></textarea><br>

      <input type="submit" value="Add Recensie">
    </form>
  </div>

</body>

</html>