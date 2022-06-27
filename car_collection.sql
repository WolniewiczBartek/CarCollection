-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Cze 2022, 21:06
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `car_collection`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `production_year` int(11) NOT NULL,
  `horse_power` int(11) NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `car`
--

INSERT INTO `car` (`id`, `brand`, `model`, `production_year`, `horse_power`, `image_path`, `description`) VALUES
(1, 'Ford', 'Mondeo MK5', 2015, 200, '/uploads/62b0b3f872d35.jpg', 'This is Ford Mondeo MK5 description.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam lacus. Cras fermentum quam id nunc hendrerit, id accumsan ligula semper. Ut finibus eget urna eget commodo. Sed dolor elit, sollicitudin vitae dapibus egestas, rhoncus quis felis. Praesent lorem lectus, commodo sed efficitur sit amet, mollis et est. Vestibulum bibendum, nisi et laoreet dictum, est diam rutrum mauris, non laoreet metus urna a magna. Etiam consectetur dolor diam, rutrum euismod urna molestie id. Donec in metus.'),
(2, 'Mazda', 'CX5', 2010, 150, 'https://cdn.pixabay.com/photo/2022/04/01/10/05/traffic-7104467_960_720.jpg', 'This is Mazda CX5 description.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam lacus. Cras fermentum quam id nunc hendrerit, id accumsan ligula semper. Ut finibus eget urna eget commodo. Sed dolor elit, sollicitudin vitae dapibus egestas, rhoncus quis felis. Praesent lorem lectus, commodo sed efficitur sit amet, mollis et est. Vestibulum bibendum, nisi et laoreet dictum, est diam rutrum mauris, non laoreet metus urna a magna. Etiam consectetur dolor diam, rutrum euismod urna molestie id. Donec in metus.'),
(3, 'BMW', 'X5', 2022, 450, '/uploads/62b0a61cb2482.jpg', 'This is BMW X5 description.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam lacus. Cras fermentum quam id nunc hendrerit, id accumsan ligula semper. Ut finibus eget urna eget commodo. Sed dolor elit, sollicitudin vitae dapibus egestas, rhoncus quis felis. Praesent lorem lectus, commodo sed efficitur sit amet, mollis et est. Vestibulum bibendum, nisi et laoreet dictum, est diam rutrum mauris, non laoreet metus urna a magna. Etiam consectetur dolor diam, rutrum euismod urna molestie id. Donec in metus.'),
(5, 'Marcedes-Benz', 'SL 63', 2022, 505, '/uploads/62b0b72b51912.jpg', 'This is Mercedes-Benz SL 63 description.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam lacus. Cras fermentum quam id nunc hendrerit, id accumsan ligula semper. Ut finibus eget urna eget commodo. Sed dolor elit, sollicitudin vitae dapibus egestas, rhoncus quis felis. Praesent lorem lectus, commodo sed efficitur sit amet, mollis et est. Vestibulum bibendum, nisi et laoreet dictum, est diam rutrum mauris, non laoreet metus urna a magna. Etiam consectetur dolor diam, rutrum euismod urna molestie id. Donec in metus.'),
(7, 'Volkswagen', 'Arteon', 2020, 200, '/uploads/62b31ec2b88d6.jpg', 'This is Volkswagen Arteon description.'),
(9, 'Porsche', '911', 2015, 350, '/uploads/62b33c5faba68.jpg', 'This is Porsche 911 description.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220608120900', '2022-06-08 17:22:07', 153),
('DoctrineMigrations\\Version20220608155919', '2022-06-08 18:00:45', 28),
('DoctrineMigrations\\Version20220622104249', '2022-06-22 12:42:58', 42),
('DoctrineMigrations\\Version20220622111805', '2022-06-22 13:18:16', 41),
('DoctrineMigrations\\Version20220622113229', '2022-06-22 13:32:35', 106);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`) VALUES
(1, 'admin@admin.com', '[]', '$2y$13$.VT9QiQc5H83a9n20EGQZuYuBFx/8lhdvzIMitjlS9iaef66TibcG', 'Admin', 'Adminov'),
(2, 'user@gmail.com', '[]', '$2y$13$TawPQUiKs1mCNc1bRhk1UOdESJifgR7P2HZFdrDov5SJc8xVmJxCe', 'User', 'Userov');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_car`
--

CREATE TABLE `user_car` (
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `user_car`
--

INSERT INTO `user_car` (`user_id`, `car_id`) VALUES
(1, 9),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 7);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indeksy dla tabeli `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indeksy dla tabeli `user_car`
--
ALTER TABLE `user_car`
  ADD PRIMARY KEY (`user_id`,`car_id`),
  ADD KEY `IDX_9C2B8716A76ED395` (`user_id`),
  ADD KEY `IDX_9C2B8716C3C6F69F` (`car_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `user_car`
--
ALTER TABLE `user_car`
  ADD CONSTRAINT `FK_9C2B8716A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9C2B8716C3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
