-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-01-07 18:37:22
-- 服务器版本： 5.7.18-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- 表的结构 `channel`
--

CREATE TABLE `channel` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `channel`
--

INSERT INTO `channel` (`id`, `name`) VALUES
(2, 'ch1'),
(4, 'ch2');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `ch_id` int(11) NOT NULL COMMENT '频道id',
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `ch_id`, `content`) VALUES
(1, 2, '{\'user\':null,\'time\':\'2018-01-06 17:12:40\',\'msg\':\'dsfsdf\\u7b2c\\u4e09\\u65b9\\u65af\\u8482\\u82ac\'}'),
(2, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 17:15:32\',\'msg\':\'\\u7684\\u53f8\\u6cd5\\u5730\\u65b9\'}'),
(3, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 17:15:36\',\'msg\':\'223233\'}'),
(4, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 17:15:45\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(5, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 17:15:54\',\'msg\':\'sdsdfds\\u9f0e\\u6298\\u8986\\u9917\'}'),
(6, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 17:15:56\',\'msg\':\'\\u76db\\u4e16\\u5ae1\\u5983\'}'),
(7, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 17:26:52\',\'msg\':\'\\u58eb\\u5927\\u592b\\u5730\\u65b9\'}'),
(8, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 17:27:24\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(9, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 17:27:56\',\'msg\':\'\\u65f6\\u7684\\u53d1\\u751f\'}'),
(10, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 17:28:42\',\'msg\':\'\\u53d1\\u65af\\u8482\\u82ac\'}'),
(11, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:15:42\',\'msg\':\'sdfsdfds\'}'),
(12, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:15:45\',\'msg\':\'sdfsdf\'}'),
(13, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:15:57\',\'msg\':\'sdfsdf\'}'),
(14, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:16:06\',\'msg\':\'sdfsdf\\u7b2c\\u4e09\\u65b9\\u65af\\u8482\\u82ac\'}'),
(15, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:16:36\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(16, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:16:49\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(17, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:17:03\',\'msg\':\'6666\'}'),
(18, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:17:13\',\'msg\':\'\\u554a\\u8c01\\u7535\\u98ce\\u6247\\u7b49\\u53d1\\u9001\\u5230\'}'),
(19, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:17:21\',\'msg\':\'11111111\'}'),
(20, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:19:37\',\'msg\':\'4444\'}'),
(21, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:19:41\',\'msg\':\'\\u662f\\u5bf9\\u65b9\\u7b54\\u590d\'}'),
(22, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:19:48\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(23, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:19:51\',\'msg\':\'\\u5565\\u5730\\u65b9\\u58eb\\u5927\\u592b\'}'),
(24, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:21:10\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(25, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:21:13\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(26, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:21:17\',\'msg\':\'\\u8eab\\u4efd\\u6c34\\u7535\\u8d39\\u5730\\u65b9\'}'),
(27, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:21:45\',\'msg\':\'\\u5565\\u5730\\u65b9\\u58eb\\u5927\\u592b\'}'),
(28, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:21:47\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(29, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:24:48\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(30, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:25:29\',\'msg\':\'\\u58eb\\u5927\\u592b\\u5730\\u65b9\'}'),
(31, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:25:33\',\'msg\':\'1111\'}'),
(32, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:27:45\',\'msg\':\'\\u662f\\u6253\\u53d1\\u6253\\u53d1\'}'),
(33, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:30:06\',\'msg\':\'\\u662f\\u6253\\u53d1\\u6253\\u53d1\'}'),
(34, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:30:22\',\'msg\':\'*#emo_39#*\'}'),
(35, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:31:06\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(36, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:31:09\',\'msg\':\'\\u8303\\u5fb7\\u8428\\u53d1\\u65af\\u8482\\u82ac\'}'),
(37, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:31:15\',\'msg\':\'\\u771f\\u7684\\u5417\'}'),
(38, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:31:17\',\'msg\':\'\\u54c8\\u54c8\'}'),
(39, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:31:18\',\'msg\':\'\\u53ef\\u4ee5\\u54c8\'}'),
(40, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:31:21\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(41, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:31:46\',\'msg\':\'\\u8fd9\\u4e2a\\u804a\\u5929\\u597d\\u54c8\'}'),
(42, 2, '{\'user\':\'PDLGY\',\'time\':\'2018-01-06 18:36:47\',\'msg\':\'\\u7b2c\\u4e09\\u65b9\\u65af\\u8482\\u82ac\'}'),
(43, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:37:03\',\'msg\':\'\\u7535\\u98ce\\u6247\\u7b49\\u53d1\\u9001\\u5230\'}'),
(44, 2, '{\'user\':\'DWIDW\',\'time\':\'2018-01-06 18:37:33\',\'msg\':\'*#emo_39#*\'}'),
(45, 4, '{\'user\':\'ATVAP\',\'time\':\'2018-01-06 18:41:05\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(46, 4, '{\'user\':\'ATVAP\',\'time\':\'2018-01-06 18:41:09\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(47, 4, '{\'user\':\'XLBZO\',\'time\':\'2018-01-06 18:41:20\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(48, 4, '{\'user\':\'XLBZO\',\'time\':\'2018-01-06 18:41:24\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b93222\'}'),
(49, 4, '{\'user\':\'OIJVF\',\'time\':\'2018-01-06 18:57:04\',\'msg\':\'dsfdsfsdf\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(50, 4, '{\'user\':\'OIJVF\',\'time\':\'2018-01-06 18:57:18\',\'msg\':\'\\u963f\\u65af\\u987f\\u53d1\\u751f\\u4e1c\\u65b9\\u95ea\\u7535*#emo_39#*\'}'),
(51, 4, '{\'user\':\'LQZPX\',\'time\':\'2018-01-06 18:57:41\',\'msg\':\'\\u6492\\u5730\\u65b9\\u6492\\u5730\\u65b9\'}'),
(52, 4, '{\'user\':\'OIJVF\',\'time\':\'2018-01-06 21:08:17\',\'msg\':\'\\u54c8\\u54c8\'}'),
(53, 4, '{\'user\':\'CWNFS\',\'time\':\'2018-01-06 21:10:31\',\'msg\':\'sdfs\\u65af\\u8482\\u82ac\\u65af\\u8482\\u82ac\'}'),
(54, 4, '{\'user\':\'CWNFS\',\'time\':\'2018-01-06 21:10:41\',\'msg\':\'*#emo_41#*\'}'),
(55, 4, '{\'user\':\'OIJVF\',\'time\':\'2018-01-07 12:58:48\',\'msg\':\'\\u5730\\u65b9\\u6c34\\u7535\\u8d39\'}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
