-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 03:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `poll_id` int(11) NOT NULL,
  `expiry_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`poll_id`, `expiry_date`) VALUES
(42, '2024-03-16 23:23:00'),
(43, '2024-03-16 23:32:00'),
(44, '0000-00-00 00:00:00'),
(45, '0000-00-00 00:00:00'),
(46, '0000-00-00 00:00:00'),
(47, '0000-00-00 00:00:00'),
(48, '0000-00-00 00:00:00'),
(49, '2024-03-21 20:45:00'),
(50, '2024-03-30 17:50:00'),
(51, '2025-01-02 23:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `choice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poll_choices`
--

CREATE TABLE `poll_choices` (
  `choice_id` int(11) NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `choice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll_choices`
--

INSERT INTO `poll_choices` (`choice_id`, `poll_id`, `choice`) VALUES
(25, 42, 'Superman'),
(26, 42, 'Omniman'),
(27, 43, 'Generative AI'),
(28, 43, 'Ordinary Programming'),
(29, 44, ''),
(30, 44, ''),
(31, 44, ''),
(32, 45, ''),
(33, 45, ''),
(34, 45, ''),
(35, 46, ''),
(36, 46, ''),
(37, 46, ''),
(38, 47, ''),
(39, 47, ''),
(40, 47, ''),
(41, 48, ''),
(42, 48, ''),
(43, 48, ''),
(44, 49, 'Rolnardo'),
(45, 49, 'Messi'),
(46, 50, 'Tanjiro'),
(47, 50, 'Lalush'),
(48, 50, 'Izuku'),
(49, 50, 'Itadori'),
(50, 51, 'One'),
(51, 51, 'Two');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `poll_id`, `user_id`, `time_posted`, `post_type`) VALUES
(51, 'Superman vs Omniman', 42, 2, '2024-03-15 20:23:48', 'post'),
(52, 'AI coding vs Non-AI coding 😂😂😂 Who Will Win', 43, 2, '2024-03-15 20:32:49', 'post'),
(53, '', 44, 2, '2024-03-16 13:41:10', 'post'),
(54, '', 45, 2, '2024-03-16 13:41:11', 'post'),
(55, '', 46, 2, '2024-03-16 13:41:14', 'post'),
(56, '', 47, 2, '2024-03-16 13:41:18', 'post'),
(57, '', 48, 2, '2024-03-16 13:41:20', 'post'),
(58, 'is rolnaldo or messi the GOAT', 49, 2, '2024-03-16 14:42:33', 'post'),
(59, 'Who is your favorite mc', 50, 2, '2024-03-16 14:45:30', 'post'),
(60, '1 or 2', 51, 3, '2024-03-16 14:56:42', 'post');

-- --------------------------------------------------------

--
-- Table structure for table `post_stats`
--

CREATE TABLE `post_stats` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `likes` int(11) DEFAULT 0,
  `reposts` int(11) DEFAULT 0,
  `comments` int(11) DEFAULT 0,
  `saves` int(11) DEFAULT 0,
  `shares` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_stats`
--

INSERT INTO `post_stats` (`id`, `post_id`, `views`, `likes`, `reposts`, `comments`, `saves`, `shares`) VALUES
(4, 51, 0, 0, 0, 0, 0, 0),
(5, 52, 0, 0, 0, 0, 0, 0),
(6, 53, 0, 0, 0, 0, 0, 0),
(7, 54, 0, 0, 0, 0, 0, 0),
(8, 55, 0, 0, 0, 0, 0, 0),
(9, 56, 0, 0, 0, 0, 0, 0),
(10, 57, 0, 0, 0, 0, 0, 0),
(11, 58, 0, 0, 0, 0, 0, 0),
(12, 59, 0, 0, 0, 0, 0, 0),
(13, 60, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reposts`
--

CREATE TABLE `reposts` (
  `repost_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saves`
--

CREATE TABLE `saves` (
  `save_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `share_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password_` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password_`, `created_at`) VALUES
(1, 'Ian', 'Wright', 'thewian27@gmail.com', '$2y$10$Vln.GHE.j7r0NIxDL6vt2eApz6P/uYxViwWqq.6YV3ABnR6g9k90a', '2024-02-29 19:21:09'),
(2, 'John', 'Doe', 'johndoe@gmail.com', '$2y$10$8xGe1JRREomo8rrquEe5w.R5740bZt/0baCn6VtIp76YsHT494v.m', '2024-02-29 20:24:07'),
(3, 'Anna', 'Bakugo', 'mmw81624@gmail.com', '$2y$10$49/P3chDBcwMfsOumKw3Zeq5zKUVl.2a/unQXQsaDU/C1D4apAcFi', '2024-03-16 14:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_choices`
--
ALTER TABLE `poll_choices`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_stats`
--
ALTER TABLE `post_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reposts`
--
ALTER TABLE `reposts`
  ADD PRIMARY KEY (`repost_id`);

--
-- Indexes for table `saves`
--
ALTER TABLE `saves`
  ADD PRIMARY KEY (`save_id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_choices`
--
ALTER TABLE `poll_choices`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `post_stats`
--
ALTER TABLE `post_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reposts`
--
ALTER TABLE `reposts`
  MODIFY `repost_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saves`
--
ALTER TABLE `saves`
  MODIFY `save_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
