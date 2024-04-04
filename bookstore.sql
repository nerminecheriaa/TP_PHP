-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 12:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `title`, `author`, `price`, `image`) VALUES
(3, 'you can\'t hurt me ', 'david goggins', 33, 'Uploadimage/youcanthurtme.jpg'),
(4, 'atomic habits', 'james clear', 33, 'Uploadimage/atomichabits.jpg'),
(5, 'limitless ', 'jim kwik', 33, 'Uploadimage/limitless.jpg'),
(6, '48 laws of power ', 'robert greene', 50, 'Uploadimage/48lowsofpower.jpg'),
(7, 'it ends with ', 'colleen hoover', 40, 'Uploadimage/itendswithus.jpg'),
(8, 'The Silent Patient', 'Alex Michaelides', 47, 'Uploadimage/silent-patient.jpg'),
(9, 'The Alchemist', 'Paulo Coelho', 45, 'Uploadimage/TheAlchemist.jpg'),
(10, 'Brida', 'Paulo Coelho', 30, 'Uploadimage/Brida.jpg'),
(11, 'Madame Bovary', 'Gustave Flaubert', 20, 'Uploadimage/MadameBovary.jpg'),
(12, 'Thinking, Fast and Slow', 'Daniel Kahneman', 30, 'Uploadimage/Thinking,FastandSlow.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `isbn` int(11) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `telephone` varchar(8) NOT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`isbn`, `ville`, `telephone`, `quantity`) VALUES
(3, 'manouba', '56678018', 1),
(4, 'manouba', '56678018', 1),
(4, 'manouba', '56678023', 1),
(6, 'manouba', '56678018', 1),
(7, 'manouba', '56678018', 1),
(10, 'manouba', '56678018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `telephone` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--
dont do this , insert data via signup form
INSERT INTO `utilisateur` (`telephone`, `email`, `password`, `nom`) VALUES
('56678018', 'ARIJ@GMAIL.COM', 'aaa', 'arij'),
('56678023', 'mhenni.arij@gmail.com', 'arij123ARIJ*', 'elhem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`isbn`,`telephone`),
  ADD KEY `telephone` (`telephone`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`telephone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `isbn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`telephone`) REFERENCES `utilisateur` (`telephone`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
