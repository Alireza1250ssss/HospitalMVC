/*
 Navicat Premium Data Transfer

 Source Server         : test
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : clinic_management

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 10/11/2021 13:42:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_details
-- ----------------------------
DROP TABLE IF EXISTS `admin_details`;
CREATE TABLE `admin_details`  (
  `adminId` int UNSIGNED NOT NULL,
  `career` varchar(90) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `age` int NOT NULL,
  `imgpath` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `education` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`imgpath`) USING BTREE,
  INDEX `admin_details_ibfk_1`(`adminId`) USING BTREE,
  CONSTRAINT `admin_details_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_details
-- ----------------------------
INSERT INTO `admin_details` VALUES (1, 'programmer', 'live in Isfahan \\n is married with 2 children \\n interested in football and teaching', 29, '../files/61881124b3bd2', NULL);
INSERT INTO `admin_details` VALUES (3, 'engineer', 'live in Mashhad \\n married and has 5 children(wow) \\n he has established a new company in his country \\n he likes Python', 33, 'files/admin3.png', NULL);
INSERT INTO `admin_details` VALUES (4, 'cook', 'live in NY', 45, 'files/admin4.png', 'PHD');

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'admin1', '$2y$10$vw/BQKsMNZdz4dIkyHsd1.T.pL/8tzFGoPv4T4huN.1I9AVyDzBZa', 'admin@yahoo.com', 1);
INSERT INTO `admins` VALUES (3, 'Admin3', '$2y$10$4xRXrAu2s0RlFl5XhaxAqOLxTlWL9WQzNwT4q4.sVzmA.x9GKfMBK', 'admin@hotmail.com', 1);
INSERT INTO `admins` VALUES (4, 'admin4', '$2y$10$KddEhvM7MprpoiVHPXbAwe2qDhTQb4Ty8woUaL3naaXM.hfE00X66', 'ali@email.com', 1);

-- ----------------------------
-- Table structure for clinic_section
-- ----------------------------
DROP TABLE IF EXISTS `clinic_section`;
CREATE TABLE `clinic_section`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `clinic_id` int UNSIGNED NOT NULL,
  `section_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `clinic_id`, `section_id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `clinic_id`(`clinic_id`) USING BTREE,
  INDEX `section_id`(`section_id`) USING BTREE,
  CONSTRAINT `clinic_section_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `clinic_section_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of clinic_section
-- ----------------------------
INSERT INTO `clinic_section` VALUES (2, 1, 2);
INSERT INTO `clinic_section` VALUES (3, 2, 2);
INSERT INTO `clinic_section` VALUES (4, 2, 4);
INSERT INTO `clinic_section` VALUES (5, 2, 6);
INSERT INTO `clinic_section` VALUES (6, 1, 6);
INSERT INTO `clinic_section` VALUES (7, 6, 6);
INSERT INTO `clinic_section` VALUES (8, 6, 2);
INSERT INTO `clinic_section` VALUES (9, 6, 5);

-- ----------------------------
-- Table structure for clinics
-- ----------------------------
DROP TABLE IF EXISTS `clinics`;
CREATE TABLE `clinics`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `phone` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_full_time` tinyint(1) NULL DEFAULT 1,
  `deleted_at` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of clinics
-- ----------------------------
INSERT INTO `clinics` VALUES (1, 'Vahdat', 'Azadi', 0, '03132681674', 1, NULL, '2021-10-17 07:41:20', '2021-11-06 22:37:06');
INSERT INTO `clinics` VALUES (2, 'Noor', 'Bozorgmehr', 1, '03132676982', 0, '2021-11-06 18:30:30', '2021-10-12 08:00:52', '2021-11-06 21:00:50');
INSERT INTO `clinics` VALUES (4, 'Kharazi', '22 Bahman St.', 1, '03132648431', 1, '2021-10-18 13:23:32', '2021-10-18 14:53:26', '2021-10-18 14:53:32');
INSERT INTO `clinics` VALUES (5, 'Emad', 'Nazar St.', 1, '03132661056', 1, '2021-10-19 15:01:41', '2021-10-18 15:01:47', NULL);
INSERT INTO `clinics` VALUES (6, 'Reshadat', 'Tehran', 1, '02135564562', 1, NULL, '2021-10-22 08:49:16', '2021-11-06 22:32:23');
INSERT INTO `clinics` VALUES (8, 'emam reza', 'tehran St.', 1, '0215564585', 1, '2021-11-06 20:21:49', '2021-11-06 22:51:26', '2021-11-06 22:51:49');

-- ----------------------------
-- Table structure for leave_times
-- ----------------------------
DROP TABLE IF EXISTS `leave_times`;
CREATE TABLE `leave_times`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `start_time` datetime NULL DEFAULT NULL,
  `end_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `user_id`) USING BTREE,
  INDEX `fk_leave_times_users_1`(`user_id`) USING BTREE,
  CONSTRAINT `fk_leave_times_users_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of leave_times
-- ----------------------------

-- ----------------------------
-- Table structure for patient_user
-- ----------------------------
DROP TABLE IF EXISTS `patient_user`;
CREATE TABLE `patient_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `patient_id` int UNSIGNED NOT NULL,
  `weekday` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `patient_user_ibfk_1`(`user_id`) USING BTREE,
  INDEX `patient_user_ibfk_2`(`patient_id`) USING BTREE,
  CONSTRAINT `patient_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `patient_user_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of patient_user
-- ----------------------------
INSERT INTO `patient_user` VALUES (5, 2, 25, 2);
INSERT INTO `patient_user` VALUES (10, 2, 21, 3);
INSERT INTO `patient_user` VALUES (14, 1, 26, 4);
INSERT INTO `patient_user` VALUES (15, 2, 27, 2);
INSERT INTO `patient_user` VALUES (16, 2, 30, 2);
INSERT INTO `patient_user` VALUES (17, 1, 31, 0);

-- ----------------------------
-- Table structure for patients
-- ----------------------------
DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` tinyint(1) NULL DEFAULT NULL,
  `age` int NULL DEFAULT NULL,
  `national_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `national_code`(`national_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of patients
-- ----------------------------
INSERT INTO `patients` VALUES (1, 'alireza', 'salehi', 0, 19, '1273698541', '09134809830', NULL, '2021-10-31 09:09:06', NULL);
INSERT INTO `patients` VALUES (2, 'hossein', 'jalali', 0, 31, '5649839816', '09134809840', NULL, '2021-10-31 09:09:43', NULL);
INSERT INTO `patients` VALUES (3, 'fatemeh', 'hosseini', 1, 28, '1455223621', '09154568752', NULL, '2021-10-31 09:10:00', '2021-10-31 09:10:29');
INSERT INTO `patients` VALUES (4, 'elahe', 'talebi', 1, 13, '1222452433', '09331457852', NULL, '2021-10-31 09:10:58', NULL);
INSERT INTO `patients` VALUES (5, 'morad', 'moradi', 0, 23, '1478523696', '09124567893', NULL, '2021-10-31 09:11:31', NULL);
INSERT INTO `patients` VALUES (6, 'ali', 'alizade', 0, 60, '5641237892', '09214536862', NULL, '2021-10-31 09:12:03', NULL);
INSERT INTO `patients` VALUES (7, 'dariush', 'arjmand', 0, 65, '2552563636', '09159151551', NULL, '2021-10-31 11:32:52', NULL);
INSERT INTO `patients` VALUES (9, 'dariush', 'irannejad', 0, 56, '2552573636', '09159181551', NULL, '2021-10-31 11:34:45', NULL);
INSERT INTO `patients` VALUES (10, 'ayoub', 'hamidi', 0, 26, '1212325645', '09125253636', NULL, '2021-10-31 11:43:13', NULL);
INSERT INTO `patients` VALUES (12, 'ahmad', 'ahmadi', 0, 28, '1599996655', '09344566544', NULL, '2021-10-31 11:45:21', NULL);
INSERT INTO `patients` VALUES (13, 'Zahra ', 'Salehi', 1, 22, '5646451212', '09121222211', NULL, '2021-10-31 12:13:31', NULL);
INSERT INTO `patients` VALUES (14, 'morteza', 'tayebi', 0, 19, '3523521214', '09185185223', NULL, '2021-11-01 16:44:51', NULL);
INSERT INTO `patients` VALUES (21, 'faramarz', 'aslani', 0, 48, '1472583663', '09363574545', NULL, '2021-11-08 13:43:28', NULL);
INSERT INTO `patients` VALUES (24, 'morteza', 'pashaei', 0, 32, '4566541233', '09159169194', NULL, '2021-11-08 14:15:30', NULL);
INSERT INTO `patients` VALUES (25, 'emad', 'mokhtari', 0, 44, '11', '12', NULL, '2021-11-09 11:28:04', NULL);
INSERT INTO `patients` VALUES (26, 'fati', 'hayati', 1, 87, '456', '1234', NULL, '2021-11-09 15:57:34', NULL);
INSERT INTO `patients` VALUES (27, 'hosein', 'arjmand', 0, 46, '1234656526', '45464547', NULL, '2021-11-09 17:05:00', NULL);
INSERT INTO `patients` VALUES (28, 'golshifteh', 'hesami', 0, 120, '1241654646', '5646687685', NULL, '2021-11-09 17:16:53', NULL);
INSERT INTO `patients` VALUES (29, 'gholam', 'gholami', 0, 45, '4686546', '3565765', NULL, '2021-11-09 17:19:03', NULL);
INSERT INTO `patients` VALUES (30, 'hashem', 'mohammadi', 0, 45, '58258358323', '09132555555', NULL, '2021-11-09 20:18:32', NULL);
INSERT INTO `patients` VALUES (31, 'taher', 'bagheri', 0, 64, '1283858541', '09451233212', NULL, '2021-11-10 13:37:50', NULL);

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `visit_id` int NOT NULL,
  `cost` int NOT NULL,
  PRIMARY KEY (`visit_id`) USING BTREE,
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`visit_id`) REFERENCES `patient_user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES (5, 30000);
INSERT INTO `payments` VALUES (14, 20000);
INSERT INTO `payments` VALUES (15, 30000);
INSERT INTO `payments` VALUES (16, 30000);
INSERT INTO `payments` VALUES (17, 20000);

-- ----------------------------
-- Table structure for sections
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = '	' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sections
-- ----------------------------
INSERT INTO `sections` VALUES (2, 'heart', 1);
INSERT INTO `sections` VALUES (4, 'Brain', 0);
INSERT INTO `sections` VALUES (5, 'ChildrenSection', 0);
INSERT INTO `sections` VALUES (6, 'Surgery', 1);

-- ----------------------------
-- Table structure for shift_works
-- ----------------------------
DROP TABLE IF EXISTS `shift_works`;
CREATE TABLE `shift_works`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `clinic_section_id` int UNSIGNED NOT NULL,
  `start_time` time NULL DEFAULT NULL,
  `end_time` time NULL DEFAULT NULL,
  `week_day` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `clinic_section_id`, `user_id`) USING BTREE,
  INDEX `fk_shift_works_users_1`(`user_id`) USING BTREE,
  INDEX `fk_shift_works_clinic_section_1`(`clinic_section_id`) USING BTREE,
  CONSTRAINT `fk_shift_works_clinic_section_1` FOREIGN KEY (`clinic_section_id`) REFERENCES `clinic_section` (`id`) ON DELETE NO ACTION ON UPDATE RESTRICT,
  CONSTRAINT `fk_shift_works_users_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of shift_works
-- ----------------------------
INSERT INTO `shift_works` VALUES (1, 1, 2, '08:00:00', '10:00:00', 0);
INSERT INTO `shift_works` VALUES (2, 1, 2, '16:00:00', '18:00:00', 4);
INSERT INTO `shift_works` VALUES (3, 2, 2, '09:00:00', '12:00:00', 2);
INSERT INTO `shift_works` VALUES (4, 2, 2, '15:00:00', '17:00:00', 3);
INSERT INTO `shift_works` VALUES (5, 3, 2, '13:00:00', '15:00:00', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` tinyint(1) NULL DEFAULT NULL,
  `age` int NULL DEFAULT NULL,
  `medical_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` enum('doctor','nurse','service','reciept') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `phone` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT NULL,
  `cost` decimal(10, 2) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'mehdi', 'mehdizade', 0, 36, '255255', 'doctor', 1, '09135552244', NULL, NULL, NULL, 20000.00);
INSERT INTO `users` VALUES (2, 'mohammad', 'moradi', 0, 45, '366366', 'doctor', 1, '09145552233', NULL, '2021-10-31 08:44:57', NULL, 30000.00);
INSERT INTO `users` VALUES (3, 'nazanin', 'salehi', 1, 40, '855966', 'doctor', 1, '09365452332', NULL, '2021-10-31 08:45:44', NULL, 35000.00);

SET FOREIGN_KEY_CHECKS = 1;
