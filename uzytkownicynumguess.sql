-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Maj 2017, 11:39
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `uzytkownicynumguess`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `daneuzytkownikow`
--

CREATE TABLE `daneuzytkownikow` (
  `ID` int(11) NOT NULL,
  `USERNAME` text COLLATE utf8_polish_ci NOT NULL,
  `PASSWORD` text COLLATE utf8_polish_ci NOT NULL,
  `REALNAME` text COLLATE utf8_polish_ci NOT NULL,
  `EMAIL` text COLLATE utf8_polish_ci NOT NULL,
  `POINTS` int(11) NOT NULL,
  `AUTOPOINTS` int(11) NOT NULL,
  `LESSRON` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `daneuzytkownikow`
--

INSERT INTO `daneuzytkownikow` (`ID`, `USERNAME`, `PASSWORD`, `REALNAME`, `EMAIL`, `POINTS`, `AUTOPOINTS`, `LESSRON`) VALUES
(1, 'admin', '$2y$10$V3L/sQUGhO8aLDuXgJzcHeXIcj65QtB/nZVYi2.ytRDeusocNQqZa', 'admin', 'admin@admin.admin', 103, 0, 0),
(2, 'DomiJustPlay', '$2y$10$2z3F5n3oGziziKL/7l12VuMhFKir1n8r9E/4x4rmhStVA7GuSaweC', 'ester_egg', 'szymanowskidominik@gmail.com', 1, 0, 0),
(3, 'starahuberta', '$2y$10$SnhUKnEH9KRMqzJYfJ.lEe6xD4C5bcnP9RdnAdK0igmLOfR0/Lhge', 'ester_egg', 'waszastara@gmail.com', 0, 0, 0),
(4, 'jhgkjhgkhjgkjgh', '$2y$10$fwywkvtc6b4Q/fNvaH5dM.2wy8Jt4wMa6N5Y.gLP.pygvD5ZV7rqe', 'ester_egg', 'lkhjlkjh@sdfsf.com', 0, 0, 0),
(5, 'lkjlkj', '$2y$10$Zv38lk1Uyy4Fnypdd4ljH.O1r4SAQFdIpOQQDPPNQGkQUVReRUzwW', 'ester_egg', 'lololo@gmail.com', 0, 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `daneuzytkownikow`
--
ALTER TABLE `daneuzytkownikow`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `daneuzytkownikow`
--
ALTER TABLE `daneuzytkownikow`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
