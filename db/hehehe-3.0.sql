/*
 Navicat Premium Data Transfer

 Source Server         : yii2
 Source Server Type    : MySQL
 Source Server Version : 100110
 Source Host           : localhost:3306
 Source Schema         : hehehe

 Target Server Type    : MySQL
 Target Server Version : 100110
 File Encoding         : 65001

 Date: 11/07/2019 21:13:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `depart_name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `depart_id` int(11) NOT NULL,
  PRIMARY KEY (`depart_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for cevent
-- ----------------------------
DROP TABLE IF EXISTS `cevent`;
CREATE TABLE `cevent`  (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_start_time` timestamp(0) NULL DEFAULT NULL,
  `ev_title` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ev_adminid` int(11) NULL DEFAULT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_number` int(11) NULL DEFAULT 0,
  `cev_tid` int(11) NULL DEFAULT NULL,
  `ev_maxnumber` int(11) NOT NULL,
  `ev_summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_label_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_end_time` timestamp(0) NULL DEFAULT NULL,
  `ev_created_at` datetime(0) NULL DEFAULT NULL,
  `ev_updated_at` datetime(0) NULL DEFAULT NULL,
  `ev_signup_endtime` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE,
  INDEX `f1`(`ev_adminid`) USING BTREE,
  INDEX `f5`(`cev_tid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cevent
-- ----------------------------
INSERT INTO `cevent` VALUES (1, '2019-07-12 08:00:00', '百年南开', NULL, '计控楼', 0, 1, 100, '讲座', '百年校庆素拓活动', '', '2019-07-12 11:00:00', NULL, NULL, '2019-07-11 19:00:00');
INSERT INTO `cevent` VALUES (2, '2019-07-13 13:00:00', '百年南开2', NULL, '计控楼', 0, 2, 200, '讲座', '南开大讲堂', '/image/20190711/1562824105276134.png', '2019-07-13 15:00:00', NULL, NULL, '2019-07-12 13:00:00');
INSERT INTO `cevent` VALUES (3, '2019-07-19 00:00:00', '百年南开3', 11, '计控楼', 0, 2, 200, '讲座', '南开大讲堂2', '/image/20190711/1562824668269508.jpeg', '2019-07-19 01:05:00', NULL, '2019-07-11 14:35:48', '2019-07-11 10:50:00');
INSERT INTO `cevent` VALUES (4, '2019-07-11 10:50:00', '百年南开4', 111, '计控楼', 0, 3, 50, '讲座', '南开大讲堂4', '/image/20190711/1562827503511389.jpeg', '2019-07-11 15:50:00', '2019-07-11 14:45:05', '2019-07-11 14:45:05', '2019-07-11 10:50:00');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `com_time` timestamp(0) NULL DEFAULT NULL,
  `com_id` int(11) NOT NULL,
  `com_userid` int(11) NULL DEFAULT NULL,
  `com_content` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `com_eveid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`com_id`) USING BTREE,
  INDEX `发送_FK`(`com_userid`) USING BTREE,
  INDEX `f7`(`com_eveid`) USING BTREE,
  CONSTRAINT `f6` FOREIGN KEY (`com_userid`) REFERENCES `student` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `f7` FOREIGN KEY (`com_eveid`) REFERENCES `event` (`ev_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for custom_event
-- ----------------------------
DROP TABLE IF EXISTS `custom_event`;
CREATE TABLE `custom_event`  (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ev_userid` int(11) NOT NULL,
  `ev_color` int(11) NULL DEFAULT 0,
  `ev_description` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '这是一件十分十分重要的事',
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for evaluation
-- ----------------------------
DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE `evaluation`  (
  `eva_id` int(11) NOT NULL,
  `eva_comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `eva_userid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`eva_id`) USING BTREE,
  INDEX `f15`(`eva_userid`) USING BTREE,
  CONSTRAINT `f15` FOREIGN KEY (`eva_userid`) REFERENCES `student` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for event
-- ----------------------------
DROP TABLE IF EXISTS `event`;
CREATE TABLE `event`  (
  `ev_time` timestamp(0) NULL DEFAULT NULL,
  `ev_title` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ev_id` int(11) NOT NULL,
  `ev_adminid` int(11) NOT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_maxnumber` int(11) NOT NULL,
  `ev_number` int(11) NULL DEFAULT NULL,
  `ev_content` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1498718139);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1498718158);

-- ----------------------------
-- Table structure for operation1
-- ----------------------------
DROP TABLE IF EXISTS `operation1`;
CREATE TABLE `operation1`  (
  `ev_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `op1_time` timestamp(0) NULL DEFAULT NULL,
  `op1_status` int(11) NOT NULL,
  `op1_id` int(11) NOT NULL,
  PRIMARY KEY (`op1_id`) USING BTREE,
  INDEX `操作1_FK`(`ev_id`) USING BTREE,
  INDEX `操作2_FK`(`user_id`) USING BTREE,
  CONSTRAINT `f9` FOREIGN KEY (`user_id`) REFERENCES `student` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for operation2
-- ----------------------------
DROP TABLE IF EXISTS `operation2`;
CREATE TABLE `operation2`  (
  `user_id` int(11) NOT NULL,
  `ev_id` int(11) NOT NULL,
  `op2_time` timestamp(0) NULL DEFAULT NULL,
  `op2_status` int(11) NOT NULL,
  `op2_create_time` timestamp(0) NULL DEFAULT NULL,
  `op2_id` int(11) NOT NULL,
  PRIMARY KEY (`op2_id`) USING BTREE,
  INDEX `操作3_FK`(`user_id`) USING BTREE,
  INDEX `操作4_FK`(`ev_id`) USING BTREE,
  CONSTRAINT `f10` FOREIGN KEY (`user_id`) REFERENCES `student` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `f11` FOREIGN KEY (`ev_id`) REFERENCES `pevent` (`ev_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pevent
-- ----------------------------
DROP TABLE IF EXISTS `pevent`;
CREATE TABLE `pevent`  (
  `ev_id` int(11) NOT NULL,
  `ev_time` timestamp(0) NULL DEFAULT NULL,
  `ev_name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ev_userid` int(11) NOT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_number` int(11) NULL DEFAULT NULL,
  `ev_maxnumber` int(11) NOT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE,
  CONSTRAINT `继承2` FOREIGN KEY (`ev_id`) REFERENCES `event` (`ev_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `user_id` int(11) NOT NULL,
  `grade` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES (101, '教授');
INSERT INTO `teacher` VALUES (102, '副教授');
INSERT INTO `teacher` VALUES (103, '讲师');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT 10,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL,
  `gender` smallint(2) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `identity` smallint(6) NOT NULL,
  `phone` int(255) NULL DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 144 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (143, 'Kraken', 'X7dsEeNDXJQ0aJyh4ENzR40Ag2U-7W8C', '$2y$13$pAdgPmuGr2GoUG9NewkEzOZeeXvr5YUcNf9Rsw4oguecJfg2Nn6Um', NULL, '1309123499@qq.com', 10, 10, '2019-07-07 11:43:46', '0000-00-00 00:00:00', 0, NULL, 0, 2147483647, '计算机学院');

SET FOREIGN_KEY_CHECKS = 1;