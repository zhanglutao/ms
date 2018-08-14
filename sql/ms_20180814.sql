/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 5.7.14-log : Database - msheavn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`msheavn` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `msheavn`;

/*Table structure for table `ms_food` */

DROP TABLE IF EXISTS `ms_food`;

CREATE TABLE `ms_food` (
  `food_id` bigint(12) NOT NULL AUTO_INCREMENT COMMENT '菜谱ID',
  `food_category_id` int(10) NOT NULL COMMENT '菜谱主分类ID',
  `food_name` varchar(30) NOT NULL COMMENT '菜谱名',
  `top_image` varchar(100) NOT NULL COMMENT '菜谱封面',
  `main_material` text NOT NULL COMMENT '主料',
  `assist_material` text NOT NULL COMMENT '辅料',
  `other_tags` text NOT NULL COMMENT '其它难易度时间等',
  `cooking_process` text NOT NULL COMMENT '处理流程json',
  `tips` varchar(100) DEFAULT NULL COMMENT '小窍门',
  `kitchen_ware` varchar(100) DEFAULT NULL COMMENT '厨具',
  `food_category` int(10) NOT NULL COMMENT '菜谱分类',
  `food_category_name` varchar(20) NOT NULL COMMENT '菜谱分类名称',
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`food_id`),
  KEY `food_category_id` (`food_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ms_food_list` */

DROP TABLE IF EXISTS `ms_food_list`;

CREATE TABLE `ms_food_list` (
  `list_id` bigint(12) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `food_id` bigint(12) NOT NULL DEFAULT '0' COMMENT '菜谱ID',
  `food_name` varchar(30) NOT NULL DEFAULT '无' COMMENT '菜谱名称',
  `tags` varchar(200) NOT NULL DEFAULT '无' COMMENT '配料',
  `read_number` int(10) NOT NULL DEFAULT '0' COMMENT '阅读数',
  `collection_number` int(10) NOT NULL DEFAULT '0' COMMENT '收藏数',
  `author_id` int(10) NOT NULL DEFAULT '1' COMMENT '菜谱用户ID',
  `author_name` varchar(20) NOT NULL DEFAULT '美食天堂' COMMENT '菜谱作者',
  `images` varchar(100) NOT NULL COMMENT '菜谱封面',
  `create_time` datetime DEFAULT NULL COMMENT '菜品创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '菜口更新时间',
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ms_shicai_category` */

DROP TABLE IF EXISTS `ms_shicai_category`;

CREATE TABLE `ms_shicai_category` (
  `category_id` bigint(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `parent_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类父ID',
  `category_name` varchar(20) NOT NULL DEFAULT '无' COMMENT '分类名称',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=1251 DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
