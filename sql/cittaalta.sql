-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 14, 2019 alle 10:02
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cittaalta`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `questionari`
--

DROP TABLE IF EXISTS `questionari`;
CREATE TABLE `questionari` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `campo1` varchar(1023) NOT NULL,
  `campo2` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `segnalazioni`
--

DROP TABLE IF EXISTS `segnalazioni`;
CREATE TABLE `segnalazioni` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `latitudine` float NOT NULL,
  `longitudine` float NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `immagine` varchar(250) DEFAULT NULL,
  `tipologia` varchar(2047) DEFAULT NULL,
  `proposta` varchar(1024) NOT NULL,
  `motivazione` varchar(1024) NOT NULL,
  `destinatari` varchar(250) NOT NULL,
  `periodo` varchar(30) NOT NULL,
  `conservazione` varchar(1000) NOT NULL,
  `dataInserimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `segnalazioni`
--

INSERT INTO `segnalazioni` (`id`, `id_utente`, `latitudine`, `longitudine`, `titolo`, `immagine`, `tipologia`, `proposta`, `motivazione`, `destinatari`, `periodo`, `conservazione`, `dataInserimento`) VALUES
(3, 1, 5.5, 5.5, 'Piazza Vecchia', NULL, 'luogo pubblico', 'x', 'x', 'x', 'x', 'x', '2019-01-14 09:01:22'),
(4, 1, 5.5, 5.5, 'y', NULL, 'y', 'y', 'y', 'y', 'y', 'y', '2019-01-14 09:01:22');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

DROP TABLE IF EXISTS `utenti`;
CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `tipo` varchar(63) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `mail`, `tipo`, `password`) VALUES
(1, NULL, 'c@c.it', 'x', 'x');

-- --------------------------------------------------------

--
-- Struttura della tabella `valutazioni_segnalazioni`
--

DROP TABLE IF EXISTS `valutazioni_segnalazioni`;
CREATE TABLE `valutazioni_segnalazioni` (
  `id_utente` int(11) NOT NULL,
  `id_segnalazione` int(11) NOT NULL,
  `opinione` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `questionari`
--
ALTER TABLE `questionari`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `segnalazioni`
--
ALTER TABLE `segnalazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `valutazioni_segnalazioni`
--
ALTER TABLE `valutazioni_segnalazioni`
  ADD PRIMARY KEY (`id_utente`,`id_segnalazione`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `questionari`
--
ALTER TABLE `questionari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
