-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2024 a las 08:26:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `revelos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `celular_cliente` varchar(10) NOT NULL,
  `correo_cliente` varchar(50) NOT NULL,
  `departamento_cliente` varchar(25) NOT NULL,
  `ciudad_cliente` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `celular_cliente`, `correo_cliente`, `departamento_cliente`, `ciudad_cliente`) VALUES
(1, 'CRISTIAN CAMILO Alejandra Muñoz', '3245894268', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Antioquia', 'MEDELLIN'),
(2, 'soy cliente Alejandra Muñoz', '1', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Amazonas', 'LETICIA'),
(3, 'prueba prueba', '1415141415', 'contacto@caballosrevelo.com', 'Meta', 'VILLAVICENCIO'),
(4, 'prueba pruebas', '4545454454', 'contacto@caballosrevelo.com', 'Vichada', 'PUERTO CARREÑO'),
(5, 'asdasdas dasdasdasd', '121212121', 'contacto@caballosrevelo.com', 'Huila', 'ELIAS'),
(6, 'pruebas pruebas', '123456789', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Amazonas', 'LETICIA'),
(7, 'pruebas pruebas', '3245894264', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Antioquia', 'MEDELLIN'),
(9, 'pruebas2 pruebas2', '1212121212', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Amazonas', 'LETICIA'),
(11, 'prueba pw', '000000000', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Antioquia', 'MEDELLIN'),
(12, 'forando', '3118080314', 'contacto@caballosrevelo.com', 'Antioquia', 'MEDELLIN'),
(13, 'nuevo cliente', '911', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Arauca', 'ARAUCA'),
(14, 'probando', '2222222222', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Arauca', 'ARAUCA'),
(15, '2 2', '2', '2@gmail.com', 'Amazonas', 'LETICIA'),
(16, 'Carlos Rodriguez', '3167434721', 'ceduardorodriguez@hotmail.com', 'Cundinamarca', 'BOGOTA DC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeros_disponibles`
--

