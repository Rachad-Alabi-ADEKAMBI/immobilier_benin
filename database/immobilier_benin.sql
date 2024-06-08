-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2024 at 03:47 PM
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
-- Database: `immo_benin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `date_of_insertion` date DEFAULT current_timestamp(),
  `name` varchar(300) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `rooms` int(5) DEFAULT NULL,
  `bathrooms` int(5) DEFAULT NULL,
  `people` int(5) DEFAULT NULL,
  `size` int(5) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `situation` varchar(60) DEFAULT NULL,
  `pic1` varchar(200) DEFAULT NULL,
  `pic2` varchar(200) DEFAULT NULL,
  `pic3` varchar(200) DEFAULT NULL,
  `pic4` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(300) DEFAULT NULL,
  `user_phone` int(30) DEFAULT NULL,
  `lagititude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `date_of_insertion`, `name`, `category`, `description`, `price`, `location`, `rooms`, `bathrooms`, `people`, `size`, `action`, `situation`, `pic1`, `pic2`, `pic3`, `pic4`, `user_id`, `user_name`, `user_phone`, `lagititude`, `longitude`) VALUES
(14, '2024-05-29', 'terrain nu', 'Terrain', 'super', 21000000, 'Cotonou', 0, 0, 0, 800, 'A vendre', 'Disponible', '1717000870_terrain3.jpg', NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL),
(18, '2024-05-30', 'test', 'Appartement', 'test test', 100000, 'Cotonou', 2, 1, 1, 0, 'A louer', 'Disponible', NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL),
(22, '2024-05-30', 'nouvelle boutique', 'Boutique', 'hjkfajkjfak fajkhjkfhjk', 30000, 'Porto-Novo', 0, 0, 0, 300, 'A louer', 'Disponible', NULL, NULL, NULL, NULL, 7, 'newtwork manager', NULL, NULL, NULL),
(23, '2024-05-30', 'nouvelle boutique', 'Boutique', 'hjkfajkjfak fajkhjkfhjk', 30000, 'Porto-Novo', 0, 0, 0, 300, 'A louer', 'Disponible', NULL, NULL, NULL, NULL, 7, 'newtwork manager', NULL, NULL, NULL),
(26, '2024-05-31', 'super', 'Terrain', 'uhfadlfkdk', 300000, 'Abomey', 0, 0, 0, 10000, 'A louer', 'Stop', '1717142505_1717000870_terrain3.jpg', '1717142506_1717000870_terrain3.jpg', NULL, NULL, 4, 'rachad ADEKAMBI', 9622, NULL, NULL),
(28, '2024-05-31', 'appartement', 'Appartement', 'cadre sympa', 30000, 'Cotonou', 2, 1, 1, 0, 'A louer', 'Stop', '1717143747_appart2.jpeg', '1717143747_bureaux3.jpeg', NULL, NULL, 4, 'rachad ADEKAMBI', 9622, NULL, NULL),
(30, '2024-05-31', 'okkk', 'Boutique', 'boutique bien situé à akpakpa', 50000, 'Cotonou', 0, 0, 0, 300, 'A louer', 'Stop', '1717161994_store1.jpeg', NULL, NULL, NULL, 4, 'rachad ADEKAMBI', 9622, NULL, NULL),
(32, '2024-06-08', 'pour cet été', 'Appartement meublé', 'elseif ($_GET[&#039;action&#039;] === &#039;dashboardPage&#039;) {\r\n        if (!isset($_SESSION[&#039;user&#039;]) || $_SESSION[&#039;user&#039;][&#039;role&#039;] != &#039;user&#039;) {\r\n            loginPage();\r\n        } else {\r\n            dashboardPage();\r\n        }\r\n    }', 30000, 'Kétou', 2, 2, 1, 0, 'A louer', 'Non disponible', '1717840063_magasin4.jpg', NULL, NULL, NULL, 4, 'rachad ADEKAMBI', 9622, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `date_of_insertion` date NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `views` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `date_of_insertion`, `name`, `image`, `content`, `views`) VALUES
(1, '0000-00-00', 'Obtenir une boutique', 'magasin1.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus atque \r\nvel quam, aliquid molestiae deserunt fugit mollitia officia quae dolore reiciendis optio? Tempore eveniet earum esse aut dolorem, sit laborum. \r\n\r\n  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus atque vel quam, aliquid molestiae deserunt fugit mollitia officia quae dolore reiciendis optio?\r\n       Tempore eveniet earum esse aut dolorem, sit laborum. <br>', 15),
(2, '2024-04-08', 'Acheter une boutique', '1717143747_appart2.jpeg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus atque \r\nvel quam, aliquid molestiae deserunt fugit mollitia officia quae dolore reiciendis optio? Tempore eveniet earum esse aut dolorem, sit laborum. \r\n\r\n  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus atque vel quam, aliquid molestiae deserunt fugit mollitia officia quae dolore reiciendis optio?\r\n       Tempore eveniet earum esse aut dolorem, sit laborum. <br>', 15),
(3, '2024-04-04', 'Acheter un terrain', '1717142505_1717000870_terrain3.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus atque \r\nvel quam, aliquid molestiae deserunt fugit mollitia officia quae dolore reiciendis optio? Tempore eveniet earum esse aut dolorem, sit laborum. \r\n\r\n  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus atque vel quam, aliquid molestiae deserunt fugit mollitia officia quae dolore reiciendis optio?\r\n       Tempore eveniet earum esse aut dolorem, sit laborum. <br>', 30);

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `id` int(11) NOT NULL,
  `date_of_insertion` datetime NOT NULL DEFAULT current_timestamp(),
  `category` varchar(20) NOT NULL,
  `action` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `needs`
