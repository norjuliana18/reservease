-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 05:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group2`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `name_on_card` varchar(255) NOT NULL,
  `credit_card_number` varchar(16) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`email`, `full_name`, `name_on_card`, `credit_card_number`, `exp_month`, `exp_year`, `cvv`, `created_at`, `amount`) VALUES
('norjuliana_lan_bi21@iluv.ums.edu.my', 'kfdkk', 'Nurul', '8696878', '08', 2028, '099', '2024-01-15 06:23:08', 100.00),
('khaliddr@gmail.com', 'Khalid', 'Khalid', '0100780070061924', '06', 2028, '033', '2024-01-15 09:04:20', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `reservation1`
--

CREATE TABLE `reservation1` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `restaurant_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `name`, `description`, `address`, `contact`, `created_at`, `updated_at`, `restaurant_image`) VALUES
(1, 'Oriental Elegance Reserve', 'A sophisticated dining experience where the rich flavors of Asian cuisine come together in an elegant setting. From traditional dishes to modern interpretations, Oriental Elegance Reserve promises a culinary journey through the heart of Asia.', '123 Orchid Street, Cityville, Malaysia', '+088 456 7890', '2024-01-13 08:00:11', '2024-01-13 16:12:17', 'images/Jetgala_39_Feb-Apr_fine_dining_mozaic_restaurant.jpeg'),
(2, 'Serenity Grille & Lounge', 'Serenity Grille & Lounge offers a serene ambiance paired with a diverse menu inspired by Western culinary traditions. Immerse yourself in the flavors of carefully crafted dishes, expertly prepared to elevate your dining experience.', '456 Oak Avenue, Townsville, Malaysia', '+088 654 3210', '2024-01-13 14:10:58', '2024-01-13 16:13:02', 'images/western.jpg'),
(3, 'Royal Arabian Oasis', 'Indulge in the opulence of Royal Arabian Oasis, where the authenticity of Arabic cuisine meets regal surroundings. From aromatic spices to exquisite decor, every detail is tailored to transport you to the heart of the Middle East.', '789 Sand Dune Road, Arabia Town, Malaysia', '+088 543 2109', '2024-01-13 14:24:46', '2024-01-13 16:13:56', 'images/arabic.jpg'),
(4, 'Eden Sakura', 'Discover the tranquility of Eden Sakura, a haven for Japanese culinary enthusiasts. Impeccably prepared sushi, sashimi, and other delights await in a garden-inspired setting, offering a taste of Japan in every bite.', '567 Cherry Blossom Lane, Zen Gardens,Malaysia', '+088 567 8901', '2024-01-13 14:24:46', '2024-01-13 16:14:33', 'images/graze_hilton_03.jpg'),
(5, 'Château de Saveurs', 'Immerse yourself in the romance of French culinary artistry at Château de Saveurs. From exquisite pastries to classic haute cuisine, our menu is a celebration of flavors that capture the essence of France. Enjoy an elegant dining experience in an ambiance that echoes the charm of a French château.', '101 Culinaryville, France Town, Malaysia', '+088 012 3456', '2024-01-13 14:34:05', '2024-01-13 16:15:12', 'images/c757d24db5884454ad98ce963383355e_Alain-Ducasse-Macau.jpg'),
(6, 'Mystique Spice Haven', 'Mystique Spice Haven invites you on a journey through the vibrant and aromatic world of Indian cuisine. From rich curries to tantalizing spices, experience the mystique of India in an atmosphere that complements the bold flavors served.', '890 Spice Street, Masala City, Malaysia', '+088 678 9012', '2024-01-13 14:35:50', '2024-01-13 16:16:02', 'images/pincode.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `review_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `restaurant_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPwd` varchar(255) NOT NULL,
  `userRoles` int(11) NOT NULL DEFAULT 2 COMMENT '1 - Systemadmin, 2 - Restaurantadmin, 3 - Customer',
  `registrationDate` date NOT NULL DEFAULT curdate(),
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation1`
--
ALTER TABLE `reservation1`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviews_ibfk_2` (`restaurant_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation1`
--
ALTER TABLE `reservation1`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation1`
--
ALTER TABLE `reservation1`
  ADD CONSTRAINT `reservation1_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation1_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
