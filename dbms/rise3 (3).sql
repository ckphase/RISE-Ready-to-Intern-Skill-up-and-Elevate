-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 06:53 PM
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
-- Database: `rise3`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_by` int(11) DEFAULT NULL,
  `target_role` enum('student','company','all') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority` enum('normal','high','urgent') NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `message`, `sent_by`, `target_role`, `created_at`, `priority`) VALUES
(1, 'Announcement', 'Kindly complete your profiles.', NULL, '', '2025-07-12 16:44:59', 'high'),
(2, 'New opportunity ', 'New internship for web designing.', NULL, '', '2025-07-12 16:45:46', 'urgent');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `internship_id` int(11) DEFAULT NULL,
  `status` enum('applied','accepted','rejected','withdrawn') DEFAULT 'applied',
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `approval_status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company_name`, `description`, `approval_status`, `created_at`, `location`) VALUES
(111, 3, 'Minatozaki Sana', NULL, 'pending', '2025-07-11 11:59:25', ''),
(112, 6, 'Jennie Ruby', NULL, 'pending', '2025-07-11 11:59:25', ''),
(113, 8, 'Irene Bae', NULL, 'pending', '2025-07-11 11:59:25', '');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `stipend` varchar(50) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `status` enum('open','closed') DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`id`, `company_id`, `title`, `description`, `location`, `duration`, `stipend`, `last_date`, `status`, `created_at`) VALUES
(21, 111, 'Web Development Industrial Training', 'Full-stack web training with hands-on projects in HTML, CSS, JavaScript, and PHP.', 'Jalandhar', '6 weeks', '₹3000 (Paid by student)', '2025-08-10', 'open', '2025-07-11 12:03:16'),
(22, 111, 'Python for Data Analytics', 'Training on Python basics, data handling with Pandas, and data visualization.', 'Jalandhar', '6 weeks', '₹3500 (Paid by student)', '2025-08-12', 'open', '2025-07-11 12:03:16'),
(23, 112, 'Android App Development', 'Industrial Android training using Kotlin, Java, and Firebase integration.', 'Ludhiana', '8 weeks', '₹4000 (Paid by student)', '2025-08-14', 'open', '2025-07-11 12:03:16'),
(24, 112, 'Cybersecurity Bootcamp', 'Intro to cybersecurity tools, ethical hacking basics, and secure coding.', 'Jalandhar', '4 weeks', '₹3000 (Paid by student)', '2025-08-18', 'open', '2025-07-11 12:03:16'),
(25, 113, 'Networking with Cisco', 'Learn computer networking with practical Cisco Packet Tracer labs.', 'Amritsar', '6 weeks', '₹3500 (Paid by student)', '2025-08-20', 'open', '2025-07-11 12:03:16'),
(26, 113, 'Full Stack with MERN', 'JavaScript-heavy full stack training using MongoDB, Express, React, and Node.', 'Jalandhar', '8 weeks', '₹5000 (Paid by student)', '2025-08-22', 'open', '2025-07-11 12:03:16'),
(27, 111, 'UI/UX Design Basics', 'Learn user interface design and tools like Figma, Adobe XD, and Canva.', 'Jalandhar', '4 weeks', '₹2500 (Paid by student)', '2025-08-25', 'open', '2025-07-11 12:03:16'),
(28, 112, 'Cloud Computing & AWS', 'Industrial intro to cloud concepts with AWS services and live labs.', 'Patiala', '6 weeks', '₹4000 (Paid by student)', '2025-08-27', 'open', '2025-07-11 12:03:16'),
(29, 113, 'Machine Learning Intro', 'Start with Python ML libraries like scikit-learn, NumPy, and Pandas.', 'Mohali', '6 weeks', '₹4500 (Paid by student)', '2025-08-29', 'open', '2025-07-11 12:03:16'),
(30, 111, 'IoT & Embedded Systems', 'Arduino and sensors-based practical training for IoT projects.', 'Jalandhar', '6 weeks', '₹4200 (Paid by student)', '2025-08-30', 'open', '2025-07-11 12:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `email`, `subject`, `message`, `created at`) VALUES
(1, 'Customer 1', 'customer@mail.com', 'Review pending', 'My account not working.', '2025-07-11 11:24:48'),
(2, 'Customer2', 'customer2@gmail.com', 'Server Down', 'Help me asap I need to complete an important task.', '2025-07-11 11:28:03'),
(3, 'Customer3', 'customer3@gmail.com', 'Not able to apply', 'I am not able to apply to any company.', '2025-07-11 11:36:03'),
(4, 'Customer4', 'customer4@gmail.com', 'Forgot my user id', 'I forgot my user id, need to login.', '2025-07-11 11:36:35'),
(5, 'Company1', 'customer5@gmail.com', 'A new company', 'We are a new company in the market. Well if u would like to work with us kindly contact us on XXX11XXX11.', '2025-07-11 11:36:57'),
(6, 'Company2', 'customer6@gmail.com', 'Offer', 'Offering you a deal with XYZ enterprizes. Contact us asap.', '2025-07-11 11:37:17'),
(7, 'Company3', 'customer7@gmail.com', 'Would u like to work with us ?', 'We are an emerging enterprize and can benefit you a lot. We are ready for remote intakes.', '2025-07-11 11:37:28'),
(8, 'Customer8', 'customer8@gmail.com', 'Not able to apply', 'I am not able to apply to any company.', '2025-07-11 11:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `resume_path`, `student_id`, `created_at`) VALUES
(8, 1, NULL, NULL, '2025-07-10 17:37:14'),
(9, 2, NULL, NULL, '2025-07-10 17:37:14'),
(10, 4, NULL, NULL, '2025-07-10 17:37:14'),
(11, 7, NULL, NULL, '2025-07-10 17:37:14'),
(12, 10, NULL, NULL, '2025-07-10 17:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `role` enum('admin','student','company') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `role`, `status`, `created_at`) VALUES
(1, 'Jimin Park', 'jimin@example.com', 'hashed_password1', '9876543210', 'student', 'active', '2025-07-10 17:37:14'),
(2, 'Lisa Kim', 'lisa@example.com', 'hashed_password2', '9876543211', 'student', 'active', '2025-07-10 17:37:14'),
(3, 'Minatozaki Sana', 'sana@example.com', 'hashed_password3', '9876543212', 'company', 'inactive', '2025-07-10 17:37:14'),
(4, 'Kim Taehyung', 'tae@example.com', 'hashed_password4', '9876543213', 'student', 'active', '2025-07-10 17:37:14'),
(5, 'RM Kim', 'rm@example.com', 'hashed_password5', '9876543214', 'admin', 'active', '2025-07-10 17:37:14'),
(6, 'Jennie Ruby', 'jennie@example.com', 'hashed_password6', '9876543215', 'company', 'inactive', '2025-07-10 17:37:14'),
(7, 'Jungkook Jeon', 'jk@example.com', 'hashed_password7', '9876543216', 'student', 'active', '2025-07-10 17:37:14'),
(8, 'Irene Bae', 'irene@example.com', 'hashed_password8', '9876543217', 'company', 'active', '2025-07-10 17:37:14'),
(9, 'SUGA Min', 'suga@example.com', 'hashed_password9', '9876543218', 'admin', 'active', '2025-07-10 17:37:14'),
(10, 'Chandan Kaur', 'chandan@example.com', 'hashed_password10', '9876543219', 'student', 'inactive', '2025-07-10 17:37:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sent_by` (`sent_by`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `internship_id` (`internship_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`sent_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
