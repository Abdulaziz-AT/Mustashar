-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 09:47 AM
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
-- Database: `login-register`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `AnswerID` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `Answer` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`AnswerID`, `id`, `QuestionID`, `Answer`, `CreatedAt`) VALUES
(19, 4, 33, 'i know', '2024-05-08 15:16:24'),
(21, 4, 31, 'nbnbn', '2024-05-08 17:03:34'),
(22, 5, 20, 'hhhh', '2024-05-09 15:25:53'),
(24, 7, 31, 'you have to upgrade', '2024-05-09 17:21:38'),
(25, 8, 31, 'upgrade your phone', '2024-05-09 19:24:08'),
(27, 1, 20, 'i will revise', '2024-05-10 21:52:37'),
(29, 1, 20, 'the second link', '2024-05-15 18:15:01'),
(30, 1, 20, 'Starting a small business can be an exciting yet challenging endeavor. There are several key factors that aspiring entrepreneurs should consider to increase their chances of success:', '2024-05-15 19:06:33'),
(31, 5, 20, 'check the reference', '2024-05-15 19:11:50'),
(33, 1, 51, 'You need to check the link i provided in instagram!', '2024-05-15 19:15:15'),
(34, 1, 17, 'tell me how', '2024-05-16 08:48:25'),
(36, 1, 20, 'i know', '2024-05-16 09:09:10'),
(37, 1, 20, 'go to google', '2024-06-06 19:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `AnswerID` int(11) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `id`, `QuestionID`, `AnswerID`, `Comment`, `CreatedAt`) VALUES
(4, 4, 33, 19, 'hhhhh', '2024-05-08 15:16:36'),
(10, 7, 31, 24, 'yes it wordked', '2024-05-09 17:22:20'),
(11, 7, 31, 25, 'it worked !!!', '2024-05-09 19:25:00'),
(12, 1, 31, 25, 'it worked for me also', '2024-05-09 19:27:03'),
(14, 7, 20, 22, 'i know this is good', '2024-05-15 13:59:49'),
(15, 1, 20, 22, 'hello ', '2024-05-15 18:19:13'),
(16, 1, 20, 30, 'It worked for me. ', '2024-05-15 19:06:49'),
(17, 1, 20, 30, 'It worked for me. also ', '2024-05-15 19:06:53'),
(18, 1, 20, 30, 'thank you very much', '2024-05-15 19:07:01'),
(19, 4, 51, 33, 'I checked it. It worked for me. Thank you', '2024-05-15 19:16:09'),
(20, 1, 20, 22, 'what the hell is this', '2024-05-15 20:32:38'),
(21, 1, 17, 34, 'priority', '2024-05-16 08:50:06'),
(23, 1, 20, 36, 'hello', '2024-05-16 09:09:19'),
(24, 12, 20, 22, 'google', '2024-06-06 18:57:34'),
(25, 1, 20, 37, 'refernece the code', '2024-06-06 19:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `id`, `Title`, `Description`, `CreatedAt`) VALUES
(17, 6, 'xzxzxzzxz', 'xzxzxzxzzx', '2024-05-03 17:50:16'),
(20, 1, 'How to deploy2', 'i need help', '2024-05-03 18:45:43'),
(21, 1, 'start', 'stop', '2024-05-03 18:47:40'),
(23, 1, 'saassasas', 'sasasass', '2024-05-03 18:47:47'),
(28, 1, 'vcvc', 'vcvc', '2024-05-03 19:03:22'),
(29, 1, 'xzxz', 'xzxz', '2024-05-05 03:58:04'),
(31, 5, 'My name is Abdulrahman', 'hello everyone', '2024-05-05 05:32:47'),
(32, 4, 'my name is sultan', 'dgfgdfd', '2024-05-07 06:39:01'),
(33, 4, 'My name is CodeHarbor', 'hello everyone', '2024-05-08 14:51:33'),
(35, 5, 'iiuikj', 'nmnmnmkjkjkj', '2024-05-09 16:18:47'),
(36, 5, 'iiuikjkjk', 'nmnmnmkjkjkj', '2024-05-09 16:18:49'),
(37, 5, 'iiuikjkjkkjkjkj', 'nmnmnmkjkjkj', '2024-05-09 16:18:52'),
(38, 5, 'iiuikjkjkkjkjkjkjkjkjk', 'nmnmnmkjkjkj', '2024-05-09 16:18:54'),
(39, 5, 'qwq', 'nmnmnmkjkjkj', '2024-05-09 16:18:59'),
(41, 5, 'qwqsssww', 'nmnmnmkjkjkj', '2024-05-09 16:19:07'),
(42, 5, 'qwqssswwfff', 'nmnmnmkjkjkj', '2024-05-09 16:19:10'),
(43, 8, 'Now', 'dsds', '2024-05-09 19:46:20'),
(44, 8, 'bnnvb', 'nbnb', '2024-05-09 19:46:39'),
(45, 8, 'jhjh', 'jhhj', '2024-05-09 19:46:59'),
(46, 8, 'jhjhhjh', 'jhhj', '2024-05-09 19:47:02'),
(47, 8, 'jhjhhjhm', 'jhhj', '2024-05-09 19:47:05'),
(48, 8, 'jhjhhjhmm', 'jhhj', '2024-05-09 19:47:07'),
(49, 1, 'i wonder how to do it', 'HOW', '2024-05-15 14:08:24'),
(50, 1, 'hello anybody here?', 'sasa', '2024-05-15 14:08:46'),
(51, 5, 'How to Get A+', 'I want to know the routine needed to get the full mark', '2024-05-15 19:12:53'),
(52, 1, 'How to deliver', 'tell me', '2024-05-16 08:46:23'),
(53, 1, 'How to drive?', 'tell messs', '2024-05-16 08:46:45'),
(54, 1, 'How to travel?', 'tell messs', '2024-05-16 08:46:58'),
(56, 1, 'How to rent a car', 'jsjdjsdjdsjdjshjds', '2024-06-06 18:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `question_comments`
--

CREATE TABLE `question_comments` (
  `CommentID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_comments`
--

INSERT INTO `question_comments` (`CommentID`, `id`, `QuestionID`, `Comment`, `CreatedAt`) VALUES
(1, 1, 20, 'needed', '2024-05-15 18:33:32'),
(3, 5, 51, 'I also need the answers :)', '2024-05-15 19:14:25'),
(4, 1, 51, 'I do too. Trust me lol', '2024-05-15 19:15:33'),
(5, 1, 17, 'i need it\r\n', '2024-05-16 08:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `question_comment_rating`
--

CREATE TABLE `question_comment_rating` (
  `RatingID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `RatingID` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `AnswerID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`RatingID`, `id`, `QuestionID`, `AnswerID`, `Rating`, `CreatedAt`) VALUES
(52, 1, 20, 27, 4, '2024-05-15 19:03:31'),
(53, 1, 20, 27, 2, '2024-05-15 19:03:46'),
(54, 1, 20, 27, 5, '2024-05-15 19:03:49'),
(55, 1, 20, 27, 5, '2024-05-15 19:03:51'),
(56, 1, 20, 30, 5, '2024-05-15 19:06:40'),
(60, 4, 51, 33, 5, '2024-05-15 19:16:27'),
(61, 4, 51, 33, 4, '2024-05-15 19:16:29'),
(62, 4, 51, 33, 5, '2024-05-15 19:16:31'),
(63, 4, 51, 33, 4, '2024-05-15 19:16:34'),
(64, 4, 51, 33, 5, '2024-05-15 19:16:36'),
(65, 1, 20, 22, 2, '2024-05-15 20:32:21'),
(66, 1, 20, 22, 1, '2024-05-15 20:32:25'),
(67, 1, 20, 22, 1, '2024-05-15 20:32:28'),
(68, 1, 20, 27, 5, '2024-05-16 08:14:15'),
(69, 1, 20, 27, 5, '2024-05-16 08:14:22'),
(71, 1, 17, 34, 5, '2024-05-16 08:48:33'),
(73, 1, 20, 36, 4, '2024-05-16 09:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `bio`, `phone_number`, `birthdate`) VALUES
(1, 'ahmad', 'ahmad@example.com', '$2y$10$cHg6nFGZEwx4RwZHganzHucLYI1A7ATxxr/o80Lsg1y/AG9DfXOT.', NULL, NULL, NULL),
(2, 'ahmad', 'ahmad@example.com', '$2y$10$kaG.DOLk0pEAL6JHIeePsehnehNQQTcyuL3Dyrgi7laWwpSxTF8aK', NULL, NULL, NULL),
(3, 'abdulaziz', 'abdulaziz@example.com', '$2y$10$F8nOghXLTciVQ6euxQYvTuqceXCc865AZLAf..OQs.692cWcegaA6', NULL, NULL, NULL),
(4, 'sultan', 'sultan@example.com', '$2y$10$Wx6DXXjQd1z7PTAOaugs0ejWYVzBUiWvfDjE6AQaxlk3MvLJF26oG', NULL, NULL, NULL),
(5, 'abdulrahman', 'abdulrahman@example.com', '$2y$10$K1DFOBIWHKgZLPF4XR4P9u/ft5uxGUCda3oZYChAFPlC3Kcd9sYR.', NULL, NULL, NULL),
(6, 'saud', 'saud@example.com', '$2y$10$V/pg56p4KvcazyryU3sUcu/AL2oR.vuRWz8bN76M2FH3gh7nARUSa', NULL, NULL, NULL),
(7, 'Meshaal', 'meshaal@example.com', '$2y$10$fCAMDS7n6RIAvJixtEA0ZOMlBSBIq0eV.sqIg6put01xZ1W2ZI26q', NULL, NULL, NULL),
(8, 'Shoug', 'Shoug@example.com', '$2y$10$VF02Ng8yA5cA0lt.fBTbcu7PSw9nMtoknI6A4G66UNCm/03ryH9c.', NULL, NULL, NULL),
(9, 'Shoug', 'aaa@example.com', '$2y$10$.Hcz6A7Pis/IBOhFfn9xSuaQLxI6SseLh4Se1saD1Cn5PmJAoBj4i', NULL, NULL, NULL),
(10, 'mohammed', 'mohammed@example.com', '$2y$10$OVCPDoPGctAk2GC6PDuvaelfXXNcfZ452kYCXy288FBwNTjUFpUJe', NULL, NULL, NULL),
(11, 'brad', 'brad@example.com', '$2y$10$tBRAmLl86LC2O6K2FWLGKu/Ju.yn9TIP8/Ib3yN.q0fGK3ChJKwbi', NULL, NULL, NULL),
(12, 'dalal', 'dalal@example.com', '$2y$10$5xyfL6.mhhdqwXXKuHE6B./3BfPqaxgrmZE.SsQ.NDveHBEwWNp1G', NULL, NULL, NULL),
(13, 'Nawaf', 'nawaf@example.com', '$2y$10$Jg.ue/ZFlB2afMtaqLgqmuYSlqjjKZFn7Am0j8Z93Whga3d/qt.wa', NULL, NULL, NULL),
(14, 'salman', 'salman@example.com', '$2y$10$2SG.N2/xV/znjVMJsxEiOOQVZNH1UPKNkbUIBPMtTcN2BLvVA/2cm', NULL, NULL, NULL),
(15, 'zeyad', 'zeyad@example.com', '$2y$10$z.rAN4cvlhCemXnPEQwl6ewv9.vh5wLEtao3XqZRCb4/hdbSZnzr.', NULL, '0532606088', '0000-00-00'),
(16, 'f', 'f@f.com', '$2y$10$F5GEwYZWmxzPeKNseRs2zOald75RxFx2OsBPS12vYUM6nTPyaOtmu', NULL, '0555555555', '0000-00-00'),
(17, 'z', 'z@z.com', '$2y$10$kO2vna05L6dSztsZW43SH.chnD1kiw84siEobUCKVbPoDG00nLKUa', NULL, '7878787878', '2024-09-05'),
(18, 'aaaa', 'aaaa@example.com', '$2y$10$CJPLF/Q7fLQK1onajaR3BOc4GqmenMmth6DII3jKzym.UIJudfC6K', NULL, '05555555555', '2024-09-03'),
(19, 'mohammed_al', 'mohammed_al@gmail.com', '$2y$10$2adjX4A4KJomaMJw7qw8.edfDlNE7zmnUrUETVh80OrNNJ92reWoO', NULL, '0505455555', '2015-02-12'),
(20, 'nn', 'nn@nn.com', '$2y$10$0P7P0EI4AUH4uFx.MzYDjOuj7NVpUTJ0boMAXul09DDAjzSTSaBGu', NULL, '0547896325', '2024-09-04'),
(21, 'qq', 'qq@qq.com', '$2y$10$BZz.YvpGO.7al43cBAm6Re.7Loc1HALtRJpNi2bJ0w8esHUQC6Zfu', NULL, '0578965423', '2024-01-30'),
(22, 'ww', 'ww@ww.com', '$2y$10$.cHcRpqROwos9BXF5P3JsewzMO9vkLcvFpeOBSyh0GUZMnov.0VGm', NULL, '1234567890', '2022-03-04'),
(23, 'mn', 'mn@mn.com', '$2y$10$JS3OjSLVlsQm0HJ5wff/W.HIFtMRfCFAmOG6sMgD/Johs1pXUeI9u', NULL, '5555555555', '2005-05-05'),
(24, 'faisal', 'faisal@gmail.com', '$2y$10$L.zU7PJDB/Z0200WcH9OuukurIKtel2xvNnDVzJpXZ39NouCTMUfO', NULL, '0532606063', '2001-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`AnswerID`),
  ADD KEY `answers_ibfk_1` (`id`),
  ADD KEY `answers_ibfk_2` (`QuestionID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `comments_ibfk_1` (`id`),
  ADD KEY `comments_ibfk_2` (`QuestionID`),
  ADD KEY `comments_ibfk_3` (`AnswerID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `questions_ibfk_1` (`id`);

--
-- Indexes for table `question_comments`
--
ALTER TABLE `question_comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `question_comments_ibfk_1` (`id`),
  ADD KEY `question_comments_ibfk_2` (`QuestionID`);

--
-- Indexes for table `question_comment_rating`
--
ALTER TABLE `question_comment_rating`
  ADD PRIMARY KEY (`RatingID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `fk_questiont_id` (`QuestionID`),
  ADD KEY `ratings_ibfk_1` (`id`),
  ADD KEY `ratings_ibfk_2` (`AnswerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `AnswerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `question_comments`
--
ALTER TABLE `question_comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question_comment_rating`
--
ALTER TABLE `question_comment_rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`AnswerID`) REFERENCES `answers` (`AnswerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_comments`
--
ALTER TABLE `question_comments`
  ADD CONSTRAINT `question_comments_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_comments_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_questiont_id` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`AnswerID`) REFERENCES `answers` (`AnswerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
