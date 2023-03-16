/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : detikcomdb

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 16/03/2023 10:28:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(10, 2) NOT NULL,
  `payment_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `references_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number_va` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (1, '1', '\"item 1\"', 100000.00, '\"cash\"', '\"customer 1\"', 1, '6412630ed27d3', '0', 'success', '2023-03-16 07:30:06');
INSERT INTO `transaksi` VALUES (2, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '6412675abd1fd', '350744', 'pending', '2023-03-16 07:48:26');
INSERT INTO `transaksi` VALUES (3, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '6412675d6485d', '446167', 'pending', '2023-03-16 07:48:29');
INSERT INTO `transaksi` VALUES (4, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '6412675e5be70', '154477', 'pending', '2023-03-16 07:48:30');
INSERT INTO `transaksi` VALUES (5, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '641268f5b6315', '547569', 'pending', '2023-03-16 07:55:17');
INSERT INTO `transaksi` VALUES (6, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '641268f8b7de9', '928317', 'pending', '2023-03-16 07:55:20');
INSERT INTO `transaksi` VALUES (7, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '6412693ced546', '285097', 'pending', '2023-03-16 07:56:28');
INSERT INTO `transaksi` VALUES (8, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '6412694f5deb5', '541451', 'pending', '2023-03-16 07:56:47');
INSERT INTO `transaksi` VALUES (9, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '64126992bf3c0', '169690', 'pending', '2023-03-16 07:57:54');
INSERT INTO `transaksi` VALUES (10, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '64126bae6ca40', '889693', 'pending', '2023-03-16 08:06:54');
INSERT INTO `transaksi` VALUES (11, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '64127bc2064ad', '468203', 'pending', '2023-03-16 09:15:30');
INSERT INTO `transaksi` VALUES (12, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '64127bc6ecdd4', '114118', 'pending', '2023-03-16 09:15:34');
INSERT INTO `transaksi` VALUES (13, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '64127bc7cd3ec', '573272', 'pending', '2023-03-16 09:15:35');
INSERT INTO `transaksi` VALUES (14, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '64127caa1783f', '376467', 'pending', '2023-03-16 09:19:22');
INSERT INTO `transaksi` VALUES (15, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '64127cb12bf9c', '452848', 'pending', '2023-03-16 09:19:29');
INSERT INTO `transaksi` VALUES (16, '1', 'item 1', 100000.00, 'virtual_account', 'customer 1', 1, '64127cc03b6f0', '420557', 'pending', '2023-03-16 09:19:44');

SET FOREIGN_KEY_CHECKS = 1;
