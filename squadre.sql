-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 15, 2025 alle 03:53
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sangiorgioleague`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `squadre`
--

CREATE TABLE `squadre` (
  `ID_squadre` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `immagini_loghi` varchar(30) NOT NULL,
  `Cod_presidenti` int(11) DEFAULT NULL,
  `Cod_campionato` int(11) DEFAULT NULL,
  `PT` int(11) DEFAULT 0,
  `G` int(11) DEFAULT 0,
  `V` int(11) DEFAULT 0,
  `N` int(11) DEFAULT 0,
  `P` int(11) DEFAULT 0,
  `DR` int(11) DEFAULT 0,
  `Girone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `squadre`
--

INSERT INTO `squadre` (`ID_squadre`, `Nome`, `immagini_loghi`, `Cod_presidenti`, `Cod_campionato`, `PT`, `G`, `V`, `N`, `P`, `DR`, `Girone`) VALUES
(1, 'LONGOBARDA', 'Longobarda.png', NULL, 1, 9, 4, 3, 0, 1, 8, 'A'),
(2, 'LUCKY SQUAD', 'Luky_squad.png', NULL, 1, 9, 4, 3, 0, 1, 3, 'A'),
(3, 'SAN GIORGIO', 'Beauty_car_autolavaggio.png', NULL, 1, 9, 4, 3, 0, 1, 6, 'A'),
(4, 'OLYMPIACOZZ', 'Olimpiacozz.png', NULL, 1, 3, 4, 1, 0, 3, -6, 'A'),
(5, 'CAROSINO', 'Carosino_ASD.png', NULL, 1, 0, 4, 0, 0, 4, -7, 'A'),
(6, 'B.G.MANAGER', 'BG_menager.png', NULL, 1, 9, 4, 3, 0, 1, 3, 'B'),
(7, '74023 FC', 'FootballClub.png', NULL, 1, 7, 4, 2, 1, 1, 9, 'B'),
(8, 'AL BARETTO', 'Al_baretto_da_nico.png', NULL, 1, 7, 4, 2, 1, 1, 1, 'B'),
(9, 'BLACKROSE', 'BlaskRoseFC.png', NULL, 1, 4, 4, 1, 1, 2, -10, 'B'),
(10, 'CORTO MUSO', 'Ac_corto_muso.png', NULL, 1, 1, 3, 0, 1, 2, -2, 'B'),
(11, 'F.C. KIRICOCHO', 'Fc_kiricocho.jpg', 1, 2, 0, 0, 0, 0, 0, 0, 'B'),
(12, 'Coffee world', 'Coffe_world.jpg', 2, 2, 0, 0, 0, 0, 0, 0, 'A'),
(13, 'King-REX', 'King_REX.png', 3, 2, 0, 0, 0, 0, 0, 0, 'A'),
(14, 'Seleção x Autoscuola di cuia', 'SeleçãoxAutoscuola.jpg', 4, 2, 0, 0, 0, 0, 0, 0, 'B'),
(15, 'B.G.manager', 'BG_menager.png', 5, 2, 0, 0, 0, 0, 0, 0, 'B'),
(16, 'IL GRILLO FC ', 'Grillo_fc.png', 6, 2, 0, 0, 0, 0, 0, 0, 'A'),
(17, 'Autolavaggio beautycar', 'Beauty_car.jpg', 7, 2, 0, 0, 0, 0, 0, 0, 'A');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `squadre`
--
ALTER TABLE `squadre`
  ADD PRIMARY KEY (`ID_squadre`),
  ADD KEY `Cod_presidenti` (`Cod_presidenti`),
  ADD KEY `Cod_campionato` (`Cod_campionato`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `squadre`
--
ALTER TABLE `squadre`
  ADD CONSTRAINT `squadre_ibfk_1` FOREIGN KEY (`Cod_presidenti`) REFERENCES `presidenti` (`ID_presidenti`),
  ADD CONSTRAINT `squadre_ibfk_2` FOREIGN KEY (`Cod_campionato`) REFERENCES `campionati` (`ID_campionato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
