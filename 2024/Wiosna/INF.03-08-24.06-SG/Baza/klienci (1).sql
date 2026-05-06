-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 06, 2026 at 11:13 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klienci`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `id` int(10) UNSIGNED NOT NULL,
  `Osoby_id` int(10) UNSIGNED NOT NULL,
  `ulica` text DEFAULT NULL,
  `numer` int(10) UNSIGNED DEFAULT NULL,
  `numerMieszkania` int(11) DEFAULT NULL,
  `miasto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adresy`
--

INSERT INTO `adresy` (`id`, `Osoby_id`, `ulica`, `numer`, `numerMieszkania`, `miasto`) VALUES
(1, 1, 'Mickiewicza', 54, NULL, 'Poznań'),
(2, 1, 'Sienkiewicza', 124, NULL, 'Poznań'),
(3, 2, 'Zielona', 14, NULL, 'Kraków'),
(4, 3, 'Swobodna', 134, NULL, 'Wrocław'),
(5, 4, 'Traugutta', 14, NULL, 'Warszawa'),
(6, 4, 'Olimpijska', 124, NULL, 'Warszawa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoby`
--

CREATE TABLE `osoby` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` text DEFAULT NULL,
  `nazwisko` text DEFAULT NULL,
  `dataUr` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `osoby`
--

INSERT INTO `osoby` (`id`, `imie`, `nazwisko`, `dataUr`) VALUES
(1, 'Anna', 'Kowalewska', '2002-11-02'),
(2, 'Ewa', 'Kowalska', '2002-06-02'),
(3, 'Andrzej', 'Nowak', '2001-03-02'),
(4, 'Grzegorz', 'Wojciechowski', '1975-11-02'),
(5, 'Joanna', 'Nowakowska', '1986-02-02'),
(6, 'Anna', 'Nowak', '1974-11-02'),
(7, 'Piotr', 'Wiśniewski', '1975-01-02');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `telefony`
--

CREATE TABLE `telefony` (
  `id` int(10) UNSIGNED NOT NULL,
  `Osoby_id` int(10) UNSIGNED NOT NULL,
  `numer` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telefony`
--

INSERT INTO `telefony` (`id`, `Osoby_id`, `numer`) VALUES
(1, 1, '111222333'),
(2, 1, '223344556'),
(3, 3, '222333444'),
(4, 2, '333444555'),
(5, 4, '444555666'),
(6, 5, '666665555'),
(7, 6, '223344555'),
(8, 6, '123456789'),
(9, 7, '987654321');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Adresy_FKIndex1` (`Osoby_id`);

--
-- Indeksy dla tabeli `osoby`
--
ALTER TABLE `osoby`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `telefony`
--
ALTER TABLE `telefony`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Telefony_FKIndex1` (`Osoby_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresy`
--
ALTER TABLE `adresy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `osoby`
--
ALTER TABLE `osoby`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `telefony`
--
ALTER TABLE `telefony`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
