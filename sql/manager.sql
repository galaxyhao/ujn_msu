/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50633
Source Host           : localhost:3306
Source Database       : new_msu

Target Server Type    : MYSQL
Target Server Version : 50633
File Encoding         : 65001

Date: 2016-10-29 13:50:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `Uid` int(11) NOT NULL,
  `Gid` int(11) NOT NULL COMMENT '用户组',
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '真实姓名',
  `User` int(11) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `organization` int(11) NOT NULL COMMENT '学院',
  `level` varchar(11) NOT NULL COMMENT '年级',
  `location` enum('东','西') NOT NULL COMMENT '校区',
  `numbers` int(11) NOT NULL COMMENT '联系方式',
  `remark` text NOT NULL COMMENT '备注',
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
