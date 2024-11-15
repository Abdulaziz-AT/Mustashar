-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 11:24 AM
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
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `experience` int(3) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `first_name`, `last_name`, `email`, `password`, `age`, `phone_number`, `field`, `experience`, `bio`, `is_available`) VALUES
(37, 'Alice', 'Smith', 'alice.smith@example.com', 'password123', 29, '1234567890', 'Requirements Gathering', 5, 'Experienced in gathering and documenting software requirements.', 1),
(38, 'Bob', 'Johnson', 'bob.johnson@example.com', 'password123', 35, '0987654321', 'Requirements Gathering', 7, 'Specializes in requirements analysis and stakeholder communication.', 1),
(39, 'Carol', 'Williams', 'carol.williams@example.com', 'password123', 32, '2345678901', 'Requirements Gathering', 6, 'Expert in translating business needs into technical specifications.', 1),
(40, 'David', 'Brown', 'david.brown@example.com', 'password123', 28, '8765432109', 'Requirements Gathering', 4, 'Focuses on agile methodologies for requirements gathering.', 1),
(41, 'Eve', 'Jones', 'eve.jones@example.com', 'password123', 40, '3456789012', 'Quality Assurance', 10, 'Skilled in software testing and quality control.', 1),
(42, 'Frank', 'Miller', 'frank.miller@example.com', 'password123', 27, '7654321098', 'Quality Assurance', 3, 'Specializes in automated and manual testing.', 1),
(43, 'Grace', 'Davis', 'grace.davis@example.com', 'password123', 34, '4567890123', 'Quality Assurance', 8, 'Focused on performance and load testing.', 1),
(44, 'Henry', 'Garcia', 'henry.garcia@example.com', 'password123', 31, '6543210987', 'Quality Assurance', 5, 'QA expert with experience in regression testing.', 1),
(45, 'Ivy', 'Martinez', 'ivy.martinez@example.com', 'password123', 29, '5678901234', 'Quality Assurance', 4, 'Handles test case design and execution.', 1),
(46, 'Jack', 'Wilson', 'jack.wilson@example.com', 'password123', 36, '8901234567', 'Quality Assurance', 9, 'Expert in security and compliance testing.', 1),
(47, 'Kate', 'Anderson', 'kate.anderson@example.com', 'password123', 30, '6789012345', 'Project Management', 6, 'Specializes in agile project management and team leadership.', 1),
(48, 'Liam', 'Thomas', 'liam.thomas@example.com', 'password123', 37, '7890123456', 'Project Management', 10, 'Experienced in leading cross-functional teams.', 1),
(49, 'Mia', 'Moore', 'mia.moore@example.com', 'password123', 33, '9012345678', 'Project Management', 7, 'Focuses on risk management and project delivery.', 1),
(50, 'Noah', 'Taylor', 'noah.taylor@example.com', 'password123', 28, '0123456789', 'Project Management', 4, 'Expert in scheduling and resource management.', 1),
(51, 'Olivia', 'Lee', 'olivia.lee@example.com', 'password123', 32, '1234509876', 'Project Management', 8, 'Proficient in project planning and execution.', 1),
(52, 'Peter', 'Clark', 'peter.clark@example.com', 'password123', 25, '2345609871', 'UX/UI', 3, 'Designs user-friendly and aesthetically pleasing interfaces.', 1),
(53, 'Quincy', 'Harris', 'quincy.harris@example.com', 'password123', 29, '3456709812', 'UX/UI', 5, 'Focused on improving user experience through research.', 1),
(54, 'Rachel', 'Young', 'rachel.young@example.com', 'password123', 26, '4567809123', 'UX/UI', 4, 'Skilled in prototyping and user testing.', 1),
(55, 'Sam', 'Walker', 'sam.walker@example.com', 'password123', 31, '5678901234', 'UX/UI', 6, 'Specializes in responsive and adaptive designs.', 1),
(56, 'Tom', 'Lopez', 'tom.lopez@example.com', 'password123', 28, '6789012345', 'Data Science', 4, 'Data scientist focused on machine learning and analytics.', 1),
(57, 'Uma', 'Scott', 'uma.scott@example.com', 'password123', 30, '7890123456', 'Artificial Intelligence', 5, 'AI specialist with experience in natural language processing.', 1),
(58, 'Victor', 'King', 'victor.king@example.com', 'password123', 35, '8901234567', 'Cyber Security', 8, 'Cyber security expert specializing in threat detection.', 1),
(59, 'Wendy', 'Green', 'wendy.green@example.com', 'password123', 27, '9012345678', 'IoT', 3, 'IoT engineer with experience in smart devices and networks.', 1),
(60, 'Xander', 'Hall', 'xander.hall@example.com', 'password123', 33, '1234567890', 'AR/VR', 6, 'AR/VR developer focused on immersive experiences.', 1),
(61, 'Yasmine', 'Baker', 'yasmine.baker@example.com', 'password123', 29, '2345678901', 'Data Science', 5, 'Data scientist with expertise in data visualization.', 1),
(62, 'Zach', 'Evans', 'zach.evans@example.com', 'password123', 32, '3456789012', 'Artificial Intelligence', 7, 'AI engineer specializing in deep learning.', 1),
(63, 'Aaron', 'Mitchell', 'aaron.mitchell@example.com', 'password123', 31, '4567890123', 'Cyber Security', 5, 'Cyber security analyst with a focus on ethical hacking.', 1),
(64, 'Bella', 'Carter', 'bella.carter@example.com', 'password123', 28, '5678901234', 'IoT', 4, 'IoT specialist with experience in industrial automation.', 1),
(65, 'Charles', 'Nelson', 'charles.nelson@example.com', 'password123', 34, '6789012345', 'AR/VR', 7, 'Developer creating AR/VR solutions for education and training.', 1),
(66, 'Abdulrahman', 'Fahad', 'abdulrahman@gmail.com', '$2y$10$rKyezuduoSuYp4bJh3JMc.07WbgVmI2mmni5ku0rQimi6sQCFgPV.', 29, '0554423121', 'Artificial Intelligence', 8, 'AI specialist focused on developing intelligent systems and innovative solutions. Passionate about machine learning, data-driven insights, and advancing technology for real-world impact.', 1),
(67, 'Abdulaziz', 'Altekhaifi', 'abdulaziz@gmail.com', '$2y$10$4b2F1wfiBUWnXRjzQoKX4.DLgwvCpvZGuSsSgNTBBb89CiefmD1GO', 22, '0532606063', 'Requirements Gathering', 3, 'Experienced in requirement gathering, ensuring clear understanding of client needs to develop effective and efficient solutions. Skilled in translating user expectations into actionable technical requirements.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `consultant_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `consultant_id`, `status`, `created_at`) VALUES
(13, 1, 67, 'active', '2024-11-02 16:02:23'),
(14, 2, 67, 'active', '2024-11-02 16:03:28'),
(15, 3, 67, 'active', '2024-11-02 16:04:18'),
(16, 4, 67, 'pending', '2024-11-02 16:14:46'),
(17, 5, 67, 'active', '2024-11-02 16:16:49'),
(18, 6, 66, 'active', '2024-11-02 16:19:26'),
(19, 6, 67, 'active', '2024-11-02 16:19:32'),
(20, 4, 42, 'pending', '2024-11-04 23:07:12'),
(21, 4, 66, 'active', '2024-11-04 23:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `bio`, `phone_number`, `birthdate`) VALUES
(1, 'Bader', 'Bader@gmail.com', '$2y$10$dLtzuapQYJdvB9YY7d.BveYNHXBXZJfAioF1rLRJ5FhQXsLovIm4u', NULL, '0546678462', '2001-01-01'),
(2, 'Mohammed', 'mohammed@gmail.com', '$2y$10$chykI2GYP8riPkEZjIhJW.lYeYvJzLsfovpUZVOI3AS3KqG62SRuO', NULL, '0555555555', '2000-01-01'),
(3, 'Ahmad', 'ahmad@gmail.com', '$2y$10$JJG3FxhAuSsJuQ0x1f6A1ehK.pmQKbItSbaR.uByblpP4cqQRRro6', NULL, '0545455454', '2000-02-02'),
(4, 'Saud', 'saud@gmail.com', '$2y$10$gdM2jEFoPS5k86qp.U3p3.st9DCWEzYSUpN8rrSuum03GoZ3wu9oK', NULL, '0554375688', '2000-01-01'),
(5, 'Zeyad', 'zeyad@gmail.com', '$2y$10$c3gOrjV1Lx/ziV2qoOgtEeEux6LjnUbKpla5ETmG/SNkOQVe8uyNq', NULL, '0546678965', '2000-02-02'),
(6, 'Saqer', 'saqer@gmail.com', '$2y$10$3/3J10wCj6QOJw/ib6hhGOLL7kNAgPLeZjN39Ve3jQL8TBMdjpMPG', NULL, '055467893', '2000-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
