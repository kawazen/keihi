-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016 年 4 月 07 日 16:47
-- サーバのバージョン： 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dbkeihi`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `transport_expenses_details`
--

CREATE TABLE `transport_expenses_details` (
  `id` int(11) NOT NULL,
  `moving_date` date NOT NULL COMMENT '日付',
  `origin` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '出発地',
  `destination` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '目的地',
  `round_trip` int(11) DEFAULT NULL COMMENT '往復/片道',
  `cost` int(11) DEFAULT NULL COMMENT '金額',
  `created` datetime DEFAULT NULL COMMENT '作成日時',
  `modified` datetime DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='交通費明細';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transport_expenses_details`
--
ALTER TABLE `transport_expenses_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transport_expenses_details`
--
ALTER TABLE `transport_expenses_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;