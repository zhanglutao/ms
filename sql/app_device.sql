/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 5.7.14-log : Database - qjs_db_qa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`qjs_db_qa` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `qjs_db_qa`;

/*Table structure for table `qjs_app_device` */
CREATE TABLE `v3_app_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键ID',
  `device_uid` varchar(255) NOT NULL DEFAULT '' COMMENT '设备唯一标识',
  `device_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '设备类型>0|位置,1|ios,2|android',
  `device_os` varchar(20) NOT NULL DEFAULT '' COMMENT '设备OS系统',
  `device_version` varchar(20) NOT NULL DEFAULT '' COMMENT '设备OS版本',
  `device_name` varchar(64) NOT NULL DEFAULT '' COMMENT '设备名称',
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `app_name` varchar(64) NOT NULL DEFAULT '' COMMENT 'App名字',
  `app_version` varchar(20) NOT NULL DEFAULT '' COMMENT 'App版本',
  `session_id` varchar(255) NOT NULL DEFAULT '' COMMENT '会话ID',
  `cookie_id` varchar(255) NOT NULL DEFAULT '' COMMENT 'Cookie ID',
  `push_register_id` varchar(255) NOT NULL DEFAULT '' COMMENT '极光推送RegisterID',
  `push_need_received` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否接受推送>0|不接受,1|接受',
  `push_start_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '推送时段开始时间',
  `push_end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '推送时段结束时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态>0|无效,1|有效,9|删除',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最新修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_device_uid` (`device_uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COMMENT='App设备信息表';

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
