-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2021 lúc 12:40 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

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
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) NOT NULL,
  `state` varchar(150) NOT NULL,
  `store` varchar(150) NOT NULL,
  `content` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car`
--

CREATE TABLE `car` (
  `carID` int(11) NOT NULL,
  `carName` varchar(150) NOT NULL,
  `carPrice` varchar(150) NOT NULL,
  `carDesc` varchar(255) NOT NULL,
  `carModel` int(11) NOT NULL,
  `carContent` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `car`
--

INSERT INTO `car` (`carID`, `carName`, `carPrice`, `carDesc`, `carModel`, `carContent`, `image`) VALUES
(1, 'Huyndai XY30', '1000000000', 'xac', 1, 'xcvas', './img/huyndai.png'),
(2, 'HONDA XY31', '2000000000', 'sadf', 3, 'ádf', './img/huyndai.png'),
(3, 'Huyndai XY32', '1500000000', 'ádf', 1, 'ádf', './img/huyndai.png'),
(4, 'Huyndai XY3', '5000000000', 'ádf', 1, 'ádf', './img/huyndai.png');

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
(1, 1, 'test ', '123@gmail.com', 'new'),
(2, 3, '123', 'leequangminh227@gmail.com', 'new');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `imageID` int(11) NOT NULL,
  `imageName` varchar(150) NOT NULL,
  `imageUrl` varchar(150) NOT NULL,
  `imageType` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model`
--

CREATE TABLE `model` (
  `modelID` int(11) NOT NULL,
  `modelName` varchar(150) NOT NULL,
  `modelDesc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `model`
--

INSERT INTO `model` (`modelID`, `modelName`, `modelDesc`, `image`) VALUES
(1, 'Hyundai', '', ''),
(2, 'Audi', '', ''),
(3, 'Honda', '', ''),
(4, 'Porsche', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `postName` varchar(150) NOT NULL,
  `postDesc` varchar(255) NOT NULL,
  `postContent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(150) NOT NULL,
  `serviceDesc` varchar(255) NOT NULL,
  `serviceContent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'test', 'test@gmail.com', '0123', 'abc', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'test2', 'test2@gmail.com', '1230', 'abc', '202cb962ac59075b964b07152d234b70', 'user'),
(3, 'minh', 'minh@gmail.com', '123123', '123123', '202cb962ac59075b964b07152d234b70', 'user');

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
  ADD PRIMARY KEY (`carID`),
  ADD KEY `carModel` (`carModel`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `model`
--
ALTER TABLE `model`
  MODIFY `modelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `store`
--
ALTER TABLE `store`
  MODIFY `storeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`carModel`) REFERENCES `model` (`modelID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
