-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 03:37 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Book_ID` int(10) NOT NULL,
  `Book_Name` varchar(255) NOT NULL,
  `Book_Author` varchar(255) DEFAULT NULL,
  `Book_Category` text NOT NULL,
  `Book_Condition` tinytext NOT NULL,
  `Book_Description` varchar(2000) DEFAULT NULL,
  `Book_Language` tinytext NOT NULL,
  `Times_Borrowed` int(10) DEFAULT NULL,
  `Times_Arrived` datetime DEFAULT NULL,
  `Borrower` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_ID`, `Book_Name`, `Book_Author`, `Book_Category`, `Book_Condition`, `Book_Description`, `Book_Language`, `Times_Borrowed`, `Times_Arrived`, `Borrower`) VALUES
(2, 'Peter and Jane', 'William', 'Non-Fiction', 'Unavailable', 'PETER AND JAAAAAAAAAAAAAAAAAAAAAAAAANE', 'English', 1, '2022-03-12 00:00:00', 1),
(12, 'Bimasakti Menari', 'Sri Rahayu Mohd. Yusop', 'Non-Fiction', 'Available', '', 'Malay', NULL, '2022-03-21 16:20:47', NULL),
(20, '三国演义', '罗贯中', 'Fiction', 'Available', '', 'Chinese', NULL, '2022-03-15 00:00:00', NULL),
(101, 'Harry Potter and the Philosopher Stone', 'J. K. Rowling', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:09:28', NULL),
(102, 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:14:19', NULL),
(103, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:14:45', NULL),
(104, 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:15:04', NULL),
(105, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:15:31', NULL),
(106, 'Harry Potter and the Half-Blood Prince', 'J. K. Rowling', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:15:53', NULL),
(107, 'Harry Potter and the Deathly Hallows', 'J. K. Rowling', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:16:27', NULL),
(203, ' One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:21:58', NULL),
(204, '水浒传', '施耐庵', 'Fiction', 'Available', '', 'Chinese', NULL, '2022-03-21 16:23:14', NULL),
(205, 'Goosebumps - One Day at HorrorLand', 'R. L. Stine', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:24:10', NULL),
(206, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:22:21', NULL),
(208, '红楼梦', '曹雪芹', 'Fiction', 'Available', '', 'Chinese', NULL, '2022-03-21 16:22:49', NULL),
(301, 'Goosebumps - Say Cheese', 'R. L. Stine', 'Fiction', 'Available', '', 'English', NULL, '2022-03-21 16:24:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `Seat_ID` int(10) NOT NULL,
  `Seat_Num` varchar(255) NOT NULL,
  `Seat_Condition` tinytext NOT NULL,
  `Seater` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`Seat_ID`, `Seat_Num`, `Seat_Condition`, `Seater`) VALUES
(1, 'Seat #1', 'Available', NULL),
(2, 'Seat #2', 'Available', NULL),
(3, 'Seat #3', 'Available', NULL),
(4, 'Seat #4', 'Available', NULL),
(5, 'Seat #5', 'Available', NULL),
(6, 'Seat #6', 'Available', NULL),
(7, 'Seat #7', 'Available', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Users_ID` int(10) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Users_ID`, `Username`, `User_Password`) VALUES
(1, 'woon', 'a938dfdfbaa1f25ccbc39e16060f73c44e5ef0dd'),
(2, 'asd', '0e747aaa0f03a7b7bb9a964f47fe7c508be7b086'),
(3, 'Dummy', 'b3a00630985abbe2fe153dd0a2ea384eab755b07'),
(999, 'ADMIN', 'b521caa6e1db82e5a01c924a419870cb72b81635');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Book_ID`),
  ADD KEY `Borrower` (`Borrower`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`Seat_ID`),
  ADD KEY `Seater` (`Seater`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Users_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`Borrower`) REFERENCES `users` (`Users_ID`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`Seater`) REFERENCES `users` (`Users_ID`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Set Available` ON SCHEDULE EVERY 1 DAY STARTS '2022-03-16 10:01:00' ENDS '2024-03-26 10:01:00' ON COMPLETION PRESERVE ENABLE COMMENT 'available' DO UPDATE seat SET Seat_Condition='Available', Seater=null$$

CREATE DEFINER=`root`@`localhost` EVENT `Set Unavailable` ON SCHEDULE EVERY 1 DAY STARTS '2022-03-15 22:00:00' ENDS '2022-03-31 22:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'unavailable' DO UPDATE seat SET Seat_Condition='Not Available', Seater=null$$

CREATE DEFINER=`root`@`localhost` EVENT `Trending` ON SCHEDULE EVERY 1 MONTH STARTS '2022-03-14 00:00:00' ENDS '2023-03-31 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE book SET Times_Borrowed = null$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