--

INSERT INTO `needs` (`id`, `date_of_insertion`, `category`, `action`, `location`, `user_id`, `user_phone`, `user_name`) VALUES
(6, '2024-05-29 09:40:48', 'Boutique', 'A louer', 'Calavi', 4, 9622, 'rachad ADEKAMBI'),
(7, '2024-05-30 20:17:56', 'Appartement', 'A vendre', 'Parakou', 4, 9622, 'rachad ADEKAMBI'),
(8, '2024-05-30 20:18:28', 'Appartement', 'A vendre', 'Parakou', 4, 9622, 'rachad ADEKAMBI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` text NOT NULL,
  `date_of_insertion` datetime NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `ads` int(5) NOT NULL,
  `featured` varchar(20) NOT NULL,
  `pic` varchar(250) DEFAULT NULL,
  `ip` varchar(300) NOT NULL,
  `description` text DEFAULT NULL,
  `situation` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `date_of_insertion`, `first_name`, `last_name`, `email`, `phone`, `role`, `ads`, `featured`, `pic`, `ip`, `description`, `situation`) VALUES
(1, 'admin', '123', '2024-05-27 09:02:17', '', '', 'admin@immobilierbenin.com', 0, 'admin', 0, '0', NULL, '', NULL, 'Disponible'),
(4, 'Liota92i', '123', '2024-05-27 11:32:53', 'rachad', 'ADEKAMBI', 'adekambirachad@gmail.com', 9622, 'user', 17, 'yes', '1717162309_user6.jpg', '127.0.0.1', 'BONJOUR A TOUS', 'Disponible'),
(5, 'ADEKAMBI rac27', '123', '2024-05-27 11:32:54', 'ray', 'liota', 'rayliota90@gmail.com', 658, 'user', 2, 'yes', '', '127.0.0.1', 'bonjour ', 'Disponible'),
(7, 'manager new78', '000', '2024-05-30 17:03:54', 'newtwork', 'manager', 'xnetwork32@gmail.com', 547, 'user', 5, 'no', NULL, '127.0.0.1', 'OKLM', 'Disponible'),
(8, 'Izi ray64', '123', '2024-05-31 11:23:21', 'ray', 'Izi', 'raywebsites90@gmail.com', 962547896, 'user', 0, 'yes', NULL, '127.0.0.1', NULL, 'Disponible'),
(9, 'lioo ray65', '123', '2024-06-04 12:28:55', 'rayy', 'lioo', 'test@test.fr', 123, 'user', 0, '0', NULL, '127.0.0.1', NULL, 'Disponible'),
(10, 'hghgh hgh58', '123', '2024-06-04 12:30:14', 'hgh', 'hghgh', 'test@test.com', 122, 'user', 0, '0', NULL, '127.0.0.1', NULL, 'Disponible'),
(11, 'yyy ray58', '123', '2024-06-04 12:36:24', 'ray', 'yyy', 'test2@test.fr', 123, 'user', 0, '0', NULL, '127.0.0.1', NULL, 'Disponible'),
(12, 'yyy ray62', '123', '2024-06-04 13:16:26', 'ray', 'yyy', 'test20@test.fr', 123, 'user', 0, '0', NULL, '127.0.0.1', NULL, 'Non disponible');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `needs`
--
ALTER TABLE `needs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
