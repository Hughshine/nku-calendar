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

 Date: 07/07/2019 09:33:50
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
  `password_hash` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password_reset_token` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`depart_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for cevent
-- ----------------------------
DROP TABLE IF EXISTS `cevent`;
CREATE TABLE `cevent`  (
  `ev_id` int(11) NOT NULL,
  `ev_time` timestamp(0) NULL DEFAULT NULL,
  `ev_name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_adminid` int(11) NULL DEFAULT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_number` int(11) NULL DEFAULT NULL,
  `cev_tid` int(11) NULL DEFAULT NULL,
  `ev_maxnumber` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE,
  INDEX `f1`(`ev_adminid`) USING BTREE,
  INDEX `f5`(`cev_tid`) USING BTREE,
  CONSTRAINT `f1` FOREIGN KEY (`ev_adminid`) REFERENCES `admin` (`depart_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `f5` FOREIGN KEY (`cev_tid`) REFERENCES `teacher` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `继承1` FOREIGN KEY (`ev_id`) REFERENCES `event` (`ev_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

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
-- Table structure for evaluation
-- ----------------------------
DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE `evaluation`  (
  `eva_id` int(11) NOT NULL,
  `eva_comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
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
  `ev_title` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_id` int(11) NOT NULL,
  `ev_adminid` int(11) NULL DEFAULT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_maxnumber` int(11) NULL DEFAULT NULL,
  `ev_number` int(11) NULL DEFAULT NULL,
  `ev_content` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pevent
-- ----------------------------
DROP TABLE IF EXISTS `pevent`;
CREATE TABLE `pevent`  (
  `ev_id` int(11) NOT NULL,
  `ev_time` timestamp(0) NULL DEFAULT NULL,
  `ev_name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_adminid` int(11) NULL DEFAULT NULL,
  `ev_place` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ev_number` int(11) NULL DEFAULT NULL,
  `ev_maxnumber` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE,
  CONSTRAINT `继承2` FOREIGN KEY (`ev_id`) REFERENCES `event` (`ev_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password_hash` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password_reset_token` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` int(11) NULL DEFAULT NULL,
  `gender` int(11) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `department` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `grade` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password_hash` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password_reset_token` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` int(11) NULL DEFAULT NULL,
  `gender` int(11) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `department` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `position` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT 10,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(20) NOT NULL,
  `updated_at` int(20) NOT NULL,
  `gender` smallint(2) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `identity` smallint(6) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 144 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (143, 'Kraken', 'X7dsEeNDXJQ0aJyh4ENzR40Ag2U-7W8C', '$2y$13$pAdgPmuGr2GoUG9NewkEzOZeeXvr5YUcNf9Rsw4oguecJfg2Nn6Um', NULL, '1309123499@qq.com', 10, 10, 1562335530, 1562335530, 0, NULL, 0);

-- ----------------------------
-- Table structure for 操作1
-- ----------------------------
DROP TABLE IF EXISTS `操作1`;
CREATE TABLE `操作1`  (
  `ev_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `op1_time` timestamp(0) NULL DEFAULT NULL,
  `op1_status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ev_id`, `user_id`) USING BTREE,
  INDEX `操作1_FK`(`ev_id`) USING BTREE,
  INDEX `操作2_FK`(`user_id`) USING BTREE,
  CONSTRAINT `f8` FOREIGN KEY (`ev_id`) REFERENCES `cevent` (`ev_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `f9` FOREIGN KEY (`user_id`) REFERENCES `student` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for 操作2
-- ----------------------------
DROP TABLE IF EXISTS `操作2`;
CREATE TABLE `操作2`  (
  `user_id` int(11) NOT NULL,
  `ev_id` int(11) NOT NULL,
  `op2_time` timestamp(0) NULL DEFAULT NULL,
  `op2_status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`, `ev_id`) USING BTREE,
  INDEX `操作3_FK`(`user_id`) USING BTREE,
  INDEX `操作4_FK`(`ev_id`) USING BTREE,
  CONSTRAINT `f10` FOREIGN KEY (`user_id`) REFERENCES `student` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `f11` FOREIGN KEY (`ev_id`) REFERENCES `pevent` (`ev_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
