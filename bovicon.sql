-- Bovicon Database Schema and Seed Data

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `adminUser`
--

CREATE TABLE IF NOT EXISTS `adminUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Seed data for table `adminUser`
--

INSERT INTO `adminUser` (`id`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'admin@bovicon.com', 'admin123')
ON DUPLICATE KEY UPDATE `username`=VALUES(`username`), `password`=VALUES(`password`);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Seed data for table `cities`
--

INSERT INTO `cities` (`name`, `status`) VALUES
('Ahmedabad', 1),
('Mumbai', 1),
('Delhi', 1),
('Bengaluru', 1),
('Pune', 1),
('Hyderabad', 1),
('Chennai', 1),
('Kolkata', 1),
('Jaipur', 1),
('Surat', 1),
('Lucknow', 1),
('Chandigarh', 1)
ON DUPLICATE KEY UPDATE `status`=VALUES(`status`);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL DEFAULT 'icon-microscope',
  `description` text NOT NULL,
  `features` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Seed data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `description`, `features`) VALUES
(1, 'General Diagnostic Tests', 'icon-microscope', 'We are leader in ensuring exceptional quality testing in our facilities, driven by a passion to ensure you have critical information about your health give you access to diagnostic...', 'Gastrointestinal Health\r\nImmunological Disorders\r\nCardiovascular Health'),
(2, 'Specialized Genetic Testing', 'icon-dna-structure', 'Genetic testing can be useful at different stages of life, like discovering that a family member has a condition that can be passed down or struggling to find treatment....', 'Reproductive Health\r\nGenetic Disorders\r\nHereditary Cancer'),
(3, 'Naturopathic Lab Testing', 'icon-florence-flask', 'From hormone levels, to food reactions, to identifying environmental toxins, we provide you with objective information so you can map your path to health and wellness....', 'Salivary Hormone\r\nFood Sensitivity\r\nInhalant Allergy'),
(4, 'Food Sensitivity Testing', 'icon-mortar', 'IgG food reactions can take hours or days to develop, making difficult to determine which food is responsible for the reaction without doing testing fast and specific way....', 'Stomach or abdominal pain\r\nGastrointestinal distress\r\nBloating / Indigestion'),
(5, 'Genova Diagnostics Testing', 'icon-atom', 'Genova Diagnostics is an internationally renowned lab committed to only the highest standards. Chronic diseases are complex, but with Genova\'s system-based testing....', 'Gastrointestinal/Immunology\r\nNutritional / Endocrinology\r\nGenomics / Environmental'),
(6, 'Hormone Insights Testing', 'icon-molecule2', 'Hormones are essential for the body to function optimally. Imbalances may result in many health conditions. Hormone Insights is a detailed urine analysis that measures....', 'Cortisol and cortisone metabolites\r\nAndrogens and 17-ketosteroids\r\nProgesterone metabolites')
ON DUPLICATE KEY UPDATE `title`=VALUES(`title`), `icon`=VALUES(`icon`), `description`=VALUES(`description`), `features`=VALUES(`features`);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `preparation` varchar(255) NOT NULL DEFAULT 'No special preparation required',
  `frequency` varchar(100) NOT NULL DEFAULT 'Daily',
  `parameter_count` int(11) NOT NULL DEFAULT '1',
  `parameters` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Seed data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `preparation`, `frequency`, `parameter_count`, `parameters`, `price`) VALUES
(1, 'COMPLETE BLOOD COUNT;CBC', 'No special preparation required', 'Daily', 15, 'Hemoglobin\r\nPacked Cell Volume (PCV)\r\nTotal Leucocyte Count (TLC)\r\nDifferential Leucocyte Count (DLC)\r\nRed Blood Cell (RBC) Count\r\nPlatelet Count\r\nMean Corpuscular Volume (MCV)\r\nMean Corpuscular Hemoglobin (MCH)\r\nMean Corpuscular Hemoglobin Concentration (MCHC)\r\nRDW-CV\r\nRDW-SD\r\nMean Platelet Volume (MPV)\r\nPlatelet Distribution Width (PDW)\r\nPlatelet Large Cell Ratio (P-LCR)\r\nPlatelet Large Cell Count (P-LCC)', '390.00'),
(2, 'HEMOGRAM *CBC * ESR', 'No special preparation required', 'Daily', 16, 'Complete Blood Count (CBC)\r\nErythrocyte Sedimentation Rate (ESR)\r\nHemoglobin\r\nPCV\r\nTLC\r\nDLC\r\nRBC Count\r\nPlatelet Count\r\nMCV\r\nMCH\r\nMCHC\r\nRDW-CV\r\nRDW-SD\r\nMPV\r\nPDW\r\nPlateletcrit', '440.00'),
(3, 'PROTHROMBIN TIME STUDIES', 'No special preparation required', 'Daily', 4, 'Prothrombin Time (PT)\r\nINR\r\nControl Time\r\nRatio', '490.00'),
(4, 'TLC ( TOTAL LEUCOCYTE COUNT)', 'No special preparation required', 'Daily', 1, 'Total Leucocyte Count', '200.00')
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`), `preparation`=VALUES(`preparation`), `frequency`=VALUES(`frequency`), `parameter_count`=VALUES(`parameter_count`), `parameters`=VALUES(`parameters`), `price`=VALUES(`price`);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text DEFAULT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'contact',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

COMMIT;

