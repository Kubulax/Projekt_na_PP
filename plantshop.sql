-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 09, 2024 at 03:18 PM
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
-- Database: `plantshop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plants`
--

CREATE TABLE `plants` (
  `id` int(10) UNSIGNED NOT NULL,
  `plant_categoires_id` int(11) UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `description` text NOT NULL,
  `treatment` text NOT NULL,
  `image` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `plant_categoires_id`, `name`, `description`, `treatment`, `image`, `price`) VALUES
(1, 5, 'test_aloes', 'Świetna roślina, łatwa w pielęgnacji, idealna do ogrodu w pełnym słońcu!', 'Uwielbiam tę roślinę! Rośnie szybko i pięknie kwitnie wiosną.', 'flower1.jpg', 32.99),
(2, 8, 'test_dracent', '', '', 'flower2.jpg', 25.50),
(4, 2, '[value-3]', '[value-4]', '[value-5]', 'flower1.jpg', 0.00),
(5, 2, '[value-3]', '[value-4]', '[value-5]', 'flower1.jpg', 0.00),
(6, 2, '[value-3]', '[value-4]', '[value-5]', 'flower1.jpg', 0.00),
(7, 2, '[value-3]', '[value-4]', '[value-5]', 'flower1.jpg', 0.00),
(8, 2, '[value-3]', '[value-4]', '[value-5]', 'flower1.jpg', 0.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plant_categories`
--

CREATE TABLE `plant_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_categories`
--

INSERT INTO `plant_categories` (`id`, `name`) VALUES
(1, 'monster'),
(2, 'paproć'),
(3, 'palma'),
(4, 'kaktus'),
(5, 'aloes'),
(6, 'fikus'),
(7, 'storczyk'),
(8, 'dracent'),
(9, 'skrzydłokwiat'),
(10, 'drzewko szczęścia');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plant_categoires_id` (`plant_categoires_id`);

--
-- Indeksy dla tabeli `plant_categories`
--
ALTER TABLE `plant_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plant_categories`
--
ALTER TABLE `plant_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`plant_categoires_id`) REFERENCES `plant_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
