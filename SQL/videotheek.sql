-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 12 okt 2016 om 15:13
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `videotheek`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `acteur`
--

CREATE TABLE IF NOT EXISTS `acteur` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `acteurregel`
--

CREATE TABLE IF NOT EXISTS `acteurregel` (
  `acteur` int(11) NOT NULL,
  `film` varchar(45) NOT NULL,
  PRIMARY KEY (`acteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  `omschrijving` varchar(200) NOT NULL,
  `genre` varchar(45) NOT NULL,
  `acteur` varchar(45) NOT NULL,
  `hoes` varchar(45) NOT NULL,
  `verhuurbaarAantal` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `film`
--

INSERT INTO `film` (`id`, `naam`, `omschrijving`, `genre`, `acteur`, `hoes`, `verhuurbaarAantal`) VALUES
(3, 'Inside Out', 'After young Riley is uprooted from her Midwest life and moved to San Francisco, her emotions - Joy, Fear, Anger, Disgust and Sadness - conflict on how best to navigate a new city, house, and school.', 'Family', ' Amy Poehler, Bill Hader, Lewis Black', 'kei mooi', '10'),
(4, 'Trainwreck', 'Having thought that monogamy was never possible, a commitment-phobic career woman may have to face her fears when she meets a good guy.', 'Drama, Romance', ' Amy Schumer, Bill Hader, Brie Larson ', 'Mooi', '20'),
(5, 'The Walk', 'In 1974, high-wire artist Philippe Petit recruits a team of people to help him realize his dream: to walk the immense void between the World Trade Center towers.', 'Adventure, Biography, Drama ', 'Joseph Gordon-Levitt, Charlotte Le Bon, Guill', 'Mooi', '4');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `filmtransport`
--

CREATE TABLE IF NOT EXISTS `filmtransport` (
  `orderregel` int(11) NOT NULL,
  `ophaaldatum` date NOT NULL,
  `afleverdatum` date NOT NULL,
  `check` tinyint(1) NOT NULL,
  PRIMARY KEY (`orderregel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `filmtransport`
--

INSERT INTO `filmtransport` (`orderregel`, `ophaaldatum`, `afleverdatum`, `check`) VALUES
(1, '2016-10-19', '2016-10-04', 1),
(2, '2016-10-27', '2016-10-12', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE IF NOT EXISTS `gebruiker` (
  `emailadres` varchar(45) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `adres` varchar(45) NOT NULL,
  `postcode` varchar(45) NOT NULL,
  `woonplaats` varchar(45) NOT NULL,
  `geactiveerd` tinyint(1) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL,
  PRIMARY KEY (`emailadres`),
  KEY `fk_gebruiker_rol_idx` (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`emailadres`, `naam`, `achternaam`, `adres`, `postcode`, `woonplaats`, `geactiveerd`, `rol`, `wachtwoord`) VALUES
('hs@gmail.nl', 'hans', 'odijk', 'columbus 23', '4933 TR', 'Utrecht', 1, 'klant', 'geheim'),
('koerier@gmail.com', 'koerier', 'koerier', 'koerier 1', '3429 KR', 'Utrecht', 1, 'koerier', 'geheim'),
('p@gmail.nl', 'p', 'p', 'p', 'p', 'p', 1, 'baliemedewerker', 'geheim'),
('sabrinasiemons@gmail.com', 'sabrina', 'Siemons', 'Wilhelminastraat', '4194TT', 'Meteren', 1, 'eigenaar', 'geheim'),
('test@gmail.com', 'test', 'test', 'test', 'test', 'test', 1, 'klant', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `genre` varchar(45) NOT NULL,
  PRIMARY KEY (`genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genreregel`
--

CREATE TABLE IF NOT EXISTS `genreregel` (
  `genre` varchar(45) NOT NULL,
  `film` int(11) NOT NULL,
  PRIMARY KEY (`genre`),
  KEY `fk_genreregel_film_idx` (`film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klacht`
--

CREATE TABLE IF NOT EXISTS `klacht` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `klacht` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `klacht`
--

INSERT INTO `klacht` (`id`, `email`, `klacht`) VALUES
(1, 'test@gmail.com', 'sddfgasdsfgsdfg'),
(2, 'test@gmail.com', 'Ik heb een probleem'),
(3, 'test@gmail.com', 'Ik heb een probleem'),
(4, 'p@gmail.nl', 'Ik heb een geheim\r\n');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emailadres` varchar(45) NOT NULL,
  `ophaaldatum` date NOT NULL,
  `afleverdatum` date NOT NULL,
  `filmid` int(11) NOT NULL,
  `prijs` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_gebruiker_idx` (`emailadres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`id`, `emailadres`, `ophaaldatum`, `afleverdatum`, `filmid`, `prijs`) VALUES
(8, 'test@gmail.com', '2016-10-31', '2016-10-22', 3, '5');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderregel`
--

CREATE TABLE IF NOT EXISTS `orderregel` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `film` varchar(45) NOT NULL,
  `leveren` date DEFAULT NULL,
  `ophalen` date DEFAULT NULL,
  `terug` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `rol` varchar(45) NOT NULL,
  `omschrijving` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `rol`
--

INSERT INTO `rol` (`rol`, `omschrijving`) VALUES
('baliemedewerker', 'baliemedewerker'),
('eigenaar', 'eigenaar'),
('klant', 'klant'),
('koerier', 'koerier'),
('root', 'root');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `acteur`
--
ALTER TABLE `acteur`
  ADD CONSTRAINT `fk_acteur_achteurregel` FOREIGN KEY (`id`) REFERENCES `acteurregel` (`acteur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD CONSTRAINT `fk_gebruiker_rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `fk_genre_genreregel` FOREIGN KEY (`genre`) REFERENCES `genreregel` (`genre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_gebruiker` FOREIGN KEY (`emailadres`) REFERENCES `gebruiker` (`emailadres`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
