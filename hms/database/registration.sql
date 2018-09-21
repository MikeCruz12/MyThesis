-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 07:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'TheLifehacks00', 'BUWJMHKG00a');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `datenow` datetime NOT NULL,
  `about` varchar(2000) NOT NULL,
  `picture` blob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `datenow`, `about`, `picture`) VALUES
(1, 'tonytoni', '2018-03-11 08:06:42', 'What a great experience!', 0x53362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `hikerlist`
--

CREATE TABLE IF NOT EXISTS `hikerlist` (
`id` int(100) NOT NULL,
  `register_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `years` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `medical` varchar(100) NOT NULL,
  `requirements` blob NOT NULL,
  `status` varchar(100) NOT NULL,
  `attendance` varchar(100) NOT NULL,
  `sets` int(100) NOT NULL,
  `now` date NOT NULL,
  `last` date NOT NULL,
  `finish` varchar(100) NOT NULL,
  `departureTime` time NOT NULL,
  `departureDate` date NOT NULL,
  `hikerArrive` varchar(100) NOT NULL,
  `arriveTime` time NOT NULL,
  `arriveDate` date NOT NULL,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hikerlist`
--

INSERT INTO `hikerlist` (`id`, `register_id`, `name`, `age`, `contact`, `years`, `experience`, `medical`, `requirements`, `status`, `attendance`, `sets`, `now`, `last`, `finish`, `departureTime`, `departureDate`, `hikerArrive`, `arriveTime`, `arriveDate`, `remarks`) VALUES
(65, 180, 'mike edric a cruz', '21', '09282615601', '1 year', 'Intermediate', 'Physically Fit', 0x4e696e6a612e706466, 'Approved', 'Present', 26, '2018-03-01', '2018-03-02', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(66, 180, 'iyah perez ganalon', '20', '09494452186', 'None', 'Beginner', 'Physically Fit', 0x537572766579205175657374696f6e6e616972652e706466, 'Approved', 'Absent', 26, '2018-03-01', '2018-03-02', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(67, 181, 'rommel teves', '21', '09494452186', 'None', 'Beginner', 'none', 0x526573756d652d6d696b65202834292e706466, 'Approved', 'Present', 25, '2018-03-12', '2018-03-14', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(68, 181, 'justin bartolomeo', '22', '09282615601', '2 years', 'Intermediate', 'Physically Fit', 0x526573756d652d6d696b65202833292e706466, 'Approved', 'Present', 25, '2018-03-12', '2018-03-14', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(69, 181, 'jhiman salsedo', '20', '09282615601', '1 year', 'Beginner', 'Physically Fit', 0x6a63726573756d65312e706466, 'Disapproved', '', 25, '2018-03-12', '2018-03-14', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(70, 183, 'divy tinga', '21', '09282615601', '1 year', 'Beginner', 'none', 0x42756c6c79696e672e706466, 'Approved', 'Present', 26, '2018-04-14', '2018-04-14', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(71, 183, 'erika palatao', '21', '09282615601', '1 year', 'Beginner', 'none', 0x526f616c645f4461686c2e706466, 'Approved', 'Present', 26, '2018-04-14', '2018-04-14', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(72, 184, '2342', '21', '09282615601', 'None', 'Beginner', 'none', 0x526f616c645f4461686c2e706466, 'Approved', 'Present', 26, '2018-03-01', '2018-03-02', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(73, 184, '1223', '23', '09494452186', 'None', 'Beginner', 'none', 0x526573756d652d6d696b65202834292e706466, 'Disapproved', '', 26, '2018-03-01', '2018-03-02', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(74, 185, 'reynante cruz', '50', '09282615601', 'None', 'Beginner', 'none', 0x6a63726573756d65312e706466, 'Approved', 'Present', 25, '2018-02-03', '2018-02-04', 'arrived', '09:39:30', '2018-02-03', 'Arrived', '11:02:47', '2018-02-03', ''),
(75, 185, 'maria luisa cruz', '42', '09364829184', 'None', 'Beginner', 'none', 0x42756c6c79696e672e706466, 'Approved', 'Absent', 25, '2018-02-03', '2018-02-04', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(76, 186, '123213123', '21', '12323', 'None', 'Beginner', '23123', 0x526573756d652d6d696b65202832292e706466, 'Approved', 'Present', 25, '2018-02-10', '2018-02-11', 'arrived', '12:11:03', '2018-02-10', 'Arrived', '12:12:24', '2018-02-10', ''),
(77, 186, '123123', '21', '123213', 'None', 'Beginner', '234234', 0x5368616e6e6f6e5f48616c652e706466, 'Approved', 'Present', 25, '2018-02-10', '2018-02-11', 'arrived', '12:11:05', '2018-02-10', 'Arrived', '12:15:33', '2018-02-10', ''),
(78, 186, '123123', '21', '123123123', 'None', 'Beginner', '123123', 0x50726f706572746965732d6f662d4d61747465722d5f5f6f665f5f2d4d61747465722d616e642d4368616e67652d5f5f6f665f5f2d434b2d31322d4368656d69737472792d42617369635f735f76345f7476625f73312e706466, 'Approved', 'Absent', 25, '2018-02-10', '2018-02-11', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(79, 186, '234', '21', '324234', 'None', 'Beginner', '234234', 0x7374726573732d3134303230393030333535392d70687061707030312e706466, 'Disapproved', '', 25, '2018-02-10', '2018-02-11', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(80, 187, '23423', '21', '09282615601', '2 years', 'Intermediate', '23123', 0x526f616c645f4461686c2e706466, 'Approved', 'Present', 21, '2018-02-21', '2018-02-22', 'arrived', '12:32:06', '2018-02-21', 'Arrived', '12:39:24', '2018-02-25', ''),
(81, 187, '21', '21', '23123', 'None', 'Beginner', '123123', 0x4d696b65526573756d652e706466, 'Approved', 'Present', 21, '2018-02-21', '2018-02-22', 'arrived', '12:32:11', '2018-02-21', 'Arrived', '12:42:16', '2018-02-25', ''),
(82, 187, '123123', '23', '232313', 'None', 'Beginner', '123123', 0x4d696b65526573756d652e706466, 'Approved', 'Absent', 21, '2018-02-21', '2018-02-22', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(83, 187, '231', '22', '213123', 'None', 'Beginner', '123123', 0x4a616e655f476f6f64616c6c2e706466, 'Disapproved', '', 21, '2018-02-21', '2018-02-22', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(84, 189, '123123', '23', '123123', 'None', 'Beginner', '123123', 0x42756c6c79696e672e706466, 'Approved', 'Present', 21, '2018-02-26', '2018-02-26', 'arrived', '12:47:38', '2018-02-26', 'Arrived', '12:54:20', '2018-02-26', ''),
(85, 191, 'mike edric a cruz', '21', '09282615601', '1 year', 'Beginner', 'Physically Fit', 0x426f6e65732e706466, 'Disapproved', '', 26, '2018-03-07', '2018-03-08', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd'),
(86, 192, 'mike edric a cruz', '21', '09282615601', 'None', 'Beginner', 'Physically Fit', 0x42756c6c79696e672e706466, 'Approved', 'Present', 26, '2018-03-15', '2018-03-16', 'arrived', '10:13:15', '2018-03-15', 'Arrived', '18:10:07', '2018-03-16', ''),
(87, 192, 'iyah perez ganalon', '20', '09494452186', 'None', 'Beginner', 'Physically Fit', 0x50726f706572746965732d6f662d4d61747465722d5f5f6f665f5f2d4d61747465722d616e642d4368616e67652d5f5f6f665f5f2d434b2d31322d4368656d69737472792d42617369635f735f76345f7476625f73312e706466, 'Disapproved', '', 26, '2018-03-15', '2018-03-16', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', 'udafsdhfksdbfbksdbfksdbf sdfjhskdjbf sdjfhsdkjfb ksdjfksdbfbkjsdbfsdfkndfs'),
(88, 193, 'mike edric a cruz', '21', '09282615601', 'None', 'Beginner', 'Physically Fit', 0x526573756d652d6d696b65202831292e706466, 'Approved', '', 26, '2018-03-09', '0000-00-00', '', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(89, 194, 'mike edric a cruz', '21', '09282615601', 'None', 'Beginner', 'asdasd', 0x526573756d652d6d696b65202834292e706466, 'Approved', 'Present', 26, '2018-03-11', '2018-03-12', 'arrived', '11:27:31', '2018-03-11', 'Arrived', '14:38:18', '2018-03-12', ''),
(90, 194, 'asdasd', '22', '09282615601', '1 year', 'Beginner', '234234', 0x526573756d652d6d696b65202834292e706466, 'Disapproved', '', 26, '2018-03-11', '2018-03-12', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', 'hgjhvj'),
(91, 197, 'rhoi racelis', '20', '09283910392', '2 years', 'Intermediate', 'Physically Fit', 0x526f616c645f4461686c2e706466, 'Approved', 'Present', 26, '2018-03-11', '2018-03-11', 'arrived', '16:58:45', '2018-03-11', 'Arrived', '19:59:42', '2018-03-11', ''),
(93, 197, 'james flores', '21', '09282615601', 'None', 'Beginner', 'asthma', 0x526573756d65286d696b65292e706466, 'Disapproved', '', 26, '2018-03-11', '2018-03-11', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', 'bad health condition '),
(94, 197, 'marwin tan', '22', '09494452186', '4 years', 'Professional', 'Physically Fit', 0x4d494e495f5441534b2e706466, 'Approved', 'Absent', 26, '2018-03-11', '2018-03-11', 'arrived', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(95, 199, 'asdfds', '21', '09282615601', 'None', 'Beginner', '23423', 0x6372757a2e706466, '', '', 21, '2018-03-21', '0000-00-00', '', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(96, 199, 'iyah perez ganalon', '23', '09282615601', 'None', 'Intermediate', '123', 0x6372757a2e706466, '', '', 21, '2018-03-21', '0000-00-00', '', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(97, 199, 'mike edric a cruz', '23', '09494452186', 'None', 'Intermediate', '2312', 0x6372757a2e706466, '', '', 21, '2018-03-21', '0000-00-00', '', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(98, 199, 'mike edric a cruz', '22', '09282615601', 'None', 'Beginner', '234234', 0x6372757a2e706466, '', '', 21, '2018-03-21', '0000-00-00', '', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', ''),
(99, 199, 'mike edric a cruz', '23', '09282615601', 'More Than 5 Years', 'Professional', 'none', 0x6372757a2e706466, '', '', 21, '2018-03-21', '0000-00-00', '', '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
`id` int(11) NOT NULL,
  `setspot_id` int(11) NOT NULL,
  `datenow` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `days` int(100) NOT NULL,
  `startTime` time NOT NULL,
  `until` time NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateConfirmed` date NOT NULL,
  `done` varchar(100) NOT NULL,
  `arriveDate` date NOT NULL,
  `arrive` date NOT NULL,
  `arriveTime` time NOT NULL,
  `arriveStatus` varchar(100) NOT NULL,
  `groupTime` time NOT NULL,
  `groupDate` date NOT NULL,
  `tourguide` varchar(100) NOT NULL,
  `guide` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `setspot_id`, `datenow`, `user_id`, `date`, `days`, `startTime`, `until`, `status`, `dateConfirmed`, `done`, `arriveDate`, `arrive`, `arriveTime`, `arriveStatus`, `groupTime`, `groupDate`, `tourguide`, `guide`) VALUES
(185, 25, '2018-02-02 09:22:29', 94, '2018-02-03', 2, '07:00:00', '20:00:00', 'Approved', '2018-02-02', 'done', '2018-02-04', '2018-02-03', '11:03:59', 'Arrived', '09:51:31', '2018-02-03', 'No', ''),
(186, 20, '2018-02-03 12:07:33', 89, '2018-02-10', 2, '02:00:00', '22:00:00', 'Approved', '2018-02-03', 'done', '2018-02-11', '2018-02-10', '12:15:57', 'Arrived', '12:11:51', '2018-02-10', 'No', ''),
(187, 21, '2018-02-10 12:29:02', 88, '2018-02-21', 2, '05:00:00', '18:00:00', 'Approved', '2018-02-10', 'done', '2018-02-22', '2018-02-25', '12:42:17', 'Arrived', '12:32:17', '2018-02-21', 'No', ''),
(189, 21, '2018-02-25 12:46:38', 92, '2018-02-26', 1, '00:32:00', '12:31:00', 'Approved', '2018-02-25', 'done', '2018-02-26', '2018-02-26', '12:54:26', 'Arrived', '12:47:42', '2018-02-26', 'No', ''),
(194, 26, '2018-03-10 09:17:30', 90, '2018-03-11', 2, '00:12:00', '14:32:00', 'Approved', '2018-03-10', 'done', '2018-03-12', '2018-03-12', '14:41:07', 'Arrived', '11:27:34', '2018-03-11', 'No', 'mike'),
(197, 26, '2018-03-10 04:50:49', 60, '2018-03-11', 1, '06:00:00', '19:00:00', 'Approved', '2018-03-10', 'done', '2018-03-11', '2018-03-11', '19:59:49', 'Arrived', '16:58:57', '2018-03-11', 'Yes', 'Nicholas lizardo'),
(198, 26, '2018-03-12 10:32:34', 90, '2018-03-21', 2, '00:12:00', '12:31:00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '00:00:00', '', '00:00:00', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
`id` int(10) NOT NULL,
  `mountain` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setspot`
--

CREATE TABLE IF NOT EXISTS `setspot` (
`id` int(10) NOT NULL,
  `mountain_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `level` int(10) NOT NULL,
  `altitude` float NOT NULL,
  `requirements` varchar(500) NOT NULL,
  `photo` blob NOT NULL,
  `description` varchar(2000) NOT NULL,
  `slot` int(100) NOT NULL,
  `map` text NOT NULL,
  `equipment` varchar(1000) NOT NULL,
  `direction` varchar(2000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setspot`
--

INSERT INTO `setspot` (`id`, `mountain_name`, `address`, `level`, `altitude`, `requirements`, `photo`, `description`, `slot`, `map`, `equipment`, `direction`) VALUES
(20, 'Mt. Daraitan', 'Tanay, Rizal', 4, 718, '-medical certificate', 0x4d742d446172616974616e2d31392e6a7067, 'Mt. Daraitan is one of the many mountains of the Sierra Madre Mountain Range that is located between Tanay, Rizal and and General Nakar, Quezon. Among Rizalâ€™s mountains, this land formation is certainly one of the most popular hiking site.\r\n\r\nWith the recent attention the place is getting, the village near the area has become an ecotourism site. Barangay officials even formed a system of handling the visitors and trained locals to be guide in the climb.\r\n\r\nThey also offered outdoor attraction aside from the actual hike like the Tinipakcaves, limestone formations, springs and even pools sometimes as a side trip during the climb. The trek usually lasts from 2.5 to 4 hours depending on your itinerary.', 99, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15443.018078647154!2d121.43013412100136!3d14.61305518671113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397920f241ba847%3A0x87162c333390e20a!2sMount+Daraitan!5e0!3m2!1sen!2sph!4v1518660318716" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', ' -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass, -Knife, -First aid kit -Compass,', 'It is always convenient to go there on private vehicles or rental vans since itâ€™s time efficient. Go in groups to lessen the travel expenses too.  Take EDSA Shaw to Tanay, Rizal viaMarcos Highway. Take Tanay-Infanta Road and take a left turn on a dirt road with the sign which leads to Brgy. Daraitan. Follow the road until you arrive the Daraitan River and pay 50php to pass the bridge and head to the barangay Hall'),
(21, 'Mt. Pamitinan', 'Rodriguez, Rizal', 8, 360, '-medical certificate', 0x32666166323063353561633339376436393234643535303838356430356433312e4a5047, 'Just two hours away from Quezon City, Mt. Pamitinan is accessible to hikers. Being located at Sierra Madre, this mountain easily became one of the famous mountains to go to.\r\n\r\nMt. Pamitinan is one of the three mountains in Rodriguez, Rizal (including Mt. Binacayan and Hapunang- Banoi) which promises a scenic view in the sea of clouds. These mountains also surround Wawa Dam, only minutes away from the registration office. You can tour it as a side trip.', 85, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15434.70883120871!2d121.18235632102771!3d14.730832885512616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397bcb8df824b4d%3A0xf94f0d55608bc0d6!2sMount+Pamitinan!5e0!3m2!1sen!2sph!4v1518660589517" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '-Compass\r\n', 'For public transportation you can ride an FX going to Montalban from Gateway Mall or in Jolibee Farmerâ€™s Plaza branch (P50). Get off at Eastwood Montalban and ride a tricycle to Sitio Wawa (P60 for 3 people). From there, just register on the DENR office for guidelines before hiking (Reg. Fee P2)'),
(25, 'Mt. Tagapo', 'Binangonan, Rizal', 2, 438, '-medical certificate', 0x30396462633435643436633430303233393039373331343766633132393336382e6a7067, 'Mt. Tagapo, also known as Mt. SusongDalaga, is located at Talim Island, a small island in Laguna de Bay. At its summit, thereâ€™s an overlooking view of Mt. Sembrano, a faint glimpse of Mt. Makiling and the view of Manila and Binangonan.', 100, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15462.63007031514!2d121.2232087659534!3d14.331315479639024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397dddbd874ada5%3A0x7e9ab497ed61000!2sMount+Tagapo!5e0!3m2!1sen!2sph!4v1518661151631" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '-Compass\r\n', 'For public transportation take a jeep to Binganonan on EDSA-Crossing terminal in Shaw Blvd. From Binangonan, ride a tricycle going to the port (P15).  From the port, ride a passenger ferry to Brgy. Janosa (P30).'),
(26, 'Mt.Maynoba', 'Sta. Ines Road, Antipolo, Rizal', 5, 728, '-medical certificate', 0x4d742e204d61796e6f62612020426c6f672e6a7067, 'These mountains are also members of the Sierra Madre mountain range. The hike to Mt. Maynoba and Mt. Cayabu is fairly easy compared to other mountains since it passes through vegetable gardens, woodlands and exposed grasslands.\r\n\r\nThe summit will greet you a stunning view of the mountain range and the peaks of other mountains as well. On your descent, you are more than welcome to refresh after the hot and exhausting trip in the 8 waterfalls you will pass by.', 92, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.199912870205!2d121.3172890140862!3d14.757764277164043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339799aff0b4661b%3A0x20e3c7ffa2f4f23a!2sMt.Maynoba!5e0!3m2!1sen!2sph!4v1518661633525" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '-Compass', 'For public transportation from Gateway Mall, ride a jeepney going to Cogeo. From Cogeo, you need to ride another jeep going to Brgy. Cayabu. Then, register and secure your tour guide.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmpsw` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profilePic` blob NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `condition` varchar(100) NOT NULL,
  `specify` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `years` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `bday`, `contact`, `address`, `username`, `password`, `confirmpsw`, `email`, `profilePic`, `question`, `answer`, `condition`, `specify`, `type`, `years`) VALUES
(42, 'mike', 'abelon', 'cruz', 'Male', '1996-12-12', '', '1139 p rosales st pateros m.m', 'mikecruz12', '1ba2d111cec7bfaebd27caf00e9bbf6c', '1ba2d111cec7bfaebd27caf00e9bbf6c', 'mike_edric@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(46, 'Joreldyn', 'Eliang', 'Tamayo', 'Male', '1989-12-04', '', 'Mercedes Avenue, Pasig City', 'jhoreldyn', '552c38e21bcab085e5f3a4b1641e7ad3', '88cb2656d385077ddd111f030f4decc4', 'joreldyn.tamayo@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(47, 'catibog', 'Tupaz', 'perus', 'Male', '1990-01-23', '', 'Peralta Compound, Mercedes Ave. Pasig City', 'carlolay', 'd9729feb74992cc3482b350163a1a010', 'd58e3582afa99040e27b92b13c8f2280', 'allendelacruz880@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(48, 'john rey', 'abelon', 'cruz', 'Male', '1996-12-12', '', '1139 p rosales st pateros m.m', 'johncruz12', '1ba2d111cec7bfaebd27caf00e9bbf6c', '1ba2d111cec7bfaebd27caf00e9bbf6c', 'john@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(49, 'nikko', 'bracena', 'Marasigan', 'Male', '1996-05-30', '', 'Summerfield, Employees Village, Pasig City', 'okkins125', '23d5e21b92ac441fdab4b95af08d3aca', '23d5e21b92ac441fdab4b95af08d3aca', 'niiko@gmail.com', 0x57494e5f32303137303530315f30365f32365f32315f50726f2e6a7067, '', '', '', '', '', ''),
(50, 'marwin', 'mindo', 'Buban', 'Male', '1994-12-23', '', 'Unit 3329 City Land Mega Plaza, Ortigas, Pasig City', 'wiwit123', '9f4cd65d482a5a4c2bc7c9857b6ab05b', '9f4cd65d482a5a4c2bc7c9857b6ab05b', 'marwinn@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(51, 'james', 'flores', 'Camino', 'Male', '1992-02-02', '', 'Brgy. Rosario, Pasig City', 'jamester23', 'baf01ddc090f1a548861f1cc513b3121', 'baf01ddc090f1a548861f1cc513b3121', 'james@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(52, 'rhoi', 'recelis', 'Tamayo', 'Male', '1989-12-04', '', 'Mercedes Avenue, Pasig City', 'rhoirhoi00', '552c38e21bcab085e5f3a4b1641e7ad3', '88cb2656d385077ddd111f030f4decc4', 'rhoi@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(53, 'rica', 'Tupaz', 'caro', 'Female', '1990-01-23', '', 'Peralta Compound, Mercedes Ave. Pasig City', 'ricacaro', 'd9729feb74992cc3482b350163a1a010', 'd58e3582afa99040e27b92b13c8f2280', 'rica0@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(54, 'shiela', 'dolon', 'caboverde', 'Female', '1996-01-12', '', '116 p rosales st pateros m.m', 'shielamae12', '1ba2d111cec7bfaebd27caf00e9bbf6c', '1ba2d111cec7bfaebd27caf00e9bbf6c', 'shiela@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(56, 'Pia', 'luna', 'Gamboa', 'Female', '1994-12-23', '', 'Ortigas, Pasig City', 'piapia123', '9f4cd65d482a5a4c2bc7c9857b6ab05b', '9f4cd65d482a5a4c2bc7c9857b6ab05b', 'pia@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(57, 'james', 'Cruz', 'dela cruz', 'Male', '1992-02-02', '', 'Brgy. Rosario, Pasig City', 'jamesreid', 'baf01ddc090f1a548861f1cc513b3121', 'baf01ddc090f1a548861f1cc513b3121', 'james@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(58, 'gab', 'apollo', 'penus', 'Male', '1989-12-04', '', 'Greenland, Cainta rizal', 'penussi23', '552c38e21bcab085e5f3a4b1641e7ad3', '88cb2656d385077ddd111f030f4decc4', 'penus@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(59, 'ricamae', 'Delacruz', 'Coronado', 'Female', '1990-01-23', '', 'Mercedes Ave. Pasig City', 'ricamae11', 'd9729feb74992cc3482b350163a1a010', 'd58e3582afa99040e27b92b13c8f2280', 'ricamae@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(60, 'iyah', 'perez', 'ganalon', 'Female', '1997-09-21', '09494452186', 'Tagpos binangonan rizal', 'iyahreidabook', '1ba2d111cec7bfaebd27caf00e9bbf6c', '1ba2d111cec7bfaebd27caf00e9bbf6c', 'iyahganalon@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', 'Physically Fit', 'Beginner', 'None'),
(61, 'mark', 'santos', 'dawal', 'Male', '1996-05-30', '', 'San juaquin Pasig City', 'markdawal', '23d5e21b92ac441fdab4b95af08d3aca', '23d5e21b92ac441fdab4b95af08d3aca', 'mark@gmail.com', 0x57494e5f32303137303530315f30365f32365f32315f50726f2e6a7067, '', '', '', '', '', ''),
(71, 'Venice', 'Pamintuan', 'Cortez', 'Female', '1997-02-23', '', '0 Blk 21 Street West Rembo Makati', 'venice21', '267f268c658567afa01fb9a619afeb52', '267f268c658567afa01fb9a619afeb52', 'venicecortez@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(72, 'Jepoy', 'Santos', 'Miranda', 'Male', '1996-03-02', '', '435 Scorpion St, Signal Village Taguig', 'jepoyzxc32', 'a32495782b389bcc1ade0a35c0b236df', 'a32495782b389bcc1ade0a35c0b236df', 'miranda.jep@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(73, 'CJ', 'Coronadal', 'Ballesteros', 'Female', '1999-06-13', '', 'Blk 7 Santan St, Armor Village South Cembo Makati', 'Cjane099', '2490f9654c81bae61a3199b47063e58c', '2490f9654c81bae61a3199b47063e58c', 'ceejayballesteros@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(74, 'Von', 'Cusilit', 'Teodoro', 'Male', '1996-08-09', '', '50th Street Daang Bakal, Bangkal Makati', 'teodoreV8', 'e04e7ee6c4a58ecf64306cbb4a2d3d3e', 'e04e7ee6c4a58ecf64306cbb4a2d3d3e', 'teodorevon@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(75, 'Keith', 'Raga', 'Lacanlale', 'Male', '1994-07-14', '', 'Peralta Compound Blk 9 Mercedes, Pasig', 'keithlale14', '143da89985f300492a38e6df2179aaeb', '143da89985f300492a38e6df2179aaeb', 'keithlacans@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(76, 'Davince ', 'Alaras', 'Torres', 'Male', '1998-02-02', '', '505 Valentine St, Southside Makati', 'binshd02', '6871b34c1903e64bdb336f66c53b6bc5', '6871b34c1903e64bdb336f66c53b6bc5', 'hawkdavince@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(78, 'Kurt', 'Ricabo', 'Najito', 'Male', '1996-07-07', '', '55 Kaliwa Poblacion Side, Pasig', 'kurtyboy07', '00733e09b2dff00c464572cc90a4555f', '00733e09b2dff00c464572cc90a4555f', 'ricabopat@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(80, 'Jerry', 'Camacho', 'Tibayan', 'Male', '1994-12-20', '', '647 Villegas St, North Cembo Makati', 'jerrys20', '8a3013b5988a54373fc86bc291d583ad', '8a3013b5988a54373fc86bc291d583ad', 'jerjercam@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(82, 'Editha', 'Tiongson', 'Zuniga', 'Female', '1992-12-15', '', '404 Olive St, Greenwood Pasig ', 'ediT9212 ', '3dec7e5c04c06c336c0ee2f4fb6b0e1d', '3dec7e5c04c06c336c0ee2f4fb6b0e1d', 'editah44@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(83, 'Thalia', 'Maderse', 'Ayo', 'Female', '1997-12-04', '', 'Blk 7 Mansanas St, Pitogo Makati', 'tahaliaA12', '5d1ede533a4fb371070e77ffb3f205fd', '5d1ede533a4fb371070e77ffb3f205fd', 'thalia.ayo@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(84, 'Haley', 'Pituc', 'Amer', 'Female', '1998-12-09', '09343283489', '15th Maybahay St, De Amor Taguig', 'Haleyame19 ', '31cafc597b2876e41477466a1bbaa9b4', '31cafc597b2876e41477466a1bbaa9b4', 'amerhaley@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(85, 'Via', 'Ludar', 'Judan', 'Female', '1997-03-13', '09894578458', 'Impound Court North 2, Bgy Ligaya, Makati', 'luudarJ22', '2ac9091cd76a4b790af2caa5797b913c', '2ac9091cd76a4b790af2caa5797b913c', 'viatot.ludar@gmail.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(86, 'John Paul', 'Gaga', 'Embodo', 'Male', '1999-02-01', '09845823102', 'Bgy Pinagkaisahan, Petal Road 66 Makati', 'jPaul069 ', 'd66725836914ff341ab65b2e720941d0', 'd66725836914ff341ab65b2e720941d0', 'jpaul.em@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(87, 'Anjamin', 'Norte', 'Quinery', 'Female', '1995-12-14', '09839349349', 'Mountain View Village, Blk 56 Northwing Makati', 'Jajamin14', 'fe459624d954d475084d9ac79b448a37', 'fe459624d954d475084d9ac79b448a37', 'anjamin.queen@gmail.co', 0x70726f66696c657069632e6a7067, '', '', '', '', '', ''),
(88, 'marvin', 'centeno', 'calderon', 'Male', '1996-04-12', '09873458348', 'Brgy Aguho p hererra street', 'mavingay00', 'f31c7e2279dbed5c3c22bb0d236e215d', 'f31c7e2279dbed5c3c22bb0d236e215d', 'marvin@yahoo.com', 0x70726f66696c657069632e6a7067, '', '', '', 'Physically Fit', 'Beginner', 'None'),
(89, 'regina', 'santos', 'Abelon', 'Female', '1986-02-23', '09088745874', '435 Scorpion St, Signal Village Taguig', 'regina23', 'REGINAA12a', 'REGINA23a', 'regina@yahoo.com', 0x70726f66696c657069632e6a7067, 'What is your petâ€™s name?', 'choco', '', '', '', ''),
(90, 'antonio', 'cruz', 'aradillos', 'Male', '1982-02-02', '09268392012', 'San juaquin Pasig City', 'tonytoni', 'ARADILLOS00a', 'ARADILLOS00a', 'toni@yahoo.com', 0x32323738303631395f313837333638373235353939343638375f353438393330313839313737323236393332325f6e2e6a7067, 'What is your petâ€™s name?', 'choco', 'Yes', 'Physically Fit ', 'Beginner', 'None'),
(91, 'Joana Faith', 'Endonila', 'Aradillos', 'Female', '1996-11-17', '09282614501', 'Pasig', 'edison221', 'JOANA00aa', 'ADVINCULA00a', 'joana@yahoo.com', 0x494d475f323136395f726573756c742e6a7067, 'What is your petâ€™s name?', 'chica', '', '', '', ''),
(92, 'anelyn', 'kobaton', 'villanueva', 'Male', '1996-02-12', '09257182739', 'pateros metro manila', 'Anelyn00', 'AAnelyn00', 'Anelyn00', 'anelyn@yahoo.com', 0x70726f66696c657069632e6a7067, 'In what year was your father born?', '1997', '', 'Physically Fit', 'Beginner', 'None'),
(93, 'HJSDFBHJB', 'JHVGJ', 'VHGCG', 'Male', '1996-12-12', '09282615601', 'SAJKDBKJASBD', 'SJKDCBK00a', 'SJKDCBK00a', 'SJKDCBK00a', 'neilpatrickendonilacruz@gmail.com', 0x70726f66696c657069632e6a7067, 'In what year was your father born?', '12', '', '', '', ''),
(94, 'rommel', 'santos', 'teves', 'Male', '1995-02-12', '09282615601', 'Pasig', 'MelTevs00', 'MelTevs00', 'MelTevs00', 'mel@yahoo.com', 0x70726f66696c657069632e6a7067, 'What is your favorite?', '123', 'None', 'Physically Fit', 'Beginner', 'None'),
(95, 'qweqwe', 'qweqweqweqwe', 'qweqwe', 'Male', '1996-12-12', '09282615601', 'pateros metro manila', 'HPSRVZYD00a', 'HPSRVZYD00a', 'HPSRVZYD00a', 'mike_edric@yahoo.com', 0x70726f66696c657069632e6a7067, 'In what year was your father born?', '123', 'Yes', 'Heart', '', ''),
(96, 'choco', 'aasdgj', 'gyjf', 'Male', '1996-12-12', '09282615601', 'ugefyjgdfyj', 'asdasdAA1', 'asdasdAA1', 'asdasdAA1', 'mike_edric@yahoo.com', '', 'What is your favorite?', '123', '', 'none', 'Professional', '4-6 years');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hikerlist`
--
ALTER TABLE `hikerlist`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setspot`
--
ALTER TABLE `setspot`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hikerlist`
--
ALTER TABLE `hikerlist`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setspot`
--
ALTER TABLE `setspot`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
