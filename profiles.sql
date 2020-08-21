-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 07:36 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_profiles`
--

CREATE TABLE `create_profiles` (
  `Id` int(11) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Profession` varchar(255) NOT NULL,
  `Urls` varchar(255) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Locations` varchar(255) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Images` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_profiles`
--

INSERT INTO `create_profiles` (`Id`, `Names`, `Profession`, `Urls`, `Gender`, `Locations`, `Skills`, `Images`, `Email`) VALUES
(9, 'MrDracoula', 'Junior Developer', 'https://www.google.com/search?sxsrf=ACYBGNRYqs4H19Mjvvuh-76QDXyFfsJGRg%3A1580499659130&ei=y4I0Xr_SB-Gh1fAPtJyksA0&q=exclamation+mark+tag+html+css&oq=exclamation+mark+tag+html+css&gs_l=psy-ab.3...3349.5869..6060...1.0..0.285.2286.0j7j5......0....1j2..gws-w', '0', 'Canda , misr', ' ASDAS ASDAS ASDAS ASDAS ASDAS ASDAS', '6cf8dd1a-b20b-4393-901d-5b838dd04e4b.jpg', 'hassanaboeata@gmail.com'),
(11, 'Olympus', 'Senior Developer', 'https://www.w3schools.com/php/php_functions.asp', 'M', 'Korea, Swizarand', 'Django Frame work', 'bfd3f243-627e-4cef-bb09-e6838d078458.jpg', 'Sezo@gmail.com'),
(13, 'HussienEida', 'Junior Developer', 'https://www.w3schools.com/php/php_file_upload.asp', 'M', 'Egypt , Giza , octobor', ' Internship , Google Developer , Django Developer ', 'IMG-20181219-WA0033.jpg', 'Husseind_eida@gmail.com'),
(15, 'Marawan', 'Student or Learning', 'www.marwanmeko.com', 'M', 'Egypt , Giza , asdr', ' asdas ,a,as,d, as,d,as', 'IMG-20181010-WA0005.jpg', 'marwaneida@gmail.com'),
(16, 'Koka', 'Senior Developer', 'www.marwanmeko.com', 'M', 'Egypt , Luxor , EL-3AWAMYA', ' JavaScript, HTML, CSS ,Project Management', 'IMG-20190418-WA0003.jpg', 'hassanaboeata@gmail.com'),
(18, 'Tester', 'Junior Developer', 'https://www.youtube.com/results?search_query=edit+profile+php+mysql', 'F', 'Lebanon , Kwarita', ' Tester Software application , Security ', 'IMG-20190622-WA0010.jpg', 'testforall@hotmail.com'),
(19, 'BIBO', 'Junior Developer', 'https://www.w3schools.com/php/php_file_upload.asp', 'M', 'Iraq , shwaria', ' VR Developer , AR Developer ', 'IMG-20190617-WA0021.jpg', 'bibohoda@yahoo.com'),
(25, 'TESTEDIT', 'Senior Developer', 'www.teset.com', 'F', 'Canda, Ras-sidr', 'SEO , Chief', 'IMG-20190112-WA0035.jpg', 'testforall@hotmail.com'),
(26, 'aaaaaaaaaaa', 'Student or Learning', 'www.facebook.com', 'M', 'Egypt , Luxor , EL-3AWAMYA', ' asd', 'back-end-development.png', 'Sezo@gmail.com'),
(27, 'HassanElshazly', 'Junior Developer', 'www.marwanmeko.com', 'M', 'Egypt , Giza , asdr', ' asd', 'IMG-20190117-WA0027.jpg', 'hassanaboeata@gmail.com'),
(32, '8ony', 'Student or Learning', 'www.marwanmeko.com', 'M', 'Egypt , Giza , 6th-octobor', 'django ', '90733c58-a641-4af3-8d3f-9cc63ea8d16e.jpg', 'hassanaboeata@gmail.com'),
(33, 'Hossam Mohamed', 'Junior Developer', 'https://www.youtube.com/watch?v=ywN-WkF4MeM', 'M', 'Egypt , Sini', ' Php deveoper ', 'IMG-20190416-WA0030.jpg', 'hassanaboeata@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_profiles`
--
ALTER TABLE `create_profiles`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_profiles`
--
ALTER TABLE `create_profiles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
