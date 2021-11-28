-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 03:25 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `carcity`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointment`
--

CREATE TABLE `appointment` (
  `ID` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `state` varchar(150) NOT NULL,
  `store` varchar(150) NOT NULL,
  `content` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `appointment`
--

INSERT INTO `appointment` (`ID`, `date`, `userID`, `state`, `store`, `content`) VALUES
(7, '2021-11-11', 1, 'new', 'Car City', 'test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car`
--

CREATE TABLE `car` (
  `carID` int(11) NOT NULL,
  `carName` varchar(150) NOT NULL,
  `carPrice` varchar(150) NOT NULL,
  `carDesc` varchar(600) NOT NULL,
  `carModel` int(11) NOT NULL,
  `carContent` varchar(600) NOT NULL,
  `type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `car`
--

INSERT INTO `car` (`carID`, `carName`, `carPrice`, `carDesc`, `carModel`, `carContent`, `type`) VALUES
(44, 'Aventador SVJ', '517.700', 'Lamborghini created the Aventador SVJ to embrace challenges head-on, combining cutting-edge technology with extraordinary design.', 1, 'Lamborghini created the Aventador SVJ to embrace challenges head-on, combining cutting-edge technology with extraordinary design, while always refusing to compromise. In a future driven by technology, it’s easy to lose the genuine thrill of driving. But i', 'new'),
(45, 'AVENTADOR SVJ ROADSTER', '600.000', 'Limited to a mere 800 examples, the SVJ Roadster is the most iconic form of the Aventador family.  Its Lamborghini aerodynamics represent the most futuristic ever designed.', 1, 'The SVJ Roadster uses ultra-light carbon fiber for its bodywork and rigid removable roof. The body features larger air intakes and more extended side skirts, accentuated aerodynamic profiles and a lighter exhaust system mounted higher up.  The rigid roof is made using an innovative, high-pressure RTM molding technology.  The SVJ 63 Roadster, produced in a limited edition of only 63 examples, features an even more dynamic and exclusive appearance. ', 'new'),
(46, 'Aventador LP 780-4 Ultimae ', '650.000', 'The latest version of Aventador is not only powerful, it is the most powerful Aventador ever made. With the highest-performing standard-production naturally aspirated V12 engine in Lamborghini history.', 1, 'The latest version of Aventador is not only powerful, it is the most powerful Aventador ever made. With the highest-performing standard-production naturally aspirated V12 engine in Lamborghini history, it incorporates advanced technological solutions and unparalleled design. This gem, to be produced in only 350 units, is the final—and greatest—expression of a family of super sports cars that has left its mark on the last decade. Aventador LP 780-4 Ultimae is already a classic transformed into an icon.', 'new'),
(47, 'Aventador 780-4 Ultimae Roadster', '620.000', 'The Roadster’s Lamborghini DNA is unmistakable, with even sharper lines and a perfect contrast of sophistication and aggression: a design masterpiece in which aesthetic and practical perfection is no longer just an ideal.', 1, 'Imagine a super sports car in which the most advanced technological solutions and the incomparable Aventador design merge together with the thrill of open-air driving: a pure, adrenaline-filled experience. With a production of only 250 units, the Aventador 780-4 Ultimae Roadster is the newest—and final—open-top version of a legendary family. Its 780 CV V12, the latest and most powerful standard-production, naturally aspirated engine in Lamborghini history, makes this model the most iconic of the Aventador range.', 'new'),
(48, 'Huracán STO', '700.000', 'A super-sports car created with a singular purpose, the Huracán STO delivers all the feel and technology of a genuine race car in a road-legal model.', 2, 'A super-sports car created with a singular purpose, the Huracán STO delivers all the feel and technology of a genuine race car in a road-legal model. Lamborghini’s years-long motorsport know-how, intensified by a winning heritage, is concentrated in the new Huracán STO. Its extreme aerodynamics, track-honed handling dynamics, lightweight contents and the highest-performing V10 engine to date come together, ready to trigger all the emotions of the racetrack in your everyday life.', ''),
(49, 'Huracán EVO', '710.000', 'The Huracán EVO is the evolution of the most successful V10-powered Lamborghini ever. The result of fine-tuning and refining existing features.', 2, 'The Huracán EVO introduces refined aerodynamic solutions while remaining true to the design philosophy that is the hallmark of Lamborghini.  The front bumper adopts unmistakable Lamborghini Y-shape stylistic elements, hood lines inspired by the Countach, skirt air intakes reminiscent of the Murciélago, and central high-mounted exhaust tailpipes that recall the highest-performance Lamborghini models of the past. New features include 20-inch Aesir rims and new Ad Personam colors for the bodywork. ', ''),
(50, 'Huracán EVO Spyder', '700.000', 'The Huracán EVO Spyder lets one experience the thrill of extreme driving. Colors, smells and sounds meld with a seductive design and ultra-light materials. ', 2, 'The Huracán EVO Spyder lets one experience the thrill of extreme driving. Colors, smells and sounds meld with a seductive design and ultra-light materials.  The 640 hp naturally aspirated V10 engine roars with authority, as the exhaust announces the presence of a formidable machine. The aerodynamic lines of the super sports car, perfectly streamlined, slice through the air.', ''),
(51, 'Huracán EVO Fluo Capsule', '650.000', 'The Roadster’s Lamborghini DNA is unmistakable, with even sharper lines and a perfect contrast of sophistication and aggression: a design masterpiece in which aesthetic and practical perfection is no longer just an ideal.', 2, 'The Huracán EVO introduces refined aerodynamic solutions while remaining true to the design philosophy that is the hallmark of Lamborghini.  The front bumper adopts unmistakable Lamborghini Y-shape stylistic elements, hood lines inspired by the Countach, skirt air intakes reminiscent of the Murciélago, and central high-mounted exhaust tailpipes that recall the highest-performance Lamborghini models of the past. New features include 20-inch Aesir rims and new Ad Personam colors for the bodywork. ', ''),
(52, 'Huracán EVO RWD Spyder', '650.000', 'The Huracán EVO RWD Spyder is dedicated to those who believe in the pure pleasure and excitement of driving, an experience heightened by the adrenaline that comes.', 2, 'The Huracán EVO RWD Spyder is dedicated to those who believe in the pure pleasure and excitement of driving, an experience heightened by the adrenaline that comes from open-top performance. Discovering new roads with the wind in your hair, heart racing with the sound of the engine, gives you an unparalleled feeling of freedom as you accelerate toward new emotions. The magic unfolds as you “return to rear-wheel drive” and immerse yourself in the tactile sensations and the mechanical purity of a Lamborghini.', ''),
(53, 'Urus', '650.000', 'The soul of a super sports car and the functionality of an SUV: Lamborghini Urus is the first Super Sport Utility Vehicle in the world. With extreme proportions.', 3, 'The soul of a super sports car and the functionality of an SUV: Lamborghini Urus is the first Super Sport Utility Vehicle in the world. With extreme proportions, breathtaking design, extraordinary driving dynamics and heart-pounding performance, Urus represents freedom in its quintessential state. You can experience any road, from track to the sand, ice, gravel or rocks, thus unlocking any road. You can explore any new terrain, thus expressing yourself.', ''),
(54, 'Urus Pearl Capsule', '715.000', 'The Urus Pearl Capsule offers a selection of exclusive pearl paints and style elements that embrace the bright colors of Lamborghini tradition.', 3, 'The Urus Pearl Capsule offers a selection of exclusive pearl paints and style elements that embrace the bright colors of Lamborghini tradition. This new realm of customization showcases the inimitable style and exhilarating performance of the world’s first Super Sport Utility Vehicle. Take the freedom of Urus to a higher level by forging new paths as an expression of yourself. Unlock any road, unlock your personality.', ''),
(55, 'Urus Graphite Capsule', '517.700', 'Limited to a mere 800 examples, the SVJ Roadster is the most iconic form of the Aventador family.  Its Lamborghini aerodynamics represent the most futuristic ever designed.', 3, 'The SVJ Roadster uses ultra-light carbon fiber for its bodywork and rigid removable roof. The body features larger air intakes and more extended side skirts, accentuated aerodynamic profiles and a lighter exhaust system mounted higher up.  The rigid roof is made using an innovative, high-pressure RTM molding technology.  The SVJ 63 Roadster, produced in a limited edition of only 63 examples, features an even more dynamic and exclusive appearance. ', ''),
(56, 'PRE-OWNED', '650.000', 'The Roadster’s Lamborghini DNA is unmistakable, with even sharper lines and a perfect contrast of sophistication and aggression: a design masterpiece in which aesthetic and practical perfection is no longer just an ideal.', 3, 'Lamborghini created the Aventador SVJ to embrace challenges head-on, combining cutting-edge technology with extraordinary design, while always refusing to compromise. In a future driven by technology, it’s easy to lose the genuine thrill of driving. But in the future shaped by Lamborghini, this won’t be left behind, because there will always be a driver behind the wheel. ', ''),
(57, 'Sián FKP 37', '517.700', 'The Sián FKP 37 is the first super sports car powered by a V12 engine and hybrid technology based on supercapacitors', 4, 'The Sián FKP 37 is the first super sports car powered by a V12 engine and hybrid technology based on supercapacitors. Its powerful V12 engine, coupled with electric boost, creates an unrivaled gem of engineering and technology. Sián—lightning in Bolognese—is a name that captures the car’s true character, foremost its speed, which exceeds 220 mph (350 km/h).', ''),
(58, 'Sián Roadster', '600.000', 'The latest version of Aventador is not only powerful, it is the most powerful Aventador ever made. With the highest-performing standard-production naturally aspirated V12 engine in Lamborghini history.', 4, 'The Huracán EVO introduces refined aerodynamic solutions while remaining true to the design philosophy that is the hallmark of Lamborghini.  The front bumper adopts unmistakable Lamborghini Y-shape stylistic elements, hood lines inspired by the Countach, skirt air intakes reminiscent of the Murciélago, and central high-mounted exhaust tailpipes that recall the highest-performance Lamborghini models of the past. New features include 20-inch Aesir rims and new Ad Personam colors for the bodywork. ', ''),
(59, 'Countach LPI 800-4', '517.700', 'The latest version of Aventador is not only powerful, it is the most powerful Aventador ever made. With the highest-performing standard-production naturally aspirated V12 engine in Lamborghini history.', 4, 'Fifty years since its unveiling at the Geneva Motor Show, the legendary Lamborghini Countach is making headlines again with a limited-series hybrid supercar celebrating the visionary design that revolutionized modern sports cars forever and laid the foundations of the Lamborghini legacy. This is the new Countach LPI 800-4. Inspired by the past, made for the future.', ''),
(60, 'Terzo Millennio', '800.000', 'Automobili Lamborghini looks to the future with a visionary approach, carrying our core values to extremes.', 4, 'Automobili Lamborghini looks to the future with a visionary approach, carrying our core values to extremes. Dictating the requirements of the third millennium, the Terzo Millennio combines energy efficiency and innovative materials to forge a path in the electric super sports car segment, guaranteeing the purest driving experience.', ''),
(61, 'Asterion ', '802.000', 'The Asterion carries with it the stylistic features and the advanced engineering solutions that characterize Lamborghini, complementing them with an innovative hybrid technology', 4, 'The Asterion carries with it the stylistic features and the advanced engineering solutions that characterize Lamborghini, complementing them with an innovative hybrid technology: for the Asterion, Lamborghini has chosen Plug-in Hybrid (PHEV) technology. Thanks to this solution, the Asterion can nimbly handle urban driving under electric power only, yet those looking for excitement can also enjoy the unique driving experience of a Lamborghini with a powerful aspirated engine. ', ''),
(62, 'Estoque', '800.000', 'The Roadster’s Lamborghini DNA is unmistakable, with even sharper lines and a perfect contrast of sophistication and aggression: a design masterpiece in which aesthetic and practical perfection is no longer just an ideal.', 4, 'The Estoque concept car is a four-door super sports car that enhances the tradition of the brand with totally new versatility. Suited for daily driving, it is the perfect match for a multi-faceted lifestyle. Conceptually speaking, the Estoque expresses the idea of a Lamborghini which is both a top-class super sports car and a highly practical GT.', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `commentUserID` int(11) NOT NULL,
  `commentContent` varchar(255) NOT NULL,
  `commentPostID` int(11) NOT NULL,
  `commentCarID` int(11) NOT NULL,
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`commentID`, `commentUserID`, `commentContent`, `commentPostID`, `commentCarID`, `commentTime`) VALUES
(15, 3, 'good', 9, 0, '2021-11-28 10:16:52'),
(16, 3, 'car good', 0, 45, '2021-11-28 10:24:29'),
(17, 1, 'test comment', 8, 0, '2021-11-28 13:55:51'),
(18, 1, 'iiggg', 0, 47, '2021-11-28 14:16:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contactID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contactID`, `userID`, `content`, `email`, `state`) VALUES
(3, 1, 'test contact', '123@gmail.com', 'new');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `imageID` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `typeID` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `img` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`imageID`, `name`, `typeID`, `type`, `img`) VALUES
(25, 'model1.jpg', 1, 'model', 0x2e2e2e),
(26, 'model2.jpg', 2, 'model', 0x2e2e2e),
(27, 'model3.jpg', 3, 'model', 0x2e2e2e),
(28, 'model4.jpg', 4, 'model', 0x2e2e2e),
(30, 'avatar.png', 2, 'user', 0x2e2e2e),
(31, 'hyundai-service.jpg', 1, 'service', NULL),
(32, 'toyota-service.jpg', 2, 'service', NULL),
(33, 'mazda-service1.jpg', 3, 'service', NULL),
(47, 'car1.jpg', 44, 'car', 0x443a78616d7070096d70706870393344382e746d70),
(48, 'car1b.jpg', 44, 'car', 0x443a78616d7070096d70706870393345382e746d70),
(49, 'car1c.jpg', 44, 'car', 0x443a78616d7070096d70706870393345392e746d70),
(50, 'car1d.jpg', 44, 'car', 0x443a78616d7070096d70706870393345412e746d70),
(51, 'car2a.jpg', 45, 'car', 0x443a78616d7070096d70706870323637412e746d70),
(52, 'car2b.jpg', 45, 'car', 0x443a78616d7070096d70706870323637422e746d70),
(53, 'car2c.jpg', 45, 'car', 0x443a78616d7070096d70706870323638422e746d70),
(54, 'car2d .jpg', 45, 'car', 0x443a78616d7070096d70706870323638432e746d70),
(55, 'car3a.jpg', 46, 'car', 0x443a78616d7070096d70706870333435442e746d70),
(56, 'car3b.jpg', 46, 'car', 0x443a78616d7070096d70706870333436442e746d70),
(57, 'car3c.jpg', 46, 'car', 0x443a78616d7070096d70706870333436452e746d70),
(58, 'car3d.jpg', 46, 'car', 0x443a78616d7070096d70706870333437462e746d70),
(59, 'car4a.jpg', 47, 'car', 0x443a78616d7070096d70706870343137322e746d70),
(60, 'car4b.jpg', 47, 'car', 0x443a78616d7070096d70706870343138322e746d70),
(61, 'car4c.jpg', 47, 'car', 0x443a78616d7070096d70706870343138332e746d70),
(62, 'car4d.jpg', 47, 'car', 0x443a78616d7070096d70706870343139342e746d70),
(63, 'car5a.jpg', 48, 'car', 0x443a78616d7070096d70706870353231432e746d70),
(64, 'car5b.jpg', 48, 'car', 0x443a78616d7070096d70706870353232442e746d70),
(65, 'car5c.jpg', 48, 'car', 0x443a78616d7070096d70706870353232452e746d70),
(66, 'car5d.jpg', 48, 'car', 0x443a78616d7070096d70706870353232462e746d70),
(67, 'car6a.jpg', 49, 'car', 0x443a78616d7070096d70706870363238432e746d70),
(68, 'car6b.jpg', 49, 'car', 0x443a78616d7070096d70706870363238442e746d70),
(69, 'car6c.jpg', 49, 'car', 0x443a78616d7070096d70706870363238452e746d70),
(70, 'car6d.jpg', 49, 'car', 0x443a78616d7070096d70706870363238462e746d70),
(71, 'car7a.jpg', 50, 'car', 0x443a78616d7070096d70706870384234382e746d70),
(72, 'car7b.jpg', 50, 'car', 0x443a78616d7070096d70706870384234392e746d70),
(73, 'car7c.jpg', 50, 'car', 0x443a78616d7070096d70706870384234412e746d70),
(74, 'car7d.jpg', 50, 'car', 0x443a78616d7070096d70706870384234422e746d70),
(75, 'car8a.jpg', 51, 'car', 0x443a78616d7070096d70706870444236362e746d70),
(76, 'car8b.jpg', 51, 'car', 0x443a78616d7070096d70706870444236372e746d70),
(77, 'car8c.jpg', 51, 'car', 0x443a78616d7070096d70706870444237372e746d70),
(78, 'car8d.jpg', 51, 'car', 0x443a78616d7070096d70706870444237382e746d70),
(79, 'car9a.jpg', 52, 'car', 0x443a78616d7070096d70706870313435442e746d70),
(80, 'car9b.jpg', 52, 'car', 0x443a78616d7070096d70706870313435452e746d70),
(81, 'car9c.jpg', 52, 'car', 0x443a78616d7070096d70706870313435462e746d70),
(82, 'car9d.jpg', 52, 'car', 0x443a78616d7070096d70706870313436302e746d70),
(83, 'car10a.jpg', 53, 'car', 0x443a78616d7070096d70706870373937362e746d70),
(84, 'car10b.jpg', 53, 'car', 0x443a78616d7070096d70706870373937372e746d70),
(85, 'car10c.jpg', 53, 'car', 0x443a78616d7070096d70706870373937382e746d70),
(86, 'car10d.jpg', 53, 'car', 0x443a78616d7070096d70706870373938382e746d70),
(87, 'car11a.jpg', 54, 'car', 0x443a78616d7070096d70706870324232352e746d70),
(88, 'car11b.jpg', 54, 'car', 0x443a78616d7070096d70706870324233362e746d70),
(89, 'car11c.jpg', 54, 'car', 0x443a78616d7070096d70706870324233372e746d70),
(90, 'car11d.jpg', 54, 'car', 0x443a78616d7070096d70706870324233382e746d70),
(91, 'car12a.jpg', 55, 'car', 0x443a78616d7070096d70706870363744422e746d70),
(92, 'car12b.jpg', 55, 'car', 0x443a78616d7070096d70706870363745422e746d70),
(93, 'car12c.jpg', 55, 'car', 0x443a78616d7070096d70706870363745432e746d70),
(94, 'car12d.jpg', 55, 'car', 0x443a78616d7070096d70706870363745442e746d70),
(95, 'car13a.jpg', 56, 'car', 0x443a78616d7070096d70706870313846352e746d70),
(96, 'car13b.jpg', 56, 'car', 0x443a78616d7070096d70706870313930362e746d70),
(97, 'car13c.jpg', 56, 'car', 0x443a78616d7070096d70706870313930372e746d70),
(98, 'car14a.jpg', 57, 'car', 0x443a78616d7070096d70706870393031332e746d70),
(99, 'car14b.jpg', 57, 'car', 0x443a78616d7070096d70706870393031342e746d70),
(100, 'car14c.jpg', 57, 'car', 0x443a78616d7070096d70706870393032342e746d70),
(101, 'car14d.jpg', 57, 'car', 0x443a78616d7070096d70706870393032352e746d70),
(102, 'car15a.jpg', 58, 'car', 0x443a78616d7070096d70706870414532342e746d70),
(103, 'car15b.jpg', 58, 'car', 0x443a78616d7070096d70706870414533352e746d70),
(104, 'car15c.jpg', 58, 'car', 0x443a78616d7070096d70706870414533362e746d70),
(105, 'car15d.jpg', 58, 'car', 0x443a78616d7070096d70706870414533372e746d70),
(106, 'car16a.jpg', 59, 'car', 0x443a78616d7070096d70706870443942332e746d70),
(107, 'car16b.jpg', 59, 'car', 0x443a78616d7070096d70706870443942342e746d70),
(108, 'car16c.jpg', 59, 'car', 0x443a78616d7070096d70706870443942352e746d70),
(109, 'car17a.jpg', 60, 'car', 0x443a78616d7070096d70706870344542442e746d70),
(110, 'car17b.jpg', 60, 'car', 0x443a78616d7070096d70706870344542452e746d70),
(111, 'car17c.jpg', 60, 'car', 0x443a78616d7070096d70706870344542462e746d70),
(112, 'car18a.jpg', 61, 'car', 0x443a78616d7070096d70706870364237422e746d70),
(113, 'car18b.jpg', 61, 'car', 0x443a78616d7070096d70706870364237432e746d70),
(114, 'car18c.jpg', 61, 'car', 0x443a78616d7070096d70706870364238432e746d70),
(115, 'car19a.jpg', 62, 'car', 0x443a78616d7070096d70706870443444322e746d70),
(116, 'car19b.jpg', 62, 'car', 0x443a78616d7070096d70706870443444332e746d70),
(117, 'car19c.jpg', 62, 'car', 0x443a78616d7070096d70706870443444342e746d70),
(118, 'news1a.jpg', 6, 'post', 0x443a78616d7070096d70706870373234342e746d70),
(119, 'news1b.jpg', 6, 'post', 0x443a78616d7070096d70706870373234352e746d70),
(120, 'news2a.jpg', 7, 'post', 0x443a78616d7070096d707068704231312e746d70),
(121, 'news2b.jpg', 7, 'post', 0x443a78616d7070096d707068704232322e746d70),
(122, 'new3a.jpg', 8, 'post', 0x443a78616d7070096d70706870323833322e746d70),
(123, 'new3b.jpg', 8, 'post', 0x443a78616d7070096d70706870323833332e746d70),
(124, 'news4a.jpg', 9, 'post', 0x443a78616d7070096d70706870334332302e746d70),
(125, 'news4b.jpg', 9, 'post', 0x443a78616d7070096d70706870334332312e746d70),
(126, 'car7a.jpg', 3, 'user', 0x443a78616d7070096d70706870394535462e746d70),
(127, 'car7a.jpg', 1, 'user', 0x443a78616d7070096d70706870373435322e746d70),
(128, 'car7d.jpg', 5, 'user', 0x443a78616d7070096d70706870394544452e746d70),
(129, 'car7c.jpg', 6, 'model', 0x443a78616d7070096d70706870394436392e746d70);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model`
--

CREATE TABLE `model` (
  `modelID` int(11) NOT NULL,
  `modelName` varchar(150) NOT NULL,
  `modelDesc` varchar(255) NOT NULL,
  `modelContent` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `model`
--

INSERT INTO `model` (`modelID`, `modelName`, `modelDesc`, `modelContent`) VALUES
(1, 'Aventador', 'The Aventador has been created to anticipate the future, as demonstrated by the use of innovative technology, including a V12 engine and the extensive use of carbon fiber.\r\nThe authentic design masterpieces together stark dynamism with aggression to produ', ''),
(2, 'Huracán', 'From our past, we\'ve learned perfection. This is how the first model of the Lamborghini Huracán was born. More performance, more control, more innovation. The Huracán is equipped with a powerful V10 engine and the latest technologies to perform at its abs', ''),
(3, 'Urus', 'Lamborghini Urus is the world’s first Super Sport Utility Vehicle, in which luxury, sportiness and performance meet comfort and versatility. It offers best-in-class driving dynamics, alongside its unmistakable elegance of design. Urus embodies the charact', ''),
(4, 'Limited Series', 'The Limited Series Lamborghini are the most exclusive, limited editions to meet a small and select number of clients. Truly representing the state of the art in the domain of super cars, the Limited Series models express the highest Lamborghini spirit in ', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `postName` varchar(255) NOT NULL,
  `postDesc` varchar(500) NOT NULL,
  `postContent` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`postID`, `postName`, `postDesc`, `postContent`, `time`) VALUES
(6, 'LAMBORGHINI SUPER TROFEO WORLD FINALS', 'The Lamborghini Super Trofeo regional championship campaign reached its conclusion at the Misano World Circuit Marco Simoncelli, with both the Europe and North America titles decided on the final day of the season in Italy', 'In the Europe championship, there was drama from start-to-finish as Oregon Team’s Kevin Gilardoni and Leonardo Pulcini clinched the title despite late-race contact with chief rival Max Weering’s Johan Kraan Motorsport team-mate Loris Spinelli at the end of Race 2. Gilardoni and Pulcini led the standings by eight points coming into the weekend but had their margin halved after retiring from Race 1 with a loose wheel. Weering also had issues in the opening encounter, finishing well down the order after picking up a puncture. The key beneficiary of this dual misfortune was the #33 Bonaldi Motorsport crew of Daan Pijl and 2019 Super Trofeo Europe champion Danny Kroes, who secured a double victory.  Spinelli and Weering took pole for Race 1 and duly led off the rolling start, maintaining their advantage throughout the first stint. Gilardoni ran ninth early on but was forced out when a wheel came loose on the #11 Oregon Team Huracán. Weering seemed to be in the clear until his own dramas in ', '2021-11-28 10:07:43'),
(7, 'LAMBORGHINI SUPER TROFEO EUROPE', 'The Nürburgring circuit in the Eifel Mountains of Germany plays host to the penultimate round of the 2021 Lamborghini Super Trofeo Europe season this weekend, with Oregon Team’s Leonardo Pulcini and Kevin Gilardoni holding a strong lead in the Pro points standings. The one-make championship, dedicated to Lamborghini Huracán Super Trofeo Evo cars is one of the most competitive in the world and the action is once more expected to be frantic across the pair of 50-minute races.', 'Last year’s event produced some of the best racing of the year as Bonaldi Motorsport’s Dean Stoneman and Kikko Galbiati and Target Racing’s Kevin Rossel and Alberto di Folco split the race wins. Of the victorious quartet, only Rossel returns to the 5.148km track this year, with GSM Racing.  In the current points standings, Pulcini and Gilardoni head into the weekend on 89 points, 21 ahead of Johan Kraan Motorsport’s Max Weering, following the pair’s fourth win of the season in Race 2 at Spa-Francorchamps at the end of July. Dutchman Weering vaulted ahead of Leipert Motorsport’s Sebastian Balthasar and Noah Watt courtesy of a fine third and fourth place finish during the Spa weekend.  Three points further back, Balthasar will be partnered by a new team-mate for the Nürburgring; 2017 British GT champion Seb Morris will take the place of Noah Watt, who has unfortunately been forced out of the remainder of the 2021 campaign. Balthasar is in turn just three points ahead of Target Racing’s G', '2021-11-28 10:10:33'),
(8, 'MUDETEC: IN SEARCH OF THE FUTURE', 'MUDETEC: IN SEARCH OF THE FUTURE The Lamborghini Museum has been updated to become Museum of Technologies, where fascinating history, the iconic models and tours of the production lines tell the story of over 50 years of innovation that project Lamborghini into the future. Mudetec offers an interactive experience, also thanks to the new driving simulator that amplifies the thrills and the discovery of the vehicles on display.  From the early visionary creations of the genius of Ferruccio Lamborg', 'Our offer of incentive tours turns into an unforgettable experience for customers and collaborators owing to the dedicated guides, personalized gadgets and customized proposals.  After the museum closes, Mudetec’s rooms turn into a magical and exclusive place where private tours and exclusive events can be organized.  The new Olimpo looking onto Manifattura Lamborghini 4.0, the technological production line of Urus, is the ideal backdrop for transforming conferences and meetings into unique experiences.The Lamborghini Museum has been updated to become Museum of Technologies, where fascinating history, the iconic models and tours of the production lines tell the story of over 50 years of innovation that project Lamborghini into the future. Mudetec offers an interactive experience, also thanks to the new driving simulator that amplifies the thrills and the discovery of the vehicles on display.  From the early visionary creations of the genius of Ferruccio Lamborghini like the Miura and C', '2021-11-28 10:13:57'),
(9, 'THE SINGLE-MAKE SERIES WILL RUN ITS 100TH RACE THIS WEEKEND AT ROAD AMERICA', 'Lamborghini Super Trofeo North America will celebrate a milestone this weekend at Road America, when the single-make series featuring the sleek and powerful Lamborghini Huracán Super Trofeo Evo cars conducts its 100th race.  The North American leg of Lamborghini Super Trofeo launched on Independence Day weekend in 2013, with Lee Davis and Ryan Eversley teaming to win the maiden race at Lime Rock Park. The race count stands now at 98 ahead of the Saturday-Sunday doubleheader at the iconic road co', 'Lamborghini Super Trofeo North America will celebrate a milestone this weekend at Road America, when the single-make series featuring the sleek and powerful Lamborghini Huracán Super Trofeo Evo cars conducts its 100th race.  The North American leg of Lamborghini Super Trofeo launched on Independence Day weekend in 2013, with Lee Davis and Ryan Eversley teaming to win the maiden race at Lime Rock Park. The race count stands now at 98 ahead of the Saturday-Sunday doubleheader at the iconic road course in Elkhart Lake, Wisconsin.  As Senior Manager of Motorsports for Automobili Lamborghini America, Chris Ward has been there every step of the way, leading the effort to build the North American series from the ground up. It started nearly a decade ago, coaxing teams, drivers and Lamborghini dealers to become involved. From a 10-car field in that first race eight years ago, the series has grown to a record 30 entries at events this year.  “We’re massively proud of where the series is today, ', '2021-11-28 10:16:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(150) NOT NULL,
  `serviceDesc` varchar(1000) NOT NULL,
  `serviceContent` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`serviceID`, `serviceName`, `serviceDesc`, `serviceContent`) VALUES
(1, 'FINANCIAL SERVICE', 'Financial services are the economic services provided by the finance industry, which encompasses a broad range of businesses that manage money, including credit unions, banks, credit-card companies, insurance companies, accountancy companies, consumer-finance companies, stock brokerages, investment funds, individual managers, and some government-sponsored.', 'The term \"financial services\" became more prevalent in the United States partly as a result of the Gramm–Leach–Bliley Act of the late 1990s, which enabled different types of companies operating in the U.S. financial services industry at that time to merge.[3]\r\nCompanies usually have two distinct approaches to this new type of business. One approach would be a bank that simply buys an insurance company or an investment bank, keeps the original brands of the acquired firm, and adds the acquisition to its holding company simply to diversify its earnings. Outside the U.S. (e.g. Japan), non-financial services companies are permitted within the holding company. In this scenario, each company still looks independent and has its own customers, etc. In the other style, a bank would simply create its own insurance division or brokerage division and attempt to sell those products to its own existing customers, with incentives for combining all things with one company.A financial export is a finan'),
(2, 'CAR UPGRADE', 'Skim the pages of Superstreet or Stanceworks, and you\'ll see a never-ending thread of cars that look nothing like they did when rolling off the showroom floor. If you\'re wanting to give your ride a little extra personality, there are plenty of options out there. This guide will give you some quick insight into the many things you can bolt, glue, or weld onto your pride and joy and let you know why you should upgrade your ride in the first place.', 'Air intakes can offer a very nominal bump in performance — much more so in conjunction with other upgrades to your car\'s intake and fuel systems. Performance gains aside, a cold-air intake setup is a nice visual upgrade for your engine, and it also adds a notable (and kinda cool) sound to the engine as it draws air in — especially at full-throttle. Skim the pages of Superstreet or Stanceworks, and you\'ll see a never-ending thread of cars that look nothing like they did when rolling off the showroom floor. If you\'re wanting to give your ride a little extra personality, there are plenty of options out there. This guide will give you some quick insight into the many things you can bolt, glue, or weld onto your pride and joy and let you know why you should upgrade your ride in the first place.Skim the pages of Superstreet or Stanceworks, and you\'ll see a never-ending thread of cars that look nothing like they did when rolling off the showroom floor. If you\'re wanting to give your ride a li'),
(3, 'MAINTENANCE', 'Car Maintenance Tips To Help Keep Your Vehicle In Good Shape.Properly maintaining your car is key to keeping it in top condition. It can also help ensure your safety, the safety of your passengers and your fellow drivers. Here are some ways to help keep your car running smoothly.', 'Knowing how to maintain your car\'s tire pressure can help reduce wear on the tires and helps ensure you\'re getting good gas mileage. Checking your tire pressure includes finding the recommended pressure, checking the PSI and inflating or deflating your tires accordingly.\r\n\r\nA flat tire is a hazard that can be dangerous to you and your car. There are several preventative steps you can take to help avoid a blowout, including rotating your tires every 5,000 to 10,000 miles and watching for tire recalls.\r\nRoutinely checking and changing your car\'s oil is essential to keeping its engine in running condition. Check your oil each month and change it as directed in the car\'s owner\'s manual.\r\n\r\nYou can change your oil yourself or take it to a service center. If you choose to do it yourself, learn the necessary steps to drain the fluid, set the correct oil level and dispose of old oil.\r\n\r\nYou should also know which type of motor oil is best for your car, regardless of whether you change the oil ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `storeID` int(11) NOT NULL,
  `storeName` varchar(150) NOT NULL,
  `storeDesc` varchar(255) NOT NULL,
  `storeEmail` varchar(150) NOT NULL,
  `storePhone` varchar(150) NOT NULL,
  `storeAddress` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`storeID`, `storeName`, `storeDesc`, `storeEmail`, `storePhone`, `storeAddress`) VALUES
(1, 'Car City', 'abc', 'carcity@hcmut.edu.vn', '0909123456', '268 Lý Thường Kiệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(150) NOT NULL,
  `userPhone` varchar(150) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userRole` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPhone`, `userAddress`, `userPassword`, `userRole`) VALUES
(1, 'test', 'test@gmail.com', '0123', 'ở nhà', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(3, 'admin', 'admin@gmail.com', '0123', 'abc', '202cb962ac59075b964b07152d234b70', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageID`);

--
-- Chỉ mục cho bảng `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`modelID`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `model`
--
ALTER TABLE `model`
  MODIFY `modelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `store`
--
ALTER TABLE `store`
  MODIFY `storeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
