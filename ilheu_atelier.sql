-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 03:18 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilheu_atelier`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(180) NOT NULL,
  `email` varchar(252) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `email`, `password`, `username`) VALUES
(1, 'admin', 'ia.ilheuatelier@gmail.com', '$2y$10$7TJdeu5US82DoO499KgYFOHlEmWyMJ3hjYJ8TThenpVOBBjxuYh/C', 'admin'),
(6, 'wiki', 'admin@ia.pt', '$2y$10$e6zj.MqD9VJXVpkv7DoD.uaSJW6HdVA4elGKT0tLP9lJOgGWLaudm', 'sdfg');

-- --------------------------------------------------------

--
-- Table structure for table `captchas`
--

CREATE TABLE `captchas` (
  `ip` varchar(40) NOT NULL,
  `captcha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `captchas`
--

INSERT INTO `captchas` (`ip`, `captcha`) VALUES
('127.0.0.1', 'ce58fb'),
('::1', '5a6efe');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` char(3) NOT NULL,
  `email` varchar(252) NOT NULL,
  `telephone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `name`, `title`, `email`, `telephone`) VALUES
(15, 'ines', 'ms', 'ines@edked.pt', '29267380'),
(16, 'inggj', 'mrs', 'sdghhgf@sljns.pw', '29267380'),
(17, 'ervf', 'mr', 'erv@erv.pt', '29267380'),
(18, 'ervf', 'mrs', 'sihde@fefr.com', '29267380');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image`, `project_id`) VALUES
(5, '/images/4_casas_7_cidades_1.png', 2),
(6, '/images/4_casas_7_cidades_2.png', 2),
(7, '/images/4_casas_7_cidades_3.png', 2),
(8, '/images/pavilhao_walk_talk.png', 3),
(9, '/images/apartamento_lisboa.png', 4),
(40, '/images/casa_amarela_1.png', 1),
(41, '/images/casa_amarela_2.png', 1),
(42, '/images/casa_amarela_3.png', 1),
(43, '/images/casa_amarela_4.png', 1),
(400, '/images/project_169!!_28013bae.jpg', 169);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `info_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`info_id`, `title`, `info`) VALUES
(1, 'atelier - pt', 'Ilhéu é um atelier de arquitetura que trabalha entre Lisboa e Ponta Delgada, fundado em 2019 por Rita Sampaio e Afonso Botelho Santos. É o resultado do confronto de dois contextos distintos, unidos por uma visão comum da arquitetura. O ilhéu interessa-se por uma arquitetura enquanto multidisciplina e a sua interação com outras vertentes que lhe são transversais, como a cenografia, a instalação urbana e o desenho expositivo.'),
(2, 'atelier - en', 'Ilhéu is an architecture studio working between Lisbon and Ponta Delgada, founded in 2019 by Rita Sampaio and Afonso Botelho Santos. It is the result of confronting two different backgrounds unites by a common vision on architecture. Ilhéu is interested in architecture as a multidiscipline and its interaction with its transversal aspects such as scenig design, urban installation and exhibition design.'),
(3, 'Rita Sampaio', 'Rita Sampaio was born in 1991 in Ponta Delgada.\r\nShe studied Architecture in FAUP (Oporto) and did an exchange period in POLIMI (Milan). After graduating, Rita worked in Ponta Delgada with Luis Almeida e Sousa Arquitectos and later in London, in collaboration with Russian For Fish Architects. Before establishing her own practice, Rita worked in collaboration with Pedro Maurício Borges and FSSMGN Arquitetos in Lisbon, until 2019.'),
(4, 'Afonso Botelho Santos', '<p>Afonso Botelho Santos was born in 1991 in Lisbon. He studied Architecture in FAUL (Lisbon) and did an exchange year in Rio de Janeiro, from 2012 to 2013. Afonso worked with Pedro Pacheco (2014-2016), with José Mateus (2016-2017) and Eduardo Souto de Moura (2017-2020). Besides his collaborations in architecture studios, Afonso took part in several cultural projects, such as<i> trienal de arquitectura</i>, <i>porta 14</i> and formed part of the curational team at <i>note - galeria de arquitetura</i>.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `client_id`, `message`, `message_date`) VALUES
(15, 15, 'qwerty', '2022-01-09 15:04:42'),
(16, 16, 'Classic editor is what most users traditionally learnt to associate with a rich text editor — a toolbar with an editing area placed in a specific position on the page, usually as a part of a form that you use to submit some content to the server.\n\nDuring its initialization the editor hides the used editable element on the page and renders “instead” of it. This is why it is usually used to replace <textarea> elements.\n\nIn CKEditor 5 the concept of the “boxed” editor was reinvented:\n\nThe toolbar is now always visible when the user scrolls the page down.\nThe editor content is now placed inline in the page (without the surrounding <iframe> element) — it is now much easier to style it.\nBy default the editor now grows automatically with the content.', '2022-01-09 15:05:52'),
(17, 17, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing.', '2022-01-09 15:16:09'),
(18, 18, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing.', '2022-01-09 15:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `location` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `project_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `title`, `location`, `description`, `project_date`) VALUES
(1, 'Casa Amarela', 'Capelas, Ponta Delgada, Açores', 'Casa nas Capelas is the result of a study made for the implantation of a house in São Miguel island. The site is abundant in high density and tall trees, recalling the scenery of David Hockney’s paintings in Woldgate Woods. In order to implant the house without damaging too much of the vegetation, the house deviates from the trees with a plan that is thought out as a succession of volumes and shapes intertwined. If the shape of the house is an attempt to adapt to the surroundings, its colour and materiality are, on the other hand, a will to contrast with the cloudy and misty environment created by the tall trees.', '2021-11-05 12:34:40'),
(2, '4 casas nas 7 cidades', 'Sete Cidades, Ponta Delgada, Açores', 'The project foretells the construction of four houses for rural tourism on a site near the lagoon of Sete Cidades. The views of the houses alternate between the delicacy of the lagoon and the dense green cloth of the landscape’s slope. The four houses are identical in their dimensions (18m x 5m x 3m), materiality and typology of two rooms. They are the recognition of four possibilities of design, an exercise that reflects on questions such as the different hypotheses of organization and interconnection of spaces, relationship with the surrounding landscape and privacy possibilities.', '2021-11-05 12:34:40'),
(3, 'Pavilhão Walk & Talk', 'Ponta Delgada, Açores', 'The pavilion, as a temporary home for a performative arts festival, is itself a performance. The first moment of the performance is the collective act of its construction. The second moment is the appropriation of the pavilion along the different moments of the festival. The pavilion is raised by a team of volunteers, portico after portico, and each basaltic stone set on the roof represents the final gesture of each individual that took part of its construction. The pavilion’s design, much referenced in azorean’s vernacular architecture, is open without imposing a limit. It is a suspended roof on the square with semi-transparent curtains shaking in the wind and allowing for the flexibility of use and transformation of the pavilion’s image, during the festival’s duration.', '2021-11-05 12:35:26'),
(4, 'Apartamento Lisboa', 'Arroios, Lisboa', 'The project refers to the rehabilitation of an apartment in a housing block on Rua Actor Vale in Lisbon. It’s an apartment in a space efficient block, characterized by many small rooms. The intervention seeks a freer plan with larger rooms, in search for a more contemporary plan. The original structural skeleton of the apartment is maintained, as well as its original wooden floors. The focus of the intervention is to widen and improve the social areas and to reorganize the kitchen and bathrooms.', '2021-11-05 12:35:26'),
(169, 'project 169!!', '169-zjnla', '<p><i><strong>169</strong></i></p><p>wljwd´+d</p><blockquote><p>xçxcºcc</p></blockquote><blockquote><p>dkm</p></blockquote><p>&nbsp;</p><p>&nbsp;</p><p><a href=\"https://stackoverflow.com/questions/54742232/angular-6-data-sharing-service-subscribe-not-triggered\">https://stackoverflow.com/questions/54742232/angular-6-data-sharing-service-subscribe-not-triggered</a></p>', '2022-01-06 18:31:33'),
(178, '178', 'nova loca', '<p>zxcvbnm</p>', '2022-01-08 20:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `site_images`
--

CREATE TABLE `site_images` (
  `site_image_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_images`
--

INSERT INTO `site_images` (`site_image_id`, `image`) VALUES
(1, '/images/site/thumbnail_2.1.png'),
(2, '/images/site/thumbnail_patio19.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `captchas`
--
ALTER TABLE `captchas`
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `site_images`
--
ALTER TABLE `site_images`
  ADD PRIMARY KEY (`site_image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `site_images`
--
ALTER TABLE `site_images`
  MODIFY `site_image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
