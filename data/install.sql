-- show databases;
drop database if exists TestShell;
create database TestShell;
use TestShell;
/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80016
 Source Host           : localhost:3306
 Source Schema         : nku-calendar

 Target Server Type    : MySQL
 Target Server Version : 80016
 File Encoding         : 65001

 Date: 15/07/2019 15:34:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` smallint(2) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `identity` smallint(6) NOT NULL,
  `phone` int(255) DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of admin
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES (150, 'admin_qili', 'dB2aw_dw_0hnlu_fraJthFrWvXda4iS4', '$2y$13$.1JSNZ2m.NPdtgPeMilkZeuRrb5WBnlvh2aA4P0Q35umITavHrL4u', NULL, '851588993@qq.com', 10, 10, NULL, NULL, 0, NULL, 0, NULL, '计算机学院');
INSERT INTO `admin` VALUES (151, 'admin_xixi', 'VYif-K2HHnFRBW0VeD3rjvSH-w1bqVv4', '$2y$13$M17a7ibCGyh7CebBtrRc4ucQML2QeK98kKu7jg3yt/EvEPQgAtB3e', NULL, '13124141@qq.com', 10, 10, NULL, NULL, 0, NULL, 0, NULL, '金融学院');
COMMIT;

-- ----------------------------
-- Table structure for cevent
-- ----------------------------
DROP TABLE IF EXISTS `cevent`;
CREATE TABLE `cevent` (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_start_time` timestamp NULL DEFAULT NULL,
  `ev_title` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ev_adminid` int(11) DEFAULT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ev_number` int(11) DEFAULT '0',
  `cev_tid` int(11) DEFAULT NULL,
  `ev_maxnumber` int(11) NOT NULL,
  `ev_summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ev_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ev_label_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ev_end_time` timestamp NULL DEFAULT NULL,
  `ev_created_at` datetime DEFAULT NULL,
  `ev_updated_at` datetime DEFAULT NULL,
  `ev_signup_endtime` timestamp NULL DEFAULT NULL,
  `all_day` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE,
  KEY `f1` (`ev_adminid`) USING BTREE,
  KEY `f5` (`cev_tid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cevent
-- ----------------------------
BEGIN;
INSERT INTO `cevent` VALUES (1, '2019-07-12 08:00:00', '百年南开', 150, '计控楼', 3, 1, 100, '讲座', '百年校庆素拓活动', '/image/20190711/1562824105276134.png', '2019-07-12 11:00:00', '2019-07-04 14:21:46', '2019-07-05 14:21:52', '2019-07-11 19:00:00', NULL);
INSERT INTO `cevent` VALUES (2, '2019-07-13 13:00:00', '百年南开2', 150, '计控楼', 1, 2, 200, '讲座', '<p>南开大讲堂</p>', '/image/20190711/1562824105276134.png', '2019-07-13 15:00:00', '2019-07-12 14:21:58', '2019-07-14 11:25:48', '2019-07-12 13:00:00', NULL);
INSERT INTO `cevent` VALUES (3, '2019-07-19 00:00:00', '百年南开3', 150, '计控楼', 0, 2, 200, '讲座', '南开大讲堂2', '/image/20190711/1562824668269508.jpeg', '2019-07-19 01:05:00', '2019-07-11 14:22:04', '2019-07-11 14:35:48', '2019-07-11 10:50:00', NULL);
INSERT INTO `cevent` VALUES (4, '2019-07-11 10:50:00', '百年南开4', 150, '计控楼', 0, 3, 50, '讲座', '南开大讲堂4', '/image/20190711/1562827503511389.jpeg', '2019-07-11 15:50:00', '2019-07-11 14:45:05', '2019-07-11 14:45:05', '2019-07-11 10:50:00', NULL);
INSERT INTO `cevent` VALUES (5, '2019-07-20 11:30:00', '金融南开', 151, '金融楼', 0, 3, 30, '讲座', '<p><strong>这是一个看起来很有趣的活动</strong></p>', '/image/20190714/1563075163392904.jpeg', '2019-07-20 13:30:00', '2019-07-14 11:33:02', '2019-07-14 11:33:02', '2019-07-19 11:30:00', NULL);
INSERT INTO `cevent` VALUES (6, '2019-07-14 11:50:00', '金融南开2', 151, '金融楼', 0, 2, 50, '讲座', '<p><span style=\"color: rgb(192, 0, 0);\"><em>真的很有趣呀</em></span></p><p><span style=\"color: rgb(31, 73, 125);\"><em>快来呀</em></span></p>', '/image/20190714/1563076458528077.jpeg', '2019-07-14 13:50:00', '2019-07-14 11:54:46', '2019-07-14 11:54:46', '2019-07-12 11:50:00', NULL);
INSERT INTO `cevent` VALUES (7, '2019-07-15 22:00:00', '干lww', 150, '207', 1, 1, 4, '无', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0018.gif\"/></p>', '', '2019-07-16 08:00:00', '2019-07-15 09:01:58', '2019-07-15 09:01:58', '2019-07-17 09:00:00', NULL);
INSERT INTO `cevent` VALUES (8, '2019-07-15 22:00:00', '干lww', 150, '207', 0, 1, 40, '无', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0018.gif\"/></p>', '', '2019-07-16 08:00:00', '2019-07-15 09:03:40', '2019-07-15 09:51:30', '2019-07-17 09:00:00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `com_time` timestamp NULL DEFAULT NULL,
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_userid` int(11) DEFAULT NULL,
  `com_content` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_eveid` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`) USING BTREE,
  KEY `发送_FK` (`com_userid`) USING BTREE,
  KEY `f7` (`com_eveid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of comment
-- ----------------------------
BEGIN;
INSERT INTO `comment` VALUES ('2019-07-13 10:31:29', 1, 143, '假装评论一下！', 1);
INSERT INTO `comment` VALUES ('2019-07-13 15:02:39', 2, 143, '啊啊啊！', 1);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:41', 3, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:44', 4, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:45', 5, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:47', 6, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:49', 7, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:54', 8, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:55', 9, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:58', 10, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:25:59', 11, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:26:00', 12, 1, 'dfijfa', 3);
INSERT INTO `comment` VALUES ('2019-07-13 21:26:55', 13, 1, 'lalala', 3);
COMMIT;

-- ----------------------------
-- Table structure for custom_event
-- ----------------------------
DROP TABLE IF EXISTS `custom_event`;
CREATE TABLE `custom_event` (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ev_userid` int(11) NOT NULL,
  `ev_color` int(11) DEFAULT '0',
  `ev_description` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '这是一件十分十分重要的事',
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of custom_event
-- ----------------------------
BEGIN;
INSERT INTO `custom_event` VALUES (1, 'play with lrf', 1, 7, '', '');
INSERT INTO `custom_event` VALUES (2, '啦啦啦', 153, 1, '玩玩玩玩玩玩', '207');
INSERT INTO `custom_event` VALUES (5, '1111', 143, 1, '222', '207');
INSERT INTO `custom_event` VALUES (6, '好好学习', 143, 5, '333', '2');
INSERT INTO `custom_event` VALUES (7, '玩游戏', 143, 4, '111', '207');
COMMIT;

-- ----------------------------
-- Table structure for evaluation
-- ----------------------------
DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE `evaluation` (
  `eva_id` int(11) NOT NULL,
  `eva_comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `eva_userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`eva_id`) USING BTREE,
  KEY `f15` (`eva_userid`) USING BTREE,
  CONSTRAINT `f15` FOREIGN KEY (`eva_userid`) REFERENCES `student` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for event
-- ----------------------------
DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `ev_time` timestamp NULL DEFAULT NULL,
  `ev_title` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ev_id` int(11) NOT NULL,
  `ev_adminid` int(11) NOT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ev_maxnumber` int(11) NOT NULL,
  `ev_number` int(11) DEFAULT NULL,
  `ev_content` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for feeds
-- ----------------------------
DROP TABLE IF EXISTS `feeds`;
CREATE TABLE `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `content` varchar(255) NOT NULL COMMENT '内容',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='聊天信息表';

-- ----------------------------
-- Records of feeds
-- ----------------------------
BEGIN;
INSERT INTO `feeds` VALUES (24, 143, '我爱李瑞峰', 1563150949);
INSERT INTO `feeds` VALUES (25, 143, '是大家发斯蒂芬', 1563152036);
COMMIT;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of migration
-- ----------------------------
BEGIN;
INSERT INTO `migration` VALUES ('m000000_000000_base', 1498718139);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1498718158);
COMMIT;

-- ----------------------------
-- Table structure for operation1
-- ----------------------------
DROP TABLE IF EXISTS `operation1`;
CREATE TABLE `operation1` (
  `ev_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `op1_time` timestamp NULL DEFAULT NULL,
  `op1_status` int(11) NOT NULL,
  `op1_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`op1_id`) USING BTREE,
  KEY `操作1_FK` (`ev_id`) USING BTREE,
  KEY `操作2_FK` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of operation1
-- ----------------------------
BEGIN;
INSERT INTO `operation1` VALUES (3, 1, '2019-07-13 20:56:55', 1, 3);
INSERT INTO `operation1` VALUES (2, 1, '2019-07-13 21:07:18', 1, 4);
INSERT INTO `operation1` VALUES (3, 1, '2019-07-13 21:26:58', 0, 5);
INSERT INTO `operation1` VALUES (1, 143, '2019-07-15 08:54:06', 1, 6);
INSERT INTO `operation1` VALUES (7, 143, '2019-07-15 09:05:13', 1, 7);
COMMIT;

-- ----------------------------
-- Table structure for pevent
-- ----------------------------
DROP TABLE IF EXISTS `pevent`;
CREATE TABLE `pevent` (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_time` timestamp NULL DEFAULT NULL,
  `ev_name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ev_userid` int(11) NOT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ev_superevent_id` int(11) DEFAULT NULL,
  `ev_description` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '这是一件十分十分重要的事',
  `ev_color` int(11) DEFAULT '0',
  `ev_status` int(11) DEFAULT '0',
  `all_day` tinyint(1) DEFAULT '0',
  `ev_end` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pevent
-- ----------------------------
BEGIN;
INSERT INTO `pevent` VALUES (1, '2019-08-01 00:01:01', '自习', 1, '计算机学院530', 1, '好好学习，天天向上', 0, 1, 0, '2019-07-18 18:20:00');
INSERT INTO `pevent` VALUES (10, '1999-01-01 01:01:01', '1', 1, '1', 1, '1', 1, 1, 0, NULL);
INSERT INTO `pevent` VALUES (11, '2019-07-12 00:00:00', '测试！', 1, '102', NULL, '你好', 7, 0, 0, NULL);
INSERT INTO `pevent` VALUES (12, '2019-07-10 23:40:00', '干lww', 1, '207', NULL, '好好学习，天天向上', 5, 0, 0, NULL);
INSERT INTO `pevent` VALUES (51, '2019-06-11 06:00:00', '锻炼身体', 1, '1', 2, '1', 1, 0, 0, '2019-06-11 07:00:00');
INSERT INTO `pevent` VALUES (52, '2019-06-03 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-06-03 01:00:00');
INSERT INTO `pevent` VALUES (53, '2019-06-05 00:00:00', '锻炼身体', 1, '1', 2, '1', 1, 0, 0, '2019-06-05 01:00:00');
INSERT INTO `pevent` VALUES (54, '2019-06-05 00:00:00', '1', 1, '1', 5, '1', 1, 0, 0, '2019-06-05 01:00:00');
INSERT INTO `pevent` VALUES (55, '2019-06-28 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-06-28 01:00:00');
INSERT INTO `pevent` VALUES (56, '2019-06-28 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-06-28 01:00:00');
INSERT INTO `pevent` VALUES (57, '2019-06-29 00:00:00', '锻炼身体', 1, '1', 2, '1', 1, 0, 0, '2019-06-29 01:00:00');
INSERT INTO `pevent` VALUES (58, '2019-06-29 08:30:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-06-29 09:30:00');
INSERT INTO `pevent` VALUES (59, '2019-06-10 00:00:00', '1', 1, '1', 5, '1', 1, 0, 0, '2019-06-10 01:00:00');
INSERT INTO `pevent` VALUES (60, '2019-06-01 00:00:00', '自习', 1, '计算机学院530', 1, '好好学习，天天向上', 0, 0, 0, '2019-06-01 01:00:00');
INSERT INTO `pevent` VALUES (61, '2019-06-01 00:00:00', '自习', 1, '计算机学院530', 1, '好好学习，天天向上', 0, 0, 0, '2019-06-01 01:00:00');
INSERT INTO `pevent` VALUES (62, '2019-06-15 00:00:00', '自习', 1, '计算机学院530', 1, '好好学习，天天向上', 0, 0, 0, '2019-06-15 01:00:00');
INSERT INTO `pevent` VALUES (63, '2019-06-04 00:00:00', '自习', 1, '计算机学院530', 1, '好好学习，天天向上', 0, 0, 0, '2019-06-04 01:00:00');
INSERT INTO `pevent` VALUES (64, '2019-05-30 00:00:00', '自习', 1, '计算机学院530', 1, '好好学习，天天向上', 0, 0, 0, '2019-05-30 01:00:00');
INSERT INTO `pevent` VALUES (65, '2019-07-04 00:00:00', '锻炼身体', 1, '1', 2, '1', 2, 0, 0, '2019-07-04 01:00:00');
INSERT INTO `pevent` VALUES (66, '2019-07-11 12:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-11 13:00:00');
INSERT INTO `pevent` VALUES (67, '2019-07-11 09:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-11 10:00:00');
INSERT INTO `pevent` VALUES (68, '2019-07-11 15:30:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-11 16:30:00');
INSERT INTO `pevent` VALUES (69, '2019-07-12 19:30:00', '1', 1, '1', 5, '1', 1, 0, 0, '2019-07-12 20:30:00');
INSERT INTO `pevent` VALUES (70, '2019-07-17 00:00:00', '1', 1, '1', 5, '1', 1, 0, 0, '2019-07-17 01:00:00');
INSERT INTO `pevent` VALUES (71, '2019-07-26 00:00:00', '自习', 1, '计算机学院530', 1, '好好学习，天天向上', 0, 0, 0, '2019-07-26 01:00:00');
INSERT INTO `pevent` VALUES (72, '2019-07-23 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-23 01:00:00');
INSERT INTO `pevent` VALUES (73, '2019-07-08 14:30:00', '锻炼身体', 1, '1', 2, '1', 1, 0, 0, '2019-07-08 15:30:00');
INSERT INTO `pevent` VALUES (74, '2019-07-16 14:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-25 18:00:00');
INSERT INTO `pevent` VALUES (75, '2019-07-15 00:00:00', '玩游戏', 1, '207', 6, '玩玩玩玩玩玩', 4, 0, 0, '2019-07-15 01:00:00');
INSERT INTO `pevent` VALUES (76, '2019-07-11 02:00:00', '自习', 144, '1111', 7, '啦啦啦', 1, 0, 0, '2019-07-11 22:55:00');
INSERT INTO `pevent` VALUES (77, '2019-07-09 09:00:00', '自习', 144, '1111', 7, '啦啦啦', 1, 0, 0, '2019-07-09 10:00:00');
INSERT INTO `pevent` VALUES (78, '2019-07-09 05:00:00', '自习', 144, '1111', 7, '啦啦啦', 1, 0, 0, '2019-07-09 06:00:00');
INSERT INTO `pevent` VALUES (79, '2019-07-10 00:00:00', '自习', 144, '1111', 7, '啦啦啦', 1, 0, 0, '2019-07-10 01:00:00');
INSERT INTO `pevent` VALUES (80, '2019-07-10 15:00:00', '自习', 144, '1111', 7, '啦啦啦', 1, 0, 0, '2019-07-10 16:00:00');
INSERT INTO `pevent` VALUES (81, '2019-07-10 15:00:00', 'lalala', 1, '207', NULL, '111', 0, 0, 0, '2019-07-10 16:00:00');
INSERT INTO `pevent` VALUES (82, '2019-07-02 00:00:00', '锻炼身体', 1, '1', 2, '1', 1, 0, 0, '2019-07-02 01:00:00');
INSERT INTO `pevent` VALUES (83, '2019-07-09 00:30:00', '自习', 1, '计算机学院530', 1, '好好学习，天天向上', 0, 0, 0, '2019-07-09 01:30:00');
INSERT INTO `pevent` VALUES (84, '2019-07-01 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-01 01:00:00');
INSERT INTO `pevent` VALUES (85, '2019-07-03 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-03 01:00:00');
INSERT INTO `pevent` VALUES (86, '2019-07-05 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-05 01:00:00');
INSERT INTO `pevent` VALUES (87, '2019-07-07 03:00:00', '锻炼身体', 1, '1', 2, '1', 1, 0, 0, '2019-07-07 04:00:00');
INSERT INTO `pevent` VALUES (88, '2019-07-02 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-02 01:00:00');
INSERT INTO `pevent` VALUES (89, '2019-07-13 00:00:00', '1', 1, '1', 5, '1', 1, 0, 0, '2019-07-13 01:00:00');
INSERT INTO `pevent` VALUES (90, '2019-07-01 00:00:00', '好好学习', 1, '1', 4, '1', 4, 0, 0, '2019-07-01 01:00:00');
INSERT INTO `pevent` VALUES (91, '2019-07-03 00:00:00', 'play with lrf', 1, '', 1, '', 7, 0, 0, '2019-07-03 01:00:00');
INSERT INTO `pevent` VALUES (92, '2019-07-02 00:00:00', '啦啦啦', 153, '207', 2, '玩玩玩玩玩玩', 1, 0, 0, '2019-07-02 01:00:00');
INSERT INTO `pevent` VALUES (93, '2019-07-02 00:00:00', '干lww', 143, '207', 3, '干lww', 3, 1, 0, '2019-07-02 01:00:00');
INSERT INTO `pevent` VALUES (94, '2019-07-16 22:00:00', '干lww', 143, '207', 3, '干lww', 3, 0, 0, '2019-07-16 23:00:00');
INSERT INTO `pevent` VALUES (95, '2019-07-16 10:30:00', '1111', 143, '207', 5, '222', 1, 0, 0, '2019-07-16 11:30:00');
INSERT INTO `pevent` VALUES (96, '2019-07-09 00:00:00', '玩游戏', 143, '207', 7, '111', 4, 0, 0, '2019-07-09 01:00:00');
COMMIT;

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  CONSTRAINT `student_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of student
-- ----------------------------
BEGIN;
INSERT INTO `student` VALUES (1, 1);
COMMIT;

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `user_id` int(11) NOT NULL,
  `position` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  CONSTRAINT `teacher_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of teacher
-- ----------------------------
BEGIN;
INSERT INTO `teacher` VALUES (1, '教师');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(20) DEFAULT NULL,
  `updated_at` int(20) DEFAULT NULL,
  `gender` smallint(2) NOT NULL DEFAULT '0',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `identity` smallint(6) NOT NULL DEFAULT '0',
  `phone` int(255) DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (143, 'Kraken', 'X7dsEeNDXJQ0aJyh4ENzR40Ag2U-7W8C', '$2y$13$pAdgPmuGr2GoUG9NewkEzOZeeXvr5YUcNf9Rsw4oguecJfg2Nn6Um', NULL, '1309123499@qq.com', 10, 10, NULL, NULL, 0, NULL, 0, 2147483647, '计算机学院', NULL);
INSERT INTO `user` VALUES (148, 'test', 'TgE6Pjdu7DHzcRVdxuX74-cE2i0ORkrC', '$2y$13$bT/ldJ7ybdUGCXPZ0TUu1uIb/KZZ.bzfu.YIzGDe9IizqOyViWwdi', NULL, '963744243@qq.com', 10, 10, NULL, NULL, 0, NULL, 0, 2147483647, '金融学院', NULL);
INSERT INTO `user` VALUES (149, 'jiangyue', 'wnf5CVrevR8D7At9K6AXCi0kVJxbDvry', '$2y$13$OkrEa70BdD0a.2nIO4CtCe7U6kz86aZQ3tuqqU8ewtyvZzu4cM5pC', NULL, '111111@qq.com', 10, 10, NULL, NULL, 0, NULL, 0, 2147483647, '计算机学院', NULL);
INSERT INTO `user` VALUES (152, 'liruifeng', 'SiV16vju2snv6Wai87FfwRgKVRjTnLJg', '$2y$13$LMmyj5twUn/I7ZUUNeUZt.QIN7T8g3d1/aGBg1nS.urGR213GY1M6', NULL, '1@a.com', 10, 10, 1563150109, 1563150109, 0, NULL, 0, NULL, NULL, NULL);
INSERT INTO `user` VALUES (153, 'test2', 'zNc_P7HNx-YcSdnw7efSduMdm4FMJgI4', '$2y$13$of/DHT/ZZ22rbx3XmA6ugenQR3wcTGceyuJ6V1E.ZWnv13MDi/TH.', NULL, '2@a.com', 10, 10, 1563150138, 1563150138, 0, NULL, 0, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

-- show databases;
