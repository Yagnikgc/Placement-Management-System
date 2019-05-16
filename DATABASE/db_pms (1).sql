-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 09:13 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `image_text` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `image_text`) VALUES
(1, 'BMIIT LOGO.png', 'LOGO'),
(2, 'bg.jpg', 'bg'),
(3, 'womens%20day.jpg', ''),
(4, 'womens%20day.jpg', ''),
(5, 'IMG_8403.JPG', ''),
(6, '8.jpg', ''),
(7, 'BMIIT LOGO.png', ''),
(8, 'm  a  d.png', ''),
(9, 'change-avatar-image.zip', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_data`
--

CREATE TABLE `tbl_admin_data` (
  `admin_id` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `Email` tinytext NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` tinytext NOT NULL,
  `admin_image` text,
  `change_date` date NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_data`
--

INSERT INTO `tbl_admin_data` (`admin_id`, `f_name`, `l_name`, `Email`, `username`, `password`, `admin_image`, `change_date`, `status`) VALUES
(1, 'Bhumika', 'Patel', 'bhumika.patel@utu.ac.in', 'bhumikapatel', 'cb048193eb21b7d74aa9f838da4d30f7', 'avatar_1.jpg', '2018-03-26', 'deactive'),
(6, 'Bhumika', 'Patel', 'bhumika.patel@utu.ac.in', 'bhumikapatel', '09fa972f52dd79d543128c0e3898af3f', 'avatar_6.jpg', '2018-03-30', 'deactive'),
(7, 'Bhumika', 'Patel', 'bhumika.patel@utu.ac.in', 'bhumika_patel', '09fa972f52dd79d543128c0e3898af3f', 'avatar_7.jpg', '2018-03-30', 'deactive'),
(8, 'Bhumika', 'Patel', 'bhumika.patel@utu.ac.in', 'bhumika_patel', '0d4d981dcb4de47b8b2d4a40d56631e8', 'avatar_7.jpg', '2018-04-16', 'deactive'),
(9, 'Bhumika', 'Patel', 'bhumika.patel@utu.ac.in', 'bhumika_patel', '09fa972f52dd79d543128c0e3898af3f', 'avatar_7.jpg', '2018-04-16', 'deactive'),
(10, 'Bhumika', 'Patel', 'bhumika.patel@utu.ac.in', 'bhumika_patel', '09fa972f52dd79d543128c0e3898af3f', 'avatar_10.jpg', '2018-04-16', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_citylist`
--

CREATE TABLE `tbl_citylist` (
  `city_id` int(11) NOT NULL,
  `city_name` tinytext NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_citylist`
--

INSERT INTO `tbl_citylist` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'Port Blair', 1),
(2, 'Visakhapatnam', 2),
(3, 'Vijayawada', 2),
(4, 'Guntur', 2),
(5, 'Nellore', 2),
(6, 'Kurnool', 2),
(7, 'Rajahmundry', 2),
(8, 'Kakinada', 2),
(9, 'Tirupati', 2),
(10, 'Anantapur', 2),
(11, 'Kadapa', 2),
(12, 'Vizianagaram', 2),
(13, 'Eluru', 2),
(14, 'Ongole', 2),
(15, 'Nandyal', 2),
(16, 'Machilipatnam', 2),
(17, 'Adoni', 2),
(18, 'Tenali', 2),
(19, 'Chittoor', 2),
(20, 'Hindupur', 2),
(21, 'Proddatur', 2),
(22, 'Bhimavaram', 2),
(23, 'Madanapalle', 2),
(24, 'Guntakal', 2),
(25, 'Dharmavaram', 2),
(26, 'Gudivada', 2),
(27, 'Srikakulam', 2),
(28, 'Narasaraopet', 2),
(29, 'Rajampet', 2),
(30, 'Tadpatri', 2),
(31, 'Tadepalligudem', 2),
(32, 'Chilakaluripet', 2),
(33, 'Yemmiganur', 2),
(34, 'Kadiri', 2),
(35, 'Chirala', 2),
(36, 'Anakapalle', 2),
(37, 'Kavali', 2),
(38, 'Palacole', 2),
(39, 'Sullurpeta', 2),
(40, 'Tanuku', 2),
(41, 'Rayachoti', 2),
(42, 'Srikalahasti', 2),
(43, 'Bapatla', 2),
(44, 'Naidupet', 2),
(45, 'Nagari', 2),
(46, 'Gudur', 2),
(47, 'Vinukonda', 2),
(48, 'Narasapuram', 2),
(49, 'Nuzvid', 2),
(50, 'Markapur', 2),
(51, 'Ponnur', 2),
(52, 'Kandukur', 2),
(53, 'Bobbili', 2),
(54, 'Rayadurg', 2),
(55, 'Samalkot', 2),
(56, 'Jaggaiahpet', 2),
(57, 'Tuni', 2),
(58, 'Amalapuram', 2),
(59, 'Bheemunipatnam', 2),
(60, 'Venkatagiri', 2),
(61, 'Sattenapalle', 2),
(62, 'Pithapuram', 2),
(63, 'Palasa Kasibugga', 2),
(64, 'Parvathipuram', 2),
(65, 'Macherla', 2),
(66, 'Gooty', 2),
(67, 'Salur', 2),
(68, 'Mandapeta', 2),
(69, 'Jammalamadugu', 2),
(70, 'Peddapuram', 2),
(71, 'Punganur', 2),
(72, 'Nidadavole', 2),
(73, 'Repalle', 2),
(74, 'Ramachandrapuram', 2),
(75, 'Kovvur', 2),
(76, 'Tiruvuru', 2),
(77, 'Uravakonda', 2),
(78, 'Narsipatnam', 2),
(79, 'Yerraguntla', 2),
(80, 'Pedana', 2),
(81, 'Puttur', 2),
(82, 'Renigunta', 2),
(83, 'Rajam', 2),
(84, 'Srisailam Project (Right Flank Colony) Township', 2),
(85, 'Naharlagun', 3),
(86, 'Pasighat', 3),
(87, 'Guwahati', 4),
(88, 'Silchar', 4),
(89, 'Dibrugarh', 4),
(90, 'Nagaon', 4),
(91, 'Tinsukia', 4),
(92, 'Jorhat', 4),
(93, 'Bongaigaon City', 4),
(94, 'Dhubri', 4),
(95, 'Diphu', 4),
(96, 'North Lakhimpur', 4),
(97, 'Tezpur', 4),
(98, 'Karimganj', 4),
(99, 'Sibsagar', 4),
(100, 'Goalpara', 4),
(101, 'Barpeta', 4),
(102, 'Lanka', 4),
(103, 'Lumding', 4),
(104, 'Mankachar', 4),
(105, 'Nalbari', 4),
(106, 'Rangia', 4),
(107, 'Margherita', 4),
(108, 'Mangaldoi', 4),
(109, 'Silapathar', 4),
(110, 'Mariani', 4),
(111, 'Marigaon', 4),
(112, 'Patna', 5),
(113, 'Gaya', 5),
(114, 'Bhagalpur', 5),
(115, 'Muzaffarpur', 5),
(116, 'Darbhanga', 5),
(117, 'Arrah', 5),
(118, 'Begusarai', 5),
(119, 'Chhapra', 5),
(120, 'Katihar', 5),
(121, 'Munger', 5),
(122, 'Purnia', 5),
(123, 'Saharsa', 5),
(124, 'Sasaram', 5),
(125, 'Hajipur', 5),
(126, 'Dehri-on-Sone', 5),
(127, 'Bettiah', 5),
(128, 'Motihari', 5),
(129, 'Bagaha', 5),
(130, 'Siwan', 5),
(131, 'Kishanganj', 5),
(132, 'Jamalpur', 5),
(133, 'Buxar', 5),
(134, 'Jehanabad', 5),
(135, 'Aurangabad', 5),
(136, 'Lakhisarai', 5),
(137, 'Nawada', 5),
(138, 'Jamui', 5),
(139, 'Sitamarhi', 5),
(140, 'Araria', 5),
(141, 'Gopalganj', 5),
(142, 'Madhubani', 5),
(143, 'Masaurhi', 5),
(144, 'Samastipur', 5),
(145, 'Mokameh', 5),
(146, 'Supaul', 5),
(147, 'Dumraon', 5),
(148, 'Arwal', 5),
(149, 'Forbesganj', 5),
(150, 'BhabUrban Agglomeration', 5),
(151, 'Narkatiaganj', 5),
(152, 'Naugachhia', 5),
(153, 'Madhepura', 5),
(154, 'Sheikhpura', 5),
(155, 'Sultanganj', 5),
(156, 'Raxaul Bazar', 5),
(157, 'Ramnagar', 5),
(158, 'Mahnar Bazar', 5),
(159, 'Warisaliganj', 5),
(160, 'Revelganj', 5),
(161, 'Rajgir', 5),
(162, 'Sonepur', 5),
(163, 'Sherghati', 5),
(164, 'Sugauli', 5),
(165, 'Makhdumpur', 5),
(166, 'Maner', 5),
(167, 'Rosera', 5),
(168, 'Nokha', 5),
(169, 'Piro', 5),
(170, 'Rafiganj', 5),
(171, 'Marhaura', 5),
(172, 'Mirganj', 5),
(173, 'Lalganj', 5),
(174, 'Murliganj', 5),
(175, 'Motipur', 5),
(176, 'Manihari', 5),
(177, 'Sheohar', 5),
(178, 'Maharajganj', 5),
(179, 'Silao', 5),
(180, 'Barh', 5),
(181, 'Asarganj', 5),
(182, 'Chandigarh', 6),
(183, 'Raipur', 7),
(184, 'Bhilai Nagar', 7),
(185, 'Korba', 7),
(186, 'Bilaspur', 7),
(187, 'Durg', 7),
(188, 'Rajnandgaon', 7),
(189, 'Jagdalpur', 7),
(190, 'Raigarh', 7),
(191, 'Ambikapur', 7),
(192, 'Mahasamund', 7),
(193, 'Dhamtari', 7),
(194, 'Chirmiri', 7),
(195, 'Bhatapara', 7),
(196, 'Dalli-Rajhara', 7),
(197, 'Naila Janjgir', 7),
(198, 'Tilda Newra', 7),
(199, 'Mungeli', 7),
(200, 'Manendragarh', 7),
(201, 'Sakti', 7),
(202, 'Silvassa', 8),
(203, 'Delhi', 9),
(204, 'New Delhi', 9),
(205, 'Marmagao', 10),
(206, 'Panaji', 10),
(207, 'Margao', 10),
(208, 'Mapusa', 10),
(209, 'Ahmedabad', 11),
(210, 'Surat', 11),
(211, 'Vadodara', 11),
(212, 'Rajkot', 11),
(213, 'Bhavnagar', 11),
(214, 'Jamnagar', 11),
(215, 'Nadiad', 11),
(216, 'Porbandar', 11),
(217, 'Anand', 11),
(218, 'Morvi', 11),
(219, 'Mahesana', 11),
(220, 'Bharuch', 11),
(221, 'Bardoli', 11),
(222, 'Navsari', 11),
(223, 'Veraval', 11),
(224, 'Bhuj', 11),
(225, 'Godhra', 11),
(226, 'Palanpur', 11),
(227, 'Valsad', 11),
(228, 'Patan', 11),
(229, 'Deesa', 11),
(230, 'Amreli', 11),
(231, 'Anjar', 11),
(232, 'Dhoraji', 11),
(233, 'Khambhat', 11),
(234, 'Mahuva', 11),
(235, 'Keshod', 11),
(236, 'Wadhwan', 11),
(237, 'Ankleshwar', 11),
(238, 'Savarkundla', 11),
(239, 'Kadi', 11),
(240, 'Visnagar', 11),
(241, 'Upleta', 11),
(242, 'Una', 11),
(243, 'Sidhpur', 11),
(244, 'Unjha', 11),
(245, 'Mangrol', 11),
(246, 'Viramgam', 11),
(247, 'Modasa', 11),
(248, 'Palitana', 11),
(249, 'Petlad', 11),
(250, 'Kapadvanj', 11),
(251, 'Sihor', 11),
(252, 'Wankaner', 11),
(253, 'Limbdi', 11),
(254, 'Mandvi', 11),
(255, 'Thangadh', 11),
(256, 'Vyara', 11),
(257, 'Padra', 11),
(258, 'Lunawada', 11),
(259, 'Rajpipla', 11),
(260, 'Vapi', 11),
(261, 'Umreth', 11),
(262, 'Sanand', 11),
(263, 'Rajula', 11),
(264, 'Radhanpur', 11),
(265, 'Mahemdabad', 11),
(266, 'Ranavav', 11),
(267, 'Tharad', 11),
(268, 'Mansa', 11),
(269, 'Umbergaon', 11),
(270, 'Talaja', 11),
(271, 'Vadnagar', 11),
(272, 'Manavadar', 11),
(273, 'Salaya', 11),
(274, 'Vijapur', 11),
(275, 'Pardi', 11),
(276, 'Rapar', 11),
(277, 'Songadh', 11),
(278, 'Lathi', 11),
(279, 'Adalaj', 11),
(280, 'Chhapra', 11),
(281, 'Faridabad', 12),
(282, 'Gurgaon', 12),
(283, 'Hisar', 12),
(284, 'Rohtak', 12),
(285, 'Panipat', 12),
(286, 'Karnal', 12),
(287, 'Sonipat', 12),
(288, 'Yamunanagar', 12),
(289, 'Panchkula', 12),
(290, 'Bhiwani', 12),
(291, 'Bahadurgarh', 12),
(292, 'Jind', 12),
(293, 'Sirsa', 12),
(294, 'Thanesar', 12),
(295, 'Kaithal', 12),
(296, 'Palwal', 12),
(297, 'Rewari', 12),
(298, 'Hansi', 12),
(299, 'Narnaul', 12),
(300, 'Fatehabad', 12),
(301, 'Gohana', 12),
(302, 'Tohana', 12),
(303, 'Narwana', 12),
(304, 'Mandi Dabwali', 12),
(305, 'Charkhi Dadri', 12),
(306, 'Shahbad', 12),
(307, 'Pehowa', 12),
(308, 'Samalkha', 12),
(309, 'Pinjore', 12),
(310, 'Ladwa', 12),
(311, 'Sohna', 12),
(312, 'Safidon', 12),
(313, 'Taraori', 12),
(314, 'Mahendragarh', 12),
(315, 'Ratia', 12),
(316, 'Rania', 12),
(317, 'Sarsod', 12),
(318, 'Shimla', 13),
(319, 'Mandi', 13),
(320, 'Solan', 13),
(321, 'Nahan', 13),
(322, 'Sundarnagar', 13),
(323, 'Palampur', 13),
(324, 'Srinagar', 14),
(325, 'Jammu', 14),
(326, 'Baramula', 14),
(327, 'Anantnag', 14),
(328, 'Sopore', 14),
(329, 'KathUrban Agglomeration', 14),
(330, 'Rajauri', 14),
(331, 'Punch', 14),
(332, 'Udhampur', 14),
(333, 'Dhanbad', 15),
(334, 'Ranchi', 15),
(335, 'Jamshedpur', 15),
(336, 'Bokaro Steel City', 15),
(337, 'Deoghar', 15),
(338, 'Phusro', 15),
(339, 'Adityapur', 15),
(340, 'Hazaribag', 15),
(341, 'Giridih', 15),
(342, 'Ramgarh', 15),
(343, 'Jhumri Tilaiya', 15),
(344, 'Saunda', 15),
(345, 'Sahibganj', 15),
(346, 'Medininagar (Daltonganj)', 15),
(347, 'Chaibasa', 15),
(348, 'Chatra', 15),
(349, 'Gumia', 15),
(350, 'Dumka', 15),
(351, 'Madhupur', 15),
(352, 'Chirkunda', 15),
(353, 'Pakaur', 15),
(354, 'Simdega', 15),
(355, 'Musabani', 15),
(356, 'Mihijam', 15),
(357, 'Patratu', 15),
(358, 'Lohardaga', 15),
(359, 'Tenu dam-cum-Kathhara', 15),
(360, 'Bengaluru', 16),
(361, 'Hubli-Dharwad', 16),
(362, 'Belagavi', 16),
(363, 'Mangaluru', 16),
(364, 'Davanagere', 16),
(365, 'Ballari', 16),
(366, 'Tumkur', 16),
(367, 'Shivamogga', 16),
(368, 'Raayachuru', 16),
(369, 'Robertson Pet', 16),
(370, 'Kolar', 16),
(371, 'Mandya', 16),
(372, 'Udupi', 16),
(373, 'Chikkamagaluru', 16),
(374, 'Karwar', 16),
(375, 'Ranebennuru', 16),
(376, 'Ranibennur', 16),
(377, 'Ramanagaram', 16),
(378, 'Gokak', 16),
(379, 'Yadgir', 16),
(380, 'Rabkavi Banhatti', 16),
(381, 'Shahabad', 16),
(382, 'Sirsi', 16),
(383, 'Sindhnur', 16),
(384, 'Tiptur', 16),
(385, 'Arsikere', 16),
(386, 'Nanjangud', 16),
(387, 'Sagara', 16),
(388, 'Sira', 16),
(389, 'Puttur', 16),
(390, 'Athni', 16),
(391, 'Mulbagal', 16),
(392, 'Surapura', 16),
(393, 'Siruguppa', 16),
(394, 'Mudhol', 16),
(395, 'Sidlaghatta', 16),
(396, 'Shahpur', 16),
(397, 'Saundatti-Yellamma', 16),
(398, 'Wadi', 16),
(399, 'Manvi', 16),
(400, 'Nelamangala', 16),
(401, 'Lakshmeshwar', 16),
(402, 'Ramdurg', 16),
(403, 'Nargund', 16),
(404, 'Tarikere', 16),
(405, 'Malavalli', 16),
(406, 'Savanur', 16),
(407, 'Lingsugur', 16),
(408, 'Vijayapura', 16),
(409, 'Sankeshwara', 16),
(410, 'Madikeri', 16),
(411, 'Talikota', 16),
(412, 'Sedam', 16),
(413, 'Shikaripur', 16),
(414, 'Mahalingapura', 16),
(415, 'Mudalagi', 16),
(416, 'Muddebihal', 16),
(417, 'Pavagada', 16),
(418, 'Malur', 16),
(419, 'Sindhagi', 16),
(420, 'Sanduru', 16),
(421, 'Afzalpur', 16),
(422, 'Maddur', 16),
(423, 'Madhugiri', 16),
(424, 'Tekkalakote', 16),
(425, 'Terdal', 16),
(426, 'Mudabidri', 16),
(427, 'Magadi', 16),
(428, 'Navalgund', 16),
(429, 'Shiggaon', 16),
(430, 'Shrirangapattana', 16),
(431, 'Sindagi', 16),
(432, 'Sakaleshapura', 16),
(433, 'Srinivaspur', 16),
(434, 'Ron', 16),
(435, 'Mundargi', 16),
(436, 'Sadalagi', 16),
(437, 'Piriyapatna', 16),
(438, 'Adyar', 16),
(439, 'Mysore', 16),
(440, 'Thiruvananthapuram', 17),
(441, 'Kochi', 17),
(442, 'Kozhikode', 17),
(443, 'Kollam', 17),
(444, 'Thrissur', 17),
(445, 'Palakkad', 17),
(446, 'Alappuzha', 17),
(447, 'Malappuram', 17),
(448, 'Ponnani', 17),
(449, 'Vatakara', 17),
(450, 'Kanhangad', 17),
(451, 'Taliparamba', 17),
(452, 'Koyilandy', 17),
(453, 'Neyyattinkara', 17),
(454, 'Kayamkulam', 17),
(455, 'Nedumangad', 17),
(456, 'Kannur', 17),
(457, 'Tirur', 17),
(458, 'Kottayam', 17),
(459, 'Kasaragod', 17),
(460, 'Kunnamkulam', 17),
(461, 'Ottappalam', 17),
(462, 'Thiruvalla', 17),
(463, 'Thodupuzha', 17),
(464, 'Chalakudy', 17),
(465, 'Changanassery', 17),
(466, 'Punalur', 17),
(467, 'Nilambur', 17),
(468, 'Cherthala', 17),
(469, 'Perinthalmanna', 17),
(470, 'Mattannur', 17),
(471, 'Shoranur', 17),
(472, 'Varkala', 17),
(473, 'Paravoor', 17),
(474, 'Pathanamthitta', 17),
(475, 'Peringathur', 17),
(476, 'Attingal', 17),
(477, 'Kodungallur', 17),
(478, 'Pappinisseri', 17),
(479, 'Chittur-Thathamangalam', 17),
(480, 'Muvattupuzha', 17),
(481, 'Adoor', 17),
(482, 'Mavelikkara', 17),
(483, 'Mavoor', 17),
(484, 'Perumbavoor', 17),
(485, 'Vaikom', 17),
(486, 'Palai', 17),
(487, 'Panniyannur', 17),
(488, 'Guruvayoor', 17),
(489, 'Puthuppally', 17),
(490, 'Panamattom', 17),
(491, 'Indore', 18),
(492, 'Bhopal', 18),
(493, 'Jabalpur', 18),
(494, 'Gwalior', 18),
(495, 'Ujjain', 18),
(496, 'Sagar', 18),
(497, 'Ratlam', 18),
(498, 'Satna', 18),
(499, 'Murwara (Katni)', 18),
(500, 'Morena', 18),
(501, 'Singrauli', 18),
(502, 'Rewa', 18),
(503, 'Vidisha', 18),
(504, 'Ganjbasoda', 18),
(505, 'Shivpuri', 18),
(506, 'Mandsaur', 18),
(507, 'Neemuch', 18),
(508, 'Nagda', 18),
(509, 'Itarsi', 18),
(510, 'Sarni', 18),
(511, 'Sehore', 18),
(512, 'Mhow Cantonment', 18),
(513, 'Seoni', 18),
(514, 'Balaghat', 18),
(515, 'Ashok Nagar', 18),
(516, 'Tikamgarh', 18),
(517, 'Shahdol', 18),
(518, 'Pithampur', 18),
(519, 'Alirajpur', 18),
(520, 'Mandla', 18),
(521, 'Sheopur', 18),
(522, 'Shajapur', 18),
(523, 'Panna', 18),
(524, 'Raghogarh-Vijaypur', 18),
(525, 'Sendhwa', 18),
(526, 'Sidhi', 18),
(527, 'Pipariya', 18),
(528, 'Shujalpur', 18),
(529, 'Sironj', 18),
(530, 'Pandhurna', 18),
(531, 'Nowgong', 18),
(532, 'Mandideep', 18),
(533, 'Sihora', 18),
(534, 'Raisen', 18),
(535, 'Lahar', 18),
(536, 'Maihar', 18),
(537, 'Sanawad', 18),
(538, 'Sabalgarh', 18),
(539, 'Umaria', 18),
(540, 'Porsa', 18),
(541, 'Narsinghgarh', 18),
(542, 'Malaj Khand', 18),
(543, 'Sarangpur', 18),
(544, 'Mundi', 18),
(545, 'Nepanagar', 18),
(546, 'Pasan', 18),
(547, 'Mahidpur', 18),
(548, 'Seoni-Malwa', 18),
(549, 'Rehli', 18),
(550, 'Manawar', 18),
(551, 'Rahatgarh', 18),
(552, 'Panagar', 18),
(553, 'Wara Seoni', 18),
(554, 'Tarana', 18),
(555, 'Sausar', 18),
(556, 'Rajgarh', 18),
(557, 'Niwari', 18),
(558, 'Mauganj', 18),
(559, 'Manasa', 18),
(560, 'Nainpur', 18),
(561, 'Prithvipur', 18),
(562, 'Sohagpur', 18),
(563, 'Nowrozabad (Khodargama)', 18),
(564, 'Shamgarh', 18),
(565, 'Maharajpur', 18),
(566, 'Multai', 18),
(567, 'Pali', 18),
(568, 'Pachore', 18),
(569, 'Rau', 18),
(570, 'Mhowgaon', 18),
(571, 'Vijaypur', 18),
(572, 'Narsinghgarh', 18),
(573, 'Mumbai', 19),
(574, 'Pune', 19),
(575, 'Nagpur', 19),
(576, 'Thane', 19),
(577, 'Nashik', 19),
(578, 'Kalyan-Dombivali', 19),
(579, 'Vasai-Virar', 19),
(580, 'Solapur', 19),
(581, 'Mira-Bhayandar', 19),
(582, 'Bhiwandi', 19),
(583, 'Amravati', 19),
(584, 'Nanded-Waghala', 19),
(585, 'Sangli', 19),
(586, 'Malegaon', 19),
(587, 'Akola', 19),
(588, 'Latur', 19),
(589, 'Dhule', 19),
(590, 'Ahmednagar', 19),
(591, 'Ichalkaranji', 19),
(592, 'Parbhani', 19),
(593, 'Panvel', 19),
(594, 'Yavatmal', 19),
(595, 'Achalpur', 19),
(596, 'Osmanabad', 19),
(597, 'Nandurbar', 19),
(598, 'Satara', 19),
(599, 'Wardha', 19),
(600, 'Udgir', 19),
(601, 'Aurangabad', 19),
(602, 'Amalner', 19),
(603, 'Akot', 19),
(604, 'Pandharpur', 19),
(605, 'Shrirampur', 19),
(606, 'Parli', 19),
(607, 'Washim', 19),
(608, 'Ambejogai', 19),
(609, 'Manmad', 19),
(610, 'Ratnagiri', 19),
(611, 'Uran Islampur', 19),
(612, 'Pusad', 19),
(613, 'Sangamner', 19),
(614, 'Shirpur-Warwade', 19),
(615, 'Malkapur', 19),
(616, 'Wani', 19),
(617, 'Lonavla', 19),
(618, 'Talegaon Dabhade', 19),
(619, 'Anjangaon', 19),
(620, 'Umred', 19),
(621, 'Palghar', 19),
(622, 'Shegaon', 19),
(623, 'Ozar', 19),
(624, 'Phaltan', 19),
(625, 'Yevla', 19),
(626, 'Shahade', 19),
(627, 'Vita', 19),
(628, 'Umarkhed', 19),
(629, 'Warora', 19),
(630, 'Pachora', 19),
(631, 'Tumsar', 19),
(632, 'Manjlegaon', 19),
(633, 'Sillod', 19),
(634, 'Arvi', 19),
(635, 'Nandura', 19),
(636, 'Vaijapur', 19),
(637, 'Wadgaon Road', 19),
(638, 'Sailu', 19),
(639, 'Murtijapur', 19),
(640, 'Tasgaon', 19),
(641, 'Mehkar', 19),
(642, 'Yawal', 19),
(643, 'Pulgaon', 19),
(644, 'Nilanga', 19),
(645, 'Wai', 19),
(646, 'Umarga', 19),
(647, 'Paithan', 19),
(648, 'Rahuri', 19),
(649, 'Nawapur', 19),
(650, 'Tuljapur', 19),
(651, 'Morshi', 19),
(652, 'Purna', 19),
(653, 'Satana', 19),
(654, 'Pathri', 19),
(655, 'Sinnar', 19),
(656, 'Uchgaon', 19),
(657, 'Uran', 19),
(658, 'Pen', 19),
(659, 'Karjat', 19),
(660, 'Manwath', 19),
(661, 'Partur', 19),
(662, 'Sangole', 19),
(663, 'Mangrulpir', 19),
(664, 'Risod', 19),
(665, 'Shirur', 19),
(666, 'Savner', 19),
(667, 'Sasvad', 19),
(668, 'Pandharkaoda', 19),
(669, 'Talode', 19),
(670, 'Shrigonda', 19),
(671, 'Shirdi', 19),
(672, 'Raver', 19),
(673, 'Mukhed', 19),
(674, 'Rajura', 19),
(675, 'Vadgaon Kasba', 19),
(676, 'Tirora', 19),
(677, 'Mahad', 19),
(678, 'Lonar', 19),
(679, 'Sawantwadi', 19),
(680, 'Pathardi', 19),
(681, 'Pauni', 19),
(682, 'Ramtek', 19),
(683, 'Mul', 19),
(684, 'Soyagaon', 19),
(685, 'Mangalvedhe', 19),
(686, 'Narkhed', 19),
(687, 'Shendurjana', 19),
(688, 'Patur', 19),
(689, 'Mhaswad', 19),
(690, 'Loha', 19),
(691, 'Nandgaon', 19),
(692, 'Warud', 19),
(693, 'Imphal', 20),
(694, 'Thoubal', 20),
(695, 'Lilong', 20),
(696, 'Mayang Imphal', 20),
(697, 'Shillong', 21),
(698, 'Tura', 21),
(699, 'Nongstoin', 21),
(700, 'Aizawl', 22),
(701, 'Lunglei', 22),
(702, 'Saiha', 22),
(703, 'Dimapur', 23),
(704, 'Kohima', 23),
(705, 'Zunheboto', 23),
(706, 'Tuensang', 23),
(707, 'Wokha', 23),
(708, 'Mokokchung', 23),
(709, 'Bhubaneswar', 24),
(710, 'Cuttack', 24),
(711, 'Raurkela', 24),
(712, 'Brahmapur', 24),
(713, 'Sambalpur', 24),
(714, 'Puri', 24),
(715, 'Baleshwar Town', 24),
(716, 'Baripada Town', 24),
(717, 'Bhadrak', 24),
(718, 'Balangir', 24),
(719, 'Jharsuguda', 24),
(720, 'Bargarh', 24),
(721, 'Paradip', 24),
(722, 'Bhawanipatna', 24),
(723, 'Dhenkanal', 24),
(724, 'Barbil', 24),
(725, 'Kendujhar', 24),
(726, 'Sunabeda', 24),
(727, 'Rayagada', 24),
(728, 'Jatani', 24),
(729, 'Byasanagar', 24),
(730, 'Kendrapara', 24),
(731, 'Rajagangapur', 24),
(732, 'Parlakhemundi', 24),
(733, 'Talcher', 24),
(734, 'Sundargarh', 24),
(735, 'Phulabani', 24),
(736, 'Pattamundai', 24),
(737, 'Titlagarh', 24),
(738, 'Nabarangapur', 24),
(739, 'Soro', 24),
(740, 'Malkangiri', 24),
(741, 'Rairangpur', 24),
(742, 'Tarbha', 24),
(743, 'Pondicherry', 25),
(744, 'Karaikal', 25),
(745, 'Yanam', 25),
(746, 'Mahe', 25),
(747, 'Ludhiana', 26),
(748, 'Patiala', 26),
(749, 'Amritsar', 26),
(750, 'Jalandhar', 26),
(751, 'Bathinda', 26),
(752, 'Pathankot', 26),
(753, 'Hoshiarpur', 26),
(754, 'Batala', 26),
(755, 'Moga', 26),
(756, 'Malerkotla', 26),
(757, 'Khanna', 26),
(758, 'Mohali', 26),
(759, 'Barnala', 26),
(760, 'Firozpur', 26),
(761, 'Phagwara', 26),
(762, 'Kapurthala', 26),
(763, 'Zirakpur', 26),
(764, 'Kot Kapura', 26),
(765, 'Faridkot', 26),
(766, 'Muktsar', 26),
(767, 'Rajpura', 26),
(768, 'Sangrur', 26),
(769, 'Fazilka', 26),
(770, 'Gurdaspur', 26),
(771, 'Kharar', 26),
(772, 'Gobindgarh', 26),
(773, 'Mansa', 26),
(774, 'Malout', 26),
(775, 'Nabha', 26),
(776, 'Tarn Taran', 26),
(777, 'Jagraon', 26),
(778, 'Sunam', 26),
(779, 'Dhuri', 26),
(780, 'Firozpur Cantt.', 26),
(781, 'Sirhind Fatehgarh Sahib', 26),
(782, 'Rupnagar', 26),
(783, 'Jalandhar Cantt.', 26),
(784, 'Samana', 26),
(785, 'Nawanshahr', 26),
(786, 'Rampura Phul', 26),
(787, 'Nangal', 26),
(788, 'Nakodar', 26),
(789, 'Zira', 26),
(790, 'Patti', 26),
(791, 'Raikot', 26),
(792, 'Longowal', 26),
(793, 'Urmar Tanda', 26),
(794, 'Morinda, India', 26),
(795, 'Phillaur', 26),
(796, 'Pattran', 26),
(797, 'Qadian', 26),
(798, 'Sujanpur', 26),
(799, 'Mukerian', 26),
(800, 'Talwara', 26),
(801, 'Jaipur', 27),
(802, 'Jodhpur', 27),
(803, 'Bikaner', 27),
(804, 'Udaipur', 27),
(805, 'Ajmer', 27),
(806, 'Bhilwara', 27),
(807, 'Alwar', 27),
(808, 'Bharatpur', 27),
(809, 'Pali', 27),
(810, 'Barmer', 27),
(811, 'Sikar', 27),
(812, 'Tonk', 27),
(813, 'Sadulpur', 27),
(814, 'Sawai Madhopur', 27),
(815, 'Nagaur', 27),
(816, 'Makrana', 27),
(817, 'Sujangarh', 27),
(818, 'Sardarshahar', 27),
(819, 'Ladnu', 27),
(820, 'Ratangarh', 27),
(821, 'Nokha', 27),
(822, 'Nimbahera', 27),
(823, 'Suratgarh', 27),
(824, 'Rajsamand', 27),
(825, 'Lachhmangarh', 27),
(826, 'Rajgarh (Churu)', 27),
(827, 'Nasirabad', 27),
(828, 'Nohar', 27),
(829, 'Phalodi', 27),
(830, 'Nathdwara', 27),
(831, 'Pilani', 27),
(832, 'Merta City', 27),
(833, 'Sojat', 27),
(834, 'Neem-Ka-Thana', 27),
(835, 'Sirohi', 27),
(836, 'Pratapgarh', 27),
(837, 'Rawatbhata', 27),
(838, 'Sangaria', 27),
(839, 'Lalsot', 27),
(840, 'Pilibanga', 27),
(841, 'Pipar City', 27),
(842, 'Taranagar', 27),
(843, 'Vijainagar, Ajmer', 27),
(844, 'Sumerpur', 27),
(845, 'Sagwara', 27),
(846, 'Ramganj Mandi', 27),
(847, 'Lakheri', 27),
(848, 'Udaipurwati', 27),
(849, 'Losal', 27),
(850, 'Sri Madhopur', 27),
(851, 'Ramngarh', 27),
(852, 'Rawatsar', 27),
(853, 'Rajakhera', 27),
(854, 'Shahpura', 27),
(855, 'Shahpura', 27),
(856, 'Raisinghnagar', 27),
(857, 'Malpura', 27),
(858, 'Nadbai', 27),
(859, 'Sanchore', 27),
(860, 'Nagar', 27),
(861, 'Rajgarh (Alwar)', 27),
(862, 'Sheoganj', 27),
(863, 'Sadri', 27),
(864, 'Todaraisingh', 27),
(865, 'Todabhim', 27),
(866, 'Reengus', 27),
(867, 'Rajaldesar', 27),
(868, 'Sadulshahar', 27),
(869, 'Sambhar', 27),
(870, 'Prantij', 27),
(871, 'Mount Abu', 27),
(872, 'Mangrol', 27),
(873, 'Phulera', 27),
(874, 'Mandawa', 27),
(875, 'Pindwara', 27),
(876, 'Mandalgarh', 27),
(877, 'Takhatgarh', 27),
(878, 'Chennai', 28),
(879, 'Coimbatore', 28),
(880, 'Madurai', 28),
(881, 'Tiruchirappalli', 28),
(882, 'Salem', 28),
(883, 'Tirunelveli', 28),
(884, 'Tiruppur', 28),
(885, 'Ranipet', 28),
(886, 'Nagercoil', 28),
(887, 'Thanjavur', 28),
(888, 'Vellore', 28),
(889, 'Kancheepuram', 28),
(890, 'Erode', 28),
(891, 'Tiruvannamalai', 28),
(892, 'Pollachi', 28),
(893, 'Rajapalayam', 28),
(894, 'Sivakasi', 28),
(895, 'Pudukkottai', 28),
(896, 'Neyveli (TS)', 28),
(897, 'Nagapattinam', 28),
(898, 'Viluppuram', 28),
(899, 'Tiruchengode', 28),
(900, 'Vaniyambadi', 28),
(901, 'Theni Allinagaram', 28),
(902, 'Udhagamandalam', 28),
(903, 'Aruppukkottai', 28),
(904, 'Paramakudi', 28),
(905, 'Arakkonam', 28),
(906, 'Virudhachalam', 28),
(907, 'Srivilliputhur', 28),
(908, 'Tindivanam', 28),
(909, 'Virudhunagar', 28),
(910, 'Karur', 28),
(911, 'Valparai', 28),
(912, 'Sankarankovil', 28),
(913, 'Tenkasi', 28),
(914, 'Palani', 28),
(915, 'Pattukkottai', 28),
(916, 'Tirupathur', 28),
(917, 'Ramanathapuram', 28),
(918, 'Udumalaipettai', 28),
(919, 'Gobichettipalayam', 28),
(920, 'Thiruvarur', 28),
(921, 'Thiruvallur', 28),
(922, 'Panruti', 28),
(923, 'Namakkal', 28),
(924, 'Thirumangalam', 28),
(925, 'Vikramasingapuram', 28),
(926, 'Nellikuppam', 28),
(927, 'Rasipuram', 28),
(928, 'Tiruttani', 28),
(929, 'Nandivaram-Guduvancheri', 28),
(930, 'Periyakulam', 28),
(931, 'Pernampattu', 28),
(932, 'Vellakoil', 28),
(933, 'Sivaganga', 28),
(934, 'Vadalur', 28),
(935, 'Rameshwaram', 28),
(936, 'Tiruvethipuram', 28),
(937, 'Perambalur', 28),
(938, 'Usilampatti', 28),
(939, 'Vedaranyam', 28),
(940, 'Sathyamangalam', 28),
(941, 'Puliyankudi', 28),
(942, 'Nanjikottai', 28),
(943, 'Thuraiyur', 28),
(944, 'Sirkali', 28),
(945, 'Tiruchendur', 28),
(946, 'Periyasemur', 28),
(947, 'Sattur', 28),
(948, 'Vandavasi', 28),
(949, 'Tharamangalam', 28),
(950, 'Tirukkoyilur', 28),
(951, 'Oddanchatram', 28),
(952, 'Palladam', 28),
(953, 'Vadakkuvalliyur', 28),
(954, 'Tirukalukundram', 28),
(955, 'Uthamapalayam', 28),
(956, 'Surandai', 28),
(957, 'Sankari', 28),
(958, 'Shenkottai', 28),
(959, 'Vadipatti', 28),
(960, 'Sholingur', 28),
(961, 'Tirupathur', 28),
(962, 'Manachanallur', 28),
(963, 'Viswanatham', 28),
(964, 'Polur', 28),
(965, 'Panagudi', 28),
(966, 'Uthiramerur', 28),
(967, 'Thiruthuraipoondi', 28),
(968, 'Pallapatti', 28),
(969, 'Ponneri', 28),
(970, 'Lalgudi', 28),
(971, 'Natham', 28),
(972, 'Unnamalaikadai', 28),
(973, 'P.N.Patti', 28),
(974, 'Tharangambadi', 28),
(975, 'Tittakudi', 28),
(976, 'Pacode', 28),
(977, 'O\' Valley', 28),
(978, 'Suriyampalayam', 28),
(979, 'Sholavandan', 28),
(980, 'Thammampatti', 28),
(981, 'Namagiripettai', 28),
(982, 'Peravurani', 28),
(983, 'Parangipettai', 28),
(984, 'Pudupattinam', 28),
(985, 'Pallikonda', 28),
(986, 'Sivagiri', 28),
(987, 'Punjaipugalur', 28),
(988, 'Padmanabhapuram', 28),
(989, 'Thirupuvanam', 28),
(990, 'Hyderabad', 29),
(991, 'Warangal', 29),
(992, 'Nizamabad', 29),
(993, 'Karimnagar', 29),
(994, 'Ramagundam', 29),
(995, 'Khammam', 29),
(996, 'Mahbubnagar', 29),
(997, 'Mancherial', 29),
(998, 'Adilabad', 29),
(999, 'Suryapet', 29),
(1000, 'Jagtial', 29),
(1001, 'Miryalaguda', 29),
(1002, 'Nirmal', 29),
(1003, 'Kamareddy', 29),
(1004, 'Kothagudem', 29),
(1005, 'Bodhan', 29),
(1006, 'Palwancha', 29),
(1007, 'Mandamarri', 29),
(1008, 'Koratla', 29),
(1009, 'Sircilla', 29),
(1010, 'Tandur', 29),
(1011, 'Siddipet', 29),
(1012, 'Wanaparthy', 29),
(1013, 'Kagaznagar', 29),
(1014, 'Gadwal', 29),
(1015, 'Sangareddy', 29),
(1016, 'Bellampalle', 29),
(1017, 'Bhongir', 29),
(1018, 'Vikarabad', 29),
(1019, 'Jangaon', 29),
(1020, 'Bhadrachalam', 29),
(1021, 'Bhainsa', 29),
(1022, 'Farooqnagar', 29),
(1023, 'Medak', 29),
(1024, 'Narayanpet', 29),
(1025, 'Sadasivpet', 29),
(1026, 'Yellandu', 29),
(1027, 'Manuguru', 29),
(1028, 'Kyathampalle', 29),
(1029, 'Nagarkurnool', 29),
(1030, 'Agartala', 30),
(1031, 'Udaipur', 30),
(1032, 'Dharmanagar', 30),
(1033, 'Pratapgarh', 30),
(1034, 'Kailasahar', 30),
(1035, 'Belonia', 30),
(1036, 'Khowai', 30),
(1037, 'Lucknow', 31),
(1038, 'Kanpur', 31),
(1039, 'Firozabad', 31),
(1040, 'Agra', 31),
(1041, 'Meerut', 31),
(1042, 'Varanasi', 31),
(1043, 'Allahabad', 31),
(1044, 'Amroha', 31),
(1045, 'Moradabad', 31),
(1046, 'Aligarh', 31),
(1047, 'Saharanpur', 31),
(1048, 'Noida', 31),
(1049, 'Loni', 31),
(1050, 'Jhansi', 31),
(1051, 'Shahjahanpur', 31),
(1052, 'Rampur', 31),
(1053, 'Modinagar', 31),
(1054, 'Hapur', 31),
(1055, 'Etawah', 31),
(1056, 'Sambhal', 31),
(1057, 'Orai', 31),
(1058, 'Bahraich', 31),
(1059, 'Unnao', 31),
(1060, 'Rae Bareli', 31),
(1061, 'Lakhimpur', 31),
(1062, 'Sitapur', 31),
(1063, 'Lalitpur', 31),
(1064, 'Pilibhit', 31),
(1065, 'Chandausi', 31),
(1066, 'Hardoi ', 31),
(1067, 'Azamgarh', 31),
(1068, 'Khair', 31),
(1069, 'Sultanpur', 31),
(1070, 'Tanda', 31),
(1071, 'Nagina', 31),
(1072, 'Shamli', 31),
(1073, 'Najibabad', 31),
(1074, 'Shikohabad', 31),
(1075, 'Sikandrabad', 31),
(1076, 'Shahabad, Hardoi', 31),
(1077, 'Pilkhuwa', 31),
(1078, 'Renukoot', 31),
(1079, 'Vrindavan', 31),
(1080, 'Ujhani', 31),
(1081, 'Laharpur', 31),
(1082, 'Tilhar', 31),
(1083, 'Sahaswan', 31),
(1084, 'Rath', 31),
(1085, 'Sherkot', 31),
(1086, 'Kalpi', 31),
(1087, 'Tundla', 31),
(1088, 'Sandila', 31),
(1089, 'Nanpara', 31),
(1090, 'Sardhana', 31),
(1091, 'Nehtaur', 31),
(1092, 'Seohara', 31),
(1093, 'Padrauna', 31),
(1094, 'Mathura', 31),
(1095, 'Thakurdwara', 31),
(1096, 'Nawabganj', 31),
(1097, 'Siana', 31),
(1098, 'Noorpur', 31),
(1099, 'Sikandra Rao', 31),
(1100, 'Puranpur', 31),
(1101, 'Rudauli', 31),
(1102, 'Thana Bhawan', 31),
(1103, 'Palia Kalan', 31),
(1104, 'Zaidpur', 31),
(1105, 'Nautanwa', 31),
(1106, 'Zamania', 31),
(1107, 'Shikarpur, Bulandshahr', 31),
(1108, 'Naugawan Sadat', 31),
(1109, 'Fatehpur Sikri', 31),
(1110, 'Shahabad, Rampur', 31),
(1111, 'Robertsganj', 31),
(1112, 'Utraula', 31),
(1113, 'Sadabad', 31),
(1114, 'Rasra', 31),
(1115, 'Lar', 31),
(1116, 'Lal Gopalganj Nindaura', 31),
(1117, 'Sirsaganj', 31),
(1118, 'Pihani', 31),
(1119, 'Shamsabad, Agra', 31),
(1120, 'Rudrapur', 31),
(1121, 'Soron', 31),
(1122, 'SUrban Agglomerationr', 31),
(1123, 'Samdhan', 31),
(1124, 'Sahjanwa', 31),
(1125, 'Rampur Maniharan', 31),
(1126, 'Sumerpur', 31),
(1127, 'Shahganj', 31),
(1128, 'Tulsipur', 31),
(1129, 'Tirwaganj', 31),
(1130, 'PurqUrban Agglomerationzi', 31),
(1131, 'Shamsabad, Farrukhabad', 31),
(1132, 'Warhapur', 31),
(1133, 'Powayan', 31),
(1134, 'Sandi', 31),
(1135, 'Achhnera', 31),
(1136, 'Naraura', 31),
(1137, 'Nakur', 31),
(1138, 'Sahaspur', 31),
(1139, 'Safipur', 31),
(1140, 'Reoti', 31),
(1141, 'Sikanderpur', 31),
(1142, 'Saidpur', 31),
(1143, 'Sirsi', 31),
(1144, 'Purwa', 31),
(1145, 'Parasi', 31),
(1146, 'Lalganj', 31),
(1147, 'Phulpur', 31),
(1148, 'Shishgarh', 31),
(1149, 'Sahawar', 31),
(1150, 'Samthar', 31),
(1151, 'Pukhrayan', 31),
(1152, 'Obra', 31),
(1153, 'Niwai', 31),
(1154, 'Dehradun', 32),
(1155, 'Hardwar', 32),
(1156, 'Haldwani-cum-Kathgodam', 32),
(1157, 'Srinagar', 32),
(1158, 'Kashipur', 32),
(1159, 'Roorkee', 32),
(1160, 'Rudrapur', 32),
(1161, 'Rishikesh', 32),
(1162, 'Ramnagar', 32),
(1163, 'Pithoragarh', 32),
(1164, 'Manglaur', 32),
(1165, 'Nainital', 32),
(1166, 'Mussoorie', 32),
(1167, 'Tehri', 32),
(1168, 'Pauri', 32),
(1169, 'Nagla', 32),
(1170, 'Sitarganj', 32),
(1171, 'Bageshwar', 32),
(1172, 'Kolkata', 33),
(1173, 'Siliguri', 33),
(1174, 'Asansol', 33),
(1175, 'Raghunathganj', 33),
(1176, 'Kharagpur', 33),
(1177, 'Naihati', 33),
(1178, 'English Bazar', 33),
(1179, 'Baharampur', 33),
(1180, 'Hugli-Chinsurah', 33),
(1181, 'Raiganj', 33),
(1182, 'Jalpaiguri', 33),
(1183, 'Santipur', 33),
(1184, 'Balurghat', 33),
(1185, 'Medinipur', 33),
(1186, 'Habra', 33),
(1187, 'Ranaghat', 33),
(1188, 'Bankura', 33),
(1189, 'Nabadwip', 33),
(1190, 'Darjiling', 33),
(1191, 'Purulia', 33),
(1192, 'Arambagh', 33),
(1193, 'Tamluk', 33),
(1194, 'AlipurdUrban Agglomerationr', 33),
(1195, 'Suri', 33),
(1196, 'Jhargram', 33),
(1197, 'Gangarampur', 33),
(1198, 'Rampurhat', 33),
(1199, 'Kalimpong', 33),
(1200, 'Sainthia', 33),
(1201, 'Taki', 33),
(1202, 'Murshidabad', 33),
(1203, 'Memari', 33),
(1204, 'Paschim Punropara', 33),
(1205, 'Tarakeswar', 33),
(1206, 'Sonamukhi', 33),
(1207, 'PandUrban Agglomeration', 33),
(1208, 'Mainaguri', 33),
(1209, 'Malda', 33),
(1210, 'Panchla', 33),
(1211, 'Raghunathpur', 33),
(1212, 'Mathabhanga', 33),
(1213, 'Monoharpur', 33),
(1214, 'Srirampore', 33),
(1215, 'Adra', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_data`
--

CREATE TABLE `tbl_company_data` (
  `comp_id` int(11) NOT NULL,
  `company_name` tinytext NOT NULL,
  `comp_reg_no` tinytext NOT NULL,
  `ceo_name` tinytext NOT NULL,
  `hr_name` tinytext NOT NULL,
  `comp_address` text NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `comp_mob_no` varchar(10) NOT NULL,
  `hr_mob_no` varchar(10) NOT NULL,
  `comp_mail_id` tinytext NOT NULL,
  `comp_website` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `hr_mail_id` tinytext NOT NULL,
  `comp_logo` text NOT NULL,
  `comp_status` varchar(10) NOT NULL,
  `comp_reg_date` date NOT NULL,
  `technology` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company_data`
--

INSERT INTO `tbl_company_data` (`comp_id`, `company_name`, `comp_reg_no`, `ceo_name`, `hr_name`, `comp_address`, `city`, `state`, `pincode`, `comp_mob_no`, `hr_mob_no`, `comp_mail_id`, `comp_website`, `password`, `hr_mail_id`, `comp_logo`, `comp_status`, `comp_reg_date`, `technology`) VALUES
(1, 'MY Solutions', 'dg-asha', 'yagnik', 'Madhav', 'Kamrej', 385, 16, '158756', '8634567890', '6734567890', 'yagnikchauhan96@gmail.com', 'https://www.hxh', '187634dc29603206b77861b209a7df81', 'mdh@shxs.nsj', '8bd232b1-9656-4e4f-b529-54ce670cc43f.jpg', 'Approved', '2018-03-28', 'IOS:MVC.NET:'),
(2, 'Softtech Infotech', 'jshg-djh-2548', 'MADHAV', 'MADHAV', 'Navsari', 210, 11, '687594', '9898989898', '9497659198', 'softtech@hotmail.com', 'https://a.cv', 'a79053ded1fdd78099fbf3bcda33f60d', 'softtech@hotmail.com', 'm  a  d.png', 'Approved', '2018-03-29', 'JAVA:JAVASCRIPT:PHP:'),
(3, 'D & I Infotech', 'd-I-7655-jhg', 'ISHA', 'VRUnd SHAH', 'asdiug', 86, 3, '475685', '7684958685', '9865574251', 'ishadesai1906@gmail.com', 'https://ss.cc', '751affcfcae53c3c0ff80220e1687ffd', 'di_infotech@gmail.com', 'DSC_0295-1.jpg', 'Approved', '2018-03-29', 'ANDROID:JAVA:JAVASCRIPT:'),
(4, 'Sutex Pvt. Ltd.', 'hkjhkj-hjhk', 'Mr. Parekh', 'Rajesh Joshi', 'Bangaluru', 230, 11, '395006', '9876543210', '3216549870', 'yagnikchauhan@outlook.com', 'http://www.xjgfg', '332fa6d8655ea8d234ec15460e04f61d', 'm@gmail.com', 'StMjItNTY4MzU3LWxvZ28teGJveF8zMTgtOTk3NS5qcGc=.jpg', 'Approved', '2018-04-03', 'ASP.NET:'),
(5, 'Infosys', '101248W/W-100022', 'Salil Parekh', 'Yagnik Chauhan', 'Ahmedabad', 210, 11, '394001', '9497989596', '9427970261', 'help-desk@infosys.com', 'https://www.infosys.com', 'MD5(Yagnik97)', 'yagnikchauhan@gmail.com', 'infosys.png', 'Approved', '2018-04-03', 'ANDROID:JAVA:PHP:'),
(6, 'madhav', '20202020sd', 'madhav', 'Yagnik', 'surat', 86, 3, '000000', '9825214040', '9429130840', 'madhavmansuriya40@gmail.com', 'https://www.ac', '3367a5a6ce203a8ce90e6e3150d54777', 'f201506100110128@gmail.com', 'businessman_318-72886.jpg', 'Approved', '2018-04-17', 'JAVASCRIPT:PHP:');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailbox`
--

CREATE TABLE `tbl_mailbox` (
  `id` int(11) NOT NULL,
  `send_to` text NOT NULL,
  `subject` text,
  `message` text,
  `sent_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_placements_data`
--

CREATE TABLE `tbl_placements_data` (
  `plsmnt_id` varchar(20) NOT NULL,
  `technology_plsmnt` tinytext NOT NULL,
  `min_stipent_amount` int(11) NOT NULL,
  `bond_period` int(11) NOT NULL,
  `num_required_students` int(11) NOT NULL,
  `placement_reg_close_date` date NOT NULL,
  `min_cgpa` double NOT NULL,
  `min_sgpa` double NOT NULL,
  `backlogs_allowed` int(11) NOT NULL,
  `num_of_rounds` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `placement_announcement_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_placements_data`
--

INSERT INTO `tbl_placements_data` (`plsmnt_id`, `technology_plsmnt`, `min_stipent_amount`, `bond_period`, `num_required_students`, `placement_reg_close_date`, `min_cgpa`, `min_sgpa`, `backlogs_allowed`, `num_of_rounds`, `comp_id`, `placement_announcement_date`, `status`) VALUES
('pls_1_2018-04-03_0', 'JAVASCRIPT', 5000, 15, 3, '2018-12-31', 7.5, 6.5, 2, 2, 1, '2018-04-03', 'Rejected'),
('pls_1_2018-04-03_1', 'JAVASCRIPT', 5000, 15, 3, '2018-12-31', 7.5, 6.5, 2, 2, 1, '2018-04-03', 'Rejected'),
('pls_1_2018-04-03_2', 'JAVASCRIPT', 5000, 15, 3, '2018-12-31', 7.5, 6.5, 2, 2, 1, '2018-04-03', 'Approved'),
('pls_1_2018-04-03_3', 'JAVASCRIPT', 5000, 15, 3, '2018-12-31', 7.5, 6.5, 2, 2, 1, '2018-04-03', 'Approved'),
('pls_6_2018-04-17_0', 'ASP.NET', 6000, 6, 5, '2018-04-20', 8, 8, 0, 1, 6, '2018-04-17', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_placement_rounds_data`
--

CREATE TABLE `tbl_placement_rounds_data` (
  `round_id` int(11) NOT NULL,
  `placement_id` varchar(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  `round_number` varchar(7) NOT NULL,
  `round_name` tinytext NOT NULL,
  `round_description` tinytext NOT NULL,
  `round_date` date NOT NULL,
  `round_weighted` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_placement_rounds_data`
--

INSERT INTO `tbl_placement_rounds_data` (`round_id`, `placement_id`, `company_id`, `round_number`, `round_name`, `round_description`, `round_date`, `round_weighted`, `status`) VALUES
(7, 'pls_1_2018-04-03_2', 1, 'Round 1', 'Quize', 'MCQs', '2018-12-31', 40, 'Completed'),
(8, 'pls_1_2018-04-03_2', 1, 'Round 2', 'Interview', 'One to One', '2018-12-31', 60, 'Completed'),
(9, 'pls_1_2018-04-03_3', 1, 'Round 1', 'Quize', 'MCQs', '2018-12-31', 40, 'Declared'),
(10, 'pls_1_2018-04-03_3', 1, 'Round 2', 'Interview', 'One to One', '2018-12-31', 60, 'Declared'),
(11, 'pls_6_2018-04-17_0', 6, 'Round 1', 'Interview', 'Nil', '2018-04-18', 20, 'Declared');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_placement_rounds_summary_data`
--

CREATE TABLE `tbl_placement_rounds_summary_data` (
  `record_id` int(11) NOT NULL,
  `Round_id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `Marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_placement_rounds_summary_data`
--

INSERT INTO `tbl_placement_rounds_summary_data` (`record_id`, `Round_id`, `Student_id`, `Marks`) VALUES
(2, 11, 1, 18),
(3, 11, 1, 18),
(12, 7, 12, 38),
(13, 7, 1, 34),
(14, 8, 12, 30),
(15, 8, 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`) VALUES
(1, 'Andaman and Nicobar Islands'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli'),
(9, 'Delhi'),
(10, 'Goa'),
(11, 'Gujarat'),
(12, 'Haryana'),
(13, 'Himachal Pradesh'),
(14, 'Jammu and Kashmir'),
(15, 'Jharkhand'),
(16, 'Karnataka'),
(17, 'Kerala'),
(18, 'Madhya Pradesh'),
(19, 'Maharashtra'),
(20, 'Manipur'),
(21, 'Meghalaya'),
(22, 'Mizoram'),
(23, 'Nagaland'),
(24, 'Odisha'),
(25, 'Puducherry'),
(26, 'Punjab'),
(27, 'Rajasthan'),
(28, 'Tamil Nadu'),
(29, 'Telangana'),
(30, 'Tripura'),
(31, 'Uttar Pradesh'),
(32, 'Uttarakhand'),
(33, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentdata`
--

CREATE TABLE `tbl_studentdata` (
  `stud_id` int(11) NOT NULL,
  `enroll_num` varchar(15) NOT NULL,
  `password` tinytext NOT NULL,
  `stud_name` text NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email_id` tinytext NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `want_placement` varchar(3) NOT NULL,
  `technology_or_reason` text NOT NULL,
  `intrested_city` int(11) NOT NULL,
  `ssc_per` double NOT NULL,
  `hsc_per` double NOT NULL,
  `cgpa_bachelor` double NOT NULL,
  `sgpa_last_sem` double NOT NULL,
  `kts_till_now` int(11) NOT NULL,
  `stud_image` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `stud_reg_date` date NOT NULL,
  `offer_letter` text,
  `stipend_letter` text,
  `confirmation_letter` tinytext,
  `joining_letter` tinytext,
  `progress_report` tinytext,
  `log_book` tinytext,
  `bond_or_aggrement_letter` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentdata`
--

INSERT INTO `tbl_studentdata` (`stud_id`, `enroll_num`, `password`, `stud_name`, `birth_date`, `mobile`, `email_id`, `address`, `pincode`, `city`, `state`, `want_placement`, `technology_or_reason`, `intrested_city`, `ssc_per`, `hsc_per`, `cgpa_bachelor`, `sgpa_last_sem`, `kts_till_now`, `stud_image`, `status`, `stud_reg_date`, `offer_letter`, `stipend_letter`, `confirmation_letter`, `joining_letter`, `progress_report`, `log_book`, `bond_or_aggrement_letter`) VALUES
(1, '201506100110098', 'c69b3c7fe274729bf9528ae4c809631a', 'Isha Riteshbhai Desai', '1998-01-19', '8490056401', 'ishadesai1906@gmail.com', '203,Dolly com.,katargam', '395004', 210, 11, 'Yes', 'PHP:', 2, 74, 86, 7.86, 9, 0, 'DSC01227.JPG', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '201506100110108', '3854ee949eab2460fb590259ccd834bc', 'Vrund Bhupendrakumar Shah', '2018-04-01', '9428643041', 'vrundshah7490@gmail.com', '129,khodiyarkrupa soc. katargam', '395004', 210, 11, 'Yes', 'PHP:', 2, 77, 83.71, 7.71, 8.23, 0, 'Snapchat-889239189.jpg', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '201506100110122', 'e08705ae9a72c0e44f6fe6ef07b7c85f', 'Yagnik Gordhanbhai Chauhan', '1997-12-01', '9427970261', 'F201506100110122@gmail.com', '5,Ishwarnagar Society,opp. Shyamdham Temple, Kamrej Road, Sarthana, Surat.', '395006', 210, 11, 'Yes', 'ASP.NET:IOS:', 3, 73, 85, 8.75, 9.5, 0, '2558.jpg', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '201506100110129', '13f81ddc35c26bcf2dc4307a23988f53', 'Pinal Sureshbhai Kankotiya', '1997-09-30', '9898380591', 'f201506100110129@gmail.com', '11-B vaikunthdham surat', '395004', 210, 11, 'Yes', 'JAVA:', 2, 81, 71, 10, 10, 0, 'Snapchat-2086468087.jpg', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '201506100110105', '51bb06f382237080da1c484c09252e1f', 'Trupti Maheshbhai Rokad', '1998-03-18', '7201815260', 'nishurokad18034102@gmail.com', 'Vrajvhumi row-house,surat.', '394101', 210, 11, 'Yes', 'PHP:', 2, 72, 87.57, 8, 8, 0, 'deepika.jpg', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '201506100110138', '5b73968dbb77f9a66fdea6a6899ff9c4', 'Jay Hiteshkumar Gandhi', '1998-04-20', '9033344995', 'f201506100110138@gmail.com', 'Soniwad,Chikhli', '396521', 222, 11, 'Yes', 'ASP.NET:MVC.NET:PHP:', 3, 12, 12, 3, 4, 0, 's.png', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '201506100110136', '775c158cd0f1e42d7ba7c3a056bb7e6f', 'Foram AshishKumar Gandhi', '1997-08-15', '9727633800', 'f201506100110136@gmail.com', 'Soniwad', '396521', 222, 11, 'Yes', 'PHP:', 3, 75, 60, 6, 6, 0, 'Bil.png', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '201201212125412', 'd3774b53f6f5aea0d46fdd61412c1c14', 'Manish HareshBhai Vala', '1989-08-04', '9998816019', 'manish.vala@utu.ac.in', 'Bardoli', '394601', 210, 11, 'No', 'I don\'t want from college', 3, 65, 85, 7.6, 8.4, 0, 'Manish Vala.jpg', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '201506100110124', 'a6e495e06f8aa64c052a4ce90452a9a2', 'Jaymin Narendrabhai Limbachiya', '1998-08-02', '8320341080', 'limbachiya.jaymin26@gmail.com', '272,Sardar Patel Soc, Dabholi Road,Surat', '395004', 210, 11, 'Yes', 'PHP:', 2, 78, 75, 9, 9, 0, 'IMG_20170913_232654_72.jpg', 'Registered', '2018-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '201106100110038', 'fb492154b3fdad526b2750dc54eb0b91', 'vipul virsingbhai gamit', '1994-08-16', '9662764397', 'vipul.gamit@utu.ac.in', 'bardoli', '394601', 210, 11, 'Yes', 'PHP:', 2, 70, 71, 6.5, 7.4, 0, 'vipulgamit_pic.jpg', 'Registered', '2018-03-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '201506100110092', 'b4480e9e08bb3c96a770e79d72934eef', 'shivani hasmukhbhai mistry', '1998-05-09', '7046820641', 'f201506100110092@gmail.com', '252,dev', '395005', 210, 11, 'Yes', 'ASP.NET:', 3, 79, 82, 7.82, 8.82, 0, 'Snapchat-10755858.jpg', 'Registered', '2018-03-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '201506100110128', '7fb9fd4e2593ebe7fe7ef8564d9b6cdf', 'Madhav Prafulbhai Mansuriya', '2016-07-06', '9429130840', 'f201506100110128@gmail.com', 'A-401 Shivanjli dreams', '000000', 210, 11, 'Yes', 'JAVA:JAVASCRIPT:PHP:', 1, 75, 65, 8.84, 8.94, 0, 'FBuP.jpg', 'Registered', '2018-03-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '201506100110078', '390b7507550891b8c71ec151a3944f01', 'Swarupa Prafulbhai Mayani', '1998-12-31', '8155823599', 'swarupamayani@gmail.com', 'Surat', '395006', 210, 11, 'Yes', 'ANDROID:PHP:', 2, 82, 88, 8, 8.11, 0, 'IMG_0190.JPG', 'Registered', '2018-03-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_applied_plsmnt`
--

CREATE TABLE `tbl_student_applied_plsmnt` (
  `stud_applied_plasmnt_id` int(11) NOT NULL,
  `plsment_id` varchar(20) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_applied_plsmnt`
--

INSERT INTO `tbl_student_applied_plsmnt` (`stud_applied_plasmnt_id`, `plsment_id`, `student_id`, `status`) VALUES
(1, 'pls_1_2018-04-03_2', 12, 'Applied'),
(2, 'pls_1_2018-04-03_0', 12, 'Applied'),
(3, 'pls_6_2018-04-17_0', 1, 'Applied'),
(4, 'pls_1_2018-04-03_3', 1, 'Applied'),
(5, 'pls_1_2018-04-03_2', 1, 'Applied'),
(6, 'pls_1_2018-04-03_2', 3, 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_technology`
--

CREATE TABLE `tbl_technology` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_technology`
--

INSERT INTO `tbl_technology` (`id`, `name`, `status`) VALUES
(1, 'PHP', 'active'),
(2, 'ASP.NET', 'active'),
(3, 'MVC.NET', 'active'),
(4, 'JAVA', 'active'),
(5, 'ANDROID', 'active'),
(6, 'IOS', 'active'),
(7, 'JAVASCRIPT', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_data`
--
ALTER TABLE `tbl_admin_data`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_citylist`
--
ALTER TABLE `tbl_citylist`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `tbl_company_data`
--
ALTER TABLE `tbl_company_data`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `city` (`city`),
  ADD KEY `state` (`state`);

--
-- Indexes for table `tbl_mailbox`
--
ALTER TABLE `tbl_mailbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_placements_data`
--
ALTER TABLE `tbl_placements_data`
  ADD PRIMARY KEY (`plsmnt_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `tbl_placement_rounds_data`
--
ALTER TABLE `tbl_placement_rounds_data`
  ADD PRIMARY KEY (`round_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `placement_id` (`placement_id`);

--
-- Indexes for table `tbl_placement_rounds_summary_data`
--
ALTER TABLE `tbl_placement_rounds_summary_data`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `Round_id` (`Round_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_studentdata`
--
ALTER TABLE `tbl_studentdata`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `city` (`city`),
  ADD KEY `state` (`state`);

--
-- Indexes for table `tbl_student_applied_plsmnt`
--
ALTER TABLE `tbl_student_applied_plsmnt`
  ADD PRIMARY KEY (`stud_applied_plasmnt_id`),
  ADD KEY `plsment_id` (`plsment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_technology`
--
ALTER TABLE `tbl_technology`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_admin_data`
--
ALTER TABLE `tbl_admin_data`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_company_data`
--
ALTER TABLE `tbl_company_data`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_mailbox`
--
ALTER TABLE `tbl_mailbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_placement_rounds_data`
--
ALTER TABLE `tbl_placement_rounds_data`
  MODIFY `round_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_placement_rounds_summary_data`
--
ALTER TABLE `tbl_placement_rounds_summary_data`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_studentdata`
--
ALTER TABLE `tbl_studentdata`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_student_applied_plsmnt`
--
ALTER TABLE `tbl_student_applied_plsmnt`
  MODIFY `stud_applied_plasmnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_technology`
--
ALTER TABLE `tbl_technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_citylist`
--
ALTER TABLE `tbl_citylist`
  ADD CONSTRAINT `tbl_citylist_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `tbl_state` (`state_id`);

--
-- Constraints for table `tbl_company_data`
--
ALTER TABLE `tbl_company_data`
  ADD CONSTRAINT `tbl_company_data_ibfk_1` FOREIGN KEY (`city`) REFERENCES `tbl_citylist` (`city_id`),
  ADD CONSTRAINT `tbl_company_data_ibfk_2` FOREIGN KEY (`state`) REFERENCES `tbl_state` (`state_id`);

--
-- Constraints for table `tbl_placements_data`
--
ALTER TABLE `tbl_placements_data`
  ADD CONSTRAINT `tbl_placements_data_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `tbl_company_data` (`comp_id`);

--
-- Constraints for table `tbl_placement_rounds_data`
--
ALTER TABLE `tbl_placement_rounds_data`
  ADD CONSTRAINT `tbl_placement_rounds_data_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `tbl_company_data` (`comp_id`),
  ADD CONSTRAINT `tbl_placement_rounds_data_ibfk_3` FOREIGN KEY (`placement_id`) REFERENCES `tbl_placements_data` (`plsmnt_id`);

--
-- Constraints for table `tbl_placement_rounds_summary_data`
--
ALTER TABLE `tbl_placement_rounds_summary_data`
  ADD CONSTRAINT `tbl_placement_rounds_summary_data_ibfk_1` FOREIGN KEY (`Round_id`) REFERENCES `tbl_placement_rounds_data` (`round_id`);

--
-- Constraints for table `tbl_studentdata`
--
ALTER TABLE `tbl_studentdata`
  ADD CONSTRAINT `tbl_studentdata_ibfk_1` FOREIGN KEY (`city`) REFERENCES `tbl_citylist` (`city_id`),
  ADD CONSTRAINT `tbl_studentdata_ibfk_2` FOREIGN KEY (`state`) REFERENCES `tbl_state` (`state_id`);

--
-- Constraints for table `tbl_student_applied_plsmnt`
--
ALTER TABLE `tbl_student_applied_plsmnt`
  ADD CONSTRAINT `tbl_student_applied_plsmnt_ibfk_1` FOREIGN KEY (`plsment_id`) REFERENCES `tbl_placements_data` (`plsmnt_id`),
  ADD CONSTRAINT `tbl_student_applied_plsmnt_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `tbl_studentdata` (`stud_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
