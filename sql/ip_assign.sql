/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50633
Source Host           : localhost:3306
Source Database       : new_msu

Target Server Type    : MYSQL
Target Server Version : 50633
File Encoding         : 65001

Date: 2016-10-29 13:50:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ip_assign
-- ----------------------------
DROP TABLE IF EXISTS `ip_assign`;
CREATE TABLE `ip_assign` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ip` varchar(255) NOT NULL COMMENT 'IP地址',
  `User` varchar(255) NOT NULL COMMENT '使用者\r\n',
  `organization` int(11) NOT NULL COMMENT '学院',
  `Location` enum('东','西') CHARACTER SET utf8mb4 NOT NULL COMMENT '办公地点',
  `Numbers` varchar(255) NOT NULL COMMENT '联系方式',
  `Remark` text NOT NULL COMMENT '备注',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
