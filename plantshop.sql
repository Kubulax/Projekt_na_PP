-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Lis 2024, 06:52
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `plantshop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password_hash` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`admin_id`, `login`, `password_hash`) VALUES
(1, 'admin', '$2y$10$VGuHgbwIBv6Y2Lh9xdoyiO/ZqTuL.4hHe1KLyVw8Oz4oQ6wqym0Ky');

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
  `image` text NOT NULL DEFAULT 'null.png',
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `plants`
--

INSERT INTO `plants` (`id`, `plant_categoires_id`, `name`, `description`, `treatment`, `image`, `price`) VALUES
(1, 1, 'test_aloe', 'Świetna roślina, łatwa w pielęgnacji, idealna do ogrodu w pełnym słońcu!', 'Uwielbiam tę roślinę! Rośnie szybko i pięknie kwitnie wiosną.', 'null.png', '32.99'),
(2, 1, 'test_dracent', '', 'A', 'plant_673563d95d86a.jfif', '25.50'),
(13, 1, 'test_aloe', 'A', 'A', 'plant_67356cd232657.jfif', '102.00'),
(14, 2, 'test_aloes', 'a', 'a', 'plant_67357322e28df.jfif', '200.00'),
(15, 3, 'test_dracent', 'AA', 'AA', 'plant_673573f3a4d0e.jpg', '5.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plant_categories`
--

CREATE TABLE `plant_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `plant_categories`
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
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `plant_categories`
--
ALTER TABLE `plant_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
