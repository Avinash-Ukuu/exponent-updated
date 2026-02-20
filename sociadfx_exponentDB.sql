-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2023 at 07:08 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sociadfx_exponentDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dist_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `dist_id`, `state_id`) VALUES
(1, 'Amritsar', 0, 0),
(2, 'Barnala', 0, 0),
(3, 'Bathinda', 0, 0),
(4, 'Firozpur', 0, 0),
(5, 'Faridkot', 0, 0),
(6, 'Fatehgarh Sahib', 0, 0),
(7, 'Fazilka', 0, 0),
(8, 'Gurdaspur', 0, 0),
(9, 'Hoshiarpur', 0, 0),
(10, 'Jalandhar', 0, 0),
(11, 'Kapurthala', 0, 0),
(12, 'Ludhiana', 0, 0),
(13, 'Mansa', 0, 0),
(14, 'Moga', 0, 0),
(15, 'Sri Muktsar Sahib', 0, 0),
(16, 'Pathankot', 0, 0),
(17, 'Patiala', 0, 0),
(18, 'Rupnagar', 0, 0),
(19, 'Ajitgarh (Mohali)', 0, 0),
(20, 'Sangrur', 0, 0),
(21, 'Nawanshahr', 0, 0),
(22, 'Tarn Taran', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `countryCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `st_code` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `st_code`, `name`) VALUES
(1, 1, 'North and Middle Andama'),
(2, 1, 'South Andama'),
(3, 1, 'Nicobar'),
(4, 2, 'Anantapur'),
(5, 2, 'Chittoor'),
(6, 2, 'East Godavari'),
(7, 2, 'Guntur'),
(8, 2, 'Krishna'),
(9, 2, 'Kurnool'),
(10, 2, 'Prakasam'),
(11, 2, 'Srikakulam'),
(12, 2, 'Sri Potti Sri Ramulu Nellore'),
(13, 2, 'Vishakhapatnam'),
(14, 2, 'Vizianagaram'),
(15, 2, 'West Godavari'),
(16, 2, 'Cudappah'),
(17, 3, 'Anjaw'),
(18, 3, 'Changlang'),
(19, 3, 'East Siang'),
(20, 3, 'East Kameng'),
(21, 3, 'Kurung Kumey'),
(22, 3, 'Lohit'),
(23, 3, 'Lower Dibang Valley'),
(24, 3, 'Lower Subansiri'),
(25, 3, 'Papum Pare'),
(26, 3, 'Tawang'),
(27, 3, 'Tirap'),
(28, 3, 'Dibang Valley'),
(29, 3, 'Upper Siang'),
(30, 3, 'Upper Subansiri'),
(31, 3, 'West Kameng'),
(32, 3, 'West Siang'),
(33, 4, 'Baksa'),
(34, 4, 'Barpeta'),
(35, 4, 'Bongaigao'),
(36, 4, 'Cachar'),
(37, 4, 'Chirang'),
(38, 4, 'Darrang'),
(39, 4, 'Dhemaji'),
(40, 4, 'Dima Hasao'),
(41, 4, 'Dhubri'),
(42, 4, 'Dibrugarh'),
(43, 4, 'Goalpara'),
(44, 4, 'Golaghat'),
(45, 4, 'Hailakandi'),
(46, 4, 'Jorhat'),
(47, 4, 'Kamrup'),
(48, 4, 'Kamrup Metropolita'),
(49, 4, 'Karbi Anglong'),
(50, 4, 'Karimganj'),
(51, 4, 'Kokrajhar'),
(52, 4, 'Lakhimpur'),
(53, 4, 'Morigao'),
(54, 4, 'Nagao'),
(55, 4, 'Nalbari'),
(56, 4, 'Sivasagar'),
(57, 4, 'Sonitpur'),
(58, 4, 'Tinsukia'),
(59, 4, 'Udalguri'),
(60, 5, 'Araria'),
(61, 5, 'Arwal'),
(62, 5, 'Aurangabad'),
(63, 5, 'Banka'),
(64, 5, 'Begusarai'),
(65, 5, 'Bhagalpur'),
(66, 5, 'Bhojpur'),
(67, 5, 'Buxar'),
(68, 5, 'Darbhanga'),
(69, 5, 'East Champara'),
(70, 5, 'Gaya'),
(71, 5, 'Gopalganj'),
(72, 5, 'Jamui'),
(73, 5, 'Jehanabad'),
(74, 5, 'Kaimur'),
(75, 5, 'Katihar'),
(76, 5, 'Khagaria'),
(77, 5, 'Kishanganj'),
(78, 5, 'Lakhisarai'),
(79, 5, 'Madhepura'),
(80, 5, 'Madhubani'),
(81, 5, 'Munger'),
(82, 5, 'Muzaffarpur'),
(83, 5, 'Nalanda'),
(84, 5, 'Nawada'),
(85, 5, 'Patna'),
(86, 5, 'Purnia'),
(87, 5, 'Rohtas'),
(88, 5, 'Saharsa'),
(89, 5, 'Samastipur'),
(90, 5, 'Sara'),
(91, 5, 'Sheikhpura'),
(92, 5, 'Sheohar'),
(93, 5, 'Sitamarhi'),
(94, 5, 'Siwa'),
(95, 5, 'Supaul'),
(96, 5, 'Vaishali'),
(97, 5, 'West Champara'),
(98, 6, 'Chandigarh'),
(99, 7, 'Bastar'),
(100, 7, 'Bijapur'),
(101, 7, 'Bilaspur'),
(102, 7, 'Dantewada'),
(103, 7, 'Dhamtari'),
(104, 7, 'Durg'),
(105, 7, 'Jashpur'),
(106, 7, 'Janjgir-Champa'),
(107, 7, 'Korba'),
(108, 7, 'Koriya'),
(109, 7, 'Kanker'),
(110, 7, 'Kabirdham (formerly Kawardha);'),
(111, 7, 'Mahasamund'),
(112, 7, 'Narayanpur'),
(113, 7, 'Raigarh'),
(114, 7, 'Rajnandgao'),
(115, 7, 'Raipur'),
(116, 7, 'Surajpur'),
(117, 8, 'Dadra and Nagar Haveli'),
(118, 9, 'Dama'),
(119, 9, 'Diu'),
(120, 10, 'Central Delhi'),
(121, 10, 'East Delhi'),
(122, 10, 'New Delhi'),
(123, 10, 'North Delhi'),
(124, 10, 'North East Delhi'),
(125, 10, 'North West Delhi'),
(126, 10, 'South Delhi'),
(127, 10, 'South West Delhi'),
(128, 10, 'West Delhi'),
(129, 11, 'North Goa'),
(130, 11, 'South Goa'),
(131, 12, 'Ahmedabad'),
(132, 12, 'Amreli'),
(133, 12, 'Anand'),
(134, 12, 'Aravalli'),
(135, 12, 'Banaskantha'),
(136, 12, 'Bharuch'),
(137, 12, 'Bhavnagar'),
(138, 12, 'Dahod'),
(139, 12, 'Dang'),
(140, 12, 'Gandhinagar'),
(141, 12, 'Jamnagar'),
(142, 12, 'Junagadh'),
(143, 12, 'Kutch'),
(144, 12, 'Kheda'),
(145, 12, 'Mehsana'),
(146, 12, 'Narmada'),
(147, 12, 'Navsari'),
(148, 12, 'Pata'),
(149, 12, 'Panchmahal'),
(150, 12, 'Porbandar'),
(151, 12, 'Rajkot'),
(152, 12, 'Sabarkantha'),
(153, 12, 'Surendranagar'),
(154, 12, 'Surat'),
(155, 12, 'Tapi'),
(156, 12, 'Vadodara'),
(157, 12, 'Valsad'),
(158, 13, 'Ambala'),
(159, 13, 'Bhiwani'),
(160, 13, 'Faridabad'),
(161, 13, 'Fatehabad'),
(162, 13, 'Gurgao'),
(163, 13, 'Hissar'),
(164, 13, 'Jhajjar'),
(165, 13, 'Jind'),
(166, 13, 'Karnal'),
(167, 13, 'Kaithal'),
(168, 13, 'Kurukshetra'),
(169, 13, 'Mahendragarh'),
(170, 13, 'Mewat'),
(171, 13, 'Palwal'),
(172, 13, 'Panchkula'),
(173, 13, 'Panipat'),
(174, 13, 'Rewari'),
(175, 13, 'Rohtak'),
(176, 13, 'Sirsa'),
(177, 13, 'Sonipat'),
(178, 13, 'Yamuna Nagar'),
(179, 14, 'Bilaspur'),
(180, 14, 'Chamba'),
(181, 14, 'Hamirpur'),
(182, 14, 'Kangra'),
(183, 14, 'Kinnaur'),
(184, 14, 'Kullu'),
(185, 14, 'Lahaul and Spiti'),
(186, 14, 'Mandi'),
(187, 14, 'Shimla'),
(188, 14, 'Sirmaur'),
(189, 14, 'Sola'),
(190, 14, 'Una'),
(191, 15, 'Anantnag'),
(192, 15, 'Badgam'),
(193, 15, 'Bandipora'),
(194, 15, 'Baramulla'),
(195, 15, 'Doda'),
(196, 15, 'Ganderbal'),
(197, 15, 'Jammu'),
(198, 15, 'Kargil'),
(199, 15, 'Kathua'),
(200, 15, 'Kishtwar'),
(202, 15, 'Kupwara'),
(203, 15, 'Kulgam'),
(204, 15, 'Leh'),
(205, 15, 'Poonch'),
(206, 15, 'Pulwama'),
(207, 15, 'Rajouri'),
(208, 15, 'Ramba'),
(209, 15, 'Reasi'),
(210, 15, 'Samba'),
(211, 15, 'Shopia'),
(212, 15, 'Srinagar'),
(213, 15, 'Udhampur'),
(214, 16, 'Bokaro'),
(215, 16, 'Chatra'),
(216, 16, 'Deoghar'),
(217, 16, 'Dhanbad'),
(218, 16, 'Dumka'),
(219, 16, 'East Singhbhum'),
(220, 16, 'Garhwa'),
(221, 16, 'Giridih'),
(222, 16, 'Godda'),
(223, 16, 'Gumla'),
(224, 16, 'Hazaribag'),
(225, 16, 'Jamtara'),
(226, 16, 'Khunti'),
(227, 16, 'Koderma'),
(228, 16, 'Latehar'),
(229, 16, 'Lohardaga'),
(230, 16, 'Pakur'),
(231, 16, 'Palamu'),
(232, 16, 'Ramgarh'),
(233, 16, 'Ranchi'),
(234, 16, 'Sahibganj'),
(235, 16, 'Seraikela Kharsawa'),
(236, 16, 'Simdega'),
(237, 16, 'West Singhbhum'),
(238, 17, 'Bagalkot'),
(239, 17, 'Bangalore Rural'),
(240, 17, 'Bangalore Urba'),
(241, 17, 'Belgaum'),
(242, 17, 'Bellary'),
(243, 17, 'Bidar'),
(244, 17, 'Bijapur'),
(245, 17, 'Chamarajnagar'),
(246, 17, 'Chikkamagaluru'),
(247, 17, 'Chikkaballapur'),
(248, 17, 'Chitradurga'),
(249, 17, 'Davanagere'),
(250, 17, 'Dharwad'),
(251, 17, 'Dakshina Kannada'),
(252, 17, 'Gadag'),
(253, 17, 'Gulbarga'),
(254, 17, 'Hassa'),
(255, 17, 'Haveri'),
(256, 17, 'Kodagu'),
(257, 17, 'Kolar'),
(258, 17, 'Koppal'),
(259, 17, 'Mandya'),
(260, 17, 'Mysore'),
(261, 17, 'Raichur'),
(262, 17, 'Shimoga'),
(263, 17, 'Tumkur'),
(264, 17, 'Udupi'),
(265, 17, 'Uttara Kannada'),
(266, 17, 'Ramanagara'),
(267, 17, 'Yadgir'),
(268, 18, 'Alappuzha'),
(269, 18, 'Ernakulam'),
(270, 18, 'Idukki'),
(271, 18, 'Kannur'),
(272, 18, 'Kasaragod'),
(273, 18, 'Kollam'),
(274, 18, 'Kottayam'),
(275, 18, 'Kozhikode'),
(276, 18, 'Malappuram'),
(277, 18, 'Palakkad'),
(278, 18, 'Pathanamthitta'),
(279, 18, 'Thrissur'),
(280, 18, 'Thiruvananthapuram'),
(281, 18, 'Wayanad'),
(282, 19, 'Lakshadweep'),
(283, 20, 'Agar'),
(284, 20, 'Alirajpur'),
(285, 20, 'Anuppur'),
(286, 20, 'Ashok Nagar'),
(287, 20, 'Balaghat'),
(288, 20, 'Barwani'),
(289, 20, 'Betul'),
(290, 20, 'Bhind'),
(291, 20, 'Bhopal'),
(292, 20, 'Burhanpur'),
(293, 20, 'Chhatarpur'),
(294, 20, 'Chhindwara'),
(295, 20, 'Damoh'),
(296, 20, 'Datia'),
(297, 20, 'Dewas'),
(298, 20, 'Dhar'),
(299, 20, 'Dindori'),
(300, 20, 'Guna'),
(301, 20, 'Gwalior'),
(302, 20, 'Harda'),
(303, 20, 'Hoshangabad'),
(304, 20, 'Indore'),
(305, 20, 'Jabalpur'),
(306, 20, 'Jhabua'),
(307, 20, 'Katni'),
(308, 20, 'Khandwa (East Nimar);'),
(309, 20, 'Khargone (West Nimar);'),
(310, 20, 'Mandla'),
(311, 20, 'Mandsaur'),
(312, 20, 'Morena'),
(313, 20, 'Narsinghpur'),
(314, 20, 'Neemuch'),
(315, 20, 'Panna'),
(316, 20, 'Raise'),
(317, 20, 'Rajgarh'),
(318, 20, 'Ratlam'),
(319, 20, 'Rewa'),
(320, 20, 'Sagar'),
(321, 20, 'Satna'),
(322, 20, 'Sehore'),
(323, 20, 'Seoni'),
(324, 20, 'Shahdol'),
(325, 20, 'Shajapur'),
(326, 20, 'Sheopur'),
(327, 20, 'Shivpuri'),
(328, 20, 'Sidhi'),
(329, 20, 'Singrauli'),
(330, 20, 'Tikamgarh'),
(331, 20, 'Ujjai'),
(332, 20, 'Umaria'),
(333, 20, 'Vidisha'),
(334, 21, 'Ahmednagar'),
(335, 21, 'Akola'),
(336, 21, 'Amravati'),
(337, 21, 'Aurangabad'),
(338, 21, 'Beed'),
(339, 21, 'Bhandara'),
(340, 21, 'Buldhana'),
(341, 21, 'Chandrapur'),
(342, 21, 'Dhule'),
(343, 21, 'Gadchiroli'),
(344, 21, 'Gondia'),
(345, 21, 'Hingoli'),
(346, 21, 'Jalgao'),
(347, 21, 'Jalna'),
(348, 21, 'Kolhapur'),
(349, 21, 'Latur'),
(350, 21, 'Mumbai City'),
(351, 21, 'Mumbai suburba'),
(352, 21, 'Nanded'),
(353, 21, 'Nandurbar'),
(354, 21, 'Nagpur'),
(355, 21, 'Nashik'),
(356, 21, 'Osmanabad'),
(357, 21, 'Parbhani'),
(358, 21, 'Pune'),
(359, 21, 'Raigad'),
(360, 21, 'Ratnagiri'),
(361, 21, 'Sangli'),
(362, 21, 'Satara'),
(363, 21, 'Sindhudurg'),
(364, 21, 'Solapur'),
(365, 21, 'Thane'),
(366, 21, 'Wardha'),
(367, 21, 'Washim'),
(368, 21, 'Yavatmal'),
(369, 22, 'Bishnupur'),
(370, 22, 'Churachandpur'),
(371, 22, 'Chandel'),
(372, 22, 'Imphal East'),
(373, 22, 'Senapati'),
(374, 22, 'Tamenglong'),
(375, 22, 'Thoubal'),
(376, 22, 'Ukhrul'),
(377, 22, 'Imphal West'),
(378, 23, 'East Garo Hills'),
(379, 23, 'East Khasi Hills'),
(380, 23, 'Jaintia Hills'),
(381, 23, 'Ri Bhoi'),
(382, 23, 'South Garo Hills'),
(383, 23, 'West Garo Hills'),
(384, 23, 'West Khasi Hills'),
(385, 24, 'Aizawl'),
(386, 24, 'Champhai'),
(387, 24, 'Kolasib'),
(388, 24, 'Lawngtlai'),
(389, 24, 'Lunglei'),
(390, 24, 'Mamit'),
(391, 24, 'Saiha'),
(392, 24, 'Serchhip'),
(393, 25, 'Dimapur'),
(394, 25, 'Kiphire'),
(395, 25, 'Kohima'),
(396, 25, 'Longleng'),
(397, 25, 'Mokokchung'),
(398, 25, 'Mo'),
(399, 25, 'Pere'),
(400, 25, 'Phek'),
(401, 25, 'Tuensang'),
(402, 25, 'Wokha'),
(403, 25, 'Zunheboto'),
(404, 26, 'Angul'),
(405, 26, 'Boudh (Bauda);'),
(406, 26, 'Bhadrak'),
(407, 26, 'Balangir'),
(408, 26, 'Bargarh (Baragarh);'),
(409, 26, 'Balasore'),
(410, 26, 'Cuttack'),
(411, 26, 'Debagarh (Deogarh);'),
(412, 26, 'Dhenkanal'),
(413, 26, 'Ganjam'),
(414, 26, 'Gajapati'),
(415, 26, 'Jharsuguda'),
(416, 26, 'Jajpur'),
(417, 26, 'Jagatsinghpur'),
(418, 26, 'Khordha'),
(419, 26, 'Kendujhar (Keonjhar);'),
(420, 26, 'Kalahandi'),
(421, 26, 'Kandhamal'),
(422, 26, 'Koraput'),
(423, 26, 'Kendrapara'),
(424, 26, 'Malkangiri'),
(425, 26, 'Mayurbhanj'),
(426, 26, 'Nabarangpur'),
(427, 26, 'Nuapada'),
(428, 26, 'Nayagarh'),
(429, 26, 'Puri'),
(430, 26, 'Rayagada'),
(431, 26, 'Sambalpur'),
(432, 26, 'Subarnapur (Sonepur);'),
(433, 26, 'Sundergarh'),
(434, 27, 'Karaikal'),
(435, 27, 'Mahe'),
(436, 27, 'Pondicherry'),
(437, 27, 'Yanam'),
(438, 28, 'Amritsar'),
(439, 28, 'Barnala'),
(440, 28, 'Bathinda'),
(441, 28, 'Firozpur'),
(442, 28, 'Faridkot'),
(443, 28, 'Fatehgarh Sahib'),
(444, 28, 'Fazilka'),
(445, 28, 'Gurdaspur'),
(446, 28, 'Hoshiarpur'),
(447, 28, 'Jalandhar'),
(448, 28, 'Kapurthala'),
(449, 28, 'Ludhiana'),
(450, 28, 'Mansa'),
(451, 28, 'Moga'),
(452, 28, 'Sri Muktsar Sahib'),
(453, 28, 'Pathankot'),
(454, 28, 'Patiala'),
(455, 28, 'Rupnagar'),
(456, 28, 'Ajitgarh (Mohali);'),
(457, 28, 'Sangrur'),
(458, 28, 'Shahid Bhagat Singh Nagar'),
(459, 28, 'Tarn Tara'),
(460, 29, 'Ajmer'),
(461, 29, 'Alwar'),
(462, 29, 'Bikaner'),
(463, 29, 'Barmer'),
(464, 29, 'Banswara'),
(465, 29, 'Bharatpur'),
(466, 29, 'Bara'),
(467, 29, 'Bundi'),
(468, 29, 'Bhilwara'),
(469, 29, 'Churu'),
(470, 29, 'Chittorgarh'),
(471, 29, 'Dausa'),
(472, 29, 'Dholpur'),
(473, 29, 'Dungapur'),
(474, 29, 'Ganganagar'),
(475, 29, 'Hanumangarh'),
(476, 29, 'Jhunjhunu'),
(477, 29, 'Jalore'),
(478, 29, 'Jodhpur'),
(479, 29, 'Jaipur'),
(480, 29, 'Jaisalmer'),
(481, 29, 'Jhalawar'),
(482, 29, 'Karauli'),
(483, 29, 'Kota'),
(484, 29, 'Nagaur'),
(485, 29, 'Pali'),
(486, 29, 'Pratapgarh'),
(487, 29, 'Rajsamand'),
(488, 29, 'Sikar'),
(489, 29, 'Sawai Madhopur'),
(490, 29, 'Sirohi'),
(491, 29, 'Tonk'),
(492, 29, 'Udaipur'),
(493, 30, 'East Sikkim'),
(494, 30, 'North Sikkim'),
(495, 30, 'South Sikkim'),
(496, 30, 'West Sikkim'),
(497, 31, 'Ariyalur'),
(498, 31, 'Chennai'),
(499, 31, 'Coimbatore'),
(500, 31, 'Cuddalore'),
(501, 31, 'Dharmapuri'),
(502, 31, 'Dindigul'),
(503, 31, 'Erode'),
(504, 31, 'Kanchipuram'),
(505, 31, 'Kanyakumari'),
(506, 31, 'Karur'),
(507, 31, 'Krishnagiri'),
(508, 31, 'Madurai'),
(509, 31, 'Nagapattinam'),
(510, 31, 'Nilgiris'),
(511, 31, 'Namakkal'),
(512, 31, 'Perambalur'),
(513, 31, 'Pudukkottai'),
(514, 31, 'Ramanathapuram'),
(515, 31, 'Salem'),
(516, 31, 'Sivaganga'),
(517, 31, 'Tirupur'),
(518, 31, 'Tiruchirappalli'),
(519, 31, 'Theni'),
(520, 31, 'Tirunelveli'),
(521, 31, 'Thanjavur'),
(522, 31, 'Thoothukudi'),
(523, 31, 'Tiruvallur'),
(524, 31, 'Tiruvarur'),
(525, 31, 'Tiruvannamalai'),
(526, 31, 'Vellore'),
(527, 31, 'Viluppuram'),
(528, 31, 'Virudhunagar'),
(529, 32, 'Adilabad'),
(530, 32, 'Hyderabad'),
(531, 32, 'Karimnagar'),
(532, 32, 'Khammam'),
(533, 32, 'Mahbubnagar'),
(534, 32, 'Medak'),
(535, 32, 'Nalgonda'),
(536, 32, 'Nizamabad'),
(537, 32, 'Ranga Reddy'),
(538, 32, 'Warangal'),
(539, 33, 'Dhalai'),
(540, 33, 'North Tripura'),
(541, 33, 'South Tripura'),
(542, 33, 'Khowai'),
(543, 33, 'West Tripura'),
(544, 35, 'Agra'),
(545, 35, 'Aligarh'),
(546, 35, 'Allahabad'),
(547, 35, 'Ambedkar Nagar'),
(548, 35, 'Auraiya'),
(549, 35, 'Azamgarh'),
(550, 35, 'Bagpat'),
(551, 35, 'Bahraich'),
(552, 35, 'Ballia'),
(553, 35, 'Balrampur'),
(554, 35, 'Banda'),
(555, 35, 'Barabanki'),
(556, 35, 'Bareilly'),
(557, 35, 'Basti'),
(558, 35, 'Bijnor'),
(559, 35, 'Budau'),
(560, 35, 'Bulandshahr'),
(561, 35, 'Chandauli'),
(562, 35, 'Amethi (Chhatrapati Shahuji Maharaj Nagar)'),
(563, 35, 'Chitrakoot'),
(564, 35, 'Deoria'),
(565, 35, 'Etah'),
(566, 35, 'Etawah'),
(567, 35, 'Faizabad'),
(568, 35, 'Farrukhabad'),
(569, 35, 'Fatehpur'),
(570, 35, 'Firozabad'),
(571, 35, 'Gautam Buddh Nagar'),
(572, 35, 'Ghaziabad'),
(573, 35, 'Ghazipur'),
(574, 35, 'Gonda'),
(575, 35, 'Gorakhpur'),
(576, 35, 'Hamirpur'),
(577, 35, 'Hardoi'),
(578, 35, 'Hathras (Mahamaya Nagar);'),
(579, 35, 'Jalau'),
(580, 35, 'Jaunpur'),
(581, 35, 'Jhansi'),
(582, 35, 'Jyotiba Phule Nagar'),
(583, 35, 'Kannauj'),
(584, 35, 'Kanpur Dehat (Ramabai Nagar);'),
(585, 35, 'Kanpur Nagar'),
(586, 35, 'Kanshi Ram Nagar'),
(587, 35, 'Kaushambi'),
(588, 35, 'Kushinagar'),
(589, 35, 'Lakhimpur Kheri'),
(590, 35, 'Lalitpur'),
(591, 35, 'Lucknow'),
(592, 35, 'Maharajganj'),
(593, 35, 'Mahoba'),
(594, 35, 'Mainpuri'),
(595, 35, 'Mathura'),
(596, 35, 'Mau'),
(597, 35, 'Meerut'),
(598, 35, 'Mirzapur'),
(599, 35, 'Moradabad'),
(600, 35, 'Muzaffarnagar'),
(601, 35, 'Panchsheel Nagar (Hapur);'),
(602, 35, 'Pilibhit'),
(603, 35, 'Pratapgarh'),
(604, 35, 'Raebareli'),
(605, 35, 'Rampur'),
(606, 35, 'Saharanpur'),
(607, 35, 'Sambhal(Bheem Nagar);'),
(608, 35, 'Sant Kabir Nagar'),
(609, 35, 'Sant Ravidas Nagar'),
(610, 35, 'Shahjahanpur'),
(611, 35, 'Shamli'),
(612, 35, 'Shravasti'),
(613, 35, 'Siddharthnagar'),
(614, 35, 'Sitapur'),
(615, 35, 'Sonbhadra'),
(616, 35, 'Sultanpur'),
(617, 35, 'Unnao'),
(618, 35, 'Varanasi'),
(619, 34, 'Almora'),
(620, 34, 'Bageshwar'),
(621, 34, 'Chamoli'),
(622, 34, 'Champawat'),
(623, 34, 'Dehradu'),
(624, 34, 'Haridwar'),
(625, 34, 'Nainital'),
(626, 34, 'Pauri Garhwal'),
(627, 34, 'Pithoragarh'),
(628, 34, 'Rudraprayag'),
(629, 34, 'Tehri Garhwal'),
(630, 34, 'Udham Singh Nagar'),
(631, 34, 'Uttarkashi'),
(632, 36, 'Bankura'),
(633, 36, 'Bardhama'),
(634, 36, 'Birbhum'),
(635, 36, 'Cooch Behar'),
(636, 36, 'Dakshin Dinajpur'),
(637, 36, 'Darjeeling'),
(638, 36, 'Hooghly'),
(639, 36, 'Howrah'),
(640, 36, 'Jalpaiguri'),
(641, 36, 'Kolkata'),
(642, 36, 'Maldah'),
(643, 36, 'Murshidabad'),
(644, 36, 'Nadia'),
(645, 36, 'North 24 Parganas'),
(646, 36, 'Paschim Medinipur'),
(647, 36, 'Purba Medinipur'),
(648, 36, 'Purulia'),
(649, 36, 'South 24 Parganas'),
(650, 36, 'Uttar Dinajpur');

-- --------------------------------------------------------

--
-- Table structure for table `franchises_centre`
--

CREATE TABLE `franchises_centre` (
  `id` int(11) NOT NULL,
  `c_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `distt` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `franchises_centre`
--

INSERT INTO `franchises_centre` (`id`, `c_code`, `c_name`, `username`, `password`, `address`, `city`, `distt`, `state`, `pincode`, `phone`, `email`, `description`, `status`, `date`) VALUES
(1, '120000', 'UEI Global Cooking Institute', 'ueiadmin', '123456', 'Jalandhar', 'Jalandhar', '447', '28', 144001, '1122334455', 'info@ueiglobalcooking.com', '&lt;p&gt;abcd&lt;/p&gt;', '1', '2023-02-16 11:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Andaman and Nicobar Island (UT)', 105),
(2, 'Andhra Pradesh', 105),
(3, 'Arunachal Pradesh', 105),
(4, 'Assam', 105),
(5, 'Bihar', 105),
(6, 'Chandigarh (UT)', 105),
(7, 'Chhattisgarh', 105),
(8, 'Dadra and Nagar Haveli (UT)', 105),
(9, 'Daman and Diu (UT)', 105),
(10, 'Delhi (NCT)', 105),
(11, 'Goa', 105),
(12, 'Gujarat', 105),
(13, 'Haryana', 105),
(14, 'Himachal Pradesh', 105),
(15, 'Jammu and Kashmir', 105),
(16, 'Jharkhand', 105),
(17, 'Karnataka', 105),
(18, 'Kerala', 105),
(19, 'Lakshadweep (UT)', 105),
(20, 'Madhya Pradesh', 105),
(21, 'Maharashtra', 105),
(22, 'Manipur', 105),
(23, 'Meghalaya', 105),
(24, 'Mizoram', 105),
(25, 'Nagaland', 105),
(26, 'Odisha', 105),
(27, 'Puducherry (UT)', 105),
(28, 'Punjab', 105),
(29, 'Rajastha', 105),
(30, 'Sikkim', 105),
(31, 'Tamil Nadu', 105),
(32, 'Telangana', 105),
(33, 'Tripura', 105),
(34, 'Uttarakhand', 105),
(35, 'Uttar Pradesh', 105),
(36, 'West Bengal', 105);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admit_card`
--

CREATE TABLE `tb_admit_card` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `exam_rollno` int(30) NOT NULL,
  `exam_term` int(11) NOT NULL,
  `session_start` int(11) NOT NULL,
  `session_end` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  `publish_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_admit_card`
--

INSERT INTO `tb_admit_card` (`id`, `st_id`, `course_id`, `exam_rollno`, `exam_term`, `session_start`, `session_end`, `status`, `date`, `publish_date`) VALUES
(2, 15, 14, 924692390, 1, 2020, 2021, 0, '2020-12-22 03:32:13', '0000-00-00 00:00:00'),
(3, 4, 7, 123, 1, 2020, 2021, 1, '2020-12-22 05:53:57', '0000-00-00 00:00:00'),
(4, 5, 7, 924692391, 1, 2020, 2020, 1, '2020-12-22 05:54:24', '2020-12-23 12:28:09'),
(5, 6, 7, 92469239, 1, 2020, 2021, 0, '2020-12-22 05:54:38', '0000-00-00 00:00:00'),
(6, 7, 7, 924692392, 1, 2020, 2021, 1, '2020-12-22 05:54:48', '0000-00-00 00:00:00'),
(7, 18, 14, 92469230, 1, 2020, 2021, 1, '2020-12-23 10:24:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contactform`
--

CREATE TABLE `tb_contactform` (
  `id` int(90) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `uphone` int(15) NOT NULL,
  `usubject` varchar(250) NOT NULL,
  `umsg` text NOT NULL,
  `udate` datetime NOT NULL,
  `rank` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_course`
--

CREATE TABLE `tb_course` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `curs_semester` int(1) NOT NULL DEFAULT '1',
  `course_type` varchar(40) NOT NULL,
  `course_duration` varchar(20) NOT NULL,
  `image` varchar(300) NOT NULL,
  `description` longtext NOT NULL,
  `course_eligibility` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_course`
--

INSERT INTO `tb_course` (`id`, `dept_id`, `course_code`, `name`, `curs_semester`, `course_type`, `course_duration`, `image`, `description`, `course_eligibility`, `status`, `date`) VALUES
(1, 12, 'DCFP003', 'Diploma Course In Food Production', 1, 'Diploma', '6 Month', 'uploads/courses/568148aig27h1meoq11.jpg', '', 'After 12th', 1, '2020-12-28 06:01:54'),
(2, 12, 'BHMCS002', 'Bachelors in Hospitality Management (Culinary Specialization)', 2, 'Advance Diploma', '2 Year', 'uploads/courses/898064aig27h1meoq11.jpg', '&lt;p&gt;Bachelors in Hospitality Management Culinary Specialization&lt;br&gt;&lt;/p&gt;', 'After 12th', 1, '2020-12-29 11:06:43'),
(3, 12, 'BHMIS001', 'Bachelors in Hospitality Management (International Specialization)', 2, 'Advance Diploma', '2 Year', 'uploads/courses/255283new-year.jpg', '&lt;p&gt;Bachelors in Hospitality Management (International Specialization)&lt;br&gt;&lt;/p&gt;', '10+2', 1, '2021-01-05 02:03:00'),
(6, 12, 'BHM-01', 'Bachelors in Hospitality Management', 2, 'Advance Diploma', '2 Year', 'uploads/courses/550324student-visa.jpg', '&lt;p&gt;Bachelors in Hospitality Management&lt;br&gt;&lt;/p&gt;', '10th', 1, '2021-01-07 05:10:57'),
(7, 12, 'DBC004', 'Diploma In Bakery &amp; Confectionary', 1, 'Diploma', '1 Year', '', '&lt;p&gt;Diploma In Bakery &amp;amp; Confectionary&lt;br&gt;&lt;/p&gt;', '12th', 1, '2023-02-15 06:34:33'),
(8, 12, 'DHM005', 'Diploma In Hotel Management', 1, 'Diploma', '1 Year', '', '&lt;p&gt;Diploma In Hotel Management&lt;br&gt;&lt;/p&gt;', '12th', 1, '2023-02-15 06:35:43'),
(9, 12, 'CFBS006', 'Certificate in F&amp;B Service', 1, 'Diploma', '1 Year', '', '', '12th', 1, '2023-02-15 06:36:44'),
(10, 12, 'CFBP007', 'Certificate in F&amp;B Production', 1, 'Diploma', '1 Year', '', '&lt;p&gt;Certificate in F&amp;amp;B Production&lt;br&gt;&lt;/p&gt;', '12th', 1, '2023-02-15 06:37:30'),
(11, 12, 'CHM008', 'Certificate in Housekeeping Management', 1, 'Diploma', '1 Year', '', '&lt;p&gt;Certificate in Housekeeping Management&lt;br&gt;&lt;/p&gt;', '12th', 1, '2023-02-15 06:37:56'),
(12, 6, 'CCTFOM009', 'Certificate Course in The Front Office Management', 1, 'Diploma', '1 Year', '', '&lt;p&gt;Certificate Course in The Front Office Management&lt;br&gt;&lt;/p&gt;', '12th', 1, '2023-02-15 06:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `id` int(90) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`id`, `name`, `image`, `description`, `status`, `created_date`) VALUES
(1, 'Department of Management', '446660department-of-management.jpg', '&lt;p&gt;sadasda&lt;/p&gt;', 1, '2020-12-18 00:00:00'),
(5, 'Department of Food and Agriculture', '706318department-of-food-and-agriculture.jpg', '', 1, '2020-12-18 00:00:00'),
(6, 'Department of Vocational Education and Training', '529920department-of-vocational-education-and-training.jpg', '', 1, '2020-12-18 00:00:00'),
(7, 'Department of Beauty and Fashion Technology', '507438fashion-department.jpg', '', 1, '2020-12-18 00:00:00'),
(8, 'Department of Yoga and Sports', '135164yoga-department.jpg', '', 1, '2020-12-18 00:00:00'),
(11, 'Department of Finance and Accounting', '708309account-department-img.jpg', '', 1, '2020-12-19 00:00:00'),
(12, 'Department of Hotel and Tourism', '147615cooking-management-img.jpg', '&lt;p&gt;Department of Hotel and Tourism Description&lt;/p&gt;', 1, '2020-12-19 00:00:00'),
(13, 'Department of Textile and Designing', '882599textile-management-img.jpg', '', 1, '2020-12-19 00:00:00'),
(21, 'Department of Professional Enhancement', '253709truckdriverclimbingintocab.jpg', '&lt;p&gt;To prepare students for the training and placement&lt;/p&gt;', 1, '2020-12-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `id` int(90) NOT NULL,
  `ref_no` varchar(150) NOT NULL,
  `centre_id` varchar(90) NOT NULL,
  `dept_id` int(90) NOT NULL,
  `is_teacher` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `father_name` varchar(90) NOT NULL,
  `mother_name` varchar(90) NOT NULL,
  `qualification` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `join_date` date NOT NULL,
  `end_date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `emp_signatr` varchar(250) NOT NULL,
  `emp_sslip` varchar(250) NOT NULL,
  `emp_oletter` varchar(250) NOT NULL,
  `created_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`id`, `ref_no`, `centre_id`, `dept_id`, `is_teacher`, `name`, `dob`, `gender`, `mobile`, `email`, `father_name`, `mother_name`, `qualification`, `address`, `join_date`, `end_date`, `salary`, `image`, `emp_signatr`, `emp_sslip`, `emp_oletter`, `created_date`, `status`) VALUES
(1, 'TECHM1622023', '1', 12, 1, 'Manoj1', '1990-01-01', 'male', 1122334455, 'manoj@gmail.com', 'Jagpal Singh', 'Satinder Kaur', 'BCA', 'Phagwara', '2023-02-16', '2023-02-16', 150000, '356889_man_(2).png', '9453984_user_805920_signature.png', '3745019_salary-slip-img.png', '1662187_job-offer-letter-samples.jpg', '2023-02-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_marks_sheet`
--

CREATE TABLE `tb_marks_sheet` (
  `id` int(11) NOT NULL,
  `exam_term` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `ob_theory` int(11) NOT NULL,
  `ob_practical` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `max_marks` int(11) NOT NULL,
  `grade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_marks_sheet`
--

INSERT INTO `tb_marks_sheet` (`id`, `exam_term`, `st_id`, `sub_id`, `ob_theory`, `ob_practical`, `total_marks`, `max_marks`, `grade`, `result`, `status`, `date`) VALUES
(1, 1, 2, 2, 90, 20, 110, 150, 'B', '', 0, '2021-01-07 05:29:21'),
(2, 1, 2, 3, 75, 10, 85, 100, 'A', '', 0, '2021-01-07 05:29:21'),
(3, 1, 2, 6, 85, 0, 85, 100, 'A', '', 0, '2021-01-07 05:29:21'),
(4, 1, 2, 14, 66, 15, 81, 100, 'A', '', 0, '2021-01-07 05:29:21'),
(5, 1, 2, 15, 92, 15, 107, 100, 'OB', '', 0, '2021-01-07 05:29:21'),
(6, 1, 2, 16, 88, 20, 108, 100, 'OB', '', 0, '2021-01-07 05:29:21'),
(7, 1, 2, 17, 25, 15, 40, 100, 'D', '', 0, '2021-01-07 05:29:21'),
(8, 1, 2, 18, 74, 12, 86, 100, 'A', '', 0, '2021-01-07 05:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student`
--

CREATE TABLE `tb_student` (
  `id` int(90) NOT NULL,
  `session_start` int(11) NOT NULL,
  `session_end` int(11) NOT NULL,
  `reg_month` varchar(10) NOT NULL,
  `reg_no` varchar(90) NOT NULL,
  `dept_id` int(90) NOT NULL,
  `course_id` int(90) NOT NULL,
  `course_duration` varchar(90) NOT NULL,
  `name` varchar(90) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(90) NOT NULL,
  `signature_img` varchar(250) NOT NULL,
  `father_name` varchar(90) NOT NULL,
  `mother_name` varchar(90) NOT NULL,
  `centre_id` int(90) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `roll_no2` varchar(50) NOT NULL,
  `ad_status` tinyint(4) NOT NULL,
  `register_date` date NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `result_status` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_student`
--

INSERT INTO `tb_student` (`id`, `session_start`, `session_end`, `reg_month`, `reg_no`, `dept_id`, `course_id`, `course_duration`, `name`, `dob`, `gender`, `mobile`, `email`, `signature_img`, `father_name`, `mother_name`, `centre_id`, `roll_no`, `roll_no2`, `ad_status`, `register_date`, `image`, `status`, `result_status`, `created_date`) VALUES
(1, 2020, 2021, '07', '001', 15, 1, '6 Month', 'Demo Student', '2001-01-03', 'male', 2147483647, 'demo@gmail.com', '9110611_signature.png', 'Demo father', 'mother', 0, '2', '', 0, '2020-12-28', '7519945_default-user.png', 1, 0, '2020-12-28 06:04:56'),
(2, 2020, 2021, '12', '001', 12, 2, '2 Year', 'Demo Student', '2005-01-07', 'male', 2147483647, 'demo@gmail.com', '805920_signature.png', 'father', 'mother', 1, '202012768', '202012768', 0, '2023-02-16', '5697034_e4a8cf2b3534ea19918479d35ecb9cc8.jpg', 1, 0, '2023-02-16 00:00:00'),
(3, 2014, 2015, '07', '001', 12, 3, '2 Year', 'AMIT CHAUDHARY', '1991-08-15', 'male', 2147483647, 'student@gmail.com', '3553025_Guriqwal_Singh_4.jpg', 'CHAMAN LAL', 'SANTOSH DEVI', 1, '201407001', '201407421', 1, '2023-02-16', '7625781_Guriqwal_Singh_3.jpg', 1, 0, '2023-02-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subject`
--

CREATE TABLE `tb_subject` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `sub_term` tinyint(4) NOT NULL,
  `sub_code` int(20) NOT NULL,
  `sub_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sub_image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sub_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_practical` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_subject`
--

INSERT INTO `tb_subject` (`id`, `dept_id`, `cours_id`, `sub_term`, `sub_code`, `sub_name`, `sub_image`, `sub_description`, `is_practical`, `status`, `create_date`) VALUES
(1, 15, 1, 1, 101, 'Demo Subject', '', '', 1, 1, '2020-12-28 06:02:36'),
(2, 15, 2, 1, 101, 'English 1', '', '', 1, 1, '2020-12-29 01:02:12'),
(3, 15, 2, 1, 102, 'Mathematics 1', '', '', 1, 1, '2020-12-29 01:02:26'),
(4, 15, 2, 2, 201, 'English 2', '', '', 1, 1, '2020-12-29 01:02:40'),
(5, 15, 2, 2, 202, 'Mathematics 2', '', '', 1, 1, '2020-12-29 01:02:54'),
(6, 15, 2, 1, 103, 'Punjabi 1', '', '', 0, 1, '2020-12-29 01:03:16'),
(7, 15, 2, 2, 203, 'Punjabi 2', '', '', 0, 1, '2020-12-29 01:03:31'),
(8, 6, 3, 1, 101, 'FUNDAMANTEL', '', '', 0, 1, '2021-01-05 02:03:34'),
(9, 6, 3, 1, 102, 'COMPUTER APPLICATION', '', '', 1, 1, '2021-01-05 02:04:16'),
(10, 6, 3, 1, 103, 'MS OFFICE', '', '', 1, 1, '2021-01-05 02:05:33'),
(11, 6, 3, 1, 104, 'C++', '', '', 1, 1, '2021-01-05 02:05:54'),
(12, 6, 3, 1, 105, 'COREL DRAW', '', '', 1, 1, '2021-01-05 02:06:14'),
(13, 6, 3, 1, 106, 'PHOTO SHOP', '', '', 1, 1, '2021-01-05 02:06:34'),
(14, 15, 2, 1, 104, 'Fundamental', '', '&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.', 1, 1, '2021-01-07 05:17:06'),
(15, 15, 2, 1, 105, 'Computer Application', '', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.&lt;/p&gt;', 1, 1, '2021-01-07 05:17:46'),
(16, 15, 2, 1, 106, 'MS Office', '', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.&lt;/p&gt;', 1, 1, '2021-01-07 05:18:13'),
(17, 15, 2, 1, 107, 'Corel Draw', '', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.&lt;/p&gt;', 1, 1, '2021-01-07 05:18:47'),
(18, 15, 2, 1, 108, 'Adobe Photoshop', '', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.&lt;/p&gt;', 1, 1, '2021-01-07 05:19:24'),
(19, 12, 2, 1, 101, 'Abcd', '', '&lt;p&gt;Abcd Subject&lt;/p&gt;', 1, 1, '2023-02-16 11:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tot_marks`
--

CREATE TABLE `tb_tot_marks` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `exam_term` tinyint(4) NOT NULL,
  `st_id` int(11) NOT NULL,
  `grand_tot` int(11) NOT NULL,
  `max_marks` int(11) NOT NULL,
  `grand_grade` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_tot_marks`
--

INSERT INTO `tb_tot_marks` (`id`, `serial_no`, `exam_term`, `st_id`, `grand_tot`, `max_marks`, `grand_grade`, `result`, `qr`, `status`, `date`) VALUES
(1, '1', 1, 2, 702, 850, 'A', 'Pass', 'uploads/profile/qrcode/202012001.png', 0, '2021-01-07 05:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(90) NOT NULL,
  `user_type` tinyint(1) DEFAULT '0',
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `image` varchar(300) NOT NULL,
  `signature` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_type`, `username`, `password`, `image`, `signature`, `status`, `created_date`) VALUES
(1, 1, 'admin', '123456', '2927241_header-logo.png', '2172849_of_signature.png', 1, '2023-02-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchises_centre`
--
ALTER TABLE `franchises_centre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admit_card`
--
ALTER TABLE `tb_admit_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contactform`
--
ALTER TABLE `tb_contactform`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_marks_sheet`
--
ALTER TABLE `tb_marks_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_student`
--
ALTER TABLE `tb_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_subject`
--
ALTER TABLE `tb_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tot_marks`
--
ALTER TABLE `tb_tot_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;

--
-- AUTO_INCREMENT for table `franchises_centre`
--
ALTER TABLE `franchises_centre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_admit_card`
--
ALTER TABLE `tb_admit_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_contactform`
--
ALTER TABLE `tb_contactform`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_marks_sheet`
--
ALTER TABLE `tb_marks_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_student`
--
ALTER TABLE `tb_student`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_subject`
--
ALTER TABLE `tb_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_tot_marks`
--
ALTER TABLE `tb_tot_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
