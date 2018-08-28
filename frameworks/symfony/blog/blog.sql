-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 02:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'abogado', 'Estuviste pagando durante 2 años un abogado y a cambio no movio un dedo? Crees que has perdido un juicio porque tu abogado no ha echo bien su trabajo? No lo deje que se vaya de rosita!'),
(2, 'medico', 'Te ha echo algúna pregunta incomoda que no tiene nada que ver con los simptomas que presentas? Sientes que te ha tradado y hablado malamente? Ayúda a otros pacientes que huya de semejante medico!');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `status` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`, `user_id`, `category_id`, `title`, `content`, `status`, `image`) VALUES
(1, 2, 1, 'Abogado incompetente', 'Tardo 2 años en reclamar un seguro de accidente. Por culpa suya he perdido el juicio. Asi que la aseguradora no me indemnizara con nada. Encima tendre que arreglarme el coche yo mismo. Un perjudicio de casi 5.000 mil euros.', 'public', NULL),
(2, 2, 2, 'Medico sinverguenza', 'Voy por problema de tos por un resfriado y me pregunta por mi actividad sexual. Creo que intento ligar conmigo. ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entry_tag`
--

CREATE TABLE `entry_tag` (
  `id` int(255) NOT NULL,
  `entry_id` int(255) NOT NULL,
  `tag_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entry_tag`
--

INSERT INTO `entry_tag` (`id`, `entry_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `description`) VALUES
(1, 'abogado', NULL),
(2, 'medico', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `name`, `surname`, `email`, `password`, `imagen`) VALUES
(1, 'admin', 'Brand', 'Constantin', 'brand_constantin@hotmail.com', '$2b$10$aJQC2QdxTmDQjzOOYZzG..AaC9LbmtCqrr7TuBlqcqxxnujmT52FW', NULL),
(2, 'user', 'Constantin', 'Brand', 'brand@hotmail.com', '$2b$10$R6mU6/xpuoaUxliplVkI4.Q72QbgApqe74jUTVazOsfq3mvUw82Ty', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entries_users` (`user_id`),
  ADD KEY `fk_entries_categories` (`category_id`);

--
-- Indexes for table `entry_tag`
--
ALTER TABLE `entry_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entry_tag_entries` (`entry_id`),
  ADD KEY `fk_entry_tag_tags` (`tag_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entry_tag`
--
ALTER TABLE `entry_tag`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `fk_entries_categories` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_entries_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `entry_tag`
--
ALTER TABLE `entry_tag`
  ADD CONSTRAINT `fk_entry_tag_entries` FOREIGN KEY (`entry_id`) REFERENCES `entry` (`id`),
  ADD CONSTRAINT `fk_entry_tag_tags` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
