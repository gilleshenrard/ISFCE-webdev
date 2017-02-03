-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2017 at 02:54 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `reparations`
--

CREATE TABLE `reparations` (
  `id` int(11) NOT NULL,
  `intervention` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `vehicule_FK` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reparations`
--

INSERT INTO `reparations` (`id`, `intervention`, `description`, `vehicule_FK`, `date`) VALUES
(1, 'Entretien 100 000 km', 'Changer les filtres, réparer la direction, bruit l...', 1, '2017-01-19'),
(2, 'Gonflage de poches', 'Changer le carbu pour rien, compter le café, se ronger les ongles, ...', 3, '2017-01-14'),
(3, 'Tututututulututu', 'jqlkfdjsklfnd,sqfjdksqmfdjskqlfndlfmjdqksd\r\nlorem ipsum machin\r\ngfgsdgfsdgfds', 2, '2017-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Bob', 'testbob'),
(2, 'dick', 'testdick'),
(3, 'booch', 'testbooch');

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `numero_chassis` varchar(255) CHARACTER SET latin1 NOT NULL,
  `plaque` varchar(255) CHARACTER SET latin1 NOT NULL,
  `marque` varchar(255) CHARACTER SET latin1 NOT NULL,
  `modele` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicules`
--

INSERT INTO `vehicules` (`id`, `numero_chassis`, `plaque`, `marque`, `modele`, `type`) VALUES
(1, '12321-32123-11223-33221', '1-ABC-775', 'Ford', 'Fiesta', 'Voiture'),
(2, '45654-65456-44556-66554', '1-CXB-564', 'Audi', 'A8', 'Voiture'),
(3, '78987-98789-77889-99887', '1-MGB-159', 'Citroën', 'C4', 'Voiture');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reparations`
--
ALTER TABLE `reparations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reparations`
--
ALTER TABLE `reparations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
