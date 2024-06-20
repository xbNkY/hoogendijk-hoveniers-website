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
        <div class="text-box">
            <p class="head-text">Welkom bij de website van Hendrik Hogendijk, hovenier in de regio Utrecht, Zeist en de Bilt.</p>
            <p class="info-text">De tuin is een belangrijke plek van de woning, waar je het liefst zoveel mogelijk tijd in doorbrengt. Bij Hendrik Hogendijk Hoveniers vinden wij het daarom belangrijk dat iedereen zich thuis voelt in zijn of haar tuin. Ik maak de tuin onderdeel van jouw ‘thuis’, door hem volledig op jouw wensen af te stemmen.</p>
        </div>
    </div>

    <div class="text-and-slideshow">
        <div class="text-box offers-text">
            <p class="head-text">Wat bied ik aan?</p>
            <p class="info-text">Met behulp van mooie, natuurlijke en duurzame producten en materialen creëer ik een tuin, die garant staat voor een jarenlang plezierig buitenleven. Van een knusse veranda en een mooie vijver, tot een gezellig terras en een kleurrijke bloemenborder: ik stop al mijn energie erin.</p>
        </div>

        <!-- even temporary op deze manier zodat we wel zien hoe het wordt als het uiteindelijk werkt -->
        <div class="slideshow">
            <img class="arrow" src="assets/arrow-left.svg" alt="arrow-left">
            <img class="slide-img" src="assets/fotos/slide1.webp" alt="slide1">
            <img class="slide-img" src="assets/fotos/slide2.webp" alt="slide2">
            <img class="slide-img" src="assets/fotos/slide3.webp" alt="slide3">
            <img class="arrow" src="assets/arrow-right.svg" alt="arrow-right">
        </div>
    </div>

    <div style="display:flex;">
        <img class="seperator-img" src="assets/fotos/bg.jpeg" alt="seperator">
    </div>

    <div class="review-and-contact">
        <div class="reviews">
            <img class="arrow" src="assets/arrow-left.svg" alt="arrow-left">
            <div class="text-box">
                <div class="name-and-date">
                    <p class="head-text">Naam van de Klant</p>
                    <p class="info-text">01-01-2024</p>
                </div>
                <p class="info-text">Hier komen wat recensies die op de website zijn geplaatst!</p>
            </div>
            <img class="arrow" src="assets/arrow-right.svg" alt="arrow-right">
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