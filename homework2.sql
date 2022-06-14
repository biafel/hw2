-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 12:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework2`
--

-- --------------------------------------------------------

--
-- Table structure for table `canzone`
--

CREATE TABLE `canzone` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `cantante` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `anno` int(11) DEFAULT NULL,
  `durata` int(11) DEFAULT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canzone`
--

INSERT INTO `canzone` (`id`, `titolo`, `cantante`, `album`, `anno`, `durata`, `url`) VALUES
(1, 'Bailando', 'io', 'Bailar', 2010, 20, 'https://media.ilsoftware.it/images/500x500/img_24553.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id_user` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id_user`, `img`, `url`) VALUES
(1, 'https://i.scdn.co/image/ab67616d0000b27335a495a98f6becd41316ca2c', 'https://open.spotify.com/album/278c24ae4JsSRpOEzlaghQ'),
(1, 'https://i.scdn.co/image/ab67616d0000b2738b4b1a7a415c3557c5bbeee6', 'https://open.spotify.com/album/52tIv5cL6AKDOmLdOIfWwU'),
(1, 'https://i.scdn.co/image/ab67616d0000b27399fbae5445c95363b3e0cbf3', 'https://open.spotify.com/album/0ytfwDmczprRHL1eiGH4zJ'),
(1, 'https://i.scdn.co/image/ab67616d0000b273d52e14e0595216ca453572ab', 'https://open.spotify.com/album/5ptl9Sheh9eWaogxFOZ3PV'),
(1, 'https://i.scdn.co/image/ab67616d0000b273e6f407c7f3a0ec98845e4431', 'https://open.spotify.com/album/5dGWwsZ9iB2Xc3UKR0gif2');

-- --------------------------------------------------------

--
-- Table structure for table `ultimi_ascolti`
--

CREATE TABLE `ultimi_ascolti` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ultimi_ascolti`
--

INSERT INTO `ultimi_ascolti` (`id_user`, `img`, `url`) VALUES
(1, 'https://i.scdn.co/image/ab67616d0000b27301649797af71d97b8f53ebf3', 'https://open.spotify.com/album/1pLnRSFohTMJjT6gW9CIXg'),
(1, 'https://i.scdn.co/image/ab67616d0000b273cd6ec171d9acdb315ff81610', 'https://open.spotify.com/album/5RA5hhLlbw31QfQRX11pwo'),
(1, 'https://i.scdn.co/image/ab67616d0000b273f0f7649257d4b99460929ced', 'https://open.spotify.com/album/5dOpbgAmJeyoakKQ0QLWkR'),
(1, 'https://i.scdn.co/image/ab67616d0000b2738970bd92e6eed79b2e0573ed', 'https://open.spotify.com/album/4rb4qHm3sKPFj4Fls1UR0j'),
(1, 'https://i.scdn.co/image/ab67616d0000b2738135527ce66c8bd6fe266917', 'https://open.spotify.com/album/6Q47uXONhD3lCI2p0Z9Oro');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `surname`) VALUES
(1, 'biafel', '12345678', 'bianca.splash@live.it', 'Bianca', 'Felis'),
(2, 'ciccio12', '123456789', 'marioross@hotmail.it', 'mario', 'rossi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canzone`
--
ALTER TABLE `canzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id_user`,`img`),
  ADD KEY `new_id2` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
