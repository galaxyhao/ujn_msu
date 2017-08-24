/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50633
Source Host           : localhost:3306
Source Database       : new_msu

Target Server Type    : MYSQL
Target Server Version : 50633
File Encoding         : 65001

Date: 2016-10-29 13:50:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ip_range
-- ----------------------------
DROP TABLE IF EXISTS `ip_range`;
CREATE TABLE `ip_range` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Start` varchar(255) NOT NULL DEFAULT '' COMMENT '起始ip',
  `Finish` varchar(255) NOT NULL DEFAULT '' COMMENT '终止ip',
  `Remark` text NOT NULL COMMENT '备注',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
