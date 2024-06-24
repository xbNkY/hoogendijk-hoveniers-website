<?php
session_start();

include_once 'connection.php';

$sql = "SELECT * FROM recensies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $recensies = array();
    while ($row = $result->fetch_assoc()) {
        $recensies[] = $row;
    }
} else {
    echo "No recensies found";
}

$recensieCount = count($recensies);

$sql = "SELECT * FROM portfolio";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $portfolio = array();
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
    <link rel="stylesheet" href="css/homepage.css">
    <title>Homepage</title>
</head>

<body>

    <?php include "header.php" ?>


    <div class="top-info">
        <div class="container top-info-container">
            <div class="text-box">
                <p class="head-text">Welkom bij de website van Hendrik Hogendijk, hovenier in de regio Utrecht, Zeist en de Bilt.</p>
                <p class="info-text">De tuin is een belangrijke plek van de woning, waar je het liefst zoveel mogelijk tijd in doorbrengt. Bij Hendrik Hogendijk Hoveniers vinden wij het daarom belangrijk dat iedereen zich thuis voelt in zijn of haar tuin. Ik maak de tuin onderdeel van jouw ‘thuis’, door hem volledig op jouw wensen af te stemmen.</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-and-slideshow">
            <div class="text-box offers-text">
                <p class="head-text">Wat bied ik aan?</p>
                <p class="info-text">Met behulp van mooie, natuurlijke en duurzame producten en materialen creëer ik een tuin, die garant staat voor een jarenlang plezierig buitenleven. Van een knusse veranda en een mooie vijver, tot een gezellig terras en een kleurrijke bloemenborder: ik stop al mijn energie erin.</p>
            </div>

            <!-- even temporary op deze manier zodat we wel zien hoe het wordt als het uiteindelijk werkt -->
            <div class="slideshow">
                <img class="arrow" src="assets/arrow-left.svg" alt="arrow-left">
                <img class="slide-img" src="admin/portfolio/<?= $portfolio[0]['photo'] ?>" alt="slide1">
                <img class="slide-img" src="admin/portfolio/<?= $portfolio[1]['photo'] ?>" alt="slide2">
                <img class="slide-img" src="admin/portfolio/<?= $portfolio[2]['photo'] ?>" alt="slide3">
                <img class="arrow" src="assets/arrow-right.svg" alt="arrow-right">
            </div>
        </div>
    </div>

    <div style="display:flex;">
        <img class="seperator-img" src="admin/portfolio/<?= $portfolio[10]['photo'] ?>" alt="seperator">
    </div>

    <div class="review-and-contact container">
        <div class="reviews">
            <button onclick="prevRecensie()" style="border: 0px; background-color: transparent;">
                <img class="arrow" src="assets/arrow-left.svg" alt="arrow-left">
            </button>

            <div class="text-box">
                <div class="name-and-date">
                    <!-- id's voor de lijnen van de naam n opmerking is om de javascript d'r aan te koppelen enz :) -->
                    <p id="recensieNaam" class="head-text"><?= $recensies[0]['naam'] ?></p>
                    <p class="info-text">01-01-2024</p>
                </div>
                <p id="recensieOpmerking" class="info-text"><?= $recensies[0]['opmerking']; ?></p>
            </div>

            <button onclick="nextRecensie()" style="border: 0px; background-color: transparent;">
                <img class="arrow" src="assets/arrow-right.svg" alt="arrow-right">
            </button>
        </div>
        <div class="contact">
            <div class="text-box">
                <div class="text-and-image">
                    <div class="info-name-adres">
                        <div class="contact-text">
                            <p class="head-text">Heeft u vragen?</p>
                            <p class="info-text">Vul dit formulier in en wij nemen contact met u op!</p>
                        </div>

                        <form class="contact-form">
                            <input class="contact-input" type="text" name="name" placeholder="Naam:">
                            <input class="contact-input" type="text" name="adres" placeholder="Adres:">
                        </form>
                    </div>

                    <img class="customer" src="assets/hendrik.jpg" alt="hendrik">
                </div>

                <form class="contact-form message-and-button">
                    <textarea class="contact-input big-input" name="message" placeholder="Bericht:" rows="5"></textarea>
                    <input type="submit" value="Versturen" class="send-btn">
                </form>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>

</body>

</html>
<script>
    let currentRecensie = 0;
    const recensie = <?= json_encode($recensies); ?>;
    const recensieCount = recensie.length;

    //Om te updaten wat d'r staat van de recensie
    function updateRecensie(index) {
        document.getElementById('recensieNaam').innerText = recensie[index].naam;
        document.getElementById('recensieOpmerking').innerText = recensie[index].opmerking;
    }

    //Function voor de < knop
    function prevRecensie() {
        if (currentRecensie != 0) {
            currentRecensie--;
        } else {
            currentRecensie = recensieCount - 1;
        }
        updateRecensie(currentRecensie);
    }

    //Function voor de > knop
    function nextRecensie() {
        if (currentRecensie != recensieCount - 1) {
            currentRecensie++;
        } else {
            currentRecensie = 0;
        }
        updateRecensie(currentRecensie);
    }

    //Om de 1e review te laten zien
    updateRecensie(currentRecensie);
</script>