-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 01, 2022 at 06:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_discount_list`
--

CREATE TABLE `adm_discount_list` (
  `id_adm_disc` int(11) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `show_hidden_tickets` int(11) DEFAULT NULL,
  `quanti` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `user_edit` int(11) DEFAULT NULL,
  `date_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adm_discount_list`
--

INSERT INTO `adm_discount_list` (`id_adm_disc`, `id_event`, `code`, `percent`, `money`, `show_hidden_tickets`, `quanti`, `start_date`, `stop_date`, `user_edit`, `date_edit`) VALUES
(1, 3, 'LORENZ', 10, NULL, NULL, 2, '2020-10-30', '2020-11-29', NULL, '2020-11-22'),
(9, 3, 'KIZOMBA', 50, NULL, NULL, 20, '2020-11-18', '2020-11-22', 1, '2020-11-20'),
(12, 1, 'SWITCH', 10, NULL, NULL, 1, '2020-11-24', '2021-10-22', 1, '2021-10-15'),
(13, 1, 'SHOW', NULL, NULL, 1, 10, '2021-07-10', '2021-07-31', 1, '2021-08-29'),
(14, 1, 'DOBLE', 20, NULL, NULL, 10, '2021-10-17', '2021-10-31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_counter` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `discountcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  `checkin` int(11) DEFAULT '0',
  `checkin_date` date DEFAULT NULL,
  `checkin_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `confirmed` int(11) DEFAULT '0',
  `transaction_made` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_counter`, `id_user`, `id_event`, `discountcode`, `id_product`, `product_type`, `checkin`, `checkin_date`, `checkin_time`, `quantity`, `date`, `confirmed`, `transaction_made`) VALUES
(965, 151, 1, NULL, 2, 1, 0, NULL, NULL, 1, '2021-07-03', 1, 260),
(996, 179, 1, NULL, 3, 2, 0, NULL, NULL, 1, '2021-08-07', 1, 299),
(1003, 1, 1, NULL, 3, 2, 0, NULL, NULL, 1, '2021-08-09', 1, 303),
(1101, 262, 1, NULL, 2, 1, 0, NULL, NULL, 1, '2021-10-05', 1, 362),
(1102, 263, 1, NULL, 2, 1, 0, NULL, NULL, 1, '2021-10-05', 1, 386),
(1104, 266, 1, 'SWITCH', NULL, NULL, 0, NULL, NULL, NULL, '2021-10-15', 1, 388),
(1105, 266, 1, NULL, 2, 1, 0, NULL, NULL, 1, '2021-10-15', 1, 388),
(1135, 302, 1, 'DOBLE', NULL, NULL, 0, NULL, NULL, NULL, '2021-10-17', 1, 492),
(1136, 302, 1, NULL, 3, 2, 0, NULL, NULL, 1, '2021-10-17', 1, 492),
(1137, 303, 1, NULL, 1, 1, 0, NULL, NULL, 1, '2021-10-17', 1, 494),
(1138, 304, 1, NULL, 1, 1, 0, NULL, NULL, 1, '2021-10-17', 1, 496),
(1139, 305, 1, NULL, 3, 2, 0, NULL, NULL, 1, '2021-10-17', 1, 497);

-- --------------------------------------------------------

--
-- Table structure for table `category_event`
--

CREATE TABLE `category_event` (
  `id_category` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_event`
--

