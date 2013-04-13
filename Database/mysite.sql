-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2012 at 07:49 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_passwd` varchar(255) NOT NULL,
  `admin_photo` varchar(255) NOT NULL,
  `assignment_passwd` varchar(255) NOT NULL,
  `resource_passwd` varchar(255) NOT NULL,
  `cpanel_passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_passwd`, `admin_photo`, `assignment_passwd`, `resource_passwd`, `cpanel_passwd`) VALUES
('d033e22ae348aeb5660fc2140aec35850c4da997', 'images/admin/sicsr.jpg', 'sicsr', 'sicsr', 'sicsr');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `assgn_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `assgn_que` longtext NOT NULL,
  `submission_date` date NOT NULL,
  `submission_link` varchar(255) NOT NULL,
  PRIMARY KEY (`assgn_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assgn_id`, `sub_id`, `assgn_que`, `submission_date`, `submission_link`) VALUES
('JAVA SE assgn 1', 'JAVA_SE', '<p>1. Write a program to generate following design.<br />\r\n<br />\r\n1</p>\r\n<p>12</p>\r\n<p>123</p>\r\n<p>1234</p>\r\n<p>12345</p>\r\n<p>&nbsp;</p>\r\n<p>2. Write a program to prepare LUDO table. ( Hint : Matrix of 10 X 10 )<br />\r\n<br />\r\n<br />\r\n<br />\r\n<strong><span style="font-size: medium;"><span style="font-family: Verdana;">Note : All assignments must be submitted as a .pdf file no other format will be allowed.</span></span></strong></p>', '2012-02-27', 'assignments/JAVA SE assgn 1/'),
('SPM part1', 'SPM', '<p>&nbsp;</p>\r\n<p>Prepare a scenario for RFID&nbsp;based attendance management system, prepare its SDLC and all other models including RUP and DFD models. Also prepare grantt chart for the same.</p>\r\n<p>Evaluation will be based on following criterias,</p>\r\n<p>Level of understanding.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 10<br />\r\nModels &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 10<br />\r\nDFD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 10</p>\r\n<p>Total 30 Marks<br />\r\n<br />\r\n<span style="font-family: Times New Roman;"><span style="font-size: medium;"><u><strong>Note : copying of the assignment will keeps student out of evaluation process.</strong></u></span></span><br />\r\n&nbsp;</p>\r\n<p>&nbsp;</p>', '2012-02-28', 'assignments//');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `att_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `total_lectures` int(5) NOT NULL,
  `no_absent` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`att_id`),
  KEY `stud_id` (`stud_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=337 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`att_id`, `stud_id`, `sub_id`, `total_lectures`, `no_absent`, `start_date`, `end_date`) VALUES
