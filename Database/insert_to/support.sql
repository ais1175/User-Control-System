-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 23. Jan 2020 um 18:09
-- Server-Version: 10.1.41-MariaDB-0+deb9u1
-- PHP-Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `derstr1k3r`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `msg` varchar(256) NOT NULL,
  `bug` varchar(30) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `support`
--

INSERT INTO `support` (`id`, `username`, `msg`, `bug`, `posted`) VALUES
(1, 'DerStr1k3r', 'Ist nur ein Test', 'Test', '2020-01-23 13:51:32'),
(2, 'DerStr1k3r', 'Ist ein  Test und zwar der zweite.^^', 'Test2', '2020-01-23 14:12:36'),
(3, 'DerStr1k3r', 'juherl3klekl3', 'Test3', '2020-01-23 16:07:58'),
(4, 'DerStr1k3r', 'ja ja so ist das......', 'Test4', '2020-01-23 16:55:07');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