INSERT INTO `category_event` (`id_category`, `category`, `status`) VALUES
(22, 'Auto,  Boat & Air', 1),
(23, 'Business & Professional', 1),
(24, 'Charity & Causes', 1),
(25, 'Community & Culture', 1),
(26, 'Family & Education', 1),
(27, 'Fashion & Beauty', 1),
(28, 'Film, Media & Entertainment', 1),
(29, 'Food & Drink', 1),
(30, 'Government & Politics', 1),
(31, 'Health & Wellness', 1),
(32, 'Hobbies & Specail Interest', 1),
(33, 'Home & Lifestyle', 1),
(34, 'Music', 1),
(35, 'Performing & Visual Arts', 1),
(36, 'Religion & Spirituality', 1),
(37, 'School Activities', 1),
(38, 'Science & Technology', 1),
(39, 'Seasonal & Holiday', 1),
(40, 'Sport & Fitness', 1),
(41, 'Travel & Outdoor', 1),
(42, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id_country` int(11) NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id_country`, `country_name`, `status`) VALUES
(1, 'Afghanistan', 1),
(2, 'Åland Islands', 1),
(3, 'Albania', 1),
(4, 'Algeria', 1),
(5, 'American Samoa', 1),
(6, 'Andorra', 1),
(7, 'Angola', 1),
(8, 'Anguilla', 1),
(9, 'Antarctica', 1),
(10, 'Antigua & Barbuda', 1),
(11, 'Argentina', 1),
(12, 'Armenia', 1),
(13, 'Aruba', 1),
(14, 'Australia', 1),
(15, 'Austria', 1),
(16, 'Azerbajian', 1),
(17, 'Bahamas', 1),
(18, 'Bahrain', 1),
(19, 'Bangladesh', 1),
(20, 'Barbados', 1),
(21, 'Belarus', 1),
(22, 'Belgium', 1),
(23, 'Belize', 1),
(24, 'Benin', 1),
(25, 'Bermuda', 1),
(26, 'Bhutan', 1),
(27, 'Bolivia', 1),
(28, 'Bosnia & Herzegovina', 1),
(29, 'Botswana', 1),
(30, 'Bouvet Island', 1),
(31, 'Brazil', 1),
(32, 'British Indian Ocean Territory', 1),
(33, 'British Virgin Islands', 1),
(34, 'Brunei', 1),
(35, 'Bulgaria', 1),
(36, 'Burkina Faso', 1),
(37, 'Burundi', 1),
(38, 'Cambodia', 1),
(39, 'Cameroon', 1),
(40, 'Canada', 1),
(41, 'Cape Verde', 1),
(42, 'Caribbean Netherlands', 1),
(43, 'cayman Islands', 1),
(44, 'Central African Republic', 1),
(45, 'Chad', 1),
(46, 'Chile', 1),
(47, 'China', 1),
(48, 'Christmas Island', 1),
(49, 'Cocos (Keeling) Islands', 1),
(50, 'Colombia', 1),
(51, 'Comoros', 1),
(52, 'Congo - Brazzaville', 1),
(53, 'Congo - Kinshasa', 1),
(54, 'Cook Islands', 1),
(55, 'Costa Rica', 1),
(56, 'Côte d\'Ivoire', 1),
(57, 'Croatia', 1),
(58, 'Curacao', 1),
(59, 'Cyprus', 1),
(60, 'Czech Republic', 1),
(61, 'Denmark', 1),
(62, 'Djibouti', 1),
(63, 'Dominica', 1),
(64, 'Dominican Republic', 1),
(65, 'Ecuador', 1),
(66, 'Egypt', 1),
(67, 'El Salvador', 1),
(68, 'Equatorial Guinea', 1),
(69, 'Eritrea', 1),
(70, 'Estonia', 1),
(71, 'Ethiopia', 1),
(72, 'Falkland Islands', 1),
(73, 'Faroe Islands', 1),
(74, 'Fiji', 1),
(75, 'Finland', 1),
(76, 'France', 1),
(77, 'French Guiana', 1),
(78, 'French Polynesia', 1),
(79, 'French Southern Territories', 1),
(80, 'Gabon', 1),
(81, 'Gambia', 1),
(82, 'Georgia', 1),
(83, 'Germany', 1),
(84, 'Ghana', 1),
(85, 'Gibraltar', 1),
(86, 'Greece', 1),
(87, 'Greenland', 1),
(88, 'Grenada', 1),
(89, 'Guadalupe', 1),
(90, 'Guam', 1),
(91, 'Guatemala', 1),
(92, 'Guernsey', 1),
(93, 'Guinea', 1),
(94, 'Guinea-Bissau', 1),
(95, 'Guyana', 1),
(96, 'Haiti', 1),
(97, 'Heard & McDonald Islands', 1),
(98, 'Honduras', 1),
(99, 'Hong Kong SAR China', 1),
(100, 'Hungary', 1),
(101, 'Iceland', 1),
(102, 'India', 1),
(103, 'Indonesia', 1),
(104, 'Iraq', 1),
(105, 'Ireland', 1),
(106, 'Isle of Man', 1),
(107, 'Israel', 1),
(108, 'Italy', 1),
(109, 'Jamaica', 1),
(110, 'Japan', 1),
(111, 'Jersey', 1),
(112, 'Jordan', 1),
(113, 'Kazakhstan', 1),
(114, 'Kenya', 1),
(115, 'Kiribati', 1),
(116, 'Kuwait', 1),
(117, 'Kyrgyzstan', 1),
(118, 'Laos', 1),
(119, 'Latvia', 1),
(120, 'Lebanon', 1),
(121, 'Lesotho', 1),
(122, 'Liberia', 1),
(123, 'Libya', 1),
(124, 'Liechtenstein', 1),
(125, 'Lithuania', 1),
(126, 'Luxembourg', 1),
(127, 'Mecau SAR China', 1),
(128, 'Macedonia', 1),
(129, 'Madagascar', 1),
(130, 'Malawi', 1),
(131, 'Malaysia', 1),
(132, 'Maldives', 1),
(133, 'Mali', 1),
(134, 'Malta', 1),
(135, 'Marshall Islands', 1),
(136, 'Martinique', 1),
(137, 'Mauritania', 1),
(138, 'Mauritius', 1),
(139, 'Mayotte', 1),
(140, 'Mexico', 1),
(141, 'Micronesia', 1),
(142, 'Moldova', 1),
(143, 'Monaco', 1),
(144, 'Mongolia', 1),
(145, 'Montenegro', 1),
(146, 'Montserrat', 1),
(147, 'Morocco', 1),
(148, 'Mozambique', 1),
(149, 'Myanmar (Burma)', 1),
(150, 'Namibia', 1),
(151, 'Nauru', 1),
(152, 'Nepal', 1),
(153, 'Netherlands', 1),
(154, 'New Caledonia', 1),
(155, 'New Zealand', 1),
(156, 'Nicaragua', 1),
(157, 'Niger', 1),
(158, 'Nigeria', 1),
(159, 'Niue', 1),
(160, 'Norfolk Island', 1),
(161, 'Northern Mariana Islands', 1),
(162, 'Norway', 1),
(163, 'Oman', 1),
(164, 'Pakistan', 1),
(165, 'Palau', 1),
(166, 'Palestinian Territories', 1),
(167, 'Panama', 1),
(168, 'Papua New Guinea', 1),
(169, 'Paraguay', 1),
(170, 'Peru', 1),
(171, 'Philippines', 1),
(172, 'Pitcairn Islands', 1),
(173, 'Poland', 1),
(174, 'Portugal', 1),
(175, 'Puerto Rico', 1),
(176, 'Qatar', 1),
(177, 'Reunion', 1),
(178, 'Romania', 1),
(179, 'Russia', 1),
(180, 'Rwanda', 1),
(181, 'Samoa', 1),
(182, 'San Marino', 1),
(183, 'Sao Tomé & Principe', 1),
(184, 'Saudi Arabia', 1),
(185, 'Senegal', 1),
(186, 'Serbia', 1),
(187, 'Seychelles', 1),
(188, 'Sierra Leone', 1),
(189, 'Singapore', 1),
(190, 'Sint Maarten', 1),
(191, 'Slovakia', 1),
(192, 'Slovenia', 1),
(193, 'Solomon Islands', 1),
(194, 'Somalia', 1),
(195, 'South Africa', 1),
(196, 'South Georgia & South Sandwich Islands', 1),
(197, 'South Korea', 1),
(198, 'South Sudan', 1),
(199, 'Spain', 1),
(200, 'Sri Lanka', 1),
(201, 'St. Barthélemy', 1),
(202, 'St. Helena', 1),
(203, 'St. Kitts & Nevis', 1),
(204, 'St. Lucia', 1),
(205, 'St. Martin', 1),
(206, 'St. Pierre & Miquelon', 1),
(207, 'St. Vincent & Grenadines', 1),
(208, 'Suriname', 1),
(209, 'Svalbard & Jan Mayen', 1),
(210, 'Swaziland', 1),
(211, 'Sweden', 1),
(212, 'Switzerland', 1),
(213, 'Taiwan R.O.C', 1),
(214, 'Tajikistan', 1),
(215, 'Tanzania', 1),
(216, 'Thailand', 1),
(217, 'Timor-Leste', 1),
(218, 'Togo', 1),
(219, 'Tokelau', 1),
(220, 'Tonga', 1),
(221, 'Trinidad & Tobago', 1),
(222, 'Tunisia', 1),
(223, 'Turkey', 1),
(224, 'Turkmenistan', 1),
(225, 'Turks & Caicos Islands', 1),
(226, 'Tuvalu', 1),
(227, 'U.S Outlying Islands', 1),
(228, 'U.S. Virgin Islands', 1),
(229, 'Uganda', 1),
(230, 'Ukraine', 1),
(231, 'United Arab Emirates', 1),
(232, 'United Kingdom', 1),
(233, 'United States', 1),
(234, 'Uruguay', 1),
(235, 'Uzbekistan', 1),
(236, 'Vanuatu', 1),
(237, 'Vatican City', 1),
(238, 'Venezuela', 1),
(239, 'Vietnam', 1),
(240, 'Wallis & Futuna', 1),
(241, 'Western Sahara', 1),
(242, 'Yemen', 1),
(243, 'Zambia', 1),
(244, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id_currency` int(11) NOT NULL,
  `exchange` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id_currency`, `exchange`, `status`) VALUES
(1, 'ARS', 1),
(2, 'AUD', 1),
(3, 'BRL', 1),
(4, 'CAD', 1),
(5, 'CHF', 1),
(6, 'CZK', 1),
(7, 'DKK', 1),
(8, 'EUR', 1),
(9, 'GBP', 1),
(10, 'HKD', 1),
(11, 'HUF', 1),
(12, 'ILS', 1),
(13, 'JPY', 1),
(14, 'MXN', 1),
(15, 'MYR', 1),
(16, 'NOK', 1),
(17, 'NZD', 1),
(18, 'PHP', 1),
(19, 'PLN', 1),
(20, 'SEK', 1),
(21, 'SGD', 1),
(22, 'THB', 1),
(23, 'TWD', 1),
(24, 'USD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id_discount` int(11) NOT NULL,
  `id_code` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ticket` int(11) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `show_hidden_tickets` int(11) DEFAULT NULL,
  `quanti` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id_discount`, `id_code`, `code`, `id_ticket`, `percent`, `money`, `show_hidden_tickets`, `quanti`, `start_date`, `stop_date`) VALUES
