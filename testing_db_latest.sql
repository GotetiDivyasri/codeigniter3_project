-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2025 at 02:08 PM
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
-- Database: `testing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `image`, `description`) VALUES
(1, 'About TechFlow', '1754646030_pic-3.jpg', 'We\'re passionate about helping businesses transform through technology.\r\n\r\nWith over a decade of experience, we\'ve helped hundreds of companies streamline their operations, increase efficiency, and achieve their digital transformation goals.\r\n\r\nExpert Tea');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `status`) VALUES
(1, 'divya', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_logs`
--

CREATE TABLE `admin_login_logs` (
  `id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `admin_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login_logs`
--

INSERT INTO `admin_login_logs` (`id`, `address`, `admin_id`, `created_at`) VALUES
(1, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(2, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(3, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(4, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(5, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(6, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(7, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(8, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(9, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(10, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(11, '127.0.0.1', '1', '0000-00-00 00:00:00'),
(12, '127.0.0.1', '1', '2025-08-07 19:38:00'),
(13, '127.0.0.1', '1', '2025-08-07 19:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `service_id`, `message`) VALUES
(3, 'Goteti Divyasri', 'divyagoteti13@gmail.com', 'asdasd', 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `our_clients`
--

CREATE TABLE `our_clients` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rating` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_clients`
--

INSERT INTO `our_clients` (`id`, `image`, `title`, `description`, `rating`) VALUES
(1, '1754647415_pic-2.jpg', 'Sarah Johnson', '\"TechFlow transformed our business operations completely. Their expertise is unmatched!\"', '5'),
(2, '1754647448_pic-3.jpg', 'Michael Chen', '\"The team at TechFlow delivered beyond our expectations. Highly recommended!\"', '4'),
(3, '1754647467_pic-2.jpg', 'Emily Rodriguez', '\"Outstanding service and support. TechFlow is a true partner in growth.\"', '4');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `icon`) VALUES
(1, 'Cloud Solutions', 'Migrate to the cloud with our expert guidance and support.', 'bi bi-cloud-arrow-up'),
(2, 'Mobile Development', 'Create powerful mobile apps for iOS and Android platforms.', 'bi bi-phone'),
(3, 'DevOps', 'Streamline your development and deployment processes.', 'bi bi-gear'),
(4, 'Cybersecurity', 'Protect your business with advanced security solutions.', 'bi bi-shield-lock'),
(5, 'Data Analytics', 'Turn your data into actionable insights.', 'bi bi-graph-up-arrow'),
(6, 'AI & Machine Learning', 'Harness the power of artificial intelligence.', 'bi bi-robot');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(100) DEFAULT NULL,
  `footer_description` varchar(100) DEFAULT NULL,
  `site_email` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `fav_icon` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `why_choose_title` varchar(100) DEFAULT NULL,
  `why_choose_desc` varchar(255) DEFAULT NULL,
  `our_service_title` varchar(100) DEFAULT NULL,
  `our_service_desc` varchar(255) DEFAULT NULL,
  `our_client_title` varchar(100) DEFAULT NULL,
  `our_client_desc` varchar(255) DEFAULT NULL,
  `contact_title` varchar(100) DEFAULT NULL,
  `contact_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_title`, `footer_description`, `site_email`, `logo`, `fav_icon`, `phone_number`, `why_choose_title`, `why_choose_desc`, `our_service_title`, `our_service_desc`, `our_client_title`, `our_client_desc`, `contact_title`, `contact_desc`) VALUES
(1, 'TechFlow', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 'divyagoteti13@gmail.com', '1754628389_download.jpeg', '1754628389_download1.jpeg', '9121714996', 'Why Choose TechFlow?', 'Discover the features that set us apart', 'Our Services', 'Comprehensive solutions for your business needs', 'What Our Clients Say', 'Don\'t just take our word for it', 'Get In Touch', 'Ready to transform your business? Let\'s talk.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`) VALUES
(1, 'Transform Your Business with Innovation', 'Empower your team with cutting-edge technology solutions that drive growth and efficiency.', '1754637896_pic-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `icon`, `link`) VALUES
(1, 'Facebook', 'bi bi-facebook', 'https://www.facebook.com/'),
(2, 'Twitter', 'bi bi-twitter', 'https://www.twitter.com/'),
(3, 'Linkedin', 'bi bi-linkedin', 'https://www.linkedin.com/'),
(4, 'Instagram', 'bi bi-instagram', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `icon`, `title`, `description`) VALUES
(1, 'bi bi-lightning-charge', 'Lightning Fast', 'Experience blazing fast performance with our optimized solutions.'),
(3, 'bi bi-shield-check', 'Secure & Reliable', 'Enterprise-grade security with 99.9% uptime guarantee.'),
(4, 'bi bi-graph-up', 'Scalable Growth', 'Grow your business with solutions that scale with you.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login_logs`
--
ALTER TABLE `admin_login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `our_clients`
--
ALTER TABLE `our_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_login_logs`
--
ALTER TABLE `admin_login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `our_clients`
--
ALTER TABLE `our_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
