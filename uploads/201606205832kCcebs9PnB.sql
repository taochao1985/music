-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 04:23 PM
-- Server version: 5.5.48-cll-lve
-- PHP Version: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taiquandao`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '姓名',
  `gender` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '性别',
  `store_id` int(8) NOT NULL COMMENT '分店id',
  `openid` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '微信openid',
  `school` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '在读学校',
  `mobile` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '手机号',
  `phone` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '座机',
  `status` tinyint(2) NOT NULL COMMENT '状态',
  `birthday` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '生日',
  `id_type` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '证件类型',
  `id_no` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '证件号码',
  `parents_name` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '家长姓名',
  `created` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '创建时间',
  `in_time` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '入学时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `gender`, `store_id`, `openid`, `school`, `mobile`, `phone`, `status`, `birthday`, `id_type`, `id_no`, `parents_name`, `created`, `in_time`) VALUES
(2, 'legend', 'male', 2, '', 'huashida', '13795366537', '62224825', 0, '1992-05-15', '0', '340604198205132211', 'taoc', '2016-05-11 09:39:20', '2016-05-12'),
(3, 'legend', 'female', 1, '', 'huashida', '13795366531', '62223414', 0, '2016-03-17', '0', '340604198205132211', 'taoc', '2016-05-11 10:34:26', '2016-05-25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
