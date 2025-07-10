-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 11, 2025 alle 01:33
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
-- Struttura della tabella `campionati`
--

CREATE TABLE `campionati` (
  `ID_campionato` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Nazione` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `campionati`
--

INSERT INTO `campionati` (`ID_campionato`, `Nome`, `Nazione`) VALUES
(1, 'San Giorgio League 2025', 'Italia');

-- --------------------------------------------------------

--
-- Struttura della tabella `cont_goal`
--

CREATE TABLE `cont_goal` (
  `ID_cont_goal` int(11) NOT NULL,
  `Cod_giocatori` int(11) DEFAULT NULL,
  `Goal` int(11) DEFAULT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cont_goal`
--

INSERT INTO `cont_goal` (`ID_cont_goal`, `Cod_giocatori`, `Goal`, `Data`) VALUES
(1, 5, 1, '2025-05-13'),
(2, 6, 1, '2025-05-13'),
(3, 7, 1, '2025-05-13'),
(4, 8, 1, '2025-05-13'),
(5, 9, 1, '2025-05-13'),
(6, 10, 1, '2025-05-13'),
(7, 9, 1, '2025-05-13'),
(8, 11, 1, '2025-05-13'),
(9, 12, 1, '2025-05-13'),
(10, 13, 1, '2025-05-13'),
(11, 14, 2, '2025-05-13'),
(12, 15, 2, '2025-05-13'),
(13, 16, 1, '2025-05-13'),
(14, 17, 2, '2025-05-16'),
(15, 18, 1, '2025-05-16'),
(16, 19, 1, '2025-05-16'),
(17, 20, 1, '2025-05-16'),
(18, 12, 2, '2025-05-16'),
(19, 21, 2, '2025-05-16'),
(20, 22, 1, '2025-05-16'),
(21, 1, 4, '2025-05-16'),
(22, 23, 1, '2025-05-16'),
(23, 24, 1, '2025-05-16'),
(24, 25, 1, '2025-05-16'),
(25, 26, 1, '2025-05-20'),
(26, 27, 3, '2025-05-20'),
(27, 23, 2, '2025-05-20'),
(28, 28, 2, '2025-05-20'),
(29, 1, 2, '2025-05-20'),
(30, 29, 2, '2025-05-20'),
(31, 30, 2, '2025-05-20'),
(32, 31, 1, '2025-05-20'),
(33, 32, 1, '2025-05-20'),
(34, 33, 1, '2025-05-20'),
(35, 34, 1, '2025-05-20'),
(36, 35, 2, '2025-05-20'),
(37, 36, 1, '2025-05-20'),
(38, 37, 1, '2025-05-20'),
(39, 25, 2, '2025-05-22'),
(40, 38, 1, '2025-05-22'),
(41, 39, 1, '2025-05-22'),
(42, 27, 2, '2025-05-22'),
(43, 1, 1, '2025-05-22'),
(44, 40, 1, '2025-05-22'),
(45, 41, 1, '2025-05-22'),
(46, 0, 1, '2025-05-22'),
(47, 11, 1, '2025-05-22'),
(48, 42, 2, '2025-05-22'),
(49, 33, 1, '2025-05-22'),
(50, 43, 1, '2025-05-22'),
(51, 44, 1, '2025-05-22'),
(52, 18, 1, '2025-05-27'),
(53, 17, 1, '2025-05-27'),
(54, 0, 1, '2025-05-27'),
(55, 8, 1, '2025-05-27'),
(56, 45, 1, '2025-05-27'),
(57, 46, 1, '2025-05-27'),
(58, 9, 1, '2025-05-27'),
(59, 25, 1, '2025-05-27'),
(60, 47, 1, '2025-05-27'),
(61, 35, 1, '2025-05-27'),
(62, 37, 1, '2025-05-27'),
(63, 48, 2, '2025-05-27'),
(64, 14, 1, '2025-05-27'),
(65, 49, 1, '2025-05-27'),
(66, 28, 1, '2025-05-30'),
(67, 50, 1, '2025-05-30'),
(68, 51, 1, '2025-05-30'),
(69, 52, 1, '2025-05-30'),
(70, 53, 1, '2025-05-30'),
(71, 38, 1, '2025-05-30'),
(72, 54, 1, '2025-05-30'),
(73, 24, 1, '2025-05-30'),
(74, 25, 1, '2025-05-30'),
(75, 55, 1, '2025-05-30'),
(76, 56, 1, '2025-05-30'),
(77, 17, 1, '2025-05-30'),
(78, 57, 1, '2025-05-30'),
(79, 49, 1, '2025-05-30'),
(80, 19, 1, '2025-05-30'),
(81, 58, 1, '2025-05-30'),
(82, 33, 1, '2025-05-30'),
(83, 59, 1, '2025-06-09'),
(84, 60, 1, '2025-06-09'),
(85, 24, 1, '2025-06-09'),
(86, 61, 1, '2025-06-09'),
(87, 62, 1, '2025-06-13'),
(88, 17, 3, '2025-06-13'),
(89, 19, 1, '2025-06-13'),
(90, 63, 1, '2025-06-13'),
(91, 64, 1, '2025-06-13'),
(92, 48, 2, '2025-06-13'),
(93, 16, 1, '2025-06-13'),
(94, 47, 2, '2025-06-13'),
(95, 65, 3, '2025-06-13'),
(96, 0, 1, '2025-06-13'),
(97, 17, 3, '2025-06-24'),
(98, 24, 1, '2025-06-24'),
(99, 66, 1, '2025-06-24'),
(100, 65, 1, '2025-06-24');

-- --------------------------------------------------------

--
-- Struttura della tabella `giocatori`
--

CREATE TABLE `giocatori` (
  `ID_giocatori` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Cognome` varchar(30) DEFAULT NULL,
  `Cod_squadre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `giocatori`
--

INSERT INTO `giocatori` (`ID_giocatori`, `Nome`, `Cognome`, `Cod_squadre`) VALUES
(0, 'AUTOGOL', '', NULL),
(1, '', 'Rossini', 7),
(2, '', 'Danese', 7),
(3, '', 'Resta', 10),
(4, '', 'Ramirez', 8),
(5, '', 'Marangione', 2),
(6, '', 'Conte', 2),
(7, '', 'Mastella', 2),
(8, '', 'Memmola', 5),
(9, '', 'Villani', 9),
(10, '', 'Barivelo', 9),
(11, '', 'Castria', 10),
(12, '', 'Resta', 10),
(13, '', 'Fabiano', 3),
(14, '', 'Ferrigni', 1),
(15, '', 'Maiorino', 1),
(16, '', 'Collocolo', 1),
(17, '', 'Serafino', 3),
(18, '', 'Sibilla', 3),
(19, '', 'Quaranta', 3),
(20, '', 'Del Vecchio', 4),
(21, '', 'Demichele', 10),
(22, 'Venturuzzo', 'Venturuzzo', 10),
(23, '', 'Martucci', 7),
(24, '', 'Galatola', 8),
(25, '', 'Ramirez', 8),
(26, '', 'Ferrulli', 9),
(27, '', 'Danese', 7),
(28, '', 'D\'Elia', 7),
(29, '', 'Pappadà', 2),
(30, '', 'De Risi', 2),
(31, '', 'Palumbo', 2),
(32, '', 'Portacci', 2),
(33, '', 'Tucci', 2),
(34, '', 'Aiello', 4),
(35, '', 'Fago', 4),
(36, '', 'Dandria', 4),
(37, '', 'Palumbo', 4),
(38, '', 'Panico', 8),
(39, '', 'Turco', 7),
(40, '', 'Lupo', 7),
(41, '', 'Notaristefano', 6),
(42, '', 'Smaltini', 2),
(43, '', 'Sibilla', 1),
(44, '', 'Marcucci', 1),
(45, '', 'Cassano', 5),
(46, '', 'Tursi', 9),
(47, '', 'Marinelli', 8),
(48, '', 'Basile', 1),
(49, '', 'Galeandro', 1),
(50, '', 'Ciniero', 7),
(51, '', 'Cazzetta', 6),
(52, '', 'Marius \n', 6),
(53, '', 'Stante', 6),
(54, '', 'Giaracuni', 8),
(55, '', 'Marotta', 10),
(56, '', 'Russo', 10),
(57, '', 'Martina', 3),
(58, '', 'Turi', 2),
(59, '', 'Girardi', 3),
(60, '', 'Padovano', 8),
(61, '', 'Di Pietro', 1),
(62, '', 'Alota', 6),
(63, '', 'Patronelli', 3),
(64, '', 'Secondo', 3),
(65, '', 'Borgo', 8),
(66, '', 'Lippo', 8),
(67, 'Angelo', 'La Fortezza', 8),
(68, 'Marco', 'Albano', 8),
(69, 'Paolo', 'Serafino', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `giornate`
--

CREATE TABLE `giornate` (
  `ID_giornata` int(11) NOT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Cod_campionato` int(11) DEFAULT NULL,
  `Data_inizio` date DEFAULT NULL,
  `Data_fine` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `giornate`
--

INSERT INTO `giornate` (`ID_giornata`, `Numero`, `Cod_campionato`, `Data_inizio`, `Data_fine`) VALUES
(1, 1, 1, '2025-05-13', '2025-05-13'),
(2, 2, 1, '2025-05-16', '2025-05-16'),
(3, 3, 1, '2025-05-20', '2025-05-20'),
(4, 4, 1, '2025-05-22', '2025-05-22'),
(5, 5, 1, '2025-05-27', '2025-05-27'),
(6, 6, 1, '2025-05-30', '2025-05-30'),
(7, 7, 1, '2025-06-03', '2025-06-03'),
(8, 8, 1, '2025-06-05', '2025-06-05'),
(9, 9, 1, '2025-06-09', '2025-06-09'),
(10, 10, 1, '2025-06-13', '2025-07-13'),
(11, 11, 1, '2025-06-24', '2025-07-24');

-- --------------------------------------------------------

--
-- Struttura della tabella `partite`
--

CREATE TABLE `partite` (
  `ID_partita` int(11) NOT NULL,
  `Cod_giornata` int(11) DEFAULT NULL,
  `Squadra_casa` int(11) DEFAULT NULL,
  `Squadra_ospite` int(11) DEFAULT NULL,
  `Gol_casa` int(11) DEFAULT NULL,
  `Gol_ospite` int(11) DEFAULT NULL,
  `Data` datetime DEFAULT NULL,
  `Stato` enum('da giocare','in corso','terminata') DEFAULT 'da giocare'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `partite`
--

INSERT INTO `partite` (`ID_partita`, `Cod_giornata`, `Squadra_casa`, `Squadra_ospite`, `Gol_casa`, `Gol_ospite`, `Data`, `Stato`) VALUES
(1, 1, 2, 5, 3, 1, '2025-05-13 00:00:00', 'terminata'),
(2, 1, 9, 10, 3, 2, '2025-05-13 00:00:00', 'terminata'),
(3, 1, 3, 1, 1, 5, '2025-05-13 00:00:00', 'terminata'),
(4, 2, 3, 4, 4, 1, '2025-05-16 00:00:00', 'terminata'),
(5, 2, 10, 7, 5, 5, '2025-05-16 00:00:00', 'terminata'),
(6, 2, 6, 8, 0, 2, '2025-05-16 00:00:00', 'terminata'),
(7, 3, 9, 7, 1, 9, '2025-05-20 00:00:00', 'terminata'),
(8, 3, 2, 4, 7, 5, '2025-05-20 00:00:00', 'terminata'),
(9, 3, 5, 1, 0, 3, '2025-05-20 00:00:00', 'terminata'),
(10, 4, 8, 7, 3, 5, '2025-05-22 00:00:00', 'terminata'),
(11, 4, 6, 10, 2, 1, '2025-05-22 00:00:00', 'terminata'),
(12, 4, 2, 1, 3, 2, '2025-05-22 00:00:00', 'terminata'),
(13, 5, 3, 5, 3, 2, '2025-05-27 00:00:00', 'terminata'),
(14, 5, 9, 8, 2, 2, '2025-05-27 00:00:00', 'terminata'),
(15, 5, 4, 1, 2, 4, '2025-05-27 00:00:00', 'terminata'),
(16, 6, 7, 6, 2, 3, '2025-05-30 00:00:00', 'terminata'),
(17, 6, 8, 10, 4, 2, '2025-05-30 00:00:00', 'terminata'),
(18, 6, 3, 2, 4, 2, '2025-05-30 00:00:00', 'terminata'),
(19, 7, 5, 4, 2, 3, '2025-06-09 00:00:00', 'terminata'),
(20, 7, 9, 6, 1, 4, '2025-06-09 00:00:00', 'terminata'),
(21, 8, 3, 7, 4, 2, '2025-06-24 00:00:00', 'terminata'),
(22, 8, 1, 9, 3, 0, '2025-06-24 00:00:00', 'terminata'),
(23, 8, 8, 2, 4, 1, '2025-06-24 00:00:00', 'terminata'),
(24, 8, 4, 6, 4, 5, '2025-06-24 00:00:00', 'terminata'),
(25, 9, 3, 6, 1, 0, '2025-06-09 00:44:22', 'terminata'),
(26, 9, 8, 1, 2, 1, '2025-06-09 00:44:22', 'terminata'),
(27, 10, 6, 3, 1, 6, '2025-06-13 01:16:07', 'terminata'),
(28, 10, 1, 8, 3, 6, '2025-06-13 01:16:07', 'terminata'),
(29, 11, 3, 8, 3, 3, '2025-07-24 01:18:29', 'terminata');

-- --------------------------------------------------------

--
-- Struttura della tabella `premi`
--

CREATE TABLE `premi` (
  `ID_premio` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Cod_giocatore` int(11) DEFAULT NULL,
  `Cod_squadra` int(11) DEFAULT NULL,
  `Stagione` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `premi`
--

INSERT INTO `premi` (`ID_premio`, `Tipo`, `Cod_giocatore`, `Cod_squadra`, `Stagione`) VALUES
(1, 'Miglior portiere', 67, 8, '2025'),
(2, 'Miglior giocatore', 68, 8, '2025'),
(3, 'Capocannoniere', 69, 3, '2025');

-- --------------------------------------------------------

--
-- Struttura della tabella `presidenti`
--

CREATE TABLE `presidenti` (
  `ID_presidenti` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Cognome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `squadre`
--

CREATE TABLE `squadre` (
  `ID_squadre` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `immagini_loghi` varchar(30) NOT NULL,
  `Città` varchar(30) DEFAULT NULL,
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

INSERT INTO `squadre` (`ID_squadre`, `Nome`, `immagini_loghi`, `Città`, `Cod_presidenti`, `Cod_campionato`, `PT`, `G`, `V`, `N`, `P`, `DR`, `Girone`) VALUES
(1, 'LONGOBARDA', 'Longobarda.png', '---', NULL, 1, 9, 4, 3, 0, 1, 8, 'A'),
(2, 'LUCKY SQUAD', 'Luky_squad.png', '---', NULL, 1, 9, 4, 3, 0, 1, 3, 'A'),
(3, 'SAN GIORGIO', 'Beauty_car_autolavaggio.png', '---', NULL, 1, 9, 4, 3, 0, 1, 6, 'A'),
(4, 'OLYMPIACOZZ', 'Olimpiacozz.png', '---', NULL, 1, 3, 4, 1, 0, 3, -6, 'A'),
(5, 'CAROSINO', 'Carosino_ASD.png', '---', NULL, 1, 0, 4, 0, 0, 4, -7, 'A'),
(6, 'B.G.MANAGER', 'BG_menager.png', '---', NULL, 1, 9, 4, 3, 0, 1, 3, 'B'),
(7, '74023 FC', 'FootballClub.png', '---', NULL, 1, 7, 4, 2, 1, 1, 9, 'B'),
(8, 'AL BARETTO', 'Al_baretto_da_nico.png', '---', NULL, 1, 7, 4, 2, 1, 1, 1, 'B'),
(9, 'BLACKROSE', 'BlaskRoseFC.png', '---', NULL, 1, 4, 4, 1, 1, 2, -10, 'B'),
(10, 'CORTO MUSO', 'Ac_corto_muso.png', '---', NULL, 1, 1, 3, 0, 1, 2, -2, 'B');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `campionati`
--
ALTER TABLE `campionati`
  ADD PRIMARY KEY (`ID_campionato`);

--
-- Indici per le tabelle `cont_goal`
--
ALTER TABLE `cont_goal`
  ADD PRIMARY KEY (`ID_cont_goal`),
  ADD KEY `Cod_giocatori` (`Cod_giocatori`);

--
-- Indici per le tabelle `giocatori`
--
ALTER TABLE `giocatori`
  ADD PRIMARY KEY (`ID_giocatori`),
  ADD KEY `Cod_squadre` (`Cod_squadre`);

--
-- Indici per le tabelle `giornate`
--
ALTER TABLE `giornate`
  ADD PRIMARY KEY (`ID_giornata`),
  ADD KEY `Cod_campionato` (`Cod_campionato`);

--
-- Indici per le tabelle `partite`
--
ALTER TABLE `partite`
  ADD PRIMARY KEY (`ID_partita`),
  ADD KEY `Cod_giornata` (`Cod_giornata`),
  ADD KEY `Squadra_casa` (`Squadra_casa`),
  ADD KEY `Squadra_ospite` (`Squadra_ospite`);

--
-- Indici per le tabelle `premi`
--
ALTER TABLE `premi`
  ADD PRIMARY KEY (`ID_premio`),
  ADD KEY `Cod_giocatore` (`Cod_giocatore`),
  ADD KEY `Cod_squadra` (`Cod_squadra`);

--
-- Indici per le tabelle `presidenti`
--
ALTER TABLE `presidenti`
  ADD PRIMARY KEY (`ID_presidenti`);

--
-- Indici per le tabelle `squadre`
--
ALTER TABLE `squadre`
  ADD PRIMARY KEY (`ID_squadre`),
  ADD KEY `Cod_presidenti` (`Cod_presidenti`),
  ADD KEY `Cod_campionato` (`Cod_campionato`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `premi`
--
ALTER TABLE `premi`
  MODIFY `ID_premio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cont_goal`
--
ALTER TABLE `cont_goal`
  ADD CONSTRAINT `cont_goal_ibfk_1` FOREIGN KEY (`Cod_giocatori`) REFERENCES `giocatori` (`ID_giocatori`);

--
-- Limiti per la tabella `giocatori`
--
ALTER TABLE `giocatori`
  ADD CONSTRAINT `giocatori_ibfk_1` FOREIGN KEY (`Cod_squadre`) REFERENCES `squadre` (`ID_squadre`);

--
-- Limiti per la tabella `giornate`
--
ALTER TABLE `giornate`
  ADD CONSTRAINT `giornate_ibfk_1` FOREIGN KEY (`Cod_campionato`) REFERENCES `campionati` (`ID_campionato`);

--
-- Limiti per la tabella `partite`
--
ALTER TABLE `partite`
  ADD CONSTRAINT `partite_ibfk_1` FOREIGN KEY (`Cod_giornata`) REFERENCES `giornate` (`ID_giornata`),
  ADD CONSTRAINT `partite_ibfk_2` FOREIGN KEY (`Squadra_casa`) REFERENCES `squadre` (`ID_squadre`),
  ADD CONSTRAINT `partite_ibfk_3` FOREIGN KEY (`Squadra_ospite`) REFERENCES `squadre` (`ID_squadre`);

--
-- Limiti per la tabella `premi`
--
ALTER TABLE `premi`
  ADD CONSTRAINT `premi_ibfk_1` FOREIGN KEY (`Cod_giocatore`) REFERENCES `giocatori` (`ID_giocatori`),
  ADD CONSTRAINT `premi_ibfk_2` FOREIGN KEY (`Cod_squadra`) REFERENCES `squadre` (`ID_squadre`);

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
