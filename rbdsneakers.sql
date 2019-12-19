/*
 Navicat Premium Data Transfer

 Source Server         : Prototype
 Source Server Type    : MySQL
 Source Server Version : 100203
 Source Host           : localhost:3306
 Source Schema         : rbdsneakers

 Target Server Type    : MySQL
 Target Server Version : 100203
 File Encoding         : 65001

 Date: 19/12/2019 18:35:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `EmployeeId` int(11) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  INDEX `CategoryFKEmployee`(`EmployeeId`) USING BTREE,
  CONSTRAINT `CategoryFKEmployee` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Fullname` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Image` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Address` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Phone` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  INDEX `Id`(`Id`) USING BTREE,
  INDEX `Id_2`(`Id`) USING BTREE,
  INDEX `Id_3`(`Id`) USING BTREE,
  INDEX `Id_4`(`Id`) USING BTREE,
  INDEX `Id_5`(`Id`) USING BTREE,
  INDEX `Id_6`(`Id`) USING BTREE,
  INDEX `Id_7`(`Id`) USING BTREE,
  INDEX `Id_8`(`Id`) USING BTREE,
  INDEX `Id_9`(`Id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for detailorder
-- ----------------------------
DROP TABLE IF EXISTS `detailorder`;
CREATE TABLE `detailorder`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `VariantId` int(11) NOT NULL,
  `Size` int(2) NOT NULL,
  `Price` int(11) NOT NULL,
  `Qty` int(11) NULL DEFAULT NULL,
  `Review` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Rating` int(5) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  INDEX `DetailOrderFKOrder`(`OrderId`) USING BTREE,
  INDEX `DetailOrderFKProduct`(`ProductId`) USING BTREE,
  INDEX `DetailOrderFKVariant`(`VariantId`) USING BTREE,
  CONSTRAINT `DetailOrderFKOrder` FOREIGN KEY (`OrderId`) REFERENCES `order` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `DetailOrderFKProduct` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `DetailOrderFKVariant` FOREIGN KEY (`VariantId`) REFERENCES `variant` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Image` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Phone` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Privilleges` int(3) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for logorder
-- ----------------------------
DROP TABLE IF EXISTS `logorder`;
CREATE TABLE `logorder`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderId` int(11) NOT NULL,
  `Date` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `Description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Actor` int(1) NOT NULL,
  `ActorId` int(11) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  INDEX `LogOrder_FK_Order`(`OrderId`) USING BTREE,
  CONSTRAINT `LogOrder_FK_Order` FOREIGN KEY (`OrderId`) REFERENCES `order` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `DeliveryAddress` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DeliveryFee` int(11) NOT NULL DEFAULT 0,
  `AWB` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Status` int(2) NOT NULL,
  `EmployeeId` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  INDEX `OrderFKCustomer`(`CustomerId`) USING BTREE,
  INDEX `OrderFKEmployee`(`EmployeeId`) USING BTREE,
  CONSTRAINT `OrderFKCustomer` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `OrderFKEmployee` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `EmployeeId` int(11) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  INDEX `ProductFKCategory`(`CategoryId`) USING BTREE,
  CONSTRAINT `ProductFKCategory` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `VariantId` int(11) NOT NULL,
  `Size` int(2) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Date` timestamp(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `EmployeeId` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  INDEX `StockFKEmployee`(`EmployeeId`) USING BTREE,
  INDEX `StockFKVariant`(`VariantId`) USING BTREE,
  CONSTRAINT `StockFKEmployee` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `StockFKVariant` FOREIGN KEY (`VariantId`) REFERENCES `variant` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for variant
-- ----------------------------
DROP TABLE IF EXISTS `variant`;
CREATE TABLE `variant`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NULL DEFAULT NULL,
  `Color` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Model` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Image` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `EmployeeId` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  INDEX `VariantFKEmployee`(`EmployeeId`) USING BTREE,
  INDEX `VariantFKProduct`(`ProductId`) USING BTREE,
  CONSTRAINT `VariantFKEmployee` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `VariantFKProduct` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for webconf
-- ----------------------------
DROP TABLE IF EXISTS `webconf`;
CREATE TABLE `webconf`  (
  `Id` int(11) NOT NULL,
  `WebName` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of webconf
-- ----------------------------
INSERT INTO `webconf` VALUES (1, 'RBDSneakers');

-- ----------------------------
-- Procedure structure for GetAccount
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetAccount`;
delimiter ;;
CREATE PROCEDURE `GetAccount`(IN `email` varchar(255))
BEGIN
	DECLARE Role varchar(8) default `none`;
	DECLARE CountEmployee int default 0;
	DECLARE CountCustomer int default 0;
	
	SELECT 
		COUNT(a.Id)
	FROM
		Employee AS A 
	WHERE
	  A.Email = email
	INTO
	 CountEmployee;

	SELECT 
		COUNT(a.Id)
	FROM
		Customer AS A 
	WHERE
	  A.Email = email
	INTO
	 CountCustomer;


	IF 
	 CountEmployee > 0
	THEN
		SELECT 
			E.*
		FROM 
			Employee as E
		WHERE
			Email = email;
	ELSE IF
		CountCustomer > 0
	THEN
		SELECT 
			C.*
		FROM 
			Customer as C
		WHERE
			Email = email;
	ELSE 
		SELECT 
			Role;
	END IF;	 
	END IF;	 
	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetWebConf
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetWebConf`;
delimiter ;;
CREATE PROCEDURE `GetWebConf`()
BEGIN
	SELECT
		* 
	FROM
		`webconf`
	WHERE
		Id = 1;

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
