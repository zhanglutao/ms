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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_shicai_category` */

insert  into `ms_shicai_category`(`category_id`,`parent_id`,`category_name`,`create_time`,`update_time`) values 
(1,0,'里脊','2018-08-13 18:10:34','2018-08-13 18:10:34');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
