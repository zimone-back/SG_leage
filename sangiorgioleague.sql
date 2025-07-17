-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 17, 2025 alle 04:11
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
(1, 'San Giorgio League 2025', 'Italia'),
(2, 'San Giorgio Kings League 2025', 'italia');

-- --------------------------------------------------------

--
-- Struttura della tabella `cont_goal`
--

CREATE TABLE `cont_goal` (
  `ID_cont_goal` int(11) NOT NULL,
  `Cod_giocatori` int(11) DEFAULT NULL,
  `Goal` int(11) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Cod_campionato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cont_goal`
--

INSERT INTO `cont_goal` (`ID_cont_goal`, `Cod_giocatori`, `Goal`, `Data`, `Cod_campionato`) VALUES
(1, 5, 1, '2025-05-13', 1),
(2, 6, 1, '2025-05-13', 1),
(3, 7, 1, '2025-05-13', 1),
(4, 8, 1, '2025-05-13', 1),
(5, 9, 1, '2025-05-13', 1),
(6, 10, 1, '2025-05-13', 1),
(7, 9, 1, '2025-05-13', 1),
(8, 11, 1, '2025-05-13', 1),
(9, 12, 1, '2025-05-13', 1),
(10, 13, 1, '2025-05-13', 1),
(11, 14, 2, '2025-05-13', 1),
(12, 15, 2, '2025-05-13', 1),
(13, 16, 1, '2025-05-13', 1),
(14, 17, 2, '2025-05-16', 1),
(15, 18, 1, '2025-05-16', 1),
(16, 19, 1, '2025-05-16', 1),
(17, 20, 1, '2025-05-16', 1),
(18, 12, 2, '2025-05-16', 1),
(19, 21, 2, '2025-05-16', 1),
(20, 22, 1, '2025-05-16', 1),
(21, 1, 4, '2025-05-16', 1),
(22, 23, 1, '2025-05-16', 1),
(23, 24, 1, '2025-05-16', 1),
(24, 25, 1, '2025-05-16', 1),
(25, 26, 1, '2025-05-20', 1),
(26, 27, 3, '2025-05-20', 1),
(27, 23, 2, '2025-05-20', 1),
(28, 28, 2, '2025-05-20', 1),
(29, 1, 2, '2025-05-20', 1),
(30, 29, 2, '2025-05-20', 1),
(31, 30, 2, '2025-05-20', 1),
(32, 31, 1, '2025-05-20', 1),
(33, 32, 1, '2025-05-20', 1),
(34, 33, 1, '2025-05-20', 1),
(35, 34, 1, '2025-05-20', 1),
(36, 35, 2, '2025-05-20', 1),
(37, 36, 1, '2025-05-20', 1),
(38, 37, 1, '2025-05-20', 1),
(39, 25, 2, '2025-05-22', 1),
(40, 38, 1, '2025-05-22', 1),
(41, 39, 1, '2025-05-22', 1),
(42, 27, 2, '2025-05-22', 1),
(43, 1, 1, '2025-05-22', 1),
(44, 40, 1, '2025-05-22', 1),
(45, 41, 1, '2025-05-22', 1),
(46, 0, 1, '2025-05-22', NULL),
(47, 11, 1, '2025-05-22', 1),
(48, 42, 2, '2025-05-22', 1),
(49, 33, 1, '2025-05-22', 1),
(50, 43, 1, '2025-05-22', 1),
(51, 44, 1, '2025-05-22', 1),
(52, 18, 1, '2025-05-27', 1),
(53, 17, 1, '2025-05-27', 1),
(54, 0, 1, '2025-05-27', NULL),
(55, 8, 1, '2025-05-27', 1),
(56, 45, 1, '2025-05-27', 1),
(57, 46, 1, '2025-05-27', 1),
(58, 9, 1, '2025-05-27', 1),
(59, 25, 1, '2025-05-27', 1),
(60, 47, 1, '2025-05-27', 1),
(61, 35, 1, '2025-05-27', 1),
(62, 37, 1, '2025-05-27', 1),
(63, 48, 2, '2025-05-27', 1),
(64, 14, 1, '2025-05-27', 1),
(65, 49, 1, '2025-05-27', 1),
(66, 28, 1, '2025-05-30', 1),
(67, 50, 1, '2025-05-30', 1),
(68, 51, 1, '2025-05-30', 1),
(69, 52, 1, '2025-05-30', 1),
(70, 53, 1, '2025-05-30', 1),
(71, 38, 1, '2025-05-30', 1),
(72, 54, 1, '2025-05-30', 1),
(73, 24, 1, '2025-05-30', 1),
(74, 25, 1, '2025-05-30', 1),
(75, 55, 1, '2025-05-30', 1),
(76, 56, 1, '2025-05-30', 1),
(77, 17, 1, '2025-05-30', 1),
(78, 57, 1, '2025-05-30', 1),
(79, 49, 1, '2025-05-30', 1),
(80, 19, 1, '2025-05-30', 1),
(81, 58, 1, '2025-05-30', 1),
(82, 33, 1, '2025-05-30', 1),
(83, 59, 1, '2025-06-09', 1),
(84, 60, 1, '2025-06-09', 1),
(85, 24, 1, '2025-06-09', 1),
(86, 61, 1, '2025-06-09', 1),
(87, 62, 1, '2025-06-13', 1),
(88, 17, 3, '2025-06-13', 1),
(89, 19, 1, '2025-06-13', 1),
(90, 63, 1, '2025-06-13', 1),
(91, 64, 1, '2025-06-13', 1),
(92, 48, 2, '2025-06-13', 1),
(93, 16, 1, '2025-06-13', 1),
(94, 47, 2, '2025-06-13', 1),
(95, 65, 3, '2025-06-13', 1),
(96, 0, 1, '2025-06-13', NULL),
(97, 17, 3, '2025-06-24', 1),
(98, 24, 1, '2025-06-24', 1),
(99, 66, 1, '2025-06-24', 1),
(100, 65, 1, '2025-06-24', 1),
(101, 85, 4, '2025-07-14', 2),
(102, 3, 1, '2025-07-14', 2),
(103, 70, 6, '2025-07-14', 2),
(104, 71, 1, '2025-07-14', 2),
(105, 86, 3, '2025-07-14', 2),
(106, 2, 1, '2025-07-14', 2),
(107, 72, 1, '2025-07-14', 2),
(108, 73, 1, '2025-07-14', 2),
(109, 74, 2, '2025-07-14', 2),
(110, 75, 1, '2025-07-14', 2),
(111, 76, 1, '2025-07-14', 2),
(112, 77, 4, '2025-07-14', 2),
(113, 87, 1, '2025-07-14', 2),
(114, 78, 7, '2025-07-14', 2),
(115, 79, 1, '2025-07-14', 2),
(116, 80, 1, '2025-07-14', 2),
(117, 81, 2, '2025-07-14', 2),
(118, 82, 1, '2025-07-14', 2),
(119, 83, 1, '2025-07-14', 2),
(120, 84, 1, '2025-07-14', 2),
(121, 88, 1, '2025-07-16', 2),
(122, 89, 1, '2025-07-16', 2),
(123, 90, 2, '2025-07-16', 2),
(124, 92, 2, '2025-07-16', 2),
(125, 93, 1, '2025-07-16', 2),
(126, 94, 2, '2025-07-16', 2),
(127, 95, 2, '2025-07-16', 2),
(128, 96, 1, '2025-07-16', 2),
(129, 97, 1, '2025-07-16', 2),
(130, 98, 2, '2025-07-16', 2),
(131, 99, 3, '2025-07-16', 2),
(132, 100, 1, '2025-07-16', 2);

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
(22, '', 'Venturuzzo', 10),
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
(69, 'Paolo', 'Serafino', 3),
(70, 'Caricasulo', '', 17),
(71, 'Salvatore', 'Vecchio', 17),
(72, 'Luca', 'De Giorgio', 12),
(73, 'Nicolò', 'Lippo', 12),
(74, 'Mattia', 'Lippo', 12),
(75, 'Gabriele', 'Villa', 12),
(76, 'Alessandro', 'Gravina', 12),
(77, 'Simone', 'Serio', 12),
(78, 'Cosimo', 'Pompamea', 12),
(79, 'Tony', 'Pietanza', 16),
(80, 'Cosimo', 'Venneri', 16),
(81, 'Andrea', 'Cavallo', 16),
(82, 'Giorgio', 'De Cicco', 16),
(83, 'Davide', 'Guarino', 16),
(84, 'Daniele', 'Rizzo', 16),
(85, 'Raffaele', 'Memmola', 13),
(86, 'Filippo', 'Galatola', 12),
(87, 'Francesco', 'Giaracuni', 12),
(88, 'Alessio', 'sperti', 15),
(89, 'Adriano ', ' Ventimiglia ', 15),
(90, 'Angelo ', 'Tresolini', 14),
(91, 'Gianmarco', 'Dell\'Anna', 14),
(92, 'Gianmarco ', 'Ramirez', 14),
(93, 'Doro', ' Tonio ', 14),
(94, 'Gianni ', 'Maiorino', 18),
(95, 'Francesco', 'Portacci', 18),
(96, 'Nazareno ', 'Pappadà', 18),
(97, 'Antonio', 'Sebastio', 18),
(98, 'Francesco ', 'Palumbo', 18),
(99, 'Jason', 'Carrozzo ', 11),
(100, 'Piergianni ', 'Santoro ', 11);

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
(11, 11, 1, '2025-06-24', '2025-07-24'),
(12, 1, 2, '2025-07-14', '2025-07-14'),
(13, 2, 2, '2025-07-16', '2025-07-16');

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
  `Stato` enum('da giocare','in corso','terminata') DEFAULT 'da giocare',
  `Cod_campionato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `partite`
--

INSERT INTO `partite` (`ID_partita`, `Cod_giornata`, `Squadra_casa`, `Squadra_ospite`, `Gol_casa`, `Gol_ospite`, `Data`, `Stato`, `Cod_campionato`) VALUES
(1, 1, 2, 5, 3, 1, '2025-05-13 00:00:00', 'terminata', 1),
(2, 1, 9, 10, 3, 2, '2025-05-13 00:00:00', 'terminata', 1),
(3, 1, 3, 1, 1, 5, '2025-05-13 00:00:00', 'terminata', 1),
(4, 2, 3, 4, 4, 1, '2025-05-16 00:00:00', 'terminata', 1),
(5, 2, 10, 7, 5, 5, '2025-05-16 00:00:00', 'terminata', 1),
(6, 2, 6, 8, 0, 2, '2025-05-16 00:00:00', 'terminata', 1),
(7, 3, 9, 7, 1, 9, '2025-05-20 00:00:00', 'terminata', 1),
(8, 3, 2, 4, 7, 5, '2025-05-20 00:00:00', 'terminata', 1),
(9, 3, 5, 1, 0, 3, '2025-05-20 00:00:00', 'terminata', 1),
(10, 4, 8, 7, 3, 5, '2025-05-22 00:00:00', 'terminata', 1),
(11, 4, 6, 10, 2, 1, '2025-05-22 00:00:00', 'terminata', 1),
(12, 4, 2, 1, 3, 2, '2025-05-22 00:00:00', 'terminata', 1),
(13, 5, 3, 5, 3, 2, '2025-05-27 00:00:00', 'terminata', 1),
(14, 5, 9, 8, 2, 2, '2025-05-27 00:00:00', 'terminata', 1),
(15, 5, 4, 1, 2, 4, '2025-05-27 00:00:00', 'terminata', 1),
(16, 6, 7, 6, 2, 3, '2025-05-30 00:00:00', 'terminata', 1),
(17, 6, 8, 10, 4, 2, '2025-05-30 00:00:00', 'terminata', 1),
(18, 6, 3, 2, 4, 2, '2025-05-30 00:00:00', 'terminata', 1),
(19, 7, 5, 4, 2, 3, '2025-06-09 00:00:00', 'terminata', 1),
(20, 7, 9, 6, 1, 4, '2025-06-09 00:00:00', 'terminata', 1),
(21, 8, 3, 7, 4, 2, '2025-06-24 00:00:00', 'terminata', 1),
(22, 8, 1, 9, 3, 0, '2025-06-24 00:00:00', 'terminata', 1),
(23, 8, 8, 2, 4, 1, '2025-06-24 00:00:00', 'terminata', 1),
(24, 8, 4, 6, 4, 5, '2025-06-24 00:00:00', 'terminata', 1),
(25, 9, 3, 6, 1, 0, '2025-06-09 00:44:22', 'terminata', 1),
(26, 9, 8, 1, 2, 1, '2025-06-09 00:44:22', 'terminata', 1),
(27, 10, 6, 3, 1, 6, '2025-06-13 01:16:07', 'terminata', 1),
(28, 10, 1, 8, 3, 6, '2025-06-13 01:16:07', 'terminata', 1),
(29, 11, 3, 8, 3, 3, '2025-07-24 01:18:29', 'terminata', 1),
(30, 12, 13, 17, 3, 1, '2025-07-14 15:00:49', 'terminata', 2),
(31, 12, 16, 12, 1, 7, '2025-07-14 15:00:49', 'terminata', 2),
(32, 12, 16, 17, 4, 3, '2025-07-14 15:03:24', 'terminata', 2),
(33, 12, 13, 12, 1, 7, '2025-07-14 15:03:24', 'terminata', 2),
(34, 12, 12, 17, 7, 3, '2025-07-14 15:03:24', 'terminata', 2),
(35, 12, 13, 16, 1, 2, '2025-07-14 15:03:24', 'terminata', 2),
(36, 13, 11, 15, 3, 2, '2025-07-16 03:47:51', 'terminata', 2),
(37, 13, 14, 18, 2, 5, '2025-07-16 03:47:51', 'terminata', 2),
(38, 13, 14, 11, 2, 5, '2025-07-16 03:47:51', 'terminata', 2),
(39, 13, 18, 15, 7, 1, '2025-07-16 03:47:51', 'terminata', 2),
(40, 13, 11, 18, 4, 3, '2025-07-16 03:47:51', 'terminata', 2),
(41, 13, 14, 15, 5, 2, '2025-07-16 03:47:51', 'terminata', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `premi`
--

CREATE TABLE `premi` (
  `ID_premio` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Cod_giocatore` int(11) DEFAULT NULL,
  `Cod_squadra` int(11) DEFAULT NULL,
  `Stagione` varchar(20) DEFAULT NULL,
  `Cod_campionato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `premi`
--

INSERT INTO `premi` (`ID_premio`, `Tipo`, `Cod_giocatore`, `Cod_squadra`, `Stagione`, `Cod_campionato`) VALUES
(1, 'Miglior portiere', 67, 8, '2025', 1),
(2, 'Miglior giocatore', 68, 8, '2025', 1),
(3, 'Capocannoniere', 69, 3, '2025', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `presidenti`
--

CREATE TABLE `presidenti` (
  `ID_presidenti` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Cognome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `presidenti`
--

INSERT INTO `presidenti` (`ID_presidenti`, `Nome`, `Cognome`) VALUES
(1, 'Gianluca ', 'Tomaselli'),
(2, 'Christian ', 'Scatigna'),
(3, 'Vito ', 'Sansone'),
(4, 'Gianmarco ', 'Dell\'Anna'),
(5, 'Bruno ', 'Giudici'),
(6, 'Fabrizio', 'Laterza'),
(7, 'Fabiano', 'Pasquale'),
(8, '', 'pezzettone');

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
(12, 'Coffee world', 'Coffe_world.jpg', 2, 2, 9, 21, 3, 0, 0, 5, 'A'),
(13, 'King-REX', 'King_REX.png', 3, 2, 3, 5, 1, 0, 2, 10, 'A'),
(14, 'Seleção x Autoscuola di cuia', 'SeleçãoxAutoscuola.jpg', 4, 2, 0, 0, 0, 0, 0, 0, 'B'),
(15, 'B.G.manager', 'BG_menager.png', 5, 2, 0, 0, 0, 0, 0, 0, 'B'),
(16, 'IL GRILLO FC ', 'Grillo_fc.png', 6, 2, 6, 7, 2, 0, 1, 11, 'A'),
(17, 'Autolavaggio beautycar', 'Beauty_car.jpg', 7, 2, 0, 9, 0, 0, 3, 16, 'A'),
(18, 'Lucky squad', '', 8, 2, 0, 0, 0, 0, 0, 0, 'B');

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
  ADD KEY `Cod_giocatori` (`Cod_giocatori`),
  ADD KEY `Cod_campionato` (`Cod_campionato`);

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
  ADD KEY `Squadra_ospite` (`Squadra_ospite`),
  ADD KEY `Cod_campionato` (`Cod_campionato`);

--
-- Indici per le tabelle `premi`
--
ALTER TABLE `premi`
  ADD PRIMARY KEY (`ID_premio`),
  ADD KEY `Cod_giocatore` (`Cod_giocatore`),
  ADD KEY `Cod_squadra` (`Cod_squadra`),
  ADD KEY `Cod_campionato` (`Cod_campionato`);

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
-- AUTO_INCREMENT per la tabella `campionati`
--
ALTER TABLE `campionati`
  MODIFY `ID_campionato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `cont_goal`
--
ALTER TABLE `cont_goal`
  MODIFY `ID_cont_goal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT per la tabella `giocatori`
--
ALTER TABLE `giocatori`
  MODIFY `ID_giocatori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT per la tabella `giornate`
--
ALTER TABLE `giornate`
  MODIFY `ID_giornata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `partite`
--
ALTER TABLE `partite`
  MODIFY `ID_partita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT per la tabella `premi`
--
ALTER TABLE `premi`
  MODIFY `ID_premio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `presidenti`
--
ALTER TABLE `presidenti`
  MODIFY `ID_presidenti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `squadre`
--
ALTER TABLE `squadre`
  MODIFY `ID_squadre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cont_goal`
--
ALTER TABLE `cont_goal`
  ADD CONSTRAINT `cont_goal_ibfk_1` FOREIGN KEY (`Cod_giocatori`) REFERENCES `giocatori` (`ID_giocatori`),
  ADD CONSTRAINT `cont_goal_ibfk_2` FOREIGN KEY (`Cod_campionato`) REFERENCES `campionati` (`ID_campionato`);

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
  ADD CONSTRAINT `partite_ibfk_3` FOREIGN KEY (`Squadra_ospite`) REFERENCES `squadre` (`ID_squadre`),
  ADD CONSTRAINT `partite_ibfk_4` FOREIGN KEY (`Cod_campionato`) REFERENCES `campionati` (`ID_campionato`);

--
-- Limiti per la tabella `premi`
--
ALTER TABLE `premi`
  ADD CONSTRAINT `premi_ibfk_1` FOREIGN KEY (`Cod_giocatore`) REFERENCES `giocatori` (`ID_giocatori`),
  ADD CONSTRAINT `premi_ibfk_2` FOREIGN KEY (`Cod_squadra`) REFERENCES `squadre` (`ID_squadre`),
  ADD CONSTRAINT `premi_ibfk_3` FOREIGN KEY (`Cod_campionato`) REFERENCES `campionati` (`ID_campionato`);

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
