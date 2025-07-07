-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 04, 2025 alle 02:17
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
(1, 1, 7, '2025-06-15'),
(2, 2, 5, '2025-06-15'),
(3, 3, 3, '2025-06-15'),
(4, 4, 3, '2025-06-15');

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
(1, 'Rossini', '', 7),
(2, 'Danese', '', 7),
(3, 'Resta', '', 10),
(4, 'Ramirez', '', 8);

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

INSERT INTO `squadre` (`ID_squadre`, `Nome`, `Città`, `Cod_presidenti`, `Cod_campionato`, `PT`, `G`, `V`, `N`, `P`, `DR`, `Girone`) VALUES
(1, 'LONGOBARDA', '---', NULL, 1, 9, 4, 3, 0, 1, 8, 'A'),
(2, 'LUCKY SQUAD', '---', NULL, 1, 9, 4, 3, 0, 1, 3, 'A'),
(3, 'SAN GIORGIO', '---', NULL, 1, 9, 4, 3, 0, 1, 6, 'A'),
(4, 'OLYMPIACOZZ', '---', NULL, 1, 3, 4, 1, 0, 3, -6, 'A'),
(5, 'CAROSINO', '---', NULL, 1, 0, 4, 0, 0, 4, -7, 'A'),
(6, 'B.G.MANAGER', '---', NULL, 1, 9, 4, 3, 0, 1, 3, 'B'),
(7, '74023 FC', '---', NULL, 1, 7, 4, 2, 1, 1, 9, 'B'),
(8, 'AL BARETTO', '---', NULL, 1, 7, 4, 2, 1, 1, 1, 'B'),
(9, 'BLACKROSE', '---', NULL, 1, 4, 4, 1, 1, 2, -10, 'B'),
(10, 'CORTO MUSO', '---', NULL, 1, 1, 4, 0, 1, 3, -2, 'B');

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
-- Limiti per la tabella `squadre`
--
ALTER TABLE `squadre`
  ADD CONSTRAINT `squadre_ibfk_1` FOREIGN KEY (`Cod_presidenti`) REFERENCES `presidenti` (`ID_presidenti`),
  ADD CONSTRAINT `squadre_ibfk_2` FOREIGN KEY (`Cod_campionato`) REFERENCES `campionati` (`ID_campionato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
