-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2024 at 01:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hovenierwebshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int NOT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `photo`) VALUES
(22, 'Images/a8db60_0f63450d75f645bdab574047c56cf898_mv2.webp'),
(23, 'Images/a8db60_9f168361c12f4ad5800e1acf22f49080_mv2.jpeg'),
(24, 'Images/a8db60_41e28b52fdc8461dbe9e00368c7cf8d4_mv2.jpeg'),
(25, 'Images/a8db60_87f9493ee50244389acb45a8ed75afe4_mv2.webp'),
(26, 'Images/a8db60_379dcd1d20d04347b8fac28edbeb45c4_mv2.jpeg'),
(27, 'Images/a8db60_89729f86eabe4bf3b65d2f554cfecd6d_mv2.webp'),
(28, 'Images/a8db60_8430792b04494ef1985704c9dda7049d_mv2.webp'),
(29, 'Images/a8db60_b84128c7e416498ebd0c8972d3604240_mv2.jpeg'),
(30, 'Images/a8db60_e7ba32f754a8415588e6327b5647b8d6_mv2.webp'),
(31, 'Images/a8db60_fbe67e59c7c94339903b8a24155922f0_mv2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `recensies`
--

CREATE TABLE `recensies` (
  `id` int NOT NULL,
  `naam` varchar(200) NOT NULL,
  `opmerking` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recensies`
--

INSERT INTO `recensies` (`id`, `naam`, `opmerking`) VALUES
(4, 'Hella Hoes', '“Heel erg bedankt voor de efficiënte service, je was heel snel klaar en ik zal je nummer zeker behouden om je weer te gebruiken.”'),
(5, 'Henk Haak', '“Ga alsjeblieft door met de bezoeken aan het huis van mijn vader, want je doet geweldig werk!”'),
(6, 'Hans Hogendijk', '“Zoals u weet ben ik altijd tevreden geweest met de service die u de afgelopen jaren heeft verleend. Vertel me alstublieft wanneer u klaar bent om volgend jaar weer te beginnen met het maaien van mijn gazons, aangezien ik graag uw diensten wil blijven ontvangen.”'),
(7, 'Hugo van Heren', '“Bedankt voor de grondige opruimbeurt die u aan mijn tuin heeft uitgevoerd. De tuin is er enorm van opgeknapt en weer bruikbaar gemaakt. Nogmaals bedankt.”'),
(8, 'Helga Hagel', '“Mijn tuin was een mijn jungle voor en achter. Ik ben zo blij met het resultaat; u heeft zo hard gewerkt en alles mooi en netjes achtergelaten. Aarzel niet om mijn opmerkingen te gebruiken in toekomstige advertenties. Nogmaals bedankt voor al je harde werk en efficiëntie!”'),
(9, 'Hopke Havermout-Hoeksteen', '“We zijn erg blij met ons nieuwe dak van de schuur en het andere werk dat tot een zeer hoge standaard is voltooid. Heel erg bedankt voor uw medewerking!”');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recensies`
--
ALTER TABLE `recensies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `recensies`
--
ALTER TABLE `recensies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
