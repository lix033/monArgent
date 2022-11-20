-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 01:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymoney`
--

-- --------------------------------------------------------

--
-- Table structure for table `entree`
--

CREATE TABLE `entree` (
  `id` int(11) NOT NULL,
  `somme` int(6) NOT NULL DEFAULT 10,
  `code_user` int(11) NOT NULL,
  `time_stamp` time NOT NULL DEFAULT current_timestamp(),
  `date_stamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entree`
--

INSERT INTO `entree` (`id`, `somme`, `code_user`, `time_stamp`, `date_stamp`) VALUES
(18, 500, 9, '11:43:37', '2022-11-18'),
(19, 500, 9, '11:44:28', '2022-11-18'),
(20, 250, 9, '11:55:13', '2022-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `sorties`
--

CREATE TABLE `sorties` (
  `id` int(11) NOT NULL,
  `somme` int(6) NOT NULL,
  `code_user` int(11) NOT NULL,
  `time_stamp` time NOT NULL,
  `date_stamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sorties`
--

INSERT INTO `sorties` (`id`, `somme`, `code_user`, `time_stamp`, `date_stamp`) VALUES
(1, 515, 9, '00:00:00', '0000-00-00'),
(2, 265, 9, '00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tot_entr`
--

CREATE TABLE `tot_entr` (
  `totalsomme` int(6) NOT NULL DEFAULT 0,
  `code_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tot_entr`
--

INSERT INTO `tot_entr` (`totalsomme`, `code_user`) VALUES
(1000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tot_sort`
--

CREATE TABLE `tot_sort` (
  `code_user` int(11) NOT NULL,
  `total_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tot_sort`
--

INSERT INTO `tot_sort` (`code_user`, `total_dep`) VALUES
(9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `pass` text NOT NULL,
  `telephone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `pass`, `telephone`) VALUES
(9, 'KOKOU', 'martin', '$2y$10$e1p900.Fj0iEAFM2qWP4DeIVpmej8wkeqeHUeP7rph3RbcAAgVhsS', 56892314);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sorties`
--
ALTER TABLE `sorties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entree`
--
ALTER TABLE `entree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sorties`
--
ALTER TABLE `sorties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