CREATE TABLE `numeros_disponibles` (
  `id_numero_disponible` int(11) NOT NULL,
  `numero_disponible` varchar(3) NOT NULL,
  `vendido` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `numeros_disponibles`
--

INSERT INTO `numeros_disponibles` (`id_numero_disponible`, `numero_disponible`, `vendido`) VALUES
(1, '000', 'x'),
(2, '001', 'x'),
(3, '002', 'x'),
(4, '003', 'x'),
(5, '004', 'x'),
(6, '005', 'x'),
(7, '006', 'x'),
(8, '007', 'x'),
(9, '008', 'x'),
(10, '009', 'x'),
(11, '010', 'x'),
(12, '011', 'x'),
(13, '012', 'x'),
(14, '013', 'x'),
(15, '014', 'x'),
(16, '015', 'x'),
(17, '016', 'x'),
(18, '017', 'x'),
(19, '018', 'x'),
(20, '019', 'x'),
(21, '020', 'x'),
(22, '021', 'x'),
(23, '022', 'x'),
(24, '023', 'x'),
(25, '024', 'x'),
(26, '025', 'x'),
(27, '026', 'x'),
(28, '027', 'x'),
(29, '028', 'x'),
(30, '029', 'x'),
(31, '030', 'x'),
(32, '031', 'x'),
(33, '032', 'x'),
(34, '033', 'x'),
(35, '034', 'x'),
(36, '035', 'x'),
(37, '036', 'x'),
(38, '037', 'x'),
(39, '038', 'x'),
(40, '039', 'x'),
(41, '040', 'x'),
(42, '041', 'x'),
(43, '042', 'x'),
(44, '043', 'x'),
(45, '044', 'x'),
(46, '045', 'x'),
(47, '046', 'x'),
(48, '047', 'x'),
(49, '048', 'x'),
(50, '049', 'x'),
(51, '050', 'x'),
(52, '051', 'x'),
(53, '052', 'x'),
(54, '053', 'x'),
(55, '054', 'x'),
(56, '055', 'x'),
(57, '056', 'x'),
(58, '057', 'x'),
(59, '058', 'x'),
(60, '059', 'x'),
(61, '060', 'x'),
(62, '061', 'x'),
(63, '062', 'x'),
(64, '063', 'x'),
(65, '064', 'x'),
(66, '065', 'x'),
(67, '066', 'x'),
(68, '067', 'x'),
(69, '068', 'x'),
(70, '069', ''),
(71, '070', ''),
(72, '071', ''),
(73, '072', ''),
(74, '073', ''),
(75, '074', ''),
(76, '075', ''),
(77, '076', ''),
(78, '077', ''),
(79, '078', ''),
(80, '079', ''),
(81, '080', ''),
(82, '081', ''),
(83, '082', ''),
(84, '083', ''),
(85, '084', ''),
(86, '085', ''),
(87, '086', ''),
(88, '087', ''),
(89, '088', ''),
(90, '089', ''),
(91, '090', ''),
(92, '091', ''),
(93, '092', ''),
(94, '093', ''),
(95, '094', 'x'),
(96, '095', 'x'),
(97, '096', 'x'),
(98, '097', 'x'),
(99, '098', ''),
(100, '099', ''),
(101, '100', ''),
(102, '101', ''),
(103, '102', ''),
(104, '103', ''),
(105, '104', ''),
(106, '105', 'x'),
(107, '106', ''),
(108, '107', ''),
(109, '108', ''),
(110, '109', ''),
(111, '110', ''),
(112, '111', ''),
(113, '112', ''),
(114, '113', ''),
(115, '114', ''),
(116, '115', ''),
(117, '116', ''),
(118, '117', ''),
(119, '118', ''),
(120, '119', ''),
(121, '120', ''),
(122, '121', ''),
(123, '122', ''),
(124, '123', ''),
(125, '124', ''),
(126, '125', ''),
(127, '126', ''),
(128, '127', ''),
(129, '128', ''),
(130, '129', ''),
(131, '130', ''),
(132, '131', ''),
(133, '132', ''),
(134, '133', ''),
(135, '134', ''),
(136, '135', ''),
(137, '136', ''),
(138, '137', ''),
(139, '138', ''),
(140, '139', ''),
(141, '140', ''),
(142, '141', ''),
(143, '142', ''),
(144, '143', ''),
(145, '144', ''),
(146, '145', ''),
(147, '146', ''),
(148, '147', ''),
(149, '148', ''),
(150, '149', ''),
(151, '150', ''),
(152, '151', ''),
(153, '152', ''),
(154, '153', ''),
(155, '154', ''),
(156, '155', ''),
(157, '156', ''),
(158, '157', ''),
(159, '158', ''),
(160, '159', ''),
(161, '160', ''),
(162, '161', ''),
(163, '162', ''),
(164, '163', ''),
(165, '164', ''),
(166, '165', ''),
(167, '166', ''),
(168, '167', ''),
(169, '168', ''),
(170, '169', ''),
(171, '170', ''),
(172, '171', ''),
(173, '172', ''),
(174, '173', ''),
(175, '174', ''),
(176, '175', ''),
(177, '176', ''),
(178, '177', ''),
(179, '178', ''),
(180, '179', ''),
(181, '180', ''),
(182, '181', ''),
(183, '182', ''),
(184, '183', ''),
(185, '184', ''),
(186, '185', ''),
(187, '186', ''),
(188, '187', ''),
(189, '188', ''),
(190, '189', ''),
(191, '190', ''),
(192, '191', ''),
(193, '192', ''),
(194, '193', ''),
(195, '194', ''),
(196, '195', ''),
(197, '196', ''),
(198, '197', ''),
(199, '198', ''),
(200, '199', ''),
(201, '200', ''),
(202, '201', ''),
(203, '202', ''),
(204, '203', ''),
(205, '204', ''),
(206, '205', ''),
(207, '206', ''),
(208, '207', ''),
(209, '208', ''),
(210, '209', ''),
(211, '210', ''),
(212, '211', ''),
(213, '212', ''),
(214, '213', ''),
(215, '214', ''),
(216, '215', ''),
(217, '216', ''),
(218, '217', ''),
(219, '218', ''),
(220, '219', ''),
(221, '220', ''),
(222, '221', ''),
(223, '222', ''),
(224, '223', ''),
(225, '224', ''),
(226, '225', ''),
(227, '226', ''),
(228, '227', ''),
(229, '228', ''),
(230, '229', ''),
(231, '230', ''),
(232, '231', ''),
(233, '232', ''),
(234, '233', ''),
(235, '234', ''),
(236, '235', ''),
(237, '236', ''),
(238, '237', ''),
(239, '238', ''),
(240, '239', ''),
(241, '240', ''),
(242, '241', ''),
(243, '242', ''),
(244, '243', ''),
(245, '244', ''),
(246, '245', ''),
(247, '246', ''),
(248, '247', ''),
(249, '248', ''),
(250, '249', ''),
(251, '250', ''),
(252, '251', ''),
(253, '252', ''),
(254, '253', ''),
(255, '254', ''),
(256, '255', ''),
(257, '256', ''),
(258, '257', ''),
(259, '258', ''),
(260, '259', ''),
(261, '260', ''),
(262, '261', ''),
(263, '262', ''),
(264, '263', ''),
(265, '264', ''),
(266, '265', ''),
(267, '266', ''),
(268, '267', ''),
(269, '268', ''),
(270, '269', ''),
(271, '270', ''),
(272, '271', ''),
(273, '272', ''),
(274, '273', ''),
(275, '274', ''),
(276, '275', ''),
(277, '276', ''),
(278, '277', ''),
(279, '278', ''),
(280, '279', ''),
(281, '280', ''),
(282, '281', ''),
(283, '282', ''),
(284, '283', ''),
(285, '284', ''),
(286, '285', ''),
(287, '286', ''),
(288, '287', ''),
(289, '288', ''),
(290, '289', ''),
(291, '290', ''),
(292, '291', ''),
(293, '292', ''),
(294, '293', ''),
(295, '294', ''),
(296, '295', ''),
(297, '296', ''),
(298, '297', ''),
(299, '298', ''),
(300, '299', ''),
(301, '300', 'x'),
(302, '301', 'x'),
(303, '302', 'x'),
(304, '303', 'x'),
(305, '304', 'x'),
(306, '305', 'x'),
(307, '306', 'x'),
(308, '307', 'x'),
(309, '308', 'x'),
(310, '309', 'x'),
(311, '310', 'x'),
(312, '311', 'x'),
(313, '312', 'x'),
(314, '313', 'x'),
(315, '314', 'x'),
(316, '315', 'x'),
(317, '316', 'x'),
(318, '317', 'x'),
(319, '318', 'x'),
(320, '319', 'x'),
(321, '320', 'x'),
(322, '321', 'x'),
(323, '322', 'x'),
(324, '323', 'x'),
(325, '324', 'x'),
(326, '325', 'x'),
(327, '326', 'x'),
(328, '327', 'x'),
(329, '328', 'x'),
(330, '329', 'x'),
(331, '330', 'x'),
(332, '331', 'x'),
(333, '332', 'x'),
(334, '333', 'x'),
(335, '334', 'x'),
(336, '335', 'x'),
(337, '336', 'x'),
(338, '337', 'x'),
(339, '338', 'x'),
(340, '339', 'x'),
(341, '340', 'x'),
(342, '341', 'x'),
(343, '342', 'x'),
(344, '343', 'x'),
(345, '344', 'x'),
(346, '345', 'x'),
(347, '346', 'x'),
(348, '347', 'x'),
(349, '348', 'x'),
(350, '349', 'x'),
(351, '350', 'x'),
(352, '351', 'x'),
(353, '352', 'x'),
(354, '353', 'x'),
(355, '354', 'x'),
(356, '355', 'x'),
(357, '356', 'x'),
(358, '357', 'x'),
(359, '358', 'x'),
(360, '359', 'x'),
(361, '360', 'x'),
(362, '361', 'x'),
(363, '362', 'x'),
(364, '363', 'x'),
(365, '364', 'x'),
(366, '365', 'x'),
(367, '366', 'x'),
(368, '367', 'x'),
(369, '368', 'x'),
(370, '369', 'x'),
(371, '370', ''),
(372, '371', ''),
(373, '372', ''),
(374, '373', ''),
(375, '374', ''),
(376, '375', ''),
(377, '376', ''),
(378, '377', ''),
(379, '378', ''),
(380, '379', ''),
(381, '380', 'x'),
(382, '381', 'x'),
(383, '382', 'x'),
(384, '383', 'x'),
(385, '384', 'x'),
(386, '385', 'x'),
(387, '386', 'x'),
(388, '387', 'x'),
(389, '388', 'x'),
(390, '389', 'x'),
(391, '390', ''),
(392, '391', ''),
(393, '392', ''),
(394, '393', ''),
(395, '394', ''),
(396, '395', 'x'),
(397, '396', 'x'),
(398, '397', 'x'),
(399, '398', 'x'),
(400, '399', 'x'),
(401, '400', ''),
(402, '401', ''),
(403, '402', ''),
(404, '403', ''),
(405, '404', ''),
(406, '405', ''),
(407, '406', ''),
(408, '407', ''),
(409, '408', ''),
(410, '409', ''),
(411, '410', ''),
(412, '411', ''),
(413, '412', ''),
(414, '413', ''),
(415, '414', ''),
(416, '415', ''),
(417, '416', ''),
(418, '417', ''),
(419, '418', ''),
(420, '419', ''),
(421, '420', ''),
(422, '421', ''),
(423, '422', ''),
(424, '423', ''),
(425, '424', ''),
(426, '425', ''),
(427, '426', ''),
(428, '427', ''),
(429, '428', ''),
(430, '429', ''),
(431, '430', ''),
(432, '431', ''),
(433, '432', ''),
(434, '433', ''),
(435, '434', ''),
(436, '435', ''),
(437, '436', ''),
(438, '437', ''),
(439, '438', ''),
(440, '439', ''),
(441, '440', ''),
(442, '441', ''),
(443, '442', ''),
(444, '443', ''),
(445, '444', ''),
(446, '445', ''),
(447, '446', ''),
(448, '447', ''),
(449, '448', ''),
(450, '449', ''),
(451, '450', ''),
(452, '451', ''),
(453, '452', ''),
(454, '453', ''),
(455, '454', ''),
(456, '455', ''),
(457, '456', ''),
(458, '457', ''),
(459, '458', ''),
(460, '459', ''),
(461, '460', ''),
(462, '461', ''),
(463, '462', ''),
(464, '463', ''),
(465, '464', ''),
(466, '465', ''),
(467, '466', ''),
(468, '467', ''),
(469, '468', ''),
(470, '469', ''),
(471, '470', ''),
(472, '471', ''),
(473, '472', ''),
(474, '473', ''),
(475, '474', ''),
(476, '475', ''),
(477, '476', ''),
(478, '477', ''),
(479, '478', ''),
(480, '479', ''),
(481, '480', ''),
(482, '481', ''),
(483, '482', ''),
(484, '483', ''),
(485, '484', ''),
(486, '485', ''),
(487, '486', ''),
(488, '487', ''),
(489, '488', ''),
(490, '489', ''),
(491, '490', ''),
(492, '491', ''),
(493, '492', ''),
(494, '493', ''),
(495, '494', ''),
(496, '495', ''),
(497, '496', ''),
(498, '497', ''),
(499, '498', ''),
(500, '499', ''),
(501, '500', 'x'),
(502, '501', 'x'),
(503, '502', 'x'),
(504, '503', 'x'),
(505, '504', 'x'),
(506, '505', 'x'),
(507, '506', 'x'),
(508, '507', 'x'),
(509, '508', 'x'),
(510, '509', 'x'),
(511, '510', 'x'),
(512, '511', 'x'),
(513, '512', 'x'),
(514, '513', 'x'),
(515, '514', 'x'),
(516, '515', 'x'),
(517, '516', 'x'),
(518, '517', 'x'),
(519, '518', 'x'),
(520, '519', 'x'),
(521, '520', 'x'),
(522, '521', 'x'),
(523, '522', 'x'),
(524, '523', 'x'),
(525, '524', 'x'),
(526, '525', 'x'),
(527, '526', 'x'),
(528, '527', 'x'),
(529, '528', 'x'),
(530, '529', 'x'),
(531, '530', 'x'),
(532, '531', 'x'),
(533, '532', 'x'),
(534, '533', 'x'),
(535, '534', 'x'),
(536, '535', 'x'),
(537, '536', 'x'),
(538, '537', 'x'),
(539, '538', 'x'),
(540, '539', 'x'),
(541, '540', 'x'),
(542, '541', 'x'),
(543, '542', 'x'),
(544, '543', 'x'),
(545, '544', 'x'),
(546, '545', 'x'),
(547, '546', 'x'),
(548, '547', 'x'),
(549, '548', 'x'),
(550, '549', 'x'),
(551, '550', ''),
(552, '551', ''),
(553, '552', ''),
(554, '553', ''),
(555, '554', ''),
(556, '555', ''),
(557, '556', ''),
(558, '557', ''),
(559, '558', ''),
(560, '559', ''),
(561, '560', ''),
(562, '561', ''),
(563, '562', ''),
(564, '563', ''),
(565, '564', ''),
(566, '565', ''),
(567, '566', ''),
(568, '567', ''),
(569, '568', ''),
(570, '569', ''),
(571, '570', ''),
(572, '571', ''),
(573, '572', ''),
(574, '573', ''),
(575, '574', ''),
(576, '575', ''),
(577, '576', ''),
(578, '577', ''),
(579, '578', ''),
(580, '579', ''),
(581, '580', ''),
(582, '581', ''),
(583, '582', ''),
(584, '583', ''),
(585, '584', ''),
(586, '585', ''),
(587, '586', ''),
(588, '587', ''),
(589, '588', ''),
(590, '589', ''),
(591, '590', ''),
(592, '591', ''),
(593, '592', ''),
(594, '593', ''),
(595, '594', ''),
(596, '595', ''),
(597, '596', ''),
(598, '597', ''),
(599, '598', ''),
(600, '599', ''),
(601, '600', ''),
(602, '601', ''),
(603, '602', ''),
(604, '603', ''),
(605, '604', ''),
(606, '605', ''),
(607, '606', ''),
(608, '607', ''),
(609, '608', ''),
(610, '609', ''),
(611, '610', ''),
(612, '611', ''),
(613, '612', ''),
(614, '613', ''),
(615, '614', ''),
(616, '615', ''),
(617, '616', ''),
(618, '617', ''),
(619, '618', ''),
(620, '619', ''),
(621, '620', ''),
(622, '621', ''),
(623, '622', ''),
(624, '623', ''),
(625, '624', ''),
(626, '625', ''),
(627, '626', ''),
(628, '627', ''),
(629, '628', ''),
(630, '629', ''),
(631, '630', ''),
(632, '631', ''),
(633, '632', ''),
(634, '633', ''),
(635, '634', ''),
(636, '635', ''),
(637, '636', ''),
(638, '637', ''),
(639, '638', ''),
(640, '639', ''),
(641, '640', ''),
(642, '641', ''),
(643, '642', ''),
(644, '643', ''),
(645, '644', ''),
(646, '645', ''),
(647, '646', ''),
(648, '647', ''),
(649, '648', ''),
(650, '649', ''),
(651, '650', ''),
(652, '651', ''),
(653, '652', ''),
(654, '653', ''),
(655, '654', ''),
(656, '655', ''),
(657, '656', ''),
(658, '657', ''),
(659, '658', ''),
(660, '659', ''),
(661, '660', ''),
(662, '661', ''),
(663, '662', ''),
(664, '663', ''),
(665, '664', ''),
(666, '665', ''),
(667, '666', ''),
(668, '667', ''),
(669, '668', ''),
(670, '669', ''),
(671, '670', ''),
(672, '671', ''),
(673, '672', ''),
(674, '673', ''),
(675, '674', ''),
(676, '675', ''),
(677, '676', ''),
(678, '677', ''),
(679, '678', ''),
(680, '679', ''),
(681, '680', ''),
(682, '681', ''),
(683, '682', ''),
(684, '683', ''),
(685, '684', ''),
(686, '685', ''),
(687, '686', ''),
(688, '687', ''),
(689, '688', ''),
(690, '689', ''),
(691, '690', ''),
(692, '691', ''),
(693, '692', ''),
(694, '693', ''),
(695, '694', ''),
(696, '695', ''),
(697, '696', ''),
(698, '697', ''),
(699, '698', ''),
(700, '699', ''),
(701, '700', ''),
(702, '701', ''),
(703, '702', ''),
(704, '703', ''),
(705, '704', ''),
(706, '705', ''),
(707, '706', ''),
(708, '707', ''),
(709, '708', ''),
(710, '709', ''),
(711, '710', ''),
(712, '711', ''),
(713, '712', ''),
(714, '713', ''),
(715, '714', ''),
(716, '715', ''),
(717, '716', ''),
(718, '717', ''),
(719, '718', ''),
(720, '719', ''),
(721, '720', ''),
(722, '721', ''),
(723, '722', ''),
(724, '723', ''),
(725, '724', ''),
(726, '725', ''),
(727, '726', ''),
(728, '727', ''),
(729, '728', ''),
(730, '729', ''),
(731, '730', ''),
(732, '731', ''),
(733, '732', ''),
(734, '733', ''),
(735, '734', ''),
(736, '735', ''),
(737, '736', ''),
(738, '737', ''),
(739, '738', ''),
(740, '739', ''),
(741, '740', ''),
(742, '741', ''),
(743, '742', ''),
(744, '743', ''),
(745, '744', ''),
(746, '745', ''),
(747, '746', ''),
(748, '747', ''),
(749, '748', ''),
(750, '749', ''),
(751, '750', ''),
(752, '751', ''),
(753, '752', ''),
(754, '753', ''),
(755, '754', ''),
(756, '755', ''),
(757, '756', ''),
(758, '757', ''),
(759, '758', ''),
(760, '759', ''),
(761, '760', ''),
(762, '761', ''),
(763, '762', ''),
(764, '763', ''),
(765, '764', ''),
(766, '765', ''),
(767, '766', ''),
(768, '767', ''),
(769, '768', ''),
(770, '769', ''),
(771, '770', ''),
(772, '771', ''),
(773, '772', ''),
(774, '773', ''),
(775, '774', ''),
(776, '775', ''),
(777, '776', ''),
(778, '777', ''),
(779, '778', ''),
(780, '779', ''),
(781, '780', ''),
(782, '781', ''),
(783, '782', ''),
(784, '783', ''),
(785, '784', ''),
(786, '785', ''),
(787, '786', ''),
(788, '787', ''),
(789, '788', ''),
(790, '789', ''),
(791, '790', ''),
(792, '791', ''),
(793, '792', ''),
(794, '793', ''),
(795, '794', ''),
(796, '795', ''),
(797, '796', ''),
(798, '797', ''),
(799, '798', ''),
(800, '799', ''),
(801, '800', ''),
(802, '801', ''),
(803, '802', ''),
(804, '803', ''),
(805, '804', ''),
(806, '805', ''),
(807, '806', ''),
(808, '807', ''),
(809, '808', ''),
(810, '809', ''),
(811, '810', ''),
(812, '811', ''),
(813, '812', ''),
(814, '813', ''),
(815, '814', ''),
(816, '815', ''),
(817, '816', ''),
(818, '817', ''),
(819, '818', ''),
(820, '819', 'x'),
(821, '820', ''),
(822, '821', ''),
(823, '822', ''),
(824, '823', ''),
(825, '824', ''),
(826, '825', ''),
(827, '826', ''),
(828, '827', ''),
(829, '828', ''),
(830, '829', ''),
(831, '830', ''),
(832, '831', ''),
(833, '832', ''),
(834, '833', ''),
(835, '834', ''),
(836, '835', ''),
(837, '836', ''),
(838, '837', ''),
(839, '838', ''),
(840, '839', ''),
(841, '840', ''),
(842, '841', ''),
(843, '842', ''),
(844, '843', ''),
(845, '844', ''),
(846, '845', ''),
(847, '846', ''),
(848, '847', ''),
(849, '848', ''),
(850, '849', ''),
(851, '850', ''),
(852, '851', ''),
(853, '852', ''),
(854, '853', ''),
(855, '854', ''),
(856, '855', ''),
(857, '856', ''),
(858, '857', ''),
(859, '858', ''),
(860, '859', ''),
(861, '860', ''),
(862, '861', ''),
(863, '862', ''),
(864, '863', ''),
(865, '864', ''),
(866, '865', ''),
(867, '866', ''),
(868, '867', ''),
(869, '868', ''),
(870, '869', ''),
(871, '870', ''),
(872, '871', ''),
(873, '872', ''),
(874, '873', ''),
(875, '874', ''),
(876, '875', ''),
(877, '876', ''),
(878, '877', ''),
(879, '878', ''),
(880, '879', ''),
(881, '880', ''),
(882, '881', ''),
(883, '882', ''),
(884, '883', ''),
(885, '884', ''),
(886, '885', ''),
(887, '886', ''),
(888, '887', ''),
(889, '888', ''),
(890, '889', ''),
(891, '890', ''),
(892, '891', ''),
(893, '892', ''),
(894, '893', ''),
(895, '894', ''),
(896, '895', ''),
(897, '896', ''),
(898, '897', ''),
(899, '898', ''),
(900, '899', ''),
(901, '900', ''),
(902, '901', ''),
(903, '902', ''),
(904, '903', ''),
(905, '904', ''),
(906, '905', ''),
(907, '906', ''),
(908, '907', ''),
(909, '908', ''),
(910, '909', ''),
(911, '910', ''),
(912, '911', ''),
(913, '912', ''),
(914, '913', ''),
(915, '914', ''),
(916, '915', ''),
(917, '916', ''),
(918, '917', ''),
(919, '918', ''),
(920, '919', ''),
(921, '920', ''),
(922, '921', ''),
(923, '922', ''),
(924, '923', ''),
(925, '924', ''),
(926, '925', ''),
(927, '926', ''),
(928, '927', ''),
(929, '928', ''),
(930, '929', ''),
(931, '930', ''),
(932, '931', ''),
(933, '932', ''),
(934, '933', ''),
(935, '934', ''),
(936, '935', ''),
(937, '936', ''),
(938, '937', ''),
(939, '938', ''),
(940, '939', ''),
(941, '940', ''),
(942, '941', ''),
(943, '942', ''),
(944, '943', ''),
(945, '944', ''),
(946, '945', ''),
(947, '946', ''),
(948, '947', ''),
(949, '948', ''),
(950, '949', ''),
(951, '950', ''),
(952, '951', ''),
(953, '952', ''),
(954, '953', ''),
(955, '954', ''),
(956, '955', ''),
(957, '956', ''),
(958, '957', ''),
(959, '958', ''),
(960, '959', ''),
(961, '960', ''),
(962, '961', ''),
(963, '962', ''),
(964, '963', ''),
(965, '964', ''),
(966, '965', ''),
(967, '966', ''),
(968, '967', ''),
(969, '968', ''),
(970, '969', ''),
(971, '970', ''),
(972, '971', ''),
(973, '972', ''),
(974, '973', ''),
(975, '974', ''),
(976, '975', ''),
(977, '976', ''),
(978, '977', ''),
(979, '978', ''),
(980, '979', ''),
(981, '980', ''),
(982, '981', ''),
(983, '982', ''),
(984, '983', ''),
(985, '984', ''),
(986, '985', ''),
(987, '986', ''),
(988, '987', ''),
(989, '988', ''),
(990, '989', ''),
(991, '990', ''),
(992, '991', ''),
(993, '992', ''),
(994, '993', ''),
(995, '994', ''),
(996, '995', ''),
(997, '996', ''),
(998, '997', ''),
(999, '998', ''),
(1000, '999', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeros_vendidos`
--

CREATE TABLE `numeros_vendidos` (
  `id_numero_vendido` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `numero` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `numeros_vendidos`
--

INSERT INTO `numeros_vendidos` (`id_numero_vendido`, `id_venta`, `numero`) VALUES
(1, 1, '000'),
(3, 3, '001'),
(4, 4, '002'),
(5, 4, '003'),
(6, 4, '005'),
(7, 4, '006'),
(8, 4, '008'),
(9, 4, '009'),
(10, 4, '034'),
(11, 4, '014'),
(12, 4, '013'),
(13, 4, '012'),
(14, 4, '032'),
(15, 4, '033'),
(16, 4, '048'),
(17, 4, '047'),
(18, 4, '046'),
(19, 4, '031'),
(20, 4, '011'),
(21, 4, '010'),
(22, 4, '030'),
(23, 4, '045'),
(24, 4, '044'),
(25, 4, '029'),
(26, 4, '028'),
(27, 4, '043'),
(28, 4, '042'),
(29, 4, '027'),
(30, 4, '007'),
(31, 4, '026'),
(32, 4, '041'),
(33, 4, '040'),
(34, 4, '025'),
(35, 5, '520'),
(36, 5, '500'),
(37, 5, '501'),
(38, 5, '502'),
(39, 5, '503'),
(40, 5, '523'),
(41, 5, '522'),
(42, 5, '521'),
(43, 5, '504'),
(44, 5, '524'),
(45, 5, '505'),
(46, 5, '525'),
(47, 5, '540'),
(48, 5, '541'),
(49, 5, '526'),
(50, 5, '506'),
(51, 5, '507'),
(52, 5, '527'),
(53, 5, '542'),
(54, 5, '543'),
(55, 5, '528'),
(56, 5, '508'),
(57, 5, '509'),
(58, 5, '529'),
(59, 5, '544'),
(60, 5, '545'),
(61, 5, '530'),
(62, 5, '510'),
(63, 5, '511'),
(64, 5, '531'),
(65, 5, '546'),
(66, 5, '547'),
(67, 5, '532'),
(68, 5, '512'),
(69, 5, '513'),
(70, 5, '533'),
(71, 5, '548'),
(72, 5, '549'),
(73, 5, '534'),
(74, 5, '514'),
(75, 5, '515'),
(76, 5, '535'),
(77, 5, '516'),
(78, 5, '536'),
(79, 5, '517'),
(80, 5, '537'),
(81, 5, '518'),
(82, 5, '538'),
(83, 5, '519'),
(84, 5, '539'),
(85, 6, '319'),
(86, 6, '339'),
(87, 6, '318'),
(88, 6, '338'),
(89, 6, '337'),
(90, 6, '349'),
(91, 6, '334'),
(92, 6, '335'),
(93, 6, '336'),
(94, 6, '329'),
(95, 6, '344'),
(96, 6, '330'),
(97, 6, '345'),
(98, 6, '331'),
(99, 6, '346'),
(100, 6, '347'),
(101, 6, '332'),
(102, 6, '333'),
(103, 6, '348'),
(104, 6, '313'),
(105, 6, '314'),
(106, 6, '315'),
(107, 6, '316'),
(108, 6, '317'),
(109, 6, '312'),
(110, 6, '311'),
(111, 6, '310'),
(112, 6, '309'),
(113, 6, '308'),
(114, 6, '328'),
(115, 6, '343'),
(116, 6, '342'),
(117, 6, '327'),
(118, 6, '307'),
(119, 6, '306'),
(120, 6, '326'),
(121, 6, '341'),
(122, 6, '340'),
(123, 6, '325'),
(124, 6, '305'),
(125, 6, '304'),
(126, 6, '324'),
(127, 6, '323'),
(128, 6, '303'),
(129, 6, '302'),
(130, 6, '322'),
(131, 6, '321'),
(132, 6, '301'),
(133, 6, '300'),
(134, 6, '320'),
(135, 6, '399'),
(136, 6, '384'),
(137, 6, '364'),
(138, 6, '385'),
(139, 6, '365'),
(140, 6, '366'),
(141, 6, '386'),
(142, 6, '387'),
(143, 6, '367'),
(144, 6, '368'),
(145, 6, '388'),
(146, 6, '389'),
(147, 6, '369'),
(148, 6, '350'),
(149, 6, '351'),
(150, 6, '352'),
(151, 6, '353'),
(152, 6, '354'),
(153, 6, '355'),
(154, 6, '356'),
(155, 6, '357'),
(156, 6, '358'),
(157, 6, '359'),
(158, 6, '360'),
(159, 6, '361'),
(160, 6, '382'),
(161, 6, '397'),
(162, 6, '383'),
(163, 6, '398'),
(164, 6, '363'),
(165, 6, '362'),
(166, 6, '381'),
(167, 6, '396'),
(168, 6, '395'),
(169, 6, '380'),
(170, 7, '024'),
(172, 9, '004'),
(173, 10, '035'),
(175, 12, '037'),
(176, 13, '038'),
(177, 14, '022'),
(179, 16, '018'),
(180, 17, '019'),
(182, 19, '020'),
(183, 20, '039'),
(184, 21, '050'),
(185, 22, '015'),
(186, 23, '051'),
(187, 23, '052'),
(188, 23, '053'),
(189, 23, '054'),
(190, 24, '059'),
(192, 26, '049'),
(193, 27, '021'),
(194, 28, '016'),
(195, 28, '017'),
(196, 29, '036'),
(199, 32, '023'),
(200, 33, '105'),
(202, 35, '055'),
(203, 35, '056'),
(204, 35, '057'),
(205, 35, '058'),
(206, 36, '064'),
(207, 38, '065'),
(208, 38, '066'),
(209, 38, '067'),
(210, 38, '068'),
(211, 40, '094'),
(212, 40, '095'),
(213, 40, '096'),
(214, 40, '097'),
(215, 41, '060'),
(216, 41, '061'),
(217, 41, '062'),
(218, 41, '063'),
(220, 43, '819');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones_numeros`
--

CREATE TABLE `transacciones_numeros` (
  `id` int(11) NOT NULL,
  `codigo_transaccion` varchar(255) NOT NULL,
  `numero_seleccionado` varchar(3) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre` varchar(50) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transacciones_numeros`
--

INSERT INTO `transacciones_numeros` (`id`, `codigo_transaccion`, `numero_seleccionado`, `fecha_registro`, `nombre`, `celular`, `correo`, `departamento`, `ciudad`) VALUES
(5, '66a554c847c66', '055', '2024-07-27 20:12:56', 'probando probando', '3245894268', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Antioquia', 'MEDELLIN'),
(6, '66a554c847c66', '056', '2024-07-27 20:12:56', 'probando probando', '3245894268', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Antioquia', 'MEDELLIN'),
(7, '66a554c847c66', '057', '2024-07-27 20:12:56', 'probando probando', '3245894268', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Antioquia', 'MEDELLIN'),
(8, '66a554c847c66', '058', '2024-07-27 20:12:56', 'probando probando', '3245894268', 'CEBALLOSMARINCRISTIANCAMILO@GMAIL.COM', 'Antioquia', 'MEDELLIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contrasena`) VALUES
(4, 'cristian.ceballos', '$2y$10$HAigZ6YmIa22D9g3Z/hLIeMz/QAAlkp1C3xNn1J6vMjvR4k.iaGt.'),
(5, 'irma.herrera', '$2y$10$faKC9NffpAs.UpR.TggIf.eiapOHjYAjwRQmfVf2z.oy0e4yDXFcy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_pasarela` varchar(100) NOT NULL,
  `total_numero` int(3) NOT NULL,
  `total_pagado` varchar(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` enum('PD','AP') NOT NULL,
  `tipo_venta` enum('PW','VM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_pasarela`, `total_numero`, `total_pagado`, `fecha`, `estado`, `tipo_venta`) VALUES
(1, 1, '6691fe5e45ca5', 1, ' 35000', '2024-07-12 23:11:10', 'AP', 'VM'),
(2, 1, '6691fe67f0dc1', 1, ' 35000', '2024-07-12 23:11:19', 'AP', 'VM'),
(3, 2, '6691ff9331e5c', 1, ' 35000', '2024-07-12 23:16:19', 'AP', 'VM'),
(4, 3, '66924a1248e42', 31, ' 1085000', '2024-07-13 04:34:10', 'AP', 'VM'),
(5, 4, '66924b5ceb130', 50, ' 1750000', '2024-07-13 04:39:40', 'AP', 'VM'),
(6, 5, '66924d9c12983', 85, ' 2975000', '2024-07-13 04:49:16', 'AP', 'VM'),
(7, 6, '66955a8487a74', 1, ' 35000', '2024-07-15 12:21:08', 'AP', 'VM'),
(8, 6, '66955aba3f777', 1, ' 35000', '2024-07-15 12:22:02', 'AP', 'VM'),
(9, 7, '66955bcc43eff', 1, ' 35000', '2024-07-15 12:26:36', 'AP', 'VM'),
(10, 7, '66955c367693a', 1, ' 35000', '2024-07-15 12:28:22', 'AP', 'VM'),
(11, 7, '669561513d0b7', 1, ' 35000', '2024-07-15 12:50:09', 'AP', 'VM'),
(12, 9, '669564446813a', 1, '35000', '2024-07-15 13:04:20', 'AP', 'PW'),
(13, 2, '669566214f905', 1, ' 35000', '2024-07-15 13:10:41', 'AP', 'VM'),
(14, 1, '669567764b289', 1, '35000', '2024-07-15 13:17:12', 'AP', 'PW'),
(15, 1, '669567764b289', 1, '35000', '2024-07-15 13:18:20', 'AP', 'PW'),
(16, 1, '6695683bc2f81', 1, '35000', '2024-07-15 13:19:56', 'AP', 'PW'),
(17, 1, '669568d893e0f', 1, ' 35000', '2024-07-15 13:22:16', 'AP', 'VM'),
(18, 1, '6695683bc2f81', 1, '35000', '2024-07-15 13:31:59', 'AP', 'PW'),
(19, 11, '66956b365fc6c', 1, '35000', '2024-07-15 13:32:38', 'AP', 'PW'),
(20, 11, '66956b7fd6c27', 1, ' 35000', '2024-07-15 13:33:35', 'AP', 'VM'),
(21, 1, '66956bbb825f8', 1, ' 35000', '2024-07-15 13:34:35', 'AP', 'VM'),
(22, 1, '6694307aacec6', 1, '35000', '2024-07-20 13:30:10', 'AP', 'PW'),
(23, 12, '669c02b42ec37', 4, '140000', '2024-07-20 13:33:39', 'AP', 'PW'),
(24, 13, '669c06b8b8a0b', 1, ' 35000', '2024-07-20 13:49:28', 'AP', 'VM'),
(25, 13, '669c02b42ec37', 4, '140000', '2024-07-20 13:50:18', 'AP', 'PW'),
(26, 1, '669563d031cdf', 1, '35000', '2024-07-20 14:10:27', 'AP', 'PW'),
(27, 1, '669c18393f259', 1, '35000', '2024-07-20 15:09:20', 'AP', 'PW'),
(28, 1, '669c2899f32d1', 2, '70000', '2024-07-20 16:14:50', 'AP', 'PW'),
(29, 14, '669c2918b3b78', 1, '35000', '2024-07-20 16:17:24', 'AP', 'PW'),
(30, 2, '669c2899f32d1', 2, '70000', '2024-07-20 17:04:19', 'AP', 'PW'),
(31, 2, '669c2899f32d1', 2, '70000', '2024-07-20 17:04:28', 'AP', 'PW'),
(32, 15, '669c34993090a', 1, '35000', '2024-07-20 17:05:50', 'AP', 'PW'),
(33, 1, '66a056744ba91', 1, ' 35000', '2024-07-23 20:18:44', 'AP', 'VM'),
(34, 14, '669c2918b3b78', 1, '35000', '2024-07-24 21:22:35', 'AP', 'PW'),
(35, 1, '66a554c847c66', 4, '140000', '2024-07-27 15:14:20', 'AP', 'PW'),
(36, 1, '66a556e24e99a', 1, '35000', '2024-07-27 15:22:24', 'AP', 'PW'),
(37, 1, '66a556e24e99a', 1, '35000', '2024-07-27 15:28:02', 'AP', 'PW'),
(38, 1, '66a558857da57', 4, '140000', '2024-07-27 15:29:47', 'AP', 'PW'),
(39, 1, '66a558857da57', 4, '140000', '2024-07-27 15:34:17', 'AP', 'PW'),
(40, 1, '66a559f0d5f91', 4, '140000', '2024-07-27 15:35:28', 'AP', 'PW'),
(41, 1, '66a555560d7d6', 4, '140000', '2024-07-27 15:41:30', 'AP', 'PW'),
(42, 1, '66a554c847c66', 4, '140000', '2024-07-27 15:42:18', 'AP', 'PW'),
(43, 16, '66b7ec7c1683c', 1, ' 35000', '2024-08-10 17:41:00', 'AP', 'VM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `celular_cliente` (`celular_cliente`);

--
-- Indices de la tabla `numeros_disponibles`
--
ALTER TABLE `numeros_disponibles`
  ADD PRIMARY KEY (`id_numero_disponible`);

--
-- Indices de la tabla `numeros_vendidos`
--
ALTER TABLE `numeros_vendidos`
  ADD PRIMARY KEY (`id_numero_vendido`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `transacciones_numeros`
--
ALTER TABLE `transacciones_numeros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `numeros_disponibles`
--
ALTER TABLE `numeros_disponibles`
  MODIFY `id_numero_disponible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT de la tabla `numeros_vendidos`
--
ALTER TABLE `numeros_vendidos`
  MODIFY `id_numero_vendido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT de la tabla `transacciones_numeros`
--
ALTER TABLE `transacciones_numeros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `numeros_vendidos`
--
ALTER TABLE `numeros_vendidos`
  ADD CONSTRAINT `numeros_vendidos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