(277, '11030142001', 'JAVA_SE', 8, 2, '2012-02-01', '2012-02-14'),
(278, '11030142001', 'Language1-Spanish', 4, 0, '2012-02-01', '2012-02-14'),
(279, '11030142001', 'SPM', 7, 2, '2012-02-01', '2012-02-14'),
(280, '11030142001', 'BPP', 9, 1, '2012-02-01', '2012-02-14'),
(281, '11030142002', 'JAVA_SE', 8, 2, '2012-02-01', '2012-02-14'),
(282, '11030142002', 'Language1-Spanish', 4, 0, '2012-02-01', '2012-02-14'),
(283, '11030142002', 'SPM', 7, 1, '2012-02-01', '2012-02-14'),
(284, '11030142002', 'BPP', 9, 2, '2012-02-01', '2012-02-14'),
(285, '11030142003', 'JAVA_SE', 8, 2, '2012-02-01', '2012-02-14'),
(286, '11030142003', 'Language1-Spanish', 4, 1, '2012-02-01', '2012-02-14'),
(287, '11030142003', 'SPM', 7, 0, '2012-02-01', '2012-02-14'),
(288, '11030142003', 'BPP', 9, 0, '2012-02-01', '2012-02-14'),
(289, '11030142004', 'JAVA_SE', 8, 1, '2012-02-01', '2012-02-14'),
(290, '11030142004', 'Language1-Spanish', 4, 0, '2012-02-01', '2012-02-14'),
(291, '11030142004', 'SPM', 7, 1, '2012-02-01', '2012-02-14'),
(292, '11030142004', 'BPP', 9, 0, '2012-02-01', '2012-02-14'),
(293, '11030142005', 'JAVA_SE', 8, 1, '2012-02-01', '2012-02-14'),
(294, '11030142005', 'Language1-Spanish', 4, 1, '2012-02-01', '2012-02-14'),
(295, '11030142005', 'SPM', 7, 1, '2012-02-01', '2012-02-14'),
(296, '11030142005', 'BPP', 9, 1, '2012-02-01', '2012-02-14'),
(297, '11030142006', 'JAVA_SE', 8, 1, '2012-02-01', '2012-02-14'),
(298, '11030142006', 'Language1-Spanish', 4, 2, '2012-02-01', '2012-02-14'),
(299, '11030142006', 'SPM', 7, 2, '2012-02-01', '2012-02-14'),
(300, '11030142006', 'BPP', 9, 3, '2012-02-01', '2012-02-14'),
(301, '11030142007', 'JAVA_SE', 8, 1, '2012-02-01', '2012-02-14'),
(302, '11030142007', 'Language1-Spanish', 4, 0, '2012-02-01', '2012-02-14'),
(303, '11030142007', 'SPM', 7, 1, '2012-02-01', '2012-02-14'),
(304, '11030142007', 'BPP', 9, 1, '2012-02-01', '2012-02-14'),
(305, '11030142008', 'JAVA_SE', 8, 0, '2012-02-01', '2012-02-14'),
(306, '11030142008', 'Language1-Spanish', 4, 1, '2012-02-01', '2012-02-14'),
(307, '11030142008', 'SPM', 7, 0, '2012-02-01', '2012-02-14'),
(308, '11030142008', 'BPP', 9, 1, '2012-02-01', '2012-02-14'),
(309, '11030142009', 'JAVA_SE', 8, 3, '2012-02-01', '2012-02-14'),
(310, '11030142009', 'Language1-Spanish', 4, 1, '2012-02-01', '2012-02-14'),
(311, '11030142009', 'SPM', 7, 1, '2012-02-01', '2012-02-14'),
(312, '11030142009', 'BPP', 9, 1, '2012-02-01', '2012-02-14'),
(313, '11030142010', 'JAVA_SE', 8, 3, '2012-02-01', '2012-02-14'),
(314, '11030142010', 'Language1-Spanish', 4, 3, '2012-02-01', '2012-02-14'),
(315, '11030142010', 'SPM', 7, 2, '2012-02-01', '2012-02-14'),
(316, '11030142010', 'BPP', 9, 2, '2012-02-01', '2012-02-14'),
(317, '11030142011', 'JAVA_SE', 8, 1, '2012-02-01', '2012-02-14'),
(318, '11030142011', 'Language1-Spanish', 4, 1, '2012-02-01', '2012-02-14'),
(319, '11030142011', 'SPM', 7, 2, '2012-02-01', '2012-02-14'),
(320, '11030142011', 'BPP', 9, 1, '2012-02-01', '2012-02-14'),
(321, '11030142012', 'JAVA_SE', 8, 3, '2012-02-01', '2012-02-14'),
(322, '11030142012', 'Language1-Spanish', 4, 1, '2012-02-01', '2012-02-14'),
(323, '11030142012', 'SPM', 7, 1, '2012-02-01', '2012-02-14'),
(324, '11030142012', 'BPP', 9, 1, '2012-02-01', '2012-02-14'),
(325, '11030142013', 'JAVA_SE', 8, 2, '2012-02-01', '2012-02-14'),
(326, '11030142013', 'Language1-Spanish', 4, 2, '2012-02-01', '2012-02-14'),
(327, '11030142013', 'SPM', 7, 2, '2012-02-01', '2012-02-14'),
(328, '11030142013', 'BPP', 9, 3, '2012-02-01', '2012-02-14'),
(329, '11030142014', 'JAVA_SE', 8, 2, '2012-02-01', '2012-02-14'),
(330, '11030142014', 'Language1-Spanish', 4, 1, '2012-02-01', '2012-02-14'),
(331, '11030142014', 'SPM', 7, 1, '2012-02-01', '2012-02-14'),
(332, '11030142014', 'BPP', 9, 2, '2012-02-01', '2012-02-14'),
(333, '11030142015', 'JAVA_SE', 8, 1, '2012-02-01', '2012-02-14'),
(334, '11030142015', 'Language1-Spanish', 4, 2, '2012-02-01', '2012-02-14'),
(335, '11030142015', 'SPM', 7, 2, '2012-02-01', '2012-02-14'),
(336, '11030142015', 'BPP', 9, 3, '2012-02-01', '2012-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `backup_results`
--

CREATE TABLE IF NOT EXISTS `backup_results` (
  `result_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` varchar(50) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `obtained_marks` float(5,2) NOT NULL,
  `class_avg` float(5,2) NOT NULL,
  `percentile` float(5,2) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `rank` int(5) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `test_id` (`test_id`),
  KEY `stud_id` (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `backup_results`
--

INSERT INTO `backup_results` (`result_id`, `test_id`, `stud_id`, `obtained_marks`, `class_avg`, `percentile`, `grade`, `rank`) VALUES
(1, 'JAVA SE - LVL 1', '11030142001', 14.00, 16.23, 56.00, 'B+', 9),
(2, 'JAVA SE - LVL 1', '11030142002', 12.00, 16.23, 48.00, 'B+', 12),
(3, 'JAVA SE - LVL 1', '11030142003', 23.00, 16.23, 92.00, 'A', 3),
(4, 'JAVA SE - LVL 1', '11030142004', 12.00, 16.23, 48.00, 'B+', 11),
(5, 'JAVA SE - LVL 1', '11030142005', 11.00, 16.23, 44.00, 'B+', 13),
(6, 'JAVA SE - LVL 1', '11030142006', 17.00, 16.23, 68.00, 'B+', 8),
(7, 'JAVA SE - LVL 1', '11030142007', 13.00, 16.23, 52.00, 'B+', 10),
(8, 'JAVA SE - LVL 1', '11030142008', 18.00, 16.23, 72.00, 'A-', 7),
(9, 'JAVA SE - LVL 1', '11030142009', 19.00, 16.23, 76.00, 'A-', 6),
(10, 'JAVA SE - LVL 1', '11030142010', 21.00, 16.23, 84.00, 'A-', 5),
(11, 'JAVA SE - LVL 1', '11030142011', 22.00, 16.23, 88.00, 'A-', 4),
(12, 'JAVA SE - LVL 1', '11030142012', 25.00, 16.23, 100.00, 'A+', 1),
(13, 'JAVA SE - LVL 1', '11030142013', 24.50, 16.23, 98.00, 'A', 2),
(14, 'JAVA SE - LVL 1', '11030142014', 9.00, 16.23, 36.00, 'B+', 14),
(15, 'JAVA SE - LVL 1', '11030142015', 3.00, 16.23, 12.00, 'B+', 15),
(16, 'SPM Written 1', '11030142001', 24.00, 17.75, 96.00, 'A+', 1),
(17, 'SPM Written 1', '11030142002', 13.00, 17.75, 52.00, 'B+', 12),
(18, 'SPM Written 1', '11030142003', 12.00, 17.75, 48.00, 'B+', 13),
(19, 'SPM Written 1', '11030142004', 16.00, 17.75, 64.00, 'B+', 11),
(20, 'SPM Written 1', '11030142005', 12.00, 17.75, 48.00, 'B+', 14),
(21, 'SPM Written 1', '11030142006', 18.00, 17.75, 72.00, 'B+', 9),
(22, 'SPM Written 1', '11030142007', 23.00, 17.75, 92.00, 'A', 3),
(23, 'SPM Written 1', '11030142008', 20.00, 17.75, 80.00, 'A-', 5),
(24, 'SPM Written 1', '11030142009', 19.75, 17.75, 79.00, 'A-', 6),
(25, 'SPM Written 1', '11030142010', 18.00, 17.75, 72.00, 'B+', 8),
(26, 'SPM Written 1', '11030142011', 17.00, 17.75, 68.00, 'B+', 10),
(27, 'SPM Written 1', '11030142012', 19.00, 17.75, 76.00, 'A-', 7),
(28, 'SPM Written 1', '11030142013', 20.50, 17.75, 82.00, 'A-', 4),
(29, 'SPM Written 1', '11030142014', 11.00, 17.75, 44.00, 'B+', 15),
(30, 'SPM Written 1', '11030142015', 23.00, 17.75, 92.00, 'A', 2),
(31, 'BPP mod 1', '11030142001', 22.00, 17.61, 88.00, 'A', 3),
(32, 'BPP mod 1', '11030142002', 23.00, 17.61, 92.00, 'A+', 1),
(33, 'BPP mod 1', '11030142003', 12.00, 17.61, 48.00, 'B+', 13),
(34, 'BPP mod 1', '11030142004', 14.25, 17.61, 57.00, 'B+', 11),
(35, 'BPP mod 1', '11030142005', 15.00, 17.61, 60.00, 'B+', 10),
(36, 'BPP mod 1', '11030142006', 17.00, 17.61, 68.00, 'B+', 9),
(37, 'BPP mod 1', '11030142007', 23.00, 17.61, 92.00, 'A', 2),
(38, 'BPP mod 1', '11030142008', 11.00, 17.61, 44.00, 'B+', 14),
(39, 'BPP mod 1', '11030142009', 19.00, 17.61, 76.00, 'B+', 8),
(40, 'BPP mod 1', '11030142010', 19.86, 17.61, 79.44, 'A-', 7),
(41, 'BPP mod 1', '11030142011', 22.00, 17.61, 88.00, 'A-', 4),
(42, 'BPP mod 1', '11030142012', 21.00, 17.61, 84.00, 'A-', 6),
(43, 'BPP mod 1', '11030142013', 10.00, 17.61, 40.00, 'B+', 15),
(44, 'BPP mod 1', '11030142014', 21.00, 17.61, 84.00, 'A-', 5),
(45, 'BPP mod 1', '11030142015', 14.00, 17.61, 56.00, 'B+', 12);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `batch_id` varchar(50) NOT NULL,
  `prg_id` varchar(50) NOT NULL,
  PRIMARY KEY (`batch_id`),
  KEY `prg_id` (`prg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `prg_id`) VALUES
('BBA(IT) 2010-2012', 'BBA(IT)'),
('BBA(IT) 2011-2013', 'BBA(IT)'),
('MSc(ca) 2010-2012', 'MSc(ca)'),
('MSc(ca) 2011-2013', 'MSc(ca)');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_alert`
--

CREATE TABLE IF NOT EXISTS `calendar_alert` (
  `alert_text` varchar(255) NOT NULL,
  `alert_date` date NOT NULL,
  `avi` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`avi`),
  UNIQUE KEY `alert_text` (`alert_text`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `calendar_alert`
--

INSERT INTO `calendar_alert` (`alert_text`, `alert_date`, `avi`) VALUES
('Dhuleti Holiday', '2012-03-08', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `address` text NOT NULL,
  `address_img` varchar(255) NOT NULL,
  `contactus_at` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `placement_dept` text NOT NULL,
  `admission_dept` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`address`, `address_img`, `contactus_at`, `website`, `placement_dept`, `admission_dept`) VALUES
('Admissions Office,\r\nSymbiosis Institute of Computer Studies and Research,\r\n1st Floor, Atur Centre, Gokhale Cross Road,\r\nModel Colony, Pune - 411016.\r\nTel : (+91) 020 - 2567 5601 / 02\r\nExtension - 103 (Mrs. Jyotsna Shetty, Mrs. Pranita Dube)\r\nFax : (+91) 020 - 2567 5603   \r\n ', 'images/address_image/sicsrlocation.jpg', '    Email : contact_us@sicsr.ac.in\r\nContact No: 1289823126\r\nHelp Desk : 27678798    ', 'http://sicsr.ac.in ', '    Ashwini Narayan (Placement Co-ordinator)\r\nplacements@sicsr.ac.in\r\n(+91) 020 - 2567 5601 (Extn : 126)    ', '    306, 3rd floor,\r\nAtur center.\r\n\r\n(+91) 020 - 2567 5601     ');

-- --------------------------------------------------------

--
-- Table structure for table `directors_desk`
--

CREATE TABLE IF NOT EXISTS `directors_desk` (
  `directors_img` varchar(255) NOT NULL,
  `directors_desk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directors_desk`
--

INSERT INTO `directors_desk` (`directors_img`, `directors_desk`) VALUES
('images/directors_image/harshad_gune.jpg', '<p style="text-align: justify;"><span style="font-size: medium;"><em><strong>&quot;Symbiosis University</strong> is a learning university. Symbiosis produces learners.<br />\r\nLalit Kathpalia, the director of SICSR, is creating ample  learning opportunities for his students. His passion and drive to create  the world class alumni is visible in the many learning platforms he is  creating for student engagement as well as making SICSR the Pilgrim  Centre for all IT in Pune.<br />\r\nThe Informatics Learning Lab SICSR is setting up in  association with me will create ample opportunity for his students to  address real-life problems and experience real-life contexts to address  in a trillion dollar new market of Smart Cities as highlighted by the  Financial Express. We will also challenge students to innovate solutions  for this domain through crowd-sourced governance.&quot;</em></span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` varchar(50) NOT NULL,
  `event_img_url` varchar(255) NOT NULL,
  `event_info` longtext NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_img_url`, `event_info`) VALUES
('GNUnify', 'images/events/GNUnify/gnunify.jpg', '<p style="text-align: justify;"><span style="font-size: medium;"><span style="font-family: Verdana;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GNUnify</b> is an annual gathering consisting of workshops, talks, seminars and BOFs (Birds of a feather) held by the Pune Linux User Group and the Symbiosis Institute of Computer Studies and Research in Pune, India. It is an event held to help increase the awareness of FOSS in India especially in Pune.Its a forum to unite open minds.</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: medium;"><span style="font-family: Verdana;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GNUnify (a play on the words GNU and Unify) is generally held during the second week of February. GNUnify has featured eminent people like Richard Stallman</span></span><sup class="reference" id="cite_ref-richard-stallman-gnunify_0-0"><a href="http://en.wikipedia.org/wiki/GNUnify#cite_note-richard-stallman-gnunify-0"></a></sup><span style="font-size: medium;"><span style="font-family: Verdana;">, Brian Behlendorf, David Axmark</span></span><sup class="reference" id="cite_ref-technetra-gnunify-2008_1-0"><a href="http://en.wikipedia.org/wiki/GNUnify#cite_note-technetra-gnunify-2008-1"></a></sup><span style="font-size: medium;"><span style="font-family: Verdana;">, Danese Cooper&nbsp;</span></span><sup class="reference" id="cite_ref-danese-blog_2-0"><a href="http://en.wikipedia.org/wiki/GNUnify#cite_note-danese-blog-2"></a></sup><span style="font-size: medium;"><span style="font-family: Verdana;">, Robert Adkins, Alolita Sharma, Prof. Tony Wasserman, Prof. Louis Pott, Niyam Bhushan, Sankarshan, Zahira Bohrat and Anant Narayanan.</span></span><sup class="reference" id="cite_ref-technetra-gnunify-2009_3-0"><a href="http://en.wikipedia.org/wiki/GNUnify#cite_note-technetra-gnunify-2009-3"></a></sup><span style="font-size: medium;"><span style="font-family: Verdana;"> This year Gnunify was held in February on 10th and 11th with the name GNUnify 12.</span></span></p>'),
('Unify', 'images/events/Unify/Unify(8).JPG', '<p style="text-align: justify;"><span style="font-family: Verdana;"><span style="font-size: medium;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Unify is the annual cultural fest of SICSR since when the college plays  host to street drama, rock band, software programming, singing, mad ads  competitions.Unify is the annual cultural fest of SICSR since when the college plays  host to street drama, rock band, software programming, singing, mad ads  competitions.Unify is the annual cultural fest of SICSR since when the college plays  host to street drama, rock band, software programming, singing, mad ads  competitions.Unify is the annual cultural fest of SICSR since when the college plays  host to street drama, rock band, software programming, singing, mad ads  competitions.</span></span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `faculty_id` varchar(50) NOT NULL,
  `faculty_passwd` varchar(50) NOT NULL,
  `marital_status` enum('Married','Unmarried') NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `faculty_type` enum('permanent','visiting') NOT NULL,
  `faculty_photo` varchar(255) NOT NULL,
  `designation` enum('Director','Deputy Director','Professor','Associate Professor','Assistant Professor','Other') NOT NULL,
  `qualification` text NOT NULL,
  `expertise` text NOT NULL,
  `extra_activities` text NOT NULL,
  `interest` text NOT NULL,
  `industry_exp` text NOT NULL,
  `teaching_exp` text NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `residence_no` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `local_address` text NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `faculty_passwd`, `marital_status`, `sex`, `dob`, `faculty_type`, `faculty_photo`, `designation`, `qualification`, `expertise`, `extra_activities`, `interest`, `industry_exp`, `teaching_exp`, `contact_no`, `residence_no`, `email`, `address`, `city`, `state`, `local_address`) VALUES
('Atul Kahate', '726d5dee7e78fae8c997c37436ff89a0192636fd', 'Married', 'Male', '2012-02-02', 'permanent', 'images/faculties/atul_kahate.jpg', 'Assistant Professor', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', '2344234', '23454344', 'asd@sdf.com', 'This is Sample Data.', 'pune', 'Maharastra', 'This is Sample Data.'),
('Harshad Gune', '726d5dee7e78fae8c997c37436ff89a0192636fd', 'Married', 'Male', '1982-03-17', 'permanent', 'images/faculties/harshdgune.jpg', 'Director', 'This is qualification sample data..', 'This is sample data..', 'This is sample data..', 'This is sample data..', 'This is sample data..', 'This is sample data..', '2348378972', '325345345', 'harshad_gune@gmail.com', 'This is sample data..\r\nThis is sample data..\r\nThis is sample data..', 'pune', 'maharashtra', 'As above...'),
('Harshad Oak', '726d5dee7e78fae8c997c37436ff89a0192636fd', 'Married', 'Male', '2012-02-10', 'visiting', 'images/faculties/harshad_oak.jpg', 'Associate Professor', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', '3242345', '24324234', 'asd@sdf.com', '  This is Sample Data.', 'pune', 'Maharastra', 'This is Sample Data.'),
('Manjusha Joshi', '726d5dee7e78fae8c997c37436ff89a0192636fd', 'Married', 'Female', '2012-02-07', 'permanent', 'images/faculties/majusha_joshi.jpg', 'Deputy Director', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', 'This is Sample Data.', '234234', '456456', 'asd@sdf.com', '   This is Sample Data. ', 'pune', 'Maharastra', 'This is Sample Data.'),
('Sachin Naik', '726d5dee7e78fae8c997c37436ff89a0192636fd', 'Married', 'Male', '1985-08-14', 'permanent', 'images/faculties/Sachin_naikk.jpg', 'Professor', 'This is sample data..', 'This is sample data..', 'This is sample data..', 'This is sample data..', 'This is sample data..', 'This is sample data..', '234234234', '345345234', 'sachinnaik@gmail.com', '    This is sample data..\r\nThis is sample data..\r\nThis is sample data..      ', 'pune', 'maharashtra', 'same as above'),
('Shrikant Mapari ', '726d5dee7e78fae8c997c37436ff89a0192636fd', 'Married', 'Male', '1984-02-06', 'permanent', 'images/faculties/Shrikant_sir.jpg', 'Associate Professor', 'This is sample data...', 'This is sample data...', 'This is sample data...', 'This is sample data...', 'This is sample data...', 'This is sample data...', '523423423', '3242342356', 'shrikant_mapari@gmail.com', 'This is sample data...\r\nThis is sample data...\r\nThis is sample data...', 'pune', 'maharashtra', 'This is sample data...'),
('Vidhya Kumbhar', '726d5dee7e78fae8c997c37436ff89a0192636fd', 'Married', 'Female', '1986-03-29', 'permanent', 'images/faculties/vidhya_mam.jpg', 'Other', 'This is sample data..\r\nThis is sample data..\r\n', 'This is sample data..This is sample data..', 'This is sample data..This is sample data..', 'This is sample data..', 'This is sample data..This is sample data..', 'This is sample data..', '2434234', '4364566', 'vidhyakumbhar@yahoo.com', 'This is sample data..This is sample data..\r\nThis is sample data..\r\nThis is sample data..', 'pune', 'maharashtra', 'same as above..');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_time_table`
--

CREATE TABLE IF NOT EXISTS `faculty_time_table` (
  `ftt_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `faculty_id` varchar(50) NOT NULL,
  `ftt_text` text NOT NULL,
  PRIMARY KEY (`ftt_id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faculty_time_table`
--

INSERT INTO `faculty_time_table` (`ftt_id`, `faculty_id`, `ftt_text`) VALUES
(2, 'Manjusha Joshi', '<p><style type="text/css">\r\n		<!-- \r\n		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Arial"; font-size:x-small }\r\n		 -->\r\n	</style>\r\n<table border="0" cols="8" cellspacing="0" rules="NONE" frame="VOID">\r\n    <colgroup><col width="108" /><col width="93" /><col width="91" /><col width="93" /><col width="115" /><col width="86" /><col width="91" /><col width="64" /></colgroup>\r\n    <tbody>\r\n        <tr>\r\n            <td width="741" valign="BOTTOM" height="27" align="CENTER" colspan="8">\r\n            <p><font size="4" face="Verdana" color="#000000">Symbiosis Institute of Computer Studies and Research</font></p>\r\n            <p><font size="4" face="Verdana" color="#000000">Manjusha Joshi</font></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="20" align="CENTER" colspan="8" style="border-bottom: 1px solid #000000">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="20" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Monday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Tuesday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Wednesday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Thursday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Friday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Saturday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Sunday</font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="152" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">08.30-10.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">RTOS (706) Trupti Hake</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF00FF"><br />\r\n            </font></b></td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#333333"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="57" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">10.00-11.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FFFF00"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FFFF00"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FFFF00"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">XML(207)<br />\r\n            Div:A</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">XML(207)<br />\r\n            Div:A</font></b></td>\r\n            <td valign="BOTTOM" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="133" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">11.30 - 1.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">XML(207)<br />\r\n            Div: B+C</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">XML(207)<br />\r\n            Div: B+C<br />\r\n            German (706)<br />\r\n            Div A</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000"><br />\r\n            </font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" height="20" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"><font face="Verdana" color="#000000">L</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><font face="Verdana" color="#000000">U</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><font face="Verdana" color="#000000">N</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"><font face="Verdana" color="#000000">C</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><font face="Verdana" color="#000000">H</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="76" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">2.00-3.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">R Prog.<br />\r\n            (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">RTOS (706) Trupti Hake</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="191" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">3.30 - 5.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="76" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">5.00 - 6.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">R Prog.<br />\r\n            (207)<br />\r\n            5.15 to 6.45pm</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">DS (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">DS (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">CIS (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">CIS (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="39" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">6.30 - 8.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="LEFT" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>'),
(3, 'Harshad Oak', '<p>\r\n<table border="0" cols="8" cellspacing="0" style="width: 587px; height: 531px;" frame="VOID" rules="NONE">\r\n    <colgroup><col width="108" /><col width="93" /><col width="91" /><col width="93" /><col width="115" /><col width="86" /><col width="91" /><col width="64" /></colgroup>\r\n    <tbody>\r\n        <tr>\r\n            <td width="741" valign="BOTTOM" height="27" align="CENTER" colspan="8"><font size="4" face="Verdana" color="#000000">Symbiosis Institute of Computer Studies and Research<br />\r\n            Harshad Oak<br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="20" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Monday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Tuesday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Wednesday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Thursday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Friday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Saturday</font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="152" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">08.30-10.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) <br />\r\n            Rohit<br />\r\n            J2EE(707)<br />\r\n            9to10am<br />\r\n            H Oak</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) <br />\r\n            Rohit</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) <br />\r\n            Rohit<br />\r\n            J2EE(707)<br />\r\n            9to10am<br />\r\n            H Oak</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="57" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">10.00-11.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FFFF00"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="BOTTOM" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="133" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">11.30 - 1.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" height="20" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000">&nbsp;</td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000">&nbsp;</td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000">&nbsp;</td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000">&nbsp;</td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="76" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">2.00-3.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="191" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">3.30 - 5.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) SSJ<br />\r\n            CMS (707)<br />\r\n            Div B (GP)<br />\r\n            German (706)<br />\r\n            Div A</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) SSJ<br />\r\n            CMS (707)<br />\r\n            Div B (GP)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) SSJ<br />\r\n            CMS (707) HG</font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="76" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">5.00 - 6.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="39" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">6.30 - 8.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NIS (703)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NIS (703)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NIS (703)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="20" align="LEFT" style="border-top: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000"><font color="#000000"><br />\r\n            </font></td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` varchar(50) NOT NULL,
  `batch_id` varchar(50) NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `batch_id` (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `batch_id`) VALUES
('BBA(IT) 2010-2012 sem1', 'BBA(IT) 2010-2012'),
('BBA(IT) 2010-2012 sem2', 'BBA(IT) 2010-2012'),
('BBA(IT) 2010-2012 sem3 101', 'BBA(IT) 2010-2012'),
('BBA(IT) 2010-2012 sem3 102', 'BBA(IT) 2010-2012'),
('BBA(IT) 2011-2013 sem1', 'BBA(IT) 2011-2013'),
('BBA(IT) 2011-2013 sem2', 'BBA(IT) 2011-2013'),
('BBA(IT) 2011-2013 sem3 101', 'BBA(IT) 2011-2013'),
('MSc(ca) 2010-2012 sem1', 'MSc(ca) 2010-2012'),
('MSc(ca) 2010-2012 sem2', 'MSc(ca) 2010-2012'),
('MSc(ca) 2010-2012 sem3', 'MSc(ca) 2010-2012'),
('MSc(ca) 2011-2013 sem1', 'MSc(ca) 2011-2013'),
('MSc(ca) 2011-2013 sem2', 'MSc(ca) 2011-2013'),
('MSc(ca) 2011-2013 sem3 SA', 'MSc(ca) 2011-2013'),
('MSc(ca) 2011-2013 sem3 SD', 'MSc(ca) 2011-2013');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE IF NOT EXISTS `homepage` (
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`text`) VALUES
('<div style="height:200px; width:200px;float:left;">\r\n<img src="http://sicsr.ac.in/images/sicsr.jpg" alt="" /></div>\r\n<div style="margin-left: 220px; text-align: justify;"><strong>SICSR</strong>,celebrating its 25th year was one of the first Institutes in  Maharashtra to offer high quality computer education. SICSR is located in the heart of Pune City. <br />\r\nOur  location, our  broad portfolio of academic IT programmes, our talented and  diverse  student body, and our dedicated faculty members work together to create an educational experience that is relevant, enriching, and uniquely  Symbiosis.</div> If you are considering IT education, we invite you to explore  Symbiosis Institute of Computer Studies and Research (SICSR). <br />\r\nSICSR  has outstanding IT infrastructure available to support the  programmes besides  its excellent book collection and reference  library.</p>\r\n<strong>Our Vision</strong><br />\r\nSICSR  shall be the leading Techno-Management Institution in the field of Information  Technology.<br />\r\n<strong>Our Mission</strong><br />\r\nSICSR  shall continuously improve the quality of academic  programmes and create a  unique environment conducive for the overall  development of students.<br />\r\n<strong>A few words from the Director</strong><em><br />\r\n</em><i>"Symbiosis Institute of Computer Studies and Research (SICSR)  aims at  building the future leaders for the IT industry worldwide by  imparting world  class IT education to them. We offer state-of-art  information technology  education for building leading-edge and  innovative IT applications. IT has  become a critical tool for economic,  business and social development and will  play a pivotal and catalytic  role in a nations progress. The fundamental  principles on which we  lean on are to use IT in all that we do so that our  students are  technology savvy and are practicing what they learn namely the use  of  IT to solve business problems."</i>');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `notes_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `sub_id` varchar(50) NOT NULL,
  PRIMARY KEY (`notes_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photogallery`
--

CREATE TABLE IF NOT EXISTS `photogallery` (
  `gallery_id` varchar(255) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photogallery`
--

INSERT INTO `photogallery` (`gallery_id`) VALUES
('GNUnify'),
('Unify');

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE IF NOT EXISTS `placement` (
  `placement_cell` longtext NOT NULL,
  `placement_stats` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`placement_cell`, `placement_stats`) VALUES
('<p style="text-align: justify;"><span style="font-size: medium;">Academic Delivery now being ready for an Open  Source  Learning Management System Moodle. One of the best&nbsp; in the industry and  also SICSR is a pioneer  in the implementation of the same in the entire  Symbiosis family.</span></p>\r\n<ul>\r\n    <li style="text-align: justify;"><span style="font-size: medium;">Rigorous market and  academic research</span></li>\r\n    <li style="text-align: justify;"><span style="font-size: medium;">Our  curriculum has been rated to be the best by the Faculty  of Computer Science,  IIM Bangalore in a Curriculum Audit conducted by  SIU.</span></li>\r\n    <li style="text-align: justify;"><span style="font-size: medium;">We have launched two new certificate courses  namely one on Information Security and one on Entrepreneurship.</span></li>\r\n    <li style="text-align: justify;"><span style="font-size: medium;">We have partnerships with Infosys on the Campus  Connect  Programme and are one of the few ones in the state of Mahararashtra and   the only one in Pune to have this privilege.</span></li>\r\n    <li style="text-align: justify;"><span style="font-size: medium;">Introduction of new certification courses like  Tech2BA  (certified by IIBA), Six Sigma Green Belt courses (certified by TUV or   Moody&rsquo;s) and many more.</span></li>\r\n    <li style="text-align: justify;"><span style="font-size: medium;">Establishment of an Authorized Prometric  Training and Testing Centre</span></li>\r\n</ul>\r\n<p style="text-align: justify;"><span style="font-size: medium;">&nbsp;</span></p>\r\n<div class="td_title" style="text-align: justify;"><span style="font-size: medium;">Placement Cell<br />\r\n</span></div>\r\n<p style="text-align: justify;"><span style="font-size: medium;">Placement Co-ordinator<br />\r\nplacements@sicsr.ac.in <br />\r\n(+91) 020 - 2567 5601 (Extn : 124)</span></p>', '<p align="justify"><span style="font-family: Verdana;"><span style="font-size: medium;"><span class="td_title1">Highest Package of 2009-2011 Batch - 6 Lakhs p.a</span><br />\r\n<span class="td_title1">Highest Internship Stipend - 10,000 p.m. </span><br />\r\n<span class="td_title1">Total Placed : 60 </span></span></span></p>\r\n<table border="0" width="100%" cellspacing="0" cellpadding="0">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" colspan="2">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td align="center" class="td_title" colspan="2"><strong>Job profile wise classification</strong></td>\r\n        </tr>\r\n        <tr>\r\n            <td style="text-align: left;" colspan="2"><img src="http://sicsr.ac.in/images/2009mscplacement.jpg" style="width: 477px; height: 337px;" alt="" /></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_name` varchar(50) NOT NULL,
  `post_time` datetime NOT NULL,
  `post_text` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `from_name`, `post_time`, `post_text`) VALUES
(1, 'admin', '2012-02-20 16:38:03', '<p><img src="/mysite/user_resources/image/2872851704_fa659378ee.jpg" style="width: 569px; height: 215px;" alt="" /></p>\r\n<p>Hello this is just a test Post from admin....<br />\r\nThank u</p>'),
(2, 'admin', '2012-02-20 16:40:35', '<p><img src="/mysite/user_resources/image/2872851704_fa659378ee.jpg" style="width: 514px; height: 218px;" alt="" /></p>\r\n<p>H3LL0 This is test&nbsp; Message frm Admin...Thank u</p>'),
(3, '11030142001', '2012-02-20 19:31:23', '<h6><font size="4"><span><u style="background-color:rgb(51,102,255)">A  big thanks to all the people who attended the 1st day and 2nd day of UNIFY 12.</u> <br />\r\n</span></font></h6>\r\n<h6><font size="4"><span>Great  enthusiasm and energy all around.... <br />\r\n</span></font></h6>\r\n<h6><font size="4"><span>Day 3 i.e. the last day of UNIFY 12&nbsp; include events at :</span></font></h6>\r\n<h6 style="color:rgb(51,51,255)"><font size="4"><span>SICSR campus like Bike stunt show at 12 pm,</span></font></h6>\r\n<h6 style="color:rgb(51,51,255)"><font size="4"><span>Lan Lordz finale live screening at college lobby from 11 am, <br />\r\n</span></font></h6>\r\n<h6 style="color:rgb(51,51,255)"><font size="4"><span>Band Baaja Baraat at 4 pm, <br />\r\n</span></font></h6>\r\n<h6 style="color:rgb(51,51,255)"><font size="4"><span>Bollywood sensation RAHI - LIVE IN CONCERT FOR UNIFY 12 AT SICSR stage at 6 pm,</span></font></h6>\r\n<h6 style="color:rgb(51,51,255)"><font size="4"><span>Prize distribution ceremony at 6.45 pm and <br />\r\n</span></font></h6>\r\n<h6 style="color:rgb(51,51,255)"><font size="4"><span>Ultimately dj nite at 8 pm.</span></font></h6>'),
(4, '11030142001', '2012-02-20 19:33:56', '<div class="ajy"><img alt="" src="https://mail.google.com/mail/images/cleardot.gif" tabindex="0" role="button" id=":u6" class="ajz" data-tooltip="Show details" /></div>\r\n<p>For first the time in Pune, &quot;Jal The Band&quot; is going to perform live at M&eacute;lange 2012 in VIT Pune.</p>\r\n<br />\r\n<p>passes @ Rs. 250 only</p>\r\n<br />\r\n<br />\r\n<p>Passes available right now at our campus.</p>\r\n<br />\r\n<p>Contact:</p>\r\n<br />\r\n<p>+91 7798840612</p>\r\n<br />\r\n<p>+91 7798840615</p>'),
(6, '11030142002', '2012-02-20 19:45:22', '<p>Dear all<br />\r\n<br />\r\n<u><font size="4"><span style="color:rgb(51,51,255)">Thank  you all for coming out and supporting Unify 2012 in big numbers. The  response was amazing and I hope everyone had a good time. Holding events  at three simultaneous locations like the college campus, SIMS  Auditorium and SCDL Campus was a really tough thing to manage, but I  think we pulled it off.</span><br style="color:rgb(51,51,255)" />\r\n</font></u><br />\r\n<i>Day 3</i> events included:<br />\r\n&nbsp;</p>\r\n<ul>\r\n    <li>The final rounds and ultimately finals of Holi Shot</li>\r\n    <li>An amazing Bike Stunt SHow performed by Debmala and co.</li>\r\n    <li>Band Baaja Baraat competition which was a crazy experience.</li>\r\n    <li>Live Concert of Rahi along with a special performance of the college band.</li>\r\n    <li>Prize Distribution Ceremony</li>\r\n    <li>Dj Nite and fireworks show</li>\r\n</ul>\r\n<br />\r\n<font size="4" style="color:rgb(255,102,0)">A  big special thanks for all the support by the faculty especially  Nindane Sir, Lalit Sir and Gune Sir. The show would not have possible  without the support of the Unify faculty which includes Rambabu Sir,  Rajashree Mam, Kanchan Mam, Deepmala Mam and Shrikant Sir.</font><br />\r\n<br />\r\n<b><u><i>Finally, a big special thanks to all the wonderful people  of SICSR, all the participants from the 60 odd colleges we visited. Hope  Unify 2013 would be even better and bigger on a large scale. <br />\r\n<br />\r\n</i></u></b>'),
(7, '11030142002', '2012-02-20 19:47:23', '<p>Dear All,</p>\r\n<p><br />\r\nWe had a great day to day in the GD/PI process. Students  coming for the GD/PI were curious, enthusiastic and were nervous at the  same time. The volunteers did a great job by assisting them. Tomorrow we  will be needing few more volunteers for this. Therefore people who are  interested please be present tomorrow at 9:00 AM sharp in of 407. Be in  formals with proper ID cards. The procedure will be briefed there  itself.</p>'),
(8, 'Manjusha Joshi', '2012-02-20 19:52:19', '<p>This is sample post......!!!!!!!!!!!!!!</p>\r\n<p><strike>asdasdsdasd&nbsp; </strike>&nbsp; asdasd</p>\r\n<hr />\r\n<p><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/omg_smile.gif" alt="" /></p>\r\n<table border="1" width="200" cellspacing="1" cellpadding="1">\r\n    <tbody>\r\n        <tr>\r\n            <td>asdad</td>\r\n            <td>sads</td>\r\n        </tr>\r\n        <tr>\r\n            <td>d</td>\r\n            <td>s</td>\r\n        </tr>\r\n        <tr>\r\n            <td>asd</td>\r\n            <td>assdd</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>All tested .......<img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/regular_smile.gif" alt="" /></p>'),
(9, 'Manjusha Joshi', '2012-02-20 19:53:04', '<p>This is sample post 2....<br />\r\nThis is sample post 2....</p>\r\n<p>This is sample post 2....This is sample post 2....This is sample post 2....This is sample post 2....This is sample post 2....This is sample post 2....</p>\r\n<p>This is sample post 2....This is sample post 2....vThis is sample post 2....</p>'),
(11, 'Harshad Oak', '2012-02-20 19:56:49', '<p>TESTTESTTESTTEST</p>\r\n<p>TESTTEST</p>\r\n<p>v</p>\r\n<p>TESTTESTTEST</p>\r\n<p>TESTTESTv</p>\r\n<p>TESTTEST</p>\r\n<p>TESTvTESTTESTTESTTESTTESTTESTTESTTEST</p>\r\n<p>&nbsp;</p>'),
(12, 'Harshad Oak', '2012-02-20 20:08:29', '<p><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/regular_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/sad_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/wink_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/teeth_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/confused_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/tounge_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/embaressed_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/omg_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/whatchutalkingabout_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/angel_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/angry_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/devil_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/shades_smile.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/lightbulb.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_down.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/envelope.gif" alt="" />&reg;<br />\r\n<br />\r\n&para;&para;&trade;â–º&pound;&euro;&plusmn;</p>\r\n<div style="page-break-after: always;"><span style="DISPLAY:none">&nbsp;</span></div>\r\n<hr />\r\n<p style="text-align: center;"><a href="http://google.com">hyperlink</a></p>'),
(13, '11030142001', '2012-02-21 17:14:06', '<p>dksljsdklfj<img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/regular_smile.gif" alt="" /></p>'),
(16, 'admin', '2012-03-20 18:10:21', '<p>Dear Symbians,<br />\r\n<br />\r\nThis is to inform you that on 17th and 18th of april. Lab will be closed as it will be taken under mainatance and repair work. Please take a not and if there is any submition on those day, you can use Lab no 307.<br />\r\n<br />\r\nRegrds,<br />\r\nAdmin</p>'),
(17, 'admin', '2012-03-20 18:17:09', '<p>Dear All,<br />\r\n<br />\r\nThis is sample msg from admin....<br />\r\n<br />\r\n<br />\r\nRegards,</p>\r\n<p>Admin</p>'),
(18, 'Harshad Gune', '2012-03-20 18:33:14', '<p>Hello,<br />\r\n<br />\r\nThis is sample msg from Harshad Gune..<img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/teeth_smile.gif" alt="" /><br />\r\n&nbsp;</p>'),
(19, 'Harshad Gune', '2012-03-20 18:33:54', '<p>Hello<br />\r\n<br />\r\nThis is hello from Harshad Gune to admin..........<img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/wink_smile.gif" alt="" /></p>'),
(20, 'Sachin Naik', '2012-03-20 18:55:15', '<p>This is sample message from Sachin Naik.<br />\r\n<br />\r\ngood evening every one!!!<img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/angel_smile.gif" alt="" /><br />\r\n<br />\r\nRegards,<br />\r\nSachin</p>'),
(21, 'Sachin Naik', '2012-03-20 19:00:49', '<p><img src="/mysite/user_resources/image/Pejo-Night-Village.jpg" style="width: 538px; height: 225px;" alt="" /><br />\r\n<br />\r\nThis is the pic of beautiful city...name of city is pejo..<br />\r\n<br />\r\nRegards,<br />\r\nSachin</p>'),
(22, 'Shrikant Mapari', '2012-03-20 19:23:52', '<p><br />\r\n<br />\r\n<img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/thumbs_up.gif" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p>All the best for ur exam!!!<br />\r\n<br />\r\n<br />\r\nRegards,<br />\r\nShrikant</p>'),
(23, 'Vidhya Kumbhar', '2012-03-20 19:32:47', '<p><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/envelope.gif" alt="" /> <img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/envelope.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/envelope.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/envelope.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/envelope.gif" alt="" /><img src="http://localhost/mysite/fckeditor/editor/images/smiley/msn/envelope.gif" alt="" /><br />\r\n<br />\r\nCheck ur mail and msgs regularly...and keep it updated..<br />\r\nDnt spam inbox...<br />\r\n<br />\r\nSICSR&nbsp;welcomes you,<br />\r\n<br />\r\nRegards,<br />\r\nVidhya Kumbhar<br />\r\nSICSR, Pune</p>\r\n<p><br />\r\n&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `post_to`
--

CREATE TABLE IF NOT EXISTS `post_to` (
  `post_to_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `to_name` varchar(50) NOT NULL,
  PRIMARY KEY (`post_to_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `post_to`
--

INSERT INTO `post_to` (`post_to_id`, `post_id`, `to_name`) VALUES
(2, 2, 'MSc(ca)'),
(3, 4, 'BBA(IT)'),
(4, 4, 'MSc(ca)'),
(5, 4, 'admin'),
(13, 7, 'Atul Kahate'),
(14, 7, 'Harshad Oak'),
(15, 7, 'Manjusha Joshi'),
(16, 7, 'Sachin Naik'),
(17, 7, 'BBA(IT)'),
(18, 7, 'MSc(ca)'),
(19, 7, 'admin'),
(20, 8, 'Atul Kahate'),
(21, 8, 'Harshad Oak'),
(22, 8, 'Manjusha Joshi'),
(23, 8, 'Sachin Naik'),
(24, 8, 'BBA(IT)'),
(25, 8, 'MSc(ca)'),
(26, 8, 'admin'),
(27, 9, 'Atul Kahate'),
(28, 9, 'Harshad Oak'),
(29, 9, 'Manjusha Joshi'),
(30, 9, 'Sachin Naik'),
(31, 9, 'BBA(IT)'),
(32, 9, 'MSc(ca)'),
(33, 9, 'admin'),
(40, 11, 'Atul Kahate'),
(41, 11, 'Harshad Oak'),
(42, 11, 'Manjusha Joshi'),
(43, 11, 'Sachin Naik'),
(44, 11, 'BBA(IT)'),
(45, 11, 'MSc(ca)'),
(46, 11, 'admin'),
(47, 12, 'Atul Kahate'),
(48, 12, 'Harshad Oak'),
(49, 12, 'Manjusha Joshi'),
(50, 12, 'Sachin Naik'),
(51, 12, 'BBA(IT)'),
(52, 12, 'MSc(ca)'),
(53, 12, 'admin'),
(54, 13, '11030142001'),
(55, 13, '11030142004'),
(56, 13, '11030142013'),
(57, 13, 'Atul Kahate'),
(58, 13, 'Manjusha Joshi'),
(59, 13, 'BBA(IT) 2010-2012 sem1'),
(60, 13, 'BBA(IT) 2010-2012 sem3 102'),
(61, 13, 'MSc(ca) 2011-2013 sem3 SA'),
(62, 13, 'BBA(IT) 2011-2013'),
(63, 13, 'MSc(ca)'),
(64, 13, 'admin'),
(79, 16, 'Atul Kahate'),
(80, 16, 'Harshad Gune'),
(81, 16, 'Harshad Oak'),
(82, 16, 'Manjusha Joshi'),
(83, 16, 'Sachin Naik'),
(84, 16, 'Shrikant Mapari '),
(85, 16, 'Vidhya Kumbhar'),
(86, 16, 'BBA(IT) 2011-2013 sem3 101'),
(87, 16, 'MSc(ca) 2010-2012 sem1'),
(88, 16, 'MSc(ca) 2011-2013 sem1'),
(89, 16, 'MSc(ca)'),
(90, 17, '11030142024'),
(91, 17, '11030142001'),
(92, 17, '11030142002'),
(93, 17, '11030142003'),
(94, 17, 'Atul Kahate'),
(95, 17, 'Harshad Gune'),
(96, 17, 'Harshad Oak'),
(97, 17, 'Manjusha Joshi'),
(98, 17, 'Sachin Naik'),
(99, 17, 'Shrikant Mapari '),
(100, 17, 'Vidhya Kumbhar'),
(101, 17, 'MSc(ca) 2011-2013 sem2'),
(102, 17, 'BBA(IT)'),
(103, 17, 'MSc(ca)'),
(104, 18, 'Atul Kahate'),
(105, 18, 'Harshad Gune'),
(106, 18, 'Harshad Oak'),
(107, 18, 'Manjusha Joshi'),
(108, 18, 'Sachin Naik'),
(109, 18, 'Shrikant Mapari '),
(110, 18, 'Vidhya Kumbhar'),
(111, 18, 'BBA(IT) 2011-2013'),
(112, 18, 'MSc(ca) 2010-2012'),
(113, 18, 'MSc(ca) 2011-2013'),
(114, 19, 'admin'),
(115, 20, 'Atul Kahate'),
(116, 20, 'Harshad Gune'),
(117, 20, 'Harshad Oak'),
(118, 20, 'Manjusha Joshi'),
(119, 20, 'Shrikant Mapari '),
(120, 20, 'Vidhya Kumbhar'),
(121, 20, 'BBA(IT) 2011-2013'),
(122, 20, 'MSc(ca) 2010-2012'),
(123, 20, 'MSc(ca) 2011-2013'),
(124, 20, 'admin'),
(125, 21, 'Atul Kahate'),
(126, 21, 'Harshad Gune'),
(127, 21, 'Harshad Oak'),
(128, 21, 'Manjusha Joshi'),
(129, 21, 'Shrikant Mapari '),
(130, 21, 'Vidhya Kumbhar'),
(131, 21, 'BBA(IT) 2010-2012'),
(132, 21, 'BBA(IT) 2011-2013'),
(133, 21, 'MSc(ca) 2010-2012'),
(134, 21, 'MSc(ca) 2011-2013'),
(135, 21, 'admin'),
(136, 22, '11030142024'),
(137, 22, '11030142001'),
(138, 22, '11030142002'),
(139, 22, '11030142003'),
(140, 22, 'Atul Kahate'),
(141, 22, 'Harshad Gune'),
(142, 22, 'Harshad Oak'),
(143, 22, 'Sachin Naik'),
(144, 22, 'Vidhya Kumbhar'),
(145, 22, 'MSc(ca) 2010-2012 sem1'),
(146, 22, 'MSc(ca) 2010-2012 sem2'),
(147, 22, 'MSc(ca) 2010-2012 sem3'),
(148, 22, 'BBA(IT)'),
(149, 22, 'MSc(ca)'),
(150, 22, 'admin'),
(151, 23, '11030142024'),
(152, 23, '11030142001'),
(153, 23, '11030142002'),
(154, 23, '11030142003'),
(155, 23, 'Atul Kahate'),
(156, 23, 'Harshad Gune'),
(157, 23, 'Harshad Oak'),
(158, 23, 'Manjusha Joshi'),
(159, 23, 'Sachin Naik'),
(160, 23, 'Shrikant Mapari '),
(161, 23, 'BBA(IT) 2010-2012 sem3 101'),
(162, 23, 'BBA(IT) 2010-2012 sem3 102'),
(163, 23, 'BBA(IT) 2011-2013 sem1'),
(164, 23, 'BBA(IT) 2011-2013 sem3 101'),
(165, 23, 'MSc(ca) 2010-2012 sem1'),
(166, 23, 'MSc(ca) 2010-2012 sem2'),
(167, 23, 'MSc(ca)'),
(168, 23, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE IF NOT EXISTS `programmes` (
  `prg_id` varchar(50) NOT NULL,
  `objective` text NOT NULL,
  `specialization` text NOT NULL,
  `duration` text NOT NULL,
  `intake` int(5) NOT NULL,
  `resrv_seat` text NOT NULL,
  `eligibility` text NOT NULL,
  `selection` text NOT NULL,
  `lang_medium` varchar(20) NOT NULL,
  `course_link` varchar(255) NOT NULL,
  `fee` text NOT NULL,
  `internal_assesment` text NOT NULL,
  `external_assesment` text NOT NULL,
  `practical_assesment` text NOT NULL,
  `passing_rule` text NOT NULL,
  `award_degree` text NOT NULL,
  PRIMARY KEY (`prg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`prg_id`, `objective`, `specialization`, `duration`, `intake`, `resrv_seat`, `eligibility`, `selection`, `lang_medium`, `course_link`, `fee`, `internal_assesment`, `external_assesment`, `practical_assesment`, `passing_rule`, `award_degree`) VALUES
('BBA(IT)', 'BBA (IT) is a perfect blend of Commerce, Management and IT subjects heading for smart careers in Business Administration with an IT flavor. BBA (IT) offers opportunities for an early entry into the Management cadre, equipped with IT knowledge, to be trained appropriately by the companies for their requirements. These students can also opt for Higher studies here or abroad in the Management field. ', '<p>No Specialisation provided</p>', '3 yrs', 90, '<ol type="1">\r\n    <li><strong>Within the Sanctioned intake:</strong>\r\n    <ol type="a">\r\n        <li>SC: 15%</li>\r\n        <li>ST: 7.5%</li>\r\n        <li>Physically Handicapped: 3%</li>\r\n        <li>Serving/Retired Defence Personnel and their   Children: 5%</li>\r\n    </ol>\r\n    </li>\r\n    <li><strong>Over and above the Sanctioned intake:</strong>\r\n    <ol type="a">\r\n        <li>Kashmiri Migrants: 2 seats per programme</li>\r\n        <li>International  Students 15%</li>\r\n    </ol>\r\n    </li>\r\n</ol>', 'Student passing XII from any faculty or equivalent diploma in Engineering/Technology with minimum 50% marks. (For SC/ST: 45%) ', 'Symbiosis Entrance Test (SET), Group Exercise and Personal Interaction ', 'English', 'courses.php?cid=BBA(IT)', '<table width="93%" cellspacing="2" cellpadding="2">\r\n    <tbody>\r\n        <tr>\r\n            <td style="border:1px solid;">CategoryCategory</td>\r\n            <td align="center" style="border:1px solid;">BBA (IT) &nbsp;Year-I</td>\r\n            <td align="center" style="border:1px solid;">BBA (IT) &nbsp;Year-II</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">Open/SC/ST/KM/Defense/PH</td>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">Rs. 89,000/-</td>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">Rs. 89,000/-</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">International Students</td>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">\r\n            <div align="center">$3400   (Rs.1,70,000) + Rs 3000</div>\r\n            </td>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">\r\n            <div align="center">$3400 (Rs.1,70,000) + Rs 3000</div>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<ul>\r\n    <li>Subject to change</li>\r\n    <li>Includes Rs 3000/- as one  time University examination fees   for first semester (for regular exam only)</li>\r\n    <li>International students will have to pay equivalent fees in   dollars.</li>\r\n</ul>', 'Each faculty is required to give an assessment plan to you at the beginning of the programme.', 'External assessment will be done based on the End-Semester examination.', 'Practical assessment will cover the assignments and lab examination. ', 'A student has to pass both internal & external exam separately. The grade F or marks less than 50% of Individual head (internal & external) will be considered as fail. A student will be eligible for award of degree if he obtains a minimum 2.00 CGPA at the end of 6th semester. ', 'The Degree will be awarded at the end of 6th semester examination by taking into consideration the performance of all 6 semesters examinations.'),
('MSc(ca)', 'The objective of MSc(ca) course is to deliver fundamental knowledge of core computer science.', '<p>Tis course provide followinf field of specialisation :</p>\r\n<ul>\r\n    <li>Software Developement</li>\r\n    <li>System admin.</li>\r\n    <li>Embedded Systems</li>\r\n</ul>', '2 yrs', 90, '<ol type="1">\r\n    <li><strong>Within the Sanctioned intake:</strong>\r\n    <ol type="a">\r\n        <li>SC: 15%</li>\r\n        <li>ST: 7.5%</li>\r\n        <li>Physically Handicapped: 3%</li>\r\n        <li>Serving/Retired Defence Personnel and their   Children: 5%</li>\r\n    </ol>\r\n    </li>\r\n    <li><strong>Over and above the Sanctioned intake:</strong>\r\n    <ol type="a">\r\n        <li>Kashmiri Migrants: 2 seats per programme</li>\r\n    </ol>\r\n    </li>\r\n</ol>', 'Graduate in any discipline of any statutory University with minimum 50% marks (45% for SC/ST).\r\n\r\n    For Embedded Systems specialization, students should either have Electronics or Computer Science at graduation.', 'Candidate will be selected based on Written Test conducted by SNAP,\r\nGE(Group Exercise), PI(Personal Interaction).', 'English', 'courses.php?cid=MSc(ca)', '<p>&nbsp;</p>\r\n<table width="93%" cellspacing="2" cellpadding="2" style="border:1px solid;">\r\n    <tbody>\r\n        <tr>\r\n            <td style="border:1px solid;">Category</td>\r\n            <td align="center" style="border:1px solid;">MSc. (CA) Year-I</td>\r\n            <td align="center" style="border:1px solid;">MSc. (CA) Year-II</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">Open/SC/ST/KM/Defense/PH</td>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">Rs.   1,59,000*</td>\r\n            <td style="border-right:1px solid; border-bottom:1px solid;">Rs. 1,59,000*</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'Each faculty is required to give an assessment plan to you at the beginning of the programme.', 'External assessment will be done based on the End-Semester examination.', 'Practical assessment will cover the assignments and lab examination. ', 'A student has to pass both internal & external exam separately. The grade F or marks less than 50% of Individual head (internal & external) will be considered as fail. A student will be eligible for award of degree if he obtains a minimum 2.00 CGPA at the end of 4th semester. ', 'The Degree will be awarded at the end of 4th semester examination by taking into consideration the performance of all 4 semesters examinations');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `res_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `result_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` varchar(50) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `obtained_marks` float(5,2) NOT NULL,
  `class_avg` float(5,2) NOT NULL,
  `percentile` float(5,2) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `rank` int(5) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `test_id` (`test_id`),
  KEY `stud_id` (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `test_id`, `stud_id`, `obtained_marks`, `class_avg`, `percentile`, `grade`, `rank`) VALUES
(1, 'JAVA SE - LVL 1', '11030142001', 14.00, 16.23, 56.00, 'B+', 9),
(2, 'JAVA SE - LVL 1', '11030142002', 12.00, 16.23, 48.00, 'B+', 12),
(3, 'JAVA SE - LVL 1', '11030142003', 23.00, 16.23, 92.00, 'A', 3),
(4, 'JAVA SE - LVL 1', '11030142004', 12.00, 16.23, 48.00, 'B+', 11),
(5, 'JAVA SE - LVL 1', '11030142005', 11.00, 16.23, 44.00, 'B+', 13),
(6, 'JAVA SE - LVL 1', '11030142006', 17.00, 16.23, 68.00, 'B+', 8),
(7, 'JAVA SE - LVL 1', '11030142007', 13.00, 16.23, 52.00, 'B+', 10),
(8, 'JAVA SE - LVL 1', '11030142008', 18.00, 16.23, 72.00, 'A-', 7),
(9, 'JAVA SE - LVL 1', '11030142009', 19.00, 16.23, 76.00, 'A-', 6),
(10, 'JAVA SE - LVL 1', '11030142010', 21.00, 16.23, 84.00, 'A-', 5),
(11, 'JAVA SE - LVL 1', '11030142011', 22.00, 16.23, 88.00, 'A-', 4),
(12, 'JAVA SE - LVL 1', '11030142012', 25.00, 16.23, 100.00, 'A+', 1),
(13, 'JAVA SE - LVL 1', '11030142013', 24.50, 16.23, 98.00, 'A', 2),
(14, 'JAVA SE - LVL 1', '11030142014', 9.00, 16.23, 36.00, 'B+', 14),
(15, 'JAVA SE - LVL 1', '11030142015', 3.00, 16.23, 12.00, 'B+', 15),
(16, 'SPM Written 1', '11030142001', 24.00, 17.75, 96.00, 'A+', 1),
(17, 'SPM Written 1', '11030142002', 13.00, 17.75, 52.00, 'B+', 12),
(18, 'SPM Written 1', '11030142003', 12.00, 17.75, 48.00, 'B+', 13),
(19, 'SPM Written 1', '11030142004', 16.00, 17.75, 64.00, 'B+', 11),
(20, 'SPM Written 1', '11030142005', 12.00, 17.75, 48.00, 'B+', 14),
(21, 'SPM Written 1', '11030142006', 18.00, 17.75, 72.00, 'B+', 9),
(22, 'SPM Written 1', '11030142007', 23.00, 17.75, 92.00, 'A', 3),
(23, 'SPM Written 1', '11030142008', 20.00, 17.75, 80.00, 'A-', 5),
(24, 'SPM Written 1', '11030142009', 19.75, 17.75, 79.00, 'A-', 6),
(25, 'SPM Written 1', '11030142010', 18.00, 17.75, 72.00, 'B+', 8),
(26, 'SPM Written 1', '11030142011', 17.00, 17.75, 68.00, 'B+', 10),
(27, 'SPM Written 1', '11030142012', 19.00, 17.75, 76.00, 'A-', 7),
(28, 'SPM Written 1', '11030142013', 20.50, 17.75, 82.00, 'A-', 4),
(29, 'SPM Written 1', '11030142014', 11.00, 17.75, 44.00, 'B+', 15),
(30, 'SPM Written 1', '11030142015', 23.00, 17.75, 92.00, 'A', 2),
(31, 'BPP mod 1', '11030142001', 22.00, 17.61, 88.00, 'A', 3),
(32, 'BPP mod 1', '11030142002', 23.00, 17.61, 92.00, 'A+', 1),
(33, 'BPP mod 1', '11030142003', 12.00, 17.61, 48.00, 'B+', 13),
(34, 'BPP mod 1', '11030142004', 14.25, 17.61, 57.00, 'B+', 11),
(35, 'BPP mod 1', '11030142005', 15.00, 17.61, 60.00, 'B+', 10),
(36, 'BPP mod 1', '11030142006', 17.00, 17.61, 68.00, 'B+', 9),
(37, 'BPP mod 1', '11030142007', 23.00, 17.61, 92.00, 'A', 2),
(38, 'BPP mod 1', '11030142008', 11.00, 17.61, 44.00, 'B+', 14),
(39, 'BPP mod 1', '11030142009', 19.00, 17.61, 76.00, 'B+', 8),
(40, 'BPP mod 1', '11030142010', 19.86, 17.61, 79.44, 'A-', 7),
(41, 'BPP mod 1', '11030142011', 22.00, 17.61, 88.00, 'A-', 4),
(42, 'BPP mod 1', '11030142012', 21.00, 17.61, 84.00, 'A-', 6),
(43, 'BPP mod 1', '11030142013', 10.00, 17.61, 40.00, 'B+', 15),
(44, 'BPP mod 1', '11030142014', 21.00, 17.61, 84.00, 'A-', 5),
(45, 'BPP mod 1', '11030142015', 14.00, 17.61, 56.00, 'B+', 12);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `stud_id` varchar(50) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  `student_passwd` varchar(50) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `marital_status` enum('Married','Unmarried') NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `student_photo` varchar(255) NOT NULL,
  `qualification` text NOT NULL,
  `expertise` text NOT NULL,
  `extra_activities` text NOT NULL,
  `interest` text NOT NULL,
  `experience` text NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `residence_no` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `local_address` text NOT NULL,
  PRIMARY KEY (`stud_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `group_id`, `student_passwd`, `fname`, `lname`, `marital_status`, `sex`, `dob`, `student_photo`, `qualification`, `expertise`, `extra_activities`, `interest`, `experience`, `contact_no`, `residence_no`, `email`, `address`, `city`, `state`, `local_address`) VALUES
('11030142001', 'MSc(ca) 2011-2013 sem1', '332b778091fecdacfec542901439a2c2a835a77f', 'Mohit', 'Dalal', 'Unmarried', 'Male', '2012-02-09', 'images/students/mohit.JPG', 'This is sample data.', 'This is sample data.', 'This is sample data.', 'This is sample data.', 'This is sample data.', '523423534', '3534234234', 'asd@sdf.com', '  This is sample data.', 'Pune', 'Maharastra', 'This is sample data.'),
('11030142002', 'MSc(ca) 2011-2013 sem1', 'ad870c305617cd7c04929cd4fc970096ef5e45bc', 'Ankit', 'Gadgil', 'Unmarried', 'Male', '2012-02-07', 'images/students/ankit.jpg', 'This is sample data.', 'This is sample data.', 'This is sample data.', 'This is sample data.', 'This is sample data.', '345345', '3242345', 'asd@sdf.com', '  This is sample data.', 'Pune', 'Maharastra', 'This is sample data.'),
('11030142003', 'MSc(ca) 2011-2013 sem1', 'a0c642441c45e8fd892a2f37ff20b09702b441c0', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142004', 'MSc(ca) 2011-2013 sem1', 'fade71fa4325b2ae7c75f943b53ef1ddaed60b94', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142005', 'MSc(ca) 2011-2013 sem1', '05e59f111e5206554663025dd5a562d03b18f621', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142006', 'MSc(ca) 2011-2013 sem1', '034020143cc9231eea8d2ead6cf6a50b7f98e704', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142007', 'MSc(ca) 2011-2013 sem1', 'f2212a651c888072309bfd2b6837956c9fda045e', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142008', 'MSc(ca) 2011-2013 sem1', '03dd56e40c5eef1e22100a3d1cc558ca9271749d', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142009', 'MSc(ca) 2011-2013 sem1', '409324dfddc711ecc67b2ec1ebda71775870ccb6', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142010', 'MSc(ca) 2011-2013 sem1', '5d475cf753a626bb31a21a5a4d21d1b2daae6253', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142011', 'MSc(ca) 2011-2013 sem1', '64134f5d7a448419caf62dc743ce73466534f02e', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142012', 'MSc(ca) 2011-2013 sem1', 'ec1369bccc0cda4c2b480b652f224658e01fa178', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142013', 'MSc(ca) 2011-2013 sem1', '407a08f9ae83f50d6519f0673d7d38e752bd060e', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142014', 'MSc(ca) 2011-2013 sem1', 'a0fd53c6cf474f88048a022ed171a94cdb8c0ee7', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11030142015', 'MSc(ca) 2011-2013 sem1', '845d00094cd105b41780a44f924db70d70436055', '', '', 'Married', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `sub_id` varchar(50) NOT NULL,
  `sem_no` tinyint(5) NOT NULL,
  `sub_type` enum('main','elective') NOT NULL,
  `no_credits` int(5) NOT NULL,
  `marks` int(5) NOT NULL,
  `internal_marks` int(5) NOT NULL,
  `external_marks` int(5) NOT NULL,
  `internal_evolution` text NOT NULL,
  `external_evolution` text NOT NULL,
  `topic_list` text NOT NULL,
  `reference_books` text NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sem_no`, `sub_type`, `no_credits`, `marks`, `internal_marks`, `external_marks`, `internal_evolution`, `external_evolution`, `topic_list`, `reference_books`) VALUES
('ASP.NET', 2, 'main', 4, 100, 60, 40, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>'),
('BPP', 1, 'main', 4, 100, 60, 40, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>'),
('JAVA EE', 2, 'main', 4, 100, 60, 40, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>'),
('JAVA ME', 3, 'main', 4, 100, 60, 40, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>'),
('JAVA_SE', 1, 'main', 4, 100, 60, 40, '<p>Internal evaluation will be based on three assignments provided to students.<br />\r\n<br />\r\nStudents are required to submit their assignment before the last submission date.</p>', '<p>Internal evaluation will be based on three assignments provided to students.</p>', '<ul>\r\n    <li>Classes</li>\r\n    <li>Objects</li>\r\n    <li>Functions</li>\r\n    <li>Inheritance</li>\r\n</ul>', '<ul>\r\n    <li>Scjp ( 3rd edittion)</li>\r\n    <li>Java complete Reference 2</li>\r\n</ul>'),
('Language1- Japanese', 3, 'elective', 4, 50, 25, 25, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>'),
('Language1-German', 2, 'elective', 2, 50, 25, 25, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>'),
('Language1-Spanish', 1, 'elective', 2, 50, 25, 25, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>'),
('SPM', 1, 'main', 4, 100, 60, 40, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>'),
('VB.NET', 2, 'main', 4, 100, 60, 40, '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>', '<p>This is sample data.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_groups`
--

CREATE TABLE IF NOT EXISTS `subjects_groups` (
  `group_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  KEY `group_id` (`group_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects_groups`
--

INSERT INTO `subjects_groups` (`group_id`, `sub_id`) VALUES
('MSc(ca) 2011-2013 sem2', 'Language1-German'),
('MSc(ca) 2011-2013 sem3 SD', 'Language1- Japanese'),
('MSc(ca) 2011-2013 sem1', 'JAVA_SE'),
('MSc(ca) 2011-2013 sem1', 'Language1-Spanish'),
('MSc(ca) 2011-2013 sem1', 'SPM'),
('MSc(ca) 2011-2013 sem2', 'JAVA EE'),
('MSc(ca) 2011-2013 sem2', 'VB.NET'),
('MSc(ca) 2011-2013 sem3 SD', 'BPP'),
('MSc(ca) 2011-2013 sem1', 'BPP'),
('MSc(ca) 2010-2012 sem1', 'ASP.NET'),
('MSc(ca) 2010-2012 sem1', 'JAVA_SE'),
('MSc(ca) 2010-2012 sem1', 'SPM');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `test_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `test_type` varchar(50) NOT NULL,
  `evaluation` enum('none','internal','external','practical') NOT NULL,
  `total_marks` float(5,2) NOT NULL,
  `test_date` date NOT NULL,
  PRIMARY KEY (`test_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `sub_id`, `test_type`, `evaluation`, `total_marks`, `test_date`) VALUES
('ASP.NET mod 1', 'ASP.NET', 'Practical', 'internal', 25.00, '2012-02-27'),
('BPP mod 1', 'BPP', 'Written', 'internal', 25.00, '2012-02-28'),
('JAVA SE - LVL 1', 'JAVA_SE', 'Moodle', 'internal', 25.00, '2012-02-23'),
('MY TEST 101', 'JAVA ME', 'Written', 'internal', 25.00, '2012-02-27'),
('SPM Written 1', 'SPM', 'Written', 'internal', 25.00, '2012-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE IF NOT EXISTS `time_table` (
  `tt_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` varchar(50) NOT NULL,
  `tt_text` text NOT NULL,
  PRIMARY KEY (`tt_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`tt_id`, `group_id`, `tt_text`) VALUES
(2, 'MSc(ca) 2011-2013 sem1', '<p><style type="text/css">\r\n		<!-- \r\n		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Arial"; font-size:x-small }\r\n		 -->\r\n	</style>\r\n<table border="0" cols="8" cellspacing="0" frame="VOID" rules="NONE">\r\n    <colgroup><col width="108" /><col width="93" /><col width="91" /><col width="93" /><col width="115" /><col width="86" /><col width="91" /><col width="64" /></colgroup>\r\n    <tbody>\r\n        <tr>\r\n            <td width="741" valign="BOTTOM" height="27" align="CENTER" colspan="8"><font size="4" face="Verdana" color="#000000">Symbiosis Institute of Computer Studies and Research</font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="20" align="CENTER" style="border-bottom: 1px solid #000000" colspan="8"><b><font face="Verdana" color="#000000">With effect from: 2 February 2012</font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="20" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Monday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Tuesday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Wednesday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Thursday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Friday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Saturday</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">Sunday</font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="152" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">08.30-10.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) <br />\r\n            Rohit<br />\r\n            J2EE(707)<br />\r\n            9to10am<br />\r\n            H Oak</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NO<br />\r\n            LECTURES<br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) <br />\r\n            Rohit<br />\r\n            J2EE(707)<br />\r\n            9to10am<br />\r\n            H Oak</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">RTOS (706) Trupti Hake</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF00FF">J2EE(707)<br />\r\n            9to10am<br />\r\n            H Oak</font></b></td>\r\n            <td valign="BOTTOM" align="LEFT" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#333333"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="57" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">10.00-11.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FFFF00"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FFFF00"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FFFF00"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">XML(207)<br />\r\n            Div:A</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">XML(207)<br />\r\n            Div:A</font></b></td>\r\n            <td valign="BOTTOM" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">.net (207)<br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="133" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">11.30 - 1.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">XML(207)<br />\r\n            Div: B+C</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF00FF">SE (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF00FF">SE (707)<br />\r\n            INT (703)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">.net (207)<br />\r\n            INT (703)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">MY&nbsp;LECTURE</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000"><br />\r\n            </font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" height="20" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"><font face="Verdana" color="#000000">L</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><font face="Verdana" color="#000000">U</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><font face="Verdana" color="#000000">N</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"><font face="Verdana" color="#000000">C</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><font face="Verdana" color="#000000">H</font></td>\r\n            <td bgcolor="#EEECE1" valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="76" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">2.00-3.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">IM (704)<br />\r\n            SPM (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">R Prog.<br />\r\n            (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">IM (704)<br />\r\n            SPM (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF00FF">SE (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">IM (704)<br />\r\n            SPM (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">RTOS (706) Trupti Hake</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="191" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">3.30 - 5.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF00FF">CMS (707)<br />\r\n            Div A GP<br />\r\n            German (706)<br />\r\n            Div B+C</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF00FF">CMS (707)<br />\r\n            Div A GP<br />\r\n            German (706)<br />\r\n            Div B+C</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF00FF">CMS (707)<br />\r\n            HG</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) SSJ<br />\r\n            CMS (707)<br />\r\n            Div B (GP)<br />\r\n            German (706)<br />\r\n            Div A</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) SSJ<br />\r\n            CMS (707)<br />\r\n            Div B (GP)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NOS (703) SSJ<br />\r\n            CMS (707) HG</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="76" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">5.00 - 6.30</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">R Prog.<br />\r\n            (207)<br />\r\n            5.15 to 6.45pm</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">DS (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">DS (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">CIS (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#00B050">CIS (707)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="MIDDLE" height="39" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000">6.30 - 8.00</font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NIS (703)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NIS (703)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#FF0000">NIS (703)</font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b><font face="Verdana" color="#000000"><br />\r\n            </font></b></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="CENTER" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n            <td valign="MIDDLE" align="LEFT" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font face="Verdana" color="#000000"><br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`stud_id`) REFERENCES `students` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_ibfk_1` FOREIGN KEY (`prg_id`) REFERENCES `programmes` (`prg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_time_table`
--
ALTER TABLE `faculty_time_table`
  ADD CONSTRAINT `faculty_time_table_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_to`
--
ALTER TABLE `post_to`
  ADD CONSTRAINT `post_to_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_4` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_5` FOREIGN KEY (`stud_id`) REFERENCES `students` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects_groups`
--
ALTER TABLE `subjects_groups`
  ADD CONSTRAINT `subjects_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_groups_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `time_table_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
