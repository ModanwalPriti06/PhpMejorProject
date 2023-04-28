-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2021 at 12:24 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majorproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `msg` varchar(300) DEFAULT NULL,
  `cdate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `uid`, `did`, `msg`, `cdate`) VALUES
(1, 'kizie@gmail.com', 47, ' hello preti', '2021-02-03'),
(7, 'pritivns612@gmail.com', 48, 'Thanku sir for this pdf\n', '2021-05-15'),
(5, 'kizie@gmail.com', 47, 'what is comment section', '2021-02-07'),
(6, 'pritivns612@gmail.com', 48, 'hello', '2021-03-20'),
(8, 'p@gmail.com', 48, 'tyrty', '2021-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

DROP TABLE IF EXISTS `liked`;
CREATE TABLE IF NOT EXISTS `liked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `like_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`id`, `uid`, `doc_id`, `like_date`) VALUES
(1, 'kizie@gmail.com', 47, '2021-02-03'),
(2, 'kizie@gmail.com', 46, '2021-02-05'),
(3, 'kizie@gmail.com', 44, '2021-02-07'),
(4, 'pritivns612@gmail.com', 48, '2021-03-20'),
(5, 'pritivns612@gmail.com', 44, '2021-05-15'),
(6, 'pritivns612@gmail.com', 46, '2021-05-15'),
(7, 'p@gmail.com', 48, '2021-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `name` varchar(200) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `file` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `college` varchar(200) NOT NULL,
  `regdate` varchar(50) NOT NULL,
  PRIMARY KEY (`email`(100))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `dob`, `file`, `gender`, `email`, `password`, `college`, `regdate`) VALUES
('Priti Modanwal', '2020-12-06', '1.jpg', 'Female', 'pritivns612@gmail.com', 'gia', 'KNIT btech college', '2020-12-19'),
('kirti', '2020-11-30', '4.jpg', 'Female', 'ami@gmail.com', 'kirti', 'KNIT btech college', '2020-12-19'),
('Akriti', '2020-12-16', 'baby4.jpg', 'Female', 'akku@gmail.com', 'ak', 'GGP Amethi', '2020-12-19'),
('Anaya', '2020-12-09', 'anjali.jpg', 'Female', 'priya@gmail.com', 'anaya', 'GGP Amethi', '2020-12-19'),
('manali', '2020-12-21', 'pk6.jpg', 'Female', 'mannu@gmail.com', 'ghj', 'GGP Lucknow', '2020-12-21'),
('Shipra mishra', '2020-12-26', '2008-mcom.pdf', 'female', 'shipra@gmail.com', '1234567890', 'GGP Amethi', '2020-12-19'),
('pinky Modanwal', '2021-05-07', 'fav.jpg', 'Female', 'p@gmail.com', 'sinu', 'KNIT btech college', '2021-04-14'),
('Anajli Mishra', '2020-12-10', 't.jpg', 'Female', 'anjalimishra1012@gmail.com', 'anjali', 'HEwat polytechnic college', '2020-12-23'),
('sanhvika Modanwal', '2020-12-28', 'h.jpg', 'female', 'saim@gmail.com', 's', 'KNIT btech college', '2020-12-29'),
('aditi', '2020-12-19', 'menu.jpg', 'Female', 'ad@gmail.com', 'aditi', 'GGP Lucknow', '2020-12-23'),
('Aisha', '2021-01-10', '6.jpg', 'male', 'juhi@gmail.com', 'juhi', 'GGP Lucknow', '2021-01-10'),
('Liza Franklin', '2020-12-30', 'Screenshot_2020-12-19-17-34-37-07.jpg', 'Female', 'Liza@gmail.com', 'Liza', 'KNIT btech college', '2020-12-27'),
('kizie', '2021-01-23', 'g2.jpg', 'Female', 'kizie@gmail.com', 'k', 'KNIT btech college', '2021-01-28'),
('alex', '2019-05-08', 'fav2.jpg', 'male', 'alex@gmail.com', 'alex', 'KNIT btech college', '2021-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `studydocument`
--

DROP TABLE IF EXISTS `studydocument`;
CREATE TABLE IF NOT EXISTS `studydocument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tag` text DEFAULT NULL,
  `doctype` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(300) DEFAULT NULL,
  `documentname` varchar(300) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `userid` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studydocument`
--

INSERT INTO `studydocument` (`id`, `title`, `course`, `description`, `tag`, `doctype`, `thumbnail`, `documentname`, `date`, `status`, `userid`) VALUES
(6, 'Python Program', 'Diploma final year student', '  WAP to preint factorial no', '  Title Program and Flowchart', 'Jpeg', '6.jpg', '2014 -mcom.pdf', '2020-12-27', 'Publice', 'gia@gmail.com'),
(44, 'data structure ', 'Btech Student', '  searching', '  bubble and quik short', 'Jpeg', '1.jpg', 'bts.png', '2021-02-02', 'Publice', 'kizie@gmail.com'),
(7, 'Python Program', 'Diploma final year student', '  WAP to preint factorial no', '  Title Program and Flowchart', 'Jpeg', '6.jpg', '2014 -mcom.pdf', '2020-12-27', 'Publice', 'gia@gmail.com'),
(46, ' let us python', 'btech 5th sem student', 'MY Management of uploaded document', '  MY Management of uploaded document', 'Jpeg', 'f.PNG', '2012-mcom.pdf', '2021-02-02', 'Publice', 'kizie@gmail.com'),
(48, ' let us python', 'diploma first year', 'python programming', '  python python', 'PDF', 'butter.jpg', '6.jpg', '2021-02-11', 'Publice', 'kizie@gmail.com'),
(49, 'IOT', 'btech and cs final year', '  Imopartant ', '  good skill', 'Jpeg', 'camlogo.jpg', '2012-mcom.pdf', '2021-05-15', 'Publice', 'pritivns612@gmail.com'),
(50, 'Android', '5th sem cs final year', '  how to install Android', '  SDK installer', 'PDF', '6.jpg', '', '2021-05-27', 'Publice', 'p@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
