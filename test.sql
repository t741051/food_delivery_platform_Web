-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-06-07 08:39:13
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `food_attribute`
--

CREATE TABLE `food_attribute` (
  `restaurant_id` varchar(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `food_name` varchar(10) CHARACTER SET big5 NOT NULL,
  `food_price` int(10) NOT NULL,
  `food_image` longblob DEFAULT NULL,
  `food_category` varchar(10) CHARACTER SET big5 DEFAULT NULL,
  `food_attribute` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `food_attribute`
--

INSERT INTO `food_attribute` (`restaurant_id`, `food_id`, `food_name`, `food_price`, `food_image`, `food_category`, `food_attribute`) VALUES
('rest_1', 17, '培根青蔥卷', 50, NULL, '燒烤', '無'),
('rest_1', 18, '雞肉串燒', 55, NULL, '燒烤', '無'),
('rest_1', 19, '牛肉串', 65, NULL, '燒烤', '無'),
('rest_1', 20, '豬肉串', 55, NULL, '燒烤', '無'),
('rest_1', 21, '烤白蝦', 70, NULL, '燒烤', '無'),
('rest_1', 22, '烤生蠔', 75, NULL, '燒烤', '無'),
('rest_1', 23, '雪碧', 40, NULL, '飲料', '無'),
('rest_1', 24, '綠茶', 30, NULL, '飲料', '無'),
('rest_2', 0, '時蔬拌飯', 120, NULL, '飯類', '無'),
('rest_2', 1, '野菜冷麵', 100, NULL, '麵類', '無'),
('rest_2', 2, '南瓜拌麵', 90, NULL, '麵類', '無'),
('rest_2', 3, '紅茶', 35, NULL, '飲料', '無'),
('rest_3', 0, '花生醬牛肉堡', 90, NULL, '漢堡', '無'),
('rest_3', 1, '培根起司堡', 99, NULL, '漢堡', '無'),
('rest_3', 2, '啤酒', 75, NULL, '飲料', '無'),
('rest_3', 3, '洋蔥圈', 70, NULL, '單點', '無');

-- --------------------------------------------------------

--
-- 資料表結構 `food_order`
--

CREATE TABLE `food_order` (
  `user_id` varchar(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `restaurant_id` varchar(10) NOT NULL,
  `food_attribute` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`food_attribute`)),
  `address` varchar(30) CHARACTER SET big5 NOT NULL,
  `phone` varchar(10) NOT NULL,
  `money` varchar(30) NOT NULL,
  `order_status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `food_order`
--

INSERT INTO `food_order` (`user_id`, `order_id`, `restaurant_id`, `food_attribute`, `address`, `phone`, `money`, `order_status`) VALUES
('tony', 62, 'rest_1', '{\"contents\":[{\"food_id\":\"24\",\"food_amount\":\"2\",\"food_price\":60,\"food_option\":\"\"},{\"food_id\":\"20\",\"food_amount\":\"1\",\"food_price\":55,\"food_option\":\"\"}]}', '和平街215巷41號', '0908838233', '115', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `food_order_not_submit`
--

CREATE TABLE `food_order_not_submit` (
  `user_id` varchar(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `restaurant_id` varchar(10) NOT NULL,
  `food_attribute` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`food_attribute`)),
  `address` text CHARACTER SET big5 NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `food_order_not_submit`
--

INSERT INTO `food_order_not_submit` (`user_id`, `order_id`, `restaurant_id`, `food_attribute`, `address`, `phone`) VALUES
('tony', 108, 'rest_1', '{\"contents\":[{\"food_id\":\"19\",\"food_amount\":\"0\",\"food_price\":0,\"food_option\":\"\"},{\"food_id\":\"21\",\"food_amount\":\"0\",\"food_price\":0,\"food_option\":\"\"},{\"food_id\":\"22\",\"food_amount\":\"0\",\"food_price\":0,\"food_option\":\"\"},{\"food_id\":\"17\",\"food_amount\":\"0\",\"food_price\":0,\"food_option\":\"\"},{\"food_id\":\"23\",\"food_amount\":\"0\",\"food_price\":0,\"food_option\":\"\"},{\"food_id\":\"24\",\"food_amount\":\"2\",\"food_price\":60,\"food_option\":\"\"},{\"food_id\":\"20\",\"food_amount\":\"1\",\"food_price\":55,\"food_option\":\"\"},{\"food_id\":\"18\",\"food_amount\":\"0\",\"food_price\":0,\"food_option\":\"\"}]}', '和平街215巷41號', '0908838233');

-- --------------------------------------------------------

--
-- 資料表結構 `manage_admin`
--

CREATE TABLE `manage_admin` (
  `id` varchar(10) NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `manage_admin`
--

INSERT INTO `manage_admin` (`id`, `password`) VALUES
('ann', '123456'),
('deli_1', '123456'),
('jackson', '123456'),
('jason', '123456'),
('rest_1', '123456'),
('rest_2', '123456'),
('rest_3', '123456'),
('rest_4', '123456'),
('rest_5', '123456'),
('tony', '123456');

-- --------------------------------------------------------

--
-- 資料表結構 `order_status`
--

CREATE TABLE `order_status` (
  `order_status` int(10) NOT NULL,
  `order_status_text` varchar(20) CHARACTER SET big5 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `order_status`
--

INSERT INTO `order_status` (`order_status`, `order_status_text`) VALUES
(0, '已送出，未接單'),
(1, '店家已接單'),
(2, '外送員已接單'),
(3, '外送員已抵達'),
(4, '訂單已完成');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant_attribute`
--

CREATE TABLE `restaurant_attribute` (
  `restaurant_id` varchar(10) NOT NULL,
  `restaurant_name` varchar(30) CHARACTER SET big5 NOT NULL,
  `restaurant_location` varchar(10) CHARACTER SET big5 NOT NULL,
  `restaurant_phone` varchar(20) CHARACTER SET big5 DEFAULT NULL,
  `restaurant_attribute` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `restaurant_attribute`
--

INSERT INTO `restaurant_attribute` (`restaurant_id`, `restaurant_name`, `restaurant_location`, `restaurant_phone`, `restaurant_attribute`) VALUES
('rest_1', '串燒食堂', '台北', '03 657 8086', NULL),
('rest_2', '奇蹟健康蔬食', '台北', '03 668 5352', NULL),
('rest_3', 'THEFREEN BURGER', '台北', '02 2382 2666', NULL),
('rest_4', '義家小館', '桃園', ' 0903 393 098', NULL),
('rest_5', '香草法式廚房', '新竹', ' 02 2371 7666', NULL),
('rest_6', 'Goodies Cuisine Bistrot', '台北', '02 8771 8285', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` varchar(10) NOT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`json`))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `test`
--

INSERT INTO `test` (`id`, `json`) VALUES
('5', '[{\"food_id\":1,\"food_amount\":2,\"food_price\":0,\"food_option\":\"\"},{\"food_id\":2,\"food_amount\":2,\"food_price\":10,\"food_option\":\"\"},{\"food_id\":3,\"food_amount\":2,\"food_price\":20,\"food_option\":\"\"},{\"food_id\":4,\"food_amount\":2,\"food_price\":30,\"food_option\":\"\"},{\"food_id\":5,\"food_amount\":2,\"food_price\":40,\"food_option\":\"\"}]'),
('7', '{\"contents\":[{\"food_id\":1,\"food_amount\":2,\"food_price\":0,\"food_option\":\"\"},{\"food_id\":2,\"food_amount\":2,\"food_price\":10,\"food_option\":\"\"},{\"food_id\":3,\"food_amount\":2,\"food_price\":20,\"food_option\":\"\"},{\"food_id\":4,\"food_amount\":2,\"food_price\":30,\"food_option\":\"\"},{\"food_id\":5,\"food_amount\":2,\"food_price\":40,\"food_option\":\"\"}]}');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `food_attribute`
--
ALTER TABLE `food_attribute`
  ADD PRIMARY KEY (`restaurant_id`,`food_id`);

--
-- 資料表索引 `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- 資料表索引 `food_order_not_submit`
--
ALTER TABLE `food_order_not_submit`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `restaurant_id` (`restaurant_id`) USING BTREE;

--
-- 資料表索引 `manage_admin`
--
ALTER TABLE `manage_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status`);

--
-- 資料表索引 `restaurant_attribute`
--
ALTER TABLE `restaurant_attribute`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `food_order_not_submit`
--
ALTER TABLE `food_order_not_submit`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=908838241;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `food_attribute`
--
ALTER TABLE `food_attribute`
  ADD CONSTRAINT `food_attribute_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant_attribute` (`restaurant_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
