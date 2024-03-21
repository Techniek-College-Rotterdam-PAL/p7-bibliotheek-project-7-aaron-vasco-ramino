-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 mrt 2024 om 09:07
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliotheek`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`) VALUES
(1, 'admin', 'admin', 'admin@student.zadkine.nl', '$2y$10$/lIgESaVb.bNc5nA7S3GVeDgDiemI9rGZfty4wEkZaFHX8PJVuLMq'),
(2, 'admin2', 'admin2', 'admin2@student.zadkine.nl', '$2y$10$iUTFDQ06qJ3.4x1q.5XSl.dq4nrdT8TZ7YqfR91YQCbNZeJCKueji'),
(4, 'admin3', 'admin3', 'admin3@student.zadkine.nl', '$2y$10$uS1Uv6RCBltOnbI1TFJieuSWZlt529MAtqSIawqxexYIXrKpcL.GG'),
(5, 'admin4', 'admin4', 'admin4@student.zadkine.nl', '$2y$10$mchfv8tO/zzsoQ7ZND.iDOvyhN/wav/B5do3O41PjAiuwoccuHmt6'),
(6, 'admin5', 'admin5', 'admin5@student.zadkine.nl', '$2y$10$/NVWcELcnfXoNVenLPquFeAJg7fW0RMvVsS7qNC9kD/cfC4qg65Ny'),
(10, 'taco', 'vrca', '9019327@student.zadkine.nl', '$2y$10$6Me5HWLD/.sRPaVYt98LPeKJu18upAboTEUdoDQG.GZMzRNrEKNfa');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boeken`
--

CREATE TABLE `boeken` (
  `id` int(11) NOT NULL,
  `titel` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `schrijver` varchar(100) NOT NULL,
  `uitgever` varchar(100) NOT NULL,
  `boekjaar` varchar(50) NOT NULL,
  `informatie_boek` varchar(1000) NOT NULL,
  `img` varchar(100) NOT NULL,
  `beschikbaar/niet_beschikbaar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `boeken`
--

INSERT INTO `boeken` (`id`, `titel`, `isbn`, `schrijver`, `uitgever`, `boekjaar`, `informatie_boek`, `img`, `beschikbaar/niet_beschikbaar`) VALUES
(37, 'test', 'test', 'test', 'test', 'test', 'test', 'somali-forehead-ai.png', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `boeken`
--
ALTER TABLE `boeken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `boeken`
--
ALTER TABLE `boeken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
