-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-12-15 09:41:32
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `content`, `date`) VALUES
(1, 'なかひら', 'test@gmail.com', '内容', '2022-12-10 14:54:34'),
(2, 'おおた', 'natsumi@gmail.com', 'AT', '2022-12-10 14:58:07'),
(3, 'Takagi', 'satoko@gmail.com', 'VSCODE', '2022-12-10 14:58:50'),
(4, 'Natsu', 'kon@gmail.com', '888', '2022-12-10 14:59:34'),
(5, '遠藤', 'ge@gmail.com', 'b', '2022-12-10 16:05:41'),
(6, 'geb', 'qdwv', 'bebe ', '2022-12-10 16:38:30'),
(7, '', '', '', '2022-12-10 16:50:26'),
(8, '遠藤', 'qdwv', 'bbe', '2022-12-10 16:50:40'),
(9, '', '', '<script>alert(\'test\')</script>', '2022-12-10 17:08:00'),
(10, '<script>alert(\'test\')</script>', '', '', '2022-12-10 17:08:47'),
(11, '<script>alert(\'test\')</script>', '', '<script>alert(\'test\')</script>', '2022-12-10 17:19:49'),
(12, '小林', 'ggoge', 'bebebe', '2022-12-13 07:37:26'),
(13, '佐々木', 'yryrh', 'jtmm', '2022-12-13 10:42:54'),
(14, 'aaa', 'ss', 'dd', '2022-12-13 10:46:03'),
(15, 'd', 'f', 'ggg', '2022-12-13 10:46:40'),
(16, 'dfd', 'gdd', 'rere', '2022-12-13 10:47:38');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `revenue` int(11) NOT NULL,
  `asset` int(11) NOT NULL,
  `liab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `year`, `revenue`, `asset`, `liab`) VALUES
(1, 2016, 2876, 4099, 2514),
(2, 2017, 2786, 4041, 1989),
(3, 2018, 2876, 4011, 1632),
(4, 2019, 2986, 4052, 1611),
(5, 2020, 3321, 4213, 1821),
(6, 2021, 3343, 4242, 1824),
(7, 2022, 3534, 4455, 2000);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