(80, 9, 'KIZOMBA', 21, 50, NULL, NULL, 20, '2020-11-18', '2020-11-22'),
(82, 1, 'LORENZ', 21, 10, NULL, NULL, 2, '2020-10-30', '2020-11-29'),
(102, 13, 'SHOW', 6, NULL, NULL, 1, 10, '2021-07-10', '2021-07-31'),
(127, 12, 'SWITCH', 15, 10, NULL, NULL, 1, '2020-11-24', '2021-10-22'),
(128, 12, 'SWITCH', 6, 10, NULL, NULL, 1, '2020-11-24', '2021-10-22'),
(129, 12, 'SWITCH', 2, 10, NULL, NULL, 1, '2020-11-24', '2021-10-22'),
(130, 12, 'SWITCH', 1, 10, NULL, NULL, 1, '2020-11-24', '2021-10-22'),
(131, 14, 'DOBLE', 15, 20, NULL, NULL, 10, '2021-10-17', '2021-10-31'),
(132, 14, 'DOBLE', 3, 20, NULL, NULL, 10, '2021-10-17', '2021-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `acount_no` int(11) DEFAULT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `organizer` int(11) DEFAULT NULL,
  `venue_status` int(11) DEFAULT NULL,
  `event_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_start` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `event_end` date DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `paypal_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenumeration` int(11) DEFAULT '0',
  `prenumeration_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `id_user`, `acount_no`, `event_name`, `foto`, `summary`, `description`, `type`, `category`, `organizer`, `venue_status`, `event_adress`, `event_start`, `time_start`, `start_datetime`, `event_end`, `time_end`, `end_datetime`, `country`, `currency`, `paypal_email`, `paypal_client_id`, `paypal_secret`, `prenumeration`, `prenumeration_date`, `status`) VALUES
(1, NULL, 772750503, 'Kiz Addicts 3er Edition', 'Lorenz_Urbankiz.jpg', 'We\'re very proud to announce to you KIZ ADDICTS 2nd EDITION! \r\nA  cozy and nice dance weekend with 100% Kizomba/Urban Kiz', '<p>_________________________________________________________</p>\r\n<p>WELCOME TO KIZ ADDICTS 2nd EDITION _________________________________________________________</p>\r\n<p>We\'re very proud to announce to you KIZ ADDICTS 2nd EDITION! A cozy and nice dance weekend with 100% Kizomba/Urban Kiz. What to expect: 3 days of parties, social dance &amp; workshops Social dance floor Parties from 10 pm to 4 am International &amp; National Artists and Djs High level of dancing Taxi dancers Great atmosphere Dancers from all over the world ___________________________________________________</p>\r\n<p>&bull;ARTISTS LINE UP &bull; ___________________________________________________</p>\r\n<p>Dani&euml;lle - Holland Lessly &amp; Marie - Sweden Cris &amp; Helena - Sweden Fano - Norway Lorenz - Sweden Fred-Nelson &amp; Morgane - France Arvin de Rooij - Holland Lea - Sweden More to be announced... ___________________________________________________</p>\r\n<p>&bull;DJ LINE UP &bull;</p>\r\n<p>___________________________________________________</p>\r\n<p>Dj No Limits - Holland Dj Lawa - Sweden Dj Fano - Norway More to be announced...</p>\r\n<p>___________________________________________________</p>\r\n<p>&bull;TAXI TEAMS &bull;</p>\r\n<p>___________________________________________________</p>\r\n<p>Ronin Taxi team Divine Kiz Taxi team Unit&rsquo;Kiz Taxi team More to be announced...</p>\r\n<p>___________________________________________________</p>\r\n<p>PRELIMINARY PROGRAM ___________________________________________________</p>\r\n<p>-FRIDAY:</p>\r\n<p>PARTY 22:00-04:00</p>\r\n<p>-SATURDAY:</p>\r\n<p>WORKSHOPS 12:00- 16:00</p>\r\n<p>SOCIAL ROOM 16:00- 19:00</p>\r\n<p>PARTY 22:00-04:00</p>\r\n<p>-SUNDAY:</p>\r\n<p>WORKSHOPS 12:00- 16:00</p>\r\n<p>SOCIAL ROOM 16:00- 19:00 KIZOMBA / URBANKIZ / DOUCEUR ________________________________________________________</p>\r\n<p>ACCOMODATION _________________________________________________________</p>\r\n<p>There are both hotels, hostels and AirBnB apartments nearby. Example of hotels Hisingen hostel Kvilletorget 24 More options of hotels: https://bit.ly/2GfBit9 For apartments, check www.airbnb.com _________________________________________________________</p>\r\n<p>Why Gothenburg? _________________________________________________________ Gothenburg is the second biggest city in Sweden and has the perfect combination of city buzz and peaceful nature. More info about the city -&gt; https://www.goteborg.com/en/</p>', 9, 25, 1, 0, 'Yandali, Ånäsvägen 44 ', '2020-04-20', '22:00:00', '2020-04-20 22:00:00', '2022-11-30', '14:00:00', '2022-11-30 14:00:00', 211, 20, 'joellorenzo.k@gmail.com', 'AfLjqi1tUw9xn5T6qef4M9Cjs4Z4DQYq_mfOAFC6-swzu1mBjfM329e30lDVS3_solJyk9hO-gpeFJ-m', 'EAuGamNYMRem6UKhpgYaiRExp2nrowuajUXTV3cWJWSjPOk_ASAyToffE49TT4a1KkdUL0st64C3ECO2', 2, '2020-07-06', 0),
(2, NULL, 772750503, 'Kiz Addicts Reloaded', NULL, NULL, NULL, 4, 25, 1, 0, 'Yandali, Ånäsvägen 44 ', '2020-10-24', '21:00:00', NULL, '2020-11-14', '00:00:00', NULL, 211, 20, 'joellorenzo.k@gmail.com', NULL, NULL, 2, '2020-06-04', 2),
(3, NULL, 772750503, 'Kiz Addicts Reloaded Chapter 2', 'LINEUPKizAddictsReloaded.jpg', 'BOOTCAMP\r\nDuring this weekend you will get the chance to attend a bootcamp where you will learn more steps, technique, tricks and footwork that will improve your bachata. You will of course also meet a lot of new people and have a great time dancing to the joyful music that comes from Dominican Republic.', '<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">We are so happy to bring again, the amazing artist - Sara Roshage!</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">SARA<br />Sara is a teacher in Dominican Bachata, known for her skills, footwork and styling. She grew up in Sweden with family from Peru, so latin culture and music has always been a part of her life. For the last 4 years she has dedicated herself strictly to Bachata.<br />Her love for the Dominican Bachata is real and during this day she will share her passion for the traditional dance!</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">LORENZ<br />To assist Sara you will meet Lorenz, born and raised in Dominican Republic.<br />For many known as a teacher in UrbanKiz, but also a lover of the dance he grew up with, that he teaches on a weekly basis in Gothenburg at Loops Dance Studio.</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">BOOTCAMP<br />During this weekend you will get the chance to attend a bootcamp where you will learn more steps, technique, tricks and footwork that will improve your bachata. You will of course also meet a lot of new people and have a great time dancing to the joyful music that comes from Dominican Republic.</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">(OBS! Possibility will be given to attend the bootcamp and still keep distance due to Covid-19, for example dance by yourself or only dance with the person you arrived with and with distance from other couples).</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">2 PARTIES<br />There will also be 2 great parties, on Friday and Saturday night, with mixed music (bachata, salsa, kizomba etc.)</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">&nbsp;</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">To see more of Sara\'s style, check out her video here</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #050505; font-size: 15px;\">\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl oo9gr5id gpro0wi8 lrazzd5p\" style=\"cursor: pointer; outline: none; list-style: none; padding: 0px; margin: 0px; touch-action: manipulation; background-color: transparent; text-align: inherit; font-weight: 600; display: inline; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-family: inherit; border: 0px initial initial;\" tabindex=\"0\" href=\"https://www.facebook.com/sara.roshage/posts/10223325122499031?__cft__[0]=AZWKwushWRso-Z9-HlDW98gy6Ioj8uisT21qvJtFV14N8VnbPbyW9d8UjvFrSveqNa62YqnCx4TSOsLkKp-8jH3lAD_KXOf3TPBAQg4v_d6-J1zTvVTY9mCbLj3l2DuSK-U&amp;__tn__=q\">https://www.facebook.com/1314616479/posts/10223325122499031/</a>?</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">_________________________________________________<br />SCHEDULE - BOOTCAMP 13.00 - 17.00<br />_________________________________________________</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">- 2 hours Dominican Bachata, focus on partnerwork (open level).<br />- 1 hour break.<br />- 1 hour footwork (open level).</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">_________________________________________________<br />PARTIES<br />_________________________________________________<br />- Friday 21.00-01.00<br />- Saturday 22.00-03.00</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">_________________________________________________<br />INFORMATION ABOUT COVID-19<br />_________________________________________________<br />- There will be limited spots, following health authorities recommendations.</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">- Possibility will be given to register with a partner and only dance with that person.<br />- Big location = distance is possible.<br />- Rotation is optional and not required.<br />- Possibility to join individually and not dance with partner.</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">- People with symptoms won\'t be allowed to come in.</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">_________________________________________________<br />PRICES<br />_________________________________________________<br />Bootcamp and 2 parties:<br />400 kr / person, or 700kr / couple</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">Only Bootcamp:<br />300 kr / person, or 600kr / couple</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">1 party:<br />100 kr</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\">2 parties:<br />150 kr&nbsp;</div>\r\n</div>', 4, 25, 1, 0, 'Yandali, Ånäsvägen 44 ', '2020-06-23', '02:30:00', NULL, '2020-11-27', '20:30:00', NULL, 211, 20, 'joellorenzo.k@gmail.com', NULL, NULL, 2, '2020-06-26', 2),
(4, NULL, 772750506, 'Let\'s meet to kiz', NULL, NULL, NULL, 4, 25, 1, 0, 'Yandali, Ånäsvägen 44 ', '2020-07-18', '21:00:00', NULL, '2020-11-15', '04:00:00', NULL, 211, 24, 'brenda@gmail.com', NULL, NULL, 0, NULL, 2),
(5, NULL, 772750503, 'Cuban Salsa Bootcamp', 'Salsa_bootcamp.jpg', NULL, NULL, 4, 25, 1, 0, 'Ånäsvägen 44-46, 416 68 Göteborg', '2021-08-06', '13:00:00', '2021-08-06 13:00:00', '2021-08-21', '20:00:00', '2021-08-21 20:00:00', 211, 24, 'joellorenzo.k@gmail.com', NULL, NULL, 2, '2021-08-03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id_fees` int(11) NOT NULL,
  `conditions` int(11) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id_fees`, `conditions`, `percent`) VALUES
(1, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_billing`
--

CREATE TABLE `monthly_billing` (
  `id_billing` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `acount_no` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `monthly_income` double(8,2) DEFAULT NULL,
  `fees` double(8,2) DEFAULT NULL,
  `emailed` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_billing`
--

INSERT INTO `monthly_billing` (`id_billing`, `date`, `id_event`, `acount_no`, `month`, `order_number`, `monthly_income`, `fees`, `emailed`, `status`) VALUES
(1, '2020-07-05', 1, NULL, 5, NULL, 9630.00, 674.10, NULL, 1),
(7, '2020-07-05', 2, NULL, 6, NULL, 535.00, 37.45, NULL, 1),
(8, '2020-07-05', 3, NULL, 6, NULL, 0.00, 0.00, NULL, 1),
(218, '2021-08-31', 1, 772750503, 7, 85502315, 2625.00, 131.25, NULL, 1),
(260, '2021-09-10', 1, 772750503, 8, 17711782, 7612.50, 380.62, NULL, 1),
(290, '2021-10-05', 1, 772750503, 9, 79521983, 0.00, 0.00, NULL, 1),
(291, '2021-10-05', NULL, NULL, 9, 44487747, 0.00, 0.00, NULL, 1),
(292, '2021-10-05', NULL, NULL, 9, 64414913, 0.00, 0.00, NULL, 1),
(293, '2021-10-05', NULL, NULL, 9, 97311584, 0.00, 0.00, NULL, 1),
(294, '2021-10-15', NULL, NULL, 9, 65032462, 0.00, 0.00, NULL, 1),
(295, '2021-10-15', NULL, NULL, 9, 96230416, 0.00, 0.00, NULL, 1),
(296, '2021-10-15', NULL, NULL, 9, 40258248, 0.00, 0.00, NULL, 1),
(297, '2021-10-15', NULL, NULL, 9, 72975452, 0.00, 0.00, NULL, 1),
(298, '2021-10-15', NULL, NULL, 9, 49212644, 0.00, 0.00, NULL, 1),
(299, '2021-10-15', NULL, NULL, 9, 51511719, 0.00, 0.00, NULL, 1),
(300, '2021-10-15', NULL, NULL, 9, 44175081, 0.00, 0.00, NULL, 1),
(301, '2021-10-15', NULL, NULL, 9, 95304859, 0.00, 0.00, NULL, 1),
(302, '2021-10-15', NULL, NULL, 9, 11424174, 0.00, 0.00, NULL, 1),
(303, '2021-10-15', NULL, NULL, 9, 89848202, 0.00, 0.00, NULL, 1),
(304, '2021-10-15', NULL, NULL, 9, 60895086, 0.00, 0.00, NULL, 1),
(305, '2021-10-15', NULL, NULL, 9, 77616394, 0.00, 0.00, NULL, 1),
(306, '2021-10-15', NULL, NULL, 9, 11472895, 0.00, 0.00, NULL, 1),
(307, '2021-10-15', NULL, NULL, 9, 34592641, 0.00, 0.00, NULL, 1),
(308, '2021-10-15', NULL, NULL, 9, 10881609, 0.00, 0.00, NULL, 1),
(309, '2021-10-15', NULL, NULL, 9, 17781090, 0.00, 0.00, NULL, 1),
(310, '2021-10-15', NULL, NULL, 9, 44991056, 0.00, 0.00, NULL, 1),
(311, '2021-10-15', NULL, NULL, 9, 43494941, 0.00, 0.00, NULL, 1),
(312, '2021-10-15', NULL, NULL, 9, 98007695, 0.00, 0.00, NULL, 1),
(313, '2021-10-15', NULL, NULL, 9, 18964556, 0.00, 0.00, NULL, 1),
(314, '2021-10-15', NULL, NULL, 9, 4459406, 0.00, 0.00, NULL, 1),
(315, '2021-10-15', NULL, NULL, 9, 38162252, 0.00, 0.00, NULL, 1),
(316, '2021-10-16', NULL, NULL, 9, 47526374, 0.00, 0.00, NULL, 1),
(317, '2021-10-16', NULL, NULL, 9, 28596700, 0.00, 0.00, NULL, 1),
(318, '2021-10-16', NULL, NULL, 9, 62796988, 0.00, 0.00, NULL, 1),
(319, '2021-10-16', NULL, NULL, 9, 91392485, 0.00, 0.00, NULL, 1),
(320, '2021-10-16', NULL, NULL, 9, 22596287, 0.00, 0.00, NULL, 1),
(321, '2021-10-16', NULL, NULL, 9, 57892999, 0.00, 0.00, NULL, 1),
(322, '2021-10-16', NULL, NULL, 9, 39450872, 0.00, 0.00, NULL, 1),
(323, '2021-10-16', NULL, NULL, 9, 86970771, 0.00, 0.00, NULL, 1),
(324, '2021-10-16', NULL, NULL, 9, 49157882, 0.00, 0.00, NULL, 1),
(325, '2021-10-16', NULL, NULL, 9, 16398068, 0.00, 0.00, NULL, 1),
(326, '2021-10-16', NULL, NULL, 9, 96593288, 0.00, 0.00, NULL, 1),
(327, '2021-10-16', NULL, NULL, 9, 14367822, 0.00, 0.00, NULL, 1),
(328, '2021-10-16', NULL, NULL, 9, 44928693, 0.00, 0.00, NULL, 1),
(329, '2021-10-16', NULL, NULL, 9, 48328005, 0.00, 0.00, NULL, 1),
(330, '2021-10-16', NULL, NULL, 9, 61997156, 0.00, 0.00, NULL, 1),
(331, '2021-10-16', NULL, NULL, 9, 23536131, 0.00, 0.00, NULL, 1),
(332, '2021-10-16', NULL, NULL, 9, 74705068, 0.00, 0.00, NULL, 1),
(333, '2021-10-16', NULL, NULL, 9, 44454709, 0.00, 0.00, NULL, 1),
(334, '2021-10-16', NULL, NULL, 9, 11686964, 0.00, 0.00, NULL, 1),
(335, '2021-10-16', NULL, NULL, 9, 47005741, 0.00, 0.00, NULL, 1),
(336, '2021-10-16', NULL, NULL, 9, 17475052, 0.00, 0.00, NULL, 1),
(337, '2021-10-16', NULL, NULL, 9, 8952216, 0.00, 0.00, NULL, 1),
(338, '2021-10-16', NULL, NULL, 9, 44474350, 0.00, 0.00, NULL, 1),
(339, '2021-10-16', NULL, NULL, 9, 66570408, 0.00, 0.00, NULL, 1),
(340, '2021-10-17', NULL, NULL, 9, 8297462, 0.00, 0.00, NULL, 1),
(341, '2021-10-17', NULL, NULL, 9, 59548777, 0.00, 0.00, NULL, 1),
(342, '2021-10-17', NULL, NULL, 9, 84035095, 0.00, 0.00, NULL, 1),
(343, '2021-10-17', NULL, NULL, 9, 91380540, 0.00, 0.00, NULL, 1),
(344, '2021-10-17', NULL, NULL, 9, 45316742, 0.00, 0.00, NULL, 1),
(345, '2021-10-17', NULL, NULL, 9, 44431858, 0.00, 0.00, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `multi_user_access`
--

CREATE TABLE `multi_user_access` (
  `id_multi_user` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `acount_no` int(11) DEFAULT NULL,
  `permissions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_user_access`
--

INSERT INTO `multi_user_access` (`id_multi_user`, `id_user`, `email`, `id_admin`, `acount_no`, `permissions`) VALUES
(44, 35, NULL, 32, 772750506, 'TSYS-P0002'),
(45, 35, NULL, 32, 772750506, 'TSYS-P0003'),
(46, 35, NULL, 32, 772750506, 'TSYS-P0005'),
(47, 35, NULL, 32, 772750506, 'TSYS-P0006'),
(48, 35, NULL, 32, 772750506, 'TSYS-P0022'),
(49, 35, NULL, 32, 772750506, 'TSYS-P0025'),
(127, 46, NULL, 1, 772750503, 'TSYS-P0021');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id_purchase` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `qr_bar_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `user_edit` int(11) DEFAULT NULL,
  `date_edit` datetime DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `done` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id_purchase`, `date`, `year`, `month`, `day`, `time`, `order_number`, `qr_bar_code`, `id_user`, `user_edit`, `date_edit`, `id_event`, `name`, `surname`, `email`, `adress1`, `adress2`, `city`, `post`, `country`, `sex`, `p_name`, `p_surname`, `p_email`, `payment`, `total`, `done`, `status`) VALUES
(260, '2021-07-03', '2021', '07', '03', '18:49:52', 70745179, '70745179.png', 151, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(299, '2021-08-07', '2021', '08', '07', '22:28:17', 61663187, '61663187.png', 179, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 1, 525.00, 1, 1),
(303, '2021-08-09', '2021', '08', '08', '00:42:29', 54480855, '54480855.png', 1, 1, '2021-08-14 16:51:01', 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Diana', 'Ventura', 'diana@gmail.com', NULL, 525.00, 1, 1),
(350, '2021-10-03', '2021', '10', '02', '00:59:31', 8179946, '8179946.png', 248, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, NULL, NULL, NULL, NULL, 1, 525.00, 0, 1),
(351, '2021-10-03', '2021', '10', '02', '01:04:08', 70351668, '70351668.png', 249, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, NULL, NULL, NULL, NULL, 1, 525.00, 0, 1),
(352, '2021-10-03', '2021', '10', '02', '01:13:12', 46389775, '46389775.png', 250, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(353, '2021-10-03', '2021', '10', '02', '01:14:30', 32511172, '32511172.png', 251, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(354, '2021-10-03', '2021', '10', '02', '01:16:02', 82833855, '82833855.png', 253, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(355, '2021-10-03', '2021', '10', '02', '01:16:15', 14509163, '14509163.png', 254, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, NULL, NULL, NULL, NULL, 1, 525.00, 0, 1),
(356, '2021-10-03', '2021', '10', '02', '01:17:08', 20395029, '20395029.png', 255, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(357, '2021-10-03', '2021', '10', '02', '01:17:28', 71233840, '71233840.png', 256, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 1, NULL, NULL, NULL, 1, 525.00, 0, 1),
(358, '2021-10-03', '2021', '10', '02', '01:18:00', 38128228, '38128228.png', 257, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', NULL, NULL, 1, 525.00, 0, 1),
(359, '2021-10-03', '2021', '10', '02', '01:22:20', 44463085, '44463085.png', 258, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 1, 525.00, 0, 1),
(360, '2021-10-03', '2021', '10', '02', '01:22:45', 98607003, '98607003.png', 259, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(361, '2021-10-03', '2021', '10', '02', '01:24:02', 59660587, '59660587.png', 261, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 1, 525.00, 0, 1),
(362, '2021-10-05', '2021', '10', '05', '07:24:03', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(363, '2021-10-05', '2021', '10', '05', '07:52:50', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(364, '2021-10-05', '2021', '10', '05', '07:58:14', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(365, '2021-10-05', '2021', '10', '05', '07:58:54', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(366, '2021-10-05', '2021', '10', '05', '08:22:56', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(367, '2021-10-05', '2021', '10', '05', '08:24:01', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(368, '2021-10-05', '2021', '10', '05', '08:25:52', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(369, '2021-10-05', '2021', '10', '05', '08:26:52', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(370, '2021-10-05', '2021', '10', '05', '08:34:40', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(371, '2021-10-05', '2021', '10', '05', '08:35:26', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(372, '2021-10-05', '2021', '10', '05', '08:36:23', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(373, '2021-10-05', '2021', '10', '05', '08:37:34', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(374, '2021-10-05', '2021', '10', '05', '08:45:48', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(375, '2021-10-05', '2021', '10', '05', '08:48:44', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(376, '2021-10-05', '2021', '10', '05', '08:49:03', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(377, '2021-10-05', '2021', '10', '05', '08:49:42', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(378, '2021-10-05', '2021', '10', '05', '08:51:13', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(379, '2021-10-05', '2021', '10', '05', '08:56:13', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(380, '2021-10-05', '2021', '10', '05', '09:01:17', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(381, '2021-10-05', '2021', '10', '05', '11:54:18', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(382, '2021-10-05', '2021', '10', '05', '11:54:47', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(383, '2021-10-05', '2021', '10', '05', '11:56:20', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(384, '2021-10-05', '2021', '10', '05', '11:56:58', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(385, '2021-10-05', '2021', '10', '05', '11:56:59', 79965441, '79965441.png', 262, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(386, '2021-10-05', '2021', '10', '05', '13:03:33', 95057867, '95057867.png', 263, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(387, '2021-10-05', '2021', '10', '05', '13:03:44', 95057867, '95057867.png', 263, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 1, 1),
(388, '2021-10-15', '2021', '10', '15', '15:20:25', 36808918, '36808918.png', 266, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 472.50, 1, 1),
(392, '2021-10-15', '2021', '10', '15', '21:58:28', 45412536, '45412536.png', 269, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(393, '2021-10-15', '2021', '10', '15', '21:58:53', 45412536, '45412536.png', 269, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(394, '2021-10-15', '2021', '10', '15', '21:58:54', 45412536, '45412536.png', 269, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(395, '2021-10-15', '2021', '10', '15', '21:59:52', 45412536, '45412536.png', 269, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(396, '2021-10-15', '2021', '10', '15', '22:00:10', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(397, '2021-10-15', '2021', '10', '15', '22:00:44', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(398, '2021-10-15', '2021', '10', '15', '22:00:45', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(399, '2021-10-15', '2021', '10', '15', '22:00:53', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(400, '2021-10-15', '2021', '10', '15', '22:00:54', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(401, '2021-10-15', '2021', '10', '15', '22:01:11', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(402, '2021-10-15', '2021', '10', '15', '22:01:21', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(403, '2021-10-15', '2021', '10', '15', '22:01:30', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(404, '2021-10-15', '2021', '10', '15', '22:01:40', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(405, '2021-10-15', '2021', '10', '15', '22:01:51', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(406, '2021-10-15', '2021', '10', '15', '22:02:40', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(407, '2021-10-15', '2021', '10', '15', '22:03:47', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(408, '2021-10-15', '2021', '10', '15', '22:04:55', 70620418, '70620418.png', 270, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 525.00, 0, 1),
(453, '2021-10-16', '2021', '10', '16', '15:39:48', NULL, '.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, 1),
(492, '2021-10-17', '2021', '10', '17', '14:13:02', 26494297, '26494297.png', 302, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 1, 420.00, 1, 1),
(494, '2021-10-17', '2021', '10', '17', '14:58:53', 42694534, '42694534.png', 303, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 577.50, 1, 1),
(495, '2021-10-17', '2021', '10', '17', '15:05:02', 42694534, '42694534.png', 303, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 577.50, 1, 1),
(496, '2021-10-17', '2021', '10', '17', '15:08:32', 71095682, '71095682.png', 304, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 1, 577.50, 1, 1),
(497, '2021-10-17', '2021', '10', '17', '15:40:03', 10844571, '10844571.png', 305, NULL, NULL, 1, 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 1, 525.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `id_temp` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_user`
--

INSERT INTO `temp_user` (`id_temp`, `user_name`, `password`, `rank`, `id_event`, `date`, `time`, `name`, `surname`, `email`, `adress1`, `adress2`, `city`, `post`, `country`, `sex`, `p_name`, `p_surname`, `p_email`, `total`) VALUES
(44, '13186382', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-11', '14:31:56', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 0, NULL, NULL, NULL, 535.00),
(45, '23223532', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-11', '18:26:04', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 0, NULL, NULL, NULL, 535.00),
(47, '3183950', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-11', '19:22:15', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 0, NULL, NULL, NULL, 535.00),
(48, '4455931', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-11', '19:26:16', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 0, NULL, NULL, NULL, 535.00),
(49, '12141843', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-11', '19:31:11', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 0, NULL, NULL, NULL, NULL),
(50, '48415471', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-12', '00:32:53', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 0, NULL, NULL, NULL, 535.00),
(51, '99210099', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-12', '17:41:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '93194960', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-14', '13:00:46', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 0, NULL, NULL, NULL, 1070.00),
(53, '75220969', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-14', '14:15:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '73184647', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-16', '16:45:24', 'Ramon', 'Alcantara', 'ramon@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 535.00),
(55, '14223668', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-16', '16:49:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '13340452', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-05-16', '18:27:31', 'Carola', 'De la Rosa', 'Carola@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 3, 1, NULL, NULL, NULL, 1605.00),
(57, '17014714', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-05-29', '14:04:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '48881906', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-05-29', '14:10:17', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(59, '21398028', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-05-29', '14:16:32', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(60, '89124146', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-02', '14:19:35', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(61, '95026007', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-06-05', '13:00:30', 'Carlos', 'Corleones', 'carlos@gmail.com', 'Hörte 11', NULL, 'Oslo', '41516', 211, 0, NULL, NULL, NULL, 535.00),
(62, '86377073', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-05', '18:00:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '5417002', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-11', '13:36:00', 'Adrian', 'Hedström', 'adrian.hedstrom@hotmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, 0, NULL, NULL, NULL, 535.00),
(64, '40463404', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-11', '22:57:34', 'Adrian', 'Hedström', 'adrian.hedstrom@hotmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, 0, NULL, NULL, NULL, 535.00),
(65, '26658247', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-11', '23:32:41', 'Adrian', 'Hedström', 'adrian.hedstrom@hotmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, NULL, NULL, NULL, NULL, 535.00),
(66, '64663177', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-11', '23:34:40', 'Adrian', 'Hedström', 'adrian.hedstrom@hotmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, 0, NULL, NULL, NULL, NULL),
(67, '99727829', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-11', '23:41:41', 'Adrian', 'Hedström', 'adrian.hedstrom@hotmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, 0, NULL, NULL, NULL, 535.00),
(68, '36309435', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-12', '00:04:13', 'Adrian', 'Hedström', 'adrian.hedstrom@hotmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, 0, NULL, NULL, NULL, 535.00),
(69, '5681123', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-14', '16:26:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '47579553', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-20', '19:08:08', 'Roberto', 'Rone', 'roberto@gmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, 0, NULL, NULL, NULL, 535.00),
(71, '89097731', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-22', '12:20:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '6579507', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-22', '12:54:46', 'Gonzalo', 'Vidal', 'gonzalo@gmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, 0, 'Rosario', 'Bustamante', 'rosario@gmail.com', 535.00),
(73, '81119081', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-06-30', '18:52:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '79935308', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-07-06', '23:52:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '1969380', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-07-07', '00:30:31', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(76, '47189893', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-07-08', '16:12:28', 'joel', 'Perez', 'joel4_15@yahoo.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(77, '75156599', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-07-10', '12:29:34', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(78, '79144281', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-07-30', '21:45:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, '21248977', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-08-02', '14:14:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, '47773383', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-08-02', '14:48:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, '54540192', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-08-02', '14:50:01', 'Raphael', 'Jimenez', 'rafa@gmail.com', 'Hörte 11', NULL, 'Oslo', '41516', 15, 0, 'Carola', 'De la Rosa', 'Carola@gmail.com', 535.00),
(82, '4444700', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-08-02', '14:59:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '77140946', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-08-03', '15:41:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '34454548', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-11-02', '15:09:51', 'Raphael', 'Jimenez', 'rafa@gmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Oslo', '41516', 15, 0, NULL, NULL, NULL, 535.00),
(85, '48585072', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-02', '22:22:15', 'Adrian', 'Hedström', 'joellorenzo.k@gmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Göteborg', '41477', 211, 0, NULL, NULL, NULL, 535.00),
(86, '50584677', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-02', '22:24:48', 'Rolando', 'Corleones', 'joellorenzo.k@gmail.com', 'Lilla Tunnlandsgatan 3', NULL, 'Oslo', '41516', 211, 0, NULL, NULL, NULL, 535.00),
(87, '4265848', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-02', '22:42:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '83252232', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-06', '13:01:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '43519188', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-06', '13:55:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '93845795', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-06', '15:05:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '81941513', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-11-08', '13:41:29', 'Sarah', 'Sabine', 'Sarah@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 1, NULL, NULL, NULL, 535.00),
(92, '6355895', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-11-08', '15:02:16', 'Milenia', 'Roa', 'milenia@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 1, NULL, NULL, NULL, 535.00),
(93, '65236193', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-11-09', '23:57:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '99373925', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 2, '2020-11-10', '00:01:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '97728685', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-10', '00:02:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, '71207790', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-11', '13:48:02', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(97, '82997360', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-11', '16:04:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '35909756', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-12', '00:37:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '85190583', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-12', '00:41:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '53809363', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-12', '12:48:41', 'Lorenzo', 'Knight', 'r_typ3@hotmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'joel4_15@yahoo.com', 267.50),
(101, '65416314', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-12', '13:00:32', 'Lorenzo', 'Knight', 'r_typ3@hotmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'joel4_15@yahoo.com', 267.50),
(102, '58523228', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-13', '13:38:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '35427417', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-13', '18:45:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '7711592', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-13', '18:49:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '35049633', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-13', '19:00:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, '85735245', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-20', '10:54:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '68741433', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-20', '11:05:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '99345068', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-20', '11:47:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '62782939', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-22', '15:40:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '69221017', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-22', '16:19:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '16917321', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-23', '09:30:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '66237426', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-23', '10:40:07', 'Jorge', 'Reynoso', 'jorge@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 192.60),
(113, '71980496', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-23', '23:20:40', 'Jorge', 'Reynoso', 'jorge@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 652.70),
(114, '92639570', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-23', '23:42:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '13841833', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-24', '00:09:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '6904696', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-24', '00:13:04', 'Jorge', 'Reynoso', 'jorge@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 749.00),
(117, '12140184', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-24', '00:34:05', 'Jorge', 'Reynoso', 'jorge@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 192.60),
(118, '56650265', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-24', '00:46:17', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 460.10),
(119, '84892066', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-24', '00:47:28', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 460.10),
(120, '96559601', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 3, '2020-11-24', '11:34:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '47029681', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2020-11-24', '14:04:31', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(122, '75328431', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-16', '01:01:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '2213459', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-16', '16:25:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '71899625', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-19', '22:37:51', 'Raphael', 'Jimenez', 'rafa@gmail.com', 'Siriusgatan 102', NULL, 'Oslo', '41516', 15, 0, NULL, NULL, NULL, 535.00),
(125, '90853296', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-23', '01:18:23', 'Carlos', 'Corleones', 'carlos@gmail.com', 'Hörte 11', NULL, 'Oslo', '41516', 211, 0, NULL, NULL, NULL, 535.00),
(126, '12456320', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-28', '15:27:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '43899815', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-28', '16:17:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, '89942104', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-28', '16:26:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, '87150970', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-28', '21:17:15', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 535.00),
(130, '49582117', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-28', '22:36:11', 'Carlos', 'Corleones', 'carlos@gmail.com', 'Hörte 11', NULL, 'Oslo', '41516', 211, 0, NULL, NULL, NULL, 535.00),
(131, '88592358', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-28', '23:28:45', 'Carola', 'De la Rosa', 'Carola@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 1, 'Raphael', 'Jimenez', 'rafa@gmail.com', 535.00),
(132, '33326526', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-29', '00:36:58', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(133, '26964472', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-29', '18:09:12', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(134, '74981569', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-06-30', '14:00:32', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 1, NULL, NULL, NULL, 525.00),
(135, '38250257', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-01', '23:41:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, '4718814', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '08:07:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, '92819258', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '08:15:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, '21171516', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '10:55:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, '35890666', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '11:01:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, '60700835', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '11:51:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, '53463439', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '11:52:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, '84638333', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '15:42:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, '22358524', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '15:48:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, '4300484', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-02', '15:48:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '47408545', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-03', '12:52:27', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(150, '17264471', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-03', '13:18:41', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(151, '70745179', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-03', '18:43:08', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(154, '90398619', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-07', '13:37:01', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(155, '53889827', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-07', '14:00:44', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(156, '50237965', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-07', '14:07:40', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(158, '225657', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-07', '15:41:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, '62377908', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-11', '22:02:42', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(161, '94205175', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-11', '22:07:36', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(162, '18738817', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-12', '12:46:21', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(163, '43807846', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-12', '13:10:44', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(164, '79379672', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-12', '13:11:35', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(166, '23874762', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-12', '21:42:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, '68251440', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-12', '23:32:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, '52851713', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-13', '00:04:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, '70499239', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-13', '23:57:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, '86801030', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-07-17', '16:11:42', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(176, '79596902', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-03', '16:54:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, '77144787', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-06', '22:21:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, '58506388', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-07', '00:07:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, '61663187', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-07', '21:23:32', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 525.00),
(182, '12256697', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-09', '12:16:54', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(183, '78151250', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-10', '02:20:55', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(184, '46984535', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-10', '02:34:27', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(185, '92198154', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-10', '02:47:05', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(186, '55716653', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-10', '18:04:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, '39660712', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-14', '13:24:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, '77962921', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-16', '14:27:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, '41737282', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-18', '10:24:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, '83059702', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-20', '18:18:08', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(193, '68797531', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-21', '01:26:05', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(194, '55402982', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-22', '00:41:37', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(195, '70325600', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-22', '01:20:01', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(196, '71653897', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-08-22', '01:37:26', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(197, '50279115', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-12', '16:19:06', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(200, '45186822', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-12', '17:41:22', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(201, '32852438', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-12', '18:35:49', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(202, '76411762', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-12', '20:42:23', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(204, '33437085', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-12', '20:53:31', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(206, '48761023', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '12:33:16', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(208, '95093359', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '12:45:26', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(209, '20975404', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '12:52:07', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(210, '24099377', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '12:52:55', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(212, '37984199', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '13:09:59', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(215, '39661467', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '13:20:25', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(216, '18378692', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '13:21:40', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(217, '31692521', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '13:33:44', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(219, '51499927', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '13:41:02', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 525.00),
(220, '13170224', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '13:42:41', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(221, '82446961', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-14', '13:43:38', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(228, '39186975', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-19', '15:28:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, '43733025', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-19', '15:29:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, '10414666', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-21', '13:18:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, '32373201', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-21', '13:23:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, '89820555', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-21', '13:24:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, '35351860', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-09-21', '13:25:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, '79965441', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-05', '07:23:47', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(263, '95057867', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-05', '13:03:22', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(265, '57035949', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-15', '15:18:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, '36808918', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-15', '15:19:49', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 472.50),
(271, '86024492', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '11:12:55', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(273, '33285840', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '15:40:02', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(274, '23555153', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '16:19:42', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(275, '28097323', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '16:22:26', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(276, '66959194', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '16:28:18', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(277, '59223919', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '16:32:34', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(278, '78398596', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '17:56:14', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(279, '84347204', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '18:30:31', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(280, '57536393', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '18:32:31', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(281, '42851147', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '18:42:55', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(282, '56441333', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '20:31:05', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(283, '65794680', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '20:36:28', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(284, '48467335', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '20:37:47', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(285, '27942446', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '20:39:14', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 525.00),
(286, '81498720', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '20:57:23', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(287, '5916239', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '20:58:55', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(288, '47245615', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '21:00:43', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(291, '83250011', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '21:27:05', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(292, '57517795', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '21:31:48', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(293, '15689711', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '21:36:04', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(294, '43144020', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-16', '21:47:47', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(301, '86884334', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-17', '14:11:40', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 525.00),
(302, '26494297', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-17', '14:12:44', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 420.00),
(303, '42694534', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-17', '14:58:34', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(304, '71095682', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-17', '15:05:33', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, NULL, NULL, NULL, 577.50),
(305, '10844571', '88478df60ae1fdbcb23cb893c0c2cb73', NULL, 1, '2021-10-17', '15:39:45', 'Lorenzo', 'Knight', 'joellorenzo.k@gmail.com', 'Siriusgatan 102', NULL, 'Göteborg', '41522', 211, 0, 'Sofia', 'Franzen', 'sofiafranzen@gmail.com', 525.00);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `user_edit` int(11) DEFAULT NULL,
  `date_edit` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `single_couple` int(11) DEFAULT NULL,
  `ticket_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `sales_end` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `visibility` int(11) DEFAULT NULL,
  `min_quant` int(11) DEFAULT NULL,
  `max_quant` int(11) DEFAULT NULL,
  `sales_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `id_event`, `id_user`, `user_edit`, `date_edit`, `date`, `type`, `single_couple`, `ticket_name`, `stock`, `price`, `start_date`, `start_time`, `start_datetime`, `sales_end`, `end_time`, `end_datetime`, `description`, `visibility`, `min_quant`, `max_quant`, `sales_type`, `status`) VALUES
(1, 1, 1, 1, '2021-08-06 22:10:21', '2020-04-20 19:04:31', 0, 1, 'Follower pass', 15, 550.00, '2020-11-24', '00:30:00', '2020-11-24 00:30:00', '2021-12-31', '01:00:00', '2021-12-31 01:00:00', 'Only Ladies', 0, NULL, NULL, 0, 1),
(2, 1, 1, 1, '2021-09-25 00:29:03', '2020-04-20 19:23:05', 0, 1, 'Leader pass', 16, 500.00, '2020-11-24', '22:00:00', '2020-11-24 22:00:00', '2021-12-31', '21:00:00', '2021-12-31 21:00:00', 'Only Men', 1, NULL, NULL, 0, 1),
(3, 1, 1, 1, '2021-08-06 22:10:35', '2020-04-20 19:25:01', 0, 2, 'Couple pass', 15, 500.00, '2020-11-24', '22:00:00', '2020-11-24 22:00:00', '2021-12-31', '00:00:00', '2021-12-31 00:00:00', '1 men and 1 lady', 0, NULL, NULL, 0, 1),
(5, 1, 1, 1, '2021-08-06 22:11:55', '2020-04-21 10:48:29', 0, 1, 'Follower Partypass', 15, 500.00, '2020-11-24', '22:00:00', '2020-11-24 22:00:00', '2020-11-29', '21:00:00', '2020-11-29 21:00:00', 'Only Party for ladies', 1, NULL, NULL, 0, 1),
(6, 1, 1, 1, '2021-08-06 22:12:14', '2020-04-22 15:19:37', 0, 1, 'Leader Partypass', 15, 500.00, '2021-07-10', '22:00:00', '2021-07-10 22:00:00', '2021-07-31', '21:00:00', '2021-07-31 21:00:00', 'Only Party för Men', 3, NULL, NULL, 0, 1),
(15, 1, 1, 1, '2021-08-06 22:12:30', '2020-04-29 19:03:20', 0, 2, 'Couple Partypass (men and lady)', 15, 980.00, '2021-07-09', '00:00:00', '2021-07-09 00:00:00', '2021-07-31', '00:00:00', '2021-07-31 00:00:00', 'svfsdfds', 1, NULL, NULL, 0, 1),
(16, 2, 1, NULL, NULL, '2020-05-29 14:08:37', 0, 1, 'Follower pass', 15, 500.00, NULL, '21:00:00', NULL, NULL, '00:00:00', NULL, 'Only Ladies', 1, NULL, NULL, 0, 1),
(19, 3, 1, 1, '2020-11-23 21:09:40', '2020-06-26 21:39:59', 0, 1, 'Follower pass', 15, 250.00, '2020-11-20', '06:30:00', NULL, '2020-11-29', '03:30:00', NULL, 'follower pass', 1, NULL, NULL, 0, 1),
(21, 3, 1, 1, '2020-11-24 11:18:47', '2020-11-17 13:55:48', 0, 1, 'Leader pass', 6, 200.00, '2020-11-17', '00:00:00', NULL, '2020-11-29', '00:00:00', NULL, 'asdfsdf', 1, NULL, NULL, 0, 1),
(24, 5, 1, 1, '2021-08-10 01:20:02', '2021-06-25 00:05:37', 0, 1, 'Follower pass', 10, 500.00, '2021-06-25', '00:00:00', '2021-06-25 00:00:00', '2021-08-21', '00:00:00', '2021-08-21 00:00:00', NULL, 1, NULL, NULL, 0, 1),
(27, 5, 1, 1, '2021-08-10 01:07:53', '2021-08-03 23:29:56', 0, 1, 'Leader pass', 10, 500.00, '2021-08-03', '13:00:00', '2021-08-03 13:00:00', '2021-08-09', '21:00:00', '2021-08-09 21:00:00', 'asfasdf sdf sdf ', 1, NULL, NULL, 0, 1),
(37, 1, 1, NULL, NULL, '2021-09-08 08:04:53', 0, 1, 'test pass', 10, 500.00, '2021-09-08', '08:30:00', '2021-09-08 08:30:00', '2021-10-22', '00:00:00', '2021-10-22 00:00:00', NULL, 1, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_event`
--

CREATE TABLE `type_event` (
  `id_type` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_event`
--

INSERT INTO `type_event` (`id_type`, `type`, `status`) VALUES
(1, 'Appearance or Signing', 1),
(2, 'Attraction', 1),
(3, 'Camp, Trip, or Retreat', 1),
(4, 'Class, Training, or Workshop', 1),
(5, 'Concert or Performance', 1),
(6, 'Conference', 1),
(7, 'Convention', 1),
(8, 'Dinner or Gala', 1),
(9, 'Festival or Fair', 1),
(10, 'Game or Competition', 1),
(11, 'Meeting or Networking Event', 1),
(12, 'Party or Social Gathering', 1),
(13, 'Race or Endurance Event', 1),
(14, 'Rally', 1),
(15, 'Screening', 1),
(16, 'Seminar or Talk', 1),
(17, 'Tour', 1),
(18, 'Tournament', 1),
(19, 'Tradeshow, Consumer Show, or Expo', 1),
(20, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `acount_no` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilephoto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `acount_no`, `email`, `id_admin`, `password`, `rank`, `name`, `surname`, `personal_number`, `phone`, `profilephoto`, `status`) VALUES
(1, 772750503, 'joellorenzo.k@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 0, 'Lorenz', 'Knight', '8501305620', '0763199480', NULL, 1),
(2, NULL, 'shael.k@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, 'Shael', 'Knight', '8409034157', '0763199480', NULL, 1),
(5, NULL, 'carlos@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, 'Carlos', 'Corleones', '8501305620', '0763199411', NULL, 1),
(29, NULL, 'ramon@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, 'Ramon', 'Ramirez', '8501305620', '0763199411', NULL, 1),
(32, 772750506, 'brenda@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, 'Brenda', 'Ozuna', '8501305699', '0763199490', NULL, 1),
(35, 772750506, 'ruben@gmail.com', 32, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 808756635, 'daniel@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, 'Daniel', 'Martinez', '8409034158', '0763199493', NULL, 1),
(52, 891166547, 'r_typ3@hotmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, 'Joel', 'Knight', '8501305699', '0763199420', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_discount_list`
--
ALTER TABLE `adm_discount_list`
  ADD PRIMARY KEY (`id_adm_disc`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_counter`);

--
-- Indexes for table `category_event`
--
ALTER TABLE `category_event`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id_currency`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id_discount`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id_fees`);

--
-- Indexes for table `monthly_billing`
--
ALTER TABLE `monthly_billing`
  ADD PRIMARY KEY (`id_billing`);

--
-- Indexes for table `multi_user_access`
--
ALTER TABLE `multi_user_access`
  ADD PRIMARY KEY (`id_multi_user`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id_purchase`);

--
-- Indexes for table `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `type_event`
--
ALTER TABLE `type_event`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_discount_list`
--
ALTER TABLE `adm_discount_list`
  MODIFY `id_adm_disc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1140;

--
-- AUTO_INCREMENT for table `category_event`
--
ALTER TABLE `category_event`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id_currency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id_discount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id_fees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monthly_billing`
--
ALTER TABLE `monthly_billing`
  MODIFY `id_billing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `multi_user_access`
--
ALTER TABLE `multi_user_access`
  MODIFY `id_multi_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `temp_user`
--
ALTER TABLE `temp_user`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `type_event`
--
ALTER TABLE `type_event`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
