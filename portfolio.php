<?php

session_start();

include_once 'connection.php';

$sql = "SELECT * FROM portfolio";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $portfolio = array(); //<<< hier staat de variabel
    while ($row = $result->fetch_assoc()) {
        $portfolio[] = $row;
    }
} else {
    echo "No portfolio found";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/portfolio.css">
    <title>Portfolio</title>
</head>

<body>

    <?php include "header.php" ?>

    <main>
        <div class="container">
            <div class="portfolio-text">
                <p class="head-text">Bekijk hier een selectie van de door mij uitgevoerde diensten</p>
                <p class="info-text">Benieuwd naar mijn volledige dienstenaanbod?</p>
                <p class="bekijk-dienst">Bekijk die<a class="dienstenaanbod-link" href="dienstenaanbod.php"><span>HIER</span></a>!</p>
            </div>

            <div class="portfolio-imgs">
                <img src="admin/portfolio/<?= $portfolio[1]['photo'] ?>" alt="img1" class="img1" width="100%" height="100%">
                <img src="admin/portfolio/<?= $portfolio[8]['photo'] ?>" alt="img2" class="img2" width="100%" height="100%">
                <img src="admin/portfolio/<?= $portfolio[3]['photo'] ?>" alt="img3" class="img3" width="100%" height="100%">
                <img src="admin/portfolio/<?= $portfolio[2]['photo'] ?>" alt="img4" class="img4" width="100%" height="100%">
                <img src="admin/portfolio/<?= $portfolio[4]['photo'] ?>" alt="img5" class="img5" width="100%" height="100%">
                <img src="admin/portfolio/<?= $portfolio[9]['photo'] ?>" alt="img6" class="img6" width="100%" height="100%">
                <img src="admin/portfolio/<?= $portfolio[6]['photo'] ?>" alt="img7" class="img7" width="100%" height="100%">
                <img src="admin/portfolio/<?= $portfolio[5]['photo'] ?>" alt="img8" class="img8" width="100%" height="100%">
                <img src="admin/portfolio/<?= $portfolio[0]['photo'] ?>" alt="img9" class="img9" width="100%" height="100%">
            </div>
        </div>
    </main>

    <?php include "footer.php" ?>

</body>

</html>