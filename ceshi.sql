# Host: rm-2ze125ne5236itso9o.mysql.rds.aliyuncs.com  (Version: 5.6.34)
# Date: 2017-08-25 18:39:46
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "xds_act_plan"
#

DROP TABLE IF EXISTS `xds_act_plan`;
CREATE TABLE `xds_act_plan` (
  `id` char(36) NOT NULL DEFAULT '',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '外键，关联所属行动社群ID',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通模式 1 普通模式+挑战者模式',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '行动计划名称',
  `cover_image` varchar(127) NOT NULL DEFAULT '' COMMENT '封面图片',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '行动计划简介',
  `total_participant` int(11) unsigned NOT NULL DEFAULT '99' COMMENT '累计参与人数',
  `task_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '内含任务总数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动计划表';

#
# Data for table "xds_act_plan"
#

INSERT INTO `xds_act_plan` VALUES ('76826caa-6894-f6b9-3ac3-de33e01879c3','76826caa-6894-f6b9-3ac3-de33e01879c2','0','','','',99,0,0,0),('76826caa-6894-f6b9-3ac3-de33e01879c4','76826caa-6894-f6b9-3ac3-de33e01879c2','0','','','',99,0,0,0);

#
# Structure for table "xds_act_plan_user"
#

DROP TABLE IF EXISTS `xds_act_plan_user`;
CREATE TABLE `xds_act_plan_user` (
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，所属行动计划ID',
  `user_id` char(1) NOT NULL DEFAULT '' COMMENT '联合主键，执行用户ID',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通模式 1 挑战者模式',
  PRIMARY KEY (`act_plan_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动计划 用户对应表';

#
# Data for table "xds_act_plan_user"
#


#
# Structure for table "xds_advice"
#

DROP TABLE IF EXISTS `xds_advice`;
CREATE TABLE `xds_advice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '意见反馈表',
  `content` varchar(255) DEFAULT NULL COMMENT '意见内容',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '外键，用户主键id',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '用户昵称，冗余字段',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='意见与建议';

#
# Data for table "xds_advice"
#


#
# Structure for table "xds_article"
#

DROP TABLE IF EXISTS `xds_article`;
CREATE TABLE `xds_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '外键，发表者用户id',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '文章内容',
  `likes` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点赞数',
  `comments` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `shares` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '转发数',
  `hits` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '查看数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`),
  KEY `post_author` (`user_id`),
  KEY `post_date` (`create_time`) USING BTREE,
  KEY `type_status_date` (`create_time`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='portal应用 文章表';

#
# Data for table "xds_article"
#

INSERT INTO `xds_article` VALUES (32,1,'',0,0,0,0,1501663657,1501663657,1501811020),(33,1,'',0,0,0,0,1501811326,1501811326,0);

#
# Structure for table "xds_article_operate"
#

DROP TABLE IF EXISTS `xds_article_operate`;
CREATE TABLE `xds_article_operate` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，操作人ID',
  `article_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，文章表ID',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '操作类型：0 顶赞 其他依次扩展（收藏等）',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`user_id`,`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文章操作表';

#
# Data for table "xds_article_operate"
#

INSERT INTO `xds_article_operate` VALUES (1,2,'1',2014),(2,1,'1',2014),(2,4,'1',2014),(2,6,'1',2014),(2,7,'1',2014),(2,9,'1',2014),(2,10,'1',2014),(2,11,'1',2014),(2,13,'1',2014),(2,17,'1',2014),(2,21,'1',2014),(2,22,'1',2014),(2,27,'1',2014),(3,7,'1',2014),(3,22,'1',2014),(3,34,'1',2014),(5,20,'1',2014),(5,21,'1',2014),(5,23,'1',2014),(5,24,'1',2014),(8,2,'1',2014),(8,25,'1',2014),(8,34,'1',2014),(9,7,'1',2014),(10,8,'1',2014),(11,2,'1',2014),(11,28,'1',2014),(11,33,'1',2014),(11,34,'1',2014),(12,5,'1',2014),(12,34,'1',2014),(13,4,'1',2014),(18,9,'1',2014);

#
# Structure for table "xds_asset"
#

DROP TABLE IF EXISTS `xds_asset`;
CREATE TABLE `xds_asset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(64) NOT NULL DEFAULT '' COMMENT '资源uri',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '资源类型：0 图片 1 音频 2 视频',
  `suffix` varchar(10) NOT NULL DEFAULT '' COMMENT '文件后缀名,不包括点',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `more` text COMMENT '其它详细信息,JSON格式',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='资源表';

#
# Data for table "xds_asset"
#

INSERT INTO `xds_asset` VALUES (5,'9f8344c89c4e7d50b70e8c636d4ebe6a6f44beea7fca0815c9f7bdd3d8cb0d10',0,'jpg',1501663633,NULL);

#
# Structure for table "xds_asset_obj"
#

DROP TABLE IF EXISTS `xds_asset_obj`;
CREATE TABLE `xds_asset_obj` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，资源表ID',
  `object_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，关联模型ID，如文章ID',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 文章 1 投诉',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `asset_id` (`asset_id`,`object_id`) COMMENT '联合主键'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='资源关联表';

#
# Data for table "xds_asset_obj"
#


#
# Structure for table "xds_auth"
#

DROP TABLE IF EXISTS `xds_auth`;
CREATE TABLE `xds_auth` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '权限名称',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';

#
# Data for table "xds_auth"
#

INSERT INTO `xds_auth` VALUES (1,'创建/编辑行动计划','',1503643844,1503643844),(2,'创建/编辑任务','',1503643845,1503643845),(3,'暂停/恢复社群成员资格','',1503643846,1503643846),(4,'随机审核用户反馈','',1503643847,1503643847);

#
# Structure for table "xds_auth_user"
#

DROP TABLE IF EXISTS `xds_auth_user`;
CREATE TABLE `xds_auth_user` (
  `from_user_id` char(36) NOT NULL DEFAULT '' COMMENT '授权用户ID',
  `to_user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，被授权用户ID',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，行动社ID',
  `auth` varchar(8) NOT NULL DEFAULT '' COMMENT '权限值，以,分隔',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  KEY `联合主键` (`to_user_id`,`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户权限对应表';

#
# Data for table "xds_auth_user"
#

INSERT INTO `xds_auth_user` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3',1503649565,1503649565,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3,4',1503649608,1503649608,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3,43',1503649613,1503649613,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3',1503655234,1503655234,0);

#
# Structure for table "xds_blacklist"
#

DROP TABLE IF EXISTS `xds_blacklist`;
CREATE TABLE `xds_blacklist` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，加入黑名单用户ID',
  `black_user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，被加入黑名单用户ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`Id`),
  KEY `user_id` (`user_id`,`black_user_id`) COMMENT '联合主键'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='黑名单';

#
# Data for table "xds_blacklist"
#


#
# Structure for table "xds_comment"
#

DROP TABLE IF EXISTS `xds_comment`;
CREATE TABLE `xds_comment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表评论的用户ID',
  `to_user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '被评论的用户ID',
  `object_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联模型ID，如文章ID',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '评论者昵称',
  `content` text COMMENT '评论内容',
  `likes` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点赞数',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态,1:已审核,0:未审核',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`),
  KEY `comment_post_ID` (`object_id`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `table_id_status` (`object_id`,`status`),
  KEY `createtime` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='评论表';

#
# Data for table "xds_comment"
#


#
# Structure for table "xds_comment_operate"
#

DROP TABLE IF EXISTS `xds_comment_operate`;
CREATE TABLE `xds_comment_operate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作人主键id',
  `comment_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论主键ID',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文章操作表';

#
# Data for table "xds_comment_operate"
#

INSERT INTO `xds_comment_operate` VALUES (2,2,1,2014),(5,2,6,2014),(8,2,7,2014),(13,2,17,2014),(29,5,21,2014),(30,5,20,2014),(31,5,24,2014),(32,5,23,2014),(35,3,22,2014),(37,8,25,2014),(39,2,22,2014),(44,11,28,2014),(50,2,27,2014),(51,3,34,2014),(52,12,34,2014),(53,2,21,2014),(55,11,34,2014),(59,11,33,2014),(60,8,34,2014),(64,8,2,2014),(65,13,4,2014),(74,2,4,2014),(75,11,2,2014),(76,1,2,2014),(77,9,7,2014),(82,10,8,2014),(87,2,9,2014),(88,2,10,2014),(93,12,5,2014),(94,2,11,2014),(95,3,7,2014),(104,18,9,2014),(105,2,13,2014);

#
# Structure for table "xds_community"
#

DROP TABLE IF EXISTS `xds_community`;
CREATE TABLE `xds_community` (
  `id` char(36) NOT NULL DEFAULT '' COMMENT '社群ID',
  `outside_id` char(8) NOT NULL DEFAULT '' COMMENT '社群编号(外部ID)',
  `name` varchar(127) NOT NULL DEFAULT '' COMMENT '社群名称',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `cover_image` varchar(127) NOT NULL DEFAULT '' COMMENT '封面图',
  `exclusive_url` varchar(127) NOT NULL DEFAULT '' COMMENT '专属链接',
  `qr_code` varchar(127) NOT NULL DEFAULT '' COMMENT '社群二维码',
  `scale_num` enum('500','1000','2000') NOT NULL DEFAULT '2000' COMMENT '成员数量规模限制',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '状态 0 正常 1 冻结 2 封禁',
  `recommended` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否推荐 0 推荐 1 不推荐',
  `update_num` enum('0','1','2','3') NOT NULL DEFAULT '3' COMMENT '编辑行动社次数，每月只能修改3次',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '社群创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `name` (`name`) COMMENT '搜索',
  KEY `outside_id` (`outside_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动社表';

#
# Data for table "xds_community"
#

INSERT INTO `xds_community` VALUES ('76826caa-6894-f6b9-3ac3-de33e01879c2','83008910','电影欣赏06','简介','http://www.baidu.com','','','2000','0','0','3',1503369259,1503629903),('89217c66-df49-cd9b-b11e-50a51d6e33be','47183041','电影赏析03','16224','http://www.baidu.com','','','2000','0','0','3',1503373975,1503393168),('892c80b0-750c-0742-c6a4-5c1105285bee','35794877','电影赏析','16224','http://www.baidu.com','','','500','0','0','3',1503311264,1503393168);

#
# Structure for table "xds_community_transfer"
#

DROP TABLE IF EXISTS `xds_community_transfer`;
CREATE TABLE `xds_community_transfer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '转让人',
  `to_user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '被转让人',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '转让时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动社转让记录表';

#
# Data for table "xds_community_transfer"
#


#
# Structure for table "xds_community_user"
#

DROP TABLE IF EXISTS `xds_community_user`;
CREATE TABLE `xds_community_user` (
  `community_id` char(36) NOT NULL DEFAULT '0' COMMENT '所属行动社群ID',
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '所有者ID(用户ID)',
  `type` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '关联类型 0 创始人 1 管理员 2 成员',
  `msg_only_admin` enum('0','1') NOT NULL DEFAULT '0' COMMENT '只接受管理员私信 0=关闭，1=开启。',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 未退群 1 已退群 2被暂停成员资格',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '加入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新状态时间',
  KEY `community_id` (`community_id`,`user_id`) COMMENT '复合主键',
  KEY `type` (`type`) COMMENT 'type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='社群用户对应表';

#
# Data for table "xds_community_user"
#

INSERT INTO `xds_community_user` VALUES ('892c80b0-750c-0742-c6a4-5c1105285bee','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','0',1503311264,1503311264),('76826caa-6894-f6b9-3ac3-de33e01879c2','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','0','0',1503369259,1503369259),('89217c66-df49-cd9b-b11e-50a51d6e33be','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','0',1503373975,1503373975),('ec16645b-cc9c-a7c8-536f-955219154cd2','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','0',1503388656,1503388656),('48eed6c0-f298-8020-d673-633d4101d5f3','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','0',1503388821,1503388821),('76826caa-6894-f6b9-3ac3-de33e01879c2','86966993-d3e4-e722-223d-bf16fc2e8421','2','0','0',0,0);

#
# Structure for table "xds_login_history"
#

DROP TABLE IF EXISTS `xds_login_history`;
CREATE TABLE `xds_login_history` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '登录用户主键ID',
  `device_type` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0 APP第三方授权 1 PC授权 2 安卓 3 苹果',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  PRIMARY KEY (`Id`),
  KEY `user_id` (`user_id`,`device_type`,`create_time`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户登录记录表';

#
# Data for table "xds_login_history"
#

INSERT INTO `xds_login_history` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502846529),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502846854),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502847199),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502847287),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502849670),(6,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502849885),(7,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502855749),(8,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502868288),(9,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502877709),(10,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502882795),(11,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502956583),(12,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502957394),(13,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503044694),(14,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298062),(15,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298084),(16,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298198),(17,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298820),(18,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503301749),(19,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503301998),(20,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503302245),(21,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503302985),(22,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303086),(23,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303101),(24,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303105),(25,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303120),(26,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305541),(27,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305640),(28,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305822),(29,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503306529),(30,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503306539),(31,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503310969),(32,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503310980),(33,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311156),(34,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311319),(35,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311869),(36,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311882),(37,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311887),(38,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311921),(39,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311940),(40,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503313917),(41,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503313926),(42,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1503329207),(43,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1503329219),(44,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503368781),(45,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503369812),(46,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503628644),(47,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1503640290),(48,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1503640483),(49,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503641543);

#
# Structure for table "xds_notice"
#

DROP TABLE IF EXISTS `xds_notice`;
CREATE TABLE `xds_notice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0系统通知 1被@通知',
  `keyid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关联模块主键ID,比如交流区内容ID',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '通知内容',
  `to_user_id` char(36) NOT NULL DEFAULT '0' COMMENT '通知所属用户主键ID',
  `from_user_id` char(36) NOT NULL DEFAULT '0' COMMENT '通知来源作者主键ID(关联头像时使用)',
  `looktype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0未读 1已读',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '通知时间',
  PRIMARY KEY (`id`),
  KEY `to_user_id` (`to_user_id`,`from_user_id`,`type`,`keyid`,`looktype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='消息表';

#
# Data for table "xds_notice"
#


#
# Structure for table "xds_recharge"
#

DROP TABLE IF EXISTS `xds_recharge`;
CREATE TABLE `xds_recharge` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '充值用户ID',
  `order_no` varchar(255) NOT NULL DEFAULT '' COMMENT '订单号',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '充值时间',
  `out_trade_no` varchar(32) NOT NULL DEFAULT '' COMMENT '系统内部订单号，要求32个字符内，只能是数字、大小写字母_-|*@ ，且在同一个商户号下唯一。',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='充值表';

#
# Data for table "xds_recharge"
#


#
# Structure for table "xds_report"
#

DROP TABLE IF EXISTS `xds_report`;
CREATE TABLE `xds_report` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '投诉内容',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投诉时间',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '投诉人ID',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='投诉表';

#
# Data for table "xds_report"
#


#
# Structure for table "xds_route"
#

DROP TABLE IF EXISTS `xds_route`;
CREATE TABLE `xds_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由ID',
  `full_url` varchar(255) NOT NULL DEFAULT '' COMMENT '完整url',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '实际显示的url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='url路由表';

#
# Data for table "xds_route"
#


#
# Structure for table "xds_task"
#

DROP TABLE IF EXISTS `xds_task`;
CREATE TABLE `xds_task` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_plan_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属行动计划ID',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '任务标题',
  `requirment` varchar(255) NOT NULL DEFAULT '' COMMENT '任务要求',
  `content` text COMMENT '文章内容',
  `reference_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '参考时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`),
  KEY `post_date` (`create_time`) USING BTREE,
  KEY `type_status_date` (`create_time`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='任务表';

#
# Data for table "xds_task"
#


#
# Structure for table "xds_task_accelerate"
#

DROP TABLE IF EXISTS `xds_task_accelerate`;
CREATE TABLE `xds_task_accelerate` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属任务ID',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '获得助力加速的用户ID',
  `from_user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '给予助力加速的用户ID',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '助力加速状态：0 未加速  1成功加速',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务加速表';

#
# Data for table "xds_task_accelerate"
#


#
# Structure for table "xds_task_feedback"
#

DROP TABLE IF EXISTS `xds_task_feedback`;
CREATE TABLE `xds_task_feedback` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属任务ID',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发起反馈的用户ID',
  `to_user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '审核反馈的用户ID',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '反馈内容',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 待审核 1 未通过审核  2 审核通过',
  `reason` varchar(255) NOT NULL DEFAULT '' COMMENT '未通过审核原因',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='任务反馈表';

#
# Data for table "xds_task_feedback"
#

INSERT INTO `xds_task_feedback` VALUES (1,0,0,0,'1','0','1',0,0),(2,0,0,0,'','0','',0,0);

#
# Structure for table "xds_transactions"
#

DROP TABLE IF EXISTS `xds_transactions`;
CREATE TABLE `xds_transactions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '外键，用户ID',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '交易金额',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 支出 1 收入',
  `order_no` varchar(127) NOT NULL DEFAULT '' COMMENT '订单号',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '交易时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='交易记录表';

#
# Data for table "xds_transactions"
#


#
# Structure for table "xds_user"
#

DROP TABLE IF EXISTS `xds_user`;
CREATE TABLE `xds_user` (
  `id` char(36) NOT NULL DEFAULT '' COMMENT 'UUID',
  `number` char(8) NOT NULL DEFAULT '0' COMMENT '会员编号(外部ID)',
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '账户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码;password_hash加密',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '用户状态;0:禁用,1:正常',
  `reg_ip` char(15) NOT NULL DEFAULT '' COMMENT '注册IP',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `last_login_ip` char(15) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  PRIMARY KEY (`id`),
  KEY `number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "xds_user"
#

INSERT INTO `xds_user` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','68662449','','','1','127.0.0.1',1502682504,1503369812,'192.168.0.165',1503369812),('13225a3e-f16a-ebb0-450d-3a0a00ade5ca','10483929','','','1','116.7.219.103',1503302290,1503302290,'',0),('16e1481c-86e7-b9a5-e707-a1b2cdf766c3','13854363','','','1','116.7.219.103',1503302234,1503329219,'113.74.80.86',1503329219),('3e0b1448-7562-48cc-f885-3986a3bee7fa','48871847','','','1','14.17.37.43',1503301201,1503641543,'14.17.37.43',1503641543),('499d7c58-08b3-45e6-1a12-ab99c53f596b','84996925','','','1','124.239.138.2',1503640289,1503640483,'124.239.138.2',1503640483),('86966993-d3e4-e722-223d-bf16fc2e8421','53370684','','','1','127.0.0.1',1502782975,1502782975,'127.0.0.1',1502782975),('cb2395b7-7660-7134-85c9-612d4f4c74b5','62559261','','','1','14.17.37.72',1503302250,1503302250,'',0);

#
# Structure for table "xds_user_account"
#

DROP TABLE IF EXISTS `xds_user_account`;
CREATE TABLE `xds_user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `wallet` decimal(18,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '//钱包',
  `execution` int(11) NOT NULL DEFAULT '0' COMMENT '行动力',
  `creat_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "xds_user_account"
#

INSERT INTO `xds_user_account` VALUES (1,1,100.00,100,1502786232,1502786232);

#
# Structure for table "xds_user_info"
#

DROP TABLE IF EXISTS `xds_user_info`;
CREATE TABLE `xds_user_info` (
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '外键，用户UUID',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别;0:保密,1:男,2:女',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像',
  `from` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '0 本站图片 1 第三方图片',
  `signature` varchar(255) NOT NULL DEFAULT '' COMMENT '个性签名',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `wallet` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '钱包',
  `execution` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '行动力',
  `unionid` char(32) NOT NULL DEFAULT '' COMMENT '用户统一标识',
  `openid` char(32) NOT NULL DEFAULT '' COMMENT '用户的标识',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT COMMENT='用户信息表';

#
# Data for table "xds_user_info"
#

INSERT INTO `xds_user_info` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','1','好好的','http://auth.xingdongshe.com/images/20170817164138599556c2e26bd.jpg','1','123asdetretreter','',0.00,0,'o2d00xFpaFdhyl0Itf29kmvK78Jg','ow9BAw33SatfPEFsZtW5PR1Lvofw',1502682504,1503298801),('86966993-d3e4-e722-223d-bf16fc2e8421','1','h','images/201708151542555992a5ff4ebd2.jpg','0','','',0.00,0,'o2d00xH6LHyDA3r1o1ASqzoXhBC0','ow9BAw1VWoxItNT4jw9ROeiK5g6U',1502782975,1502782975),('3e0b1448-7562-48cc-f885-3986a3bee7fa','2','、K i d 。','images/20170821154001599a8e518944f.png','0','','',0.00,0,'o2d00xD9Yg7qj4qMeKYysRiZiIKE','o994OwnZud1Bpg6D0p8sfMOr8WbA',1503301201,1503301201),('16e1481c-86e7-b9a5-e707-a1b2cdf766c3','1','悟空','images/20170821155715599a925b2d734.jpg','0','','',0.00,0,'o2d00xFC-IZSyOeVLqlm1n4YVV-4','o994OwpKJM2IzXE2lbnHq-3wOKlI',1503302234,1503302235),('cb2395b7-7660-7134-85c9-612d4f4c74b5','1','風早君','images/20170821155730599a926a68a3f.jpg','0','','',0.00,0,'o2d00xK2N-EjAf9uZ3V_NFdqTWac','o994OwvGngl474czowA0NK1-W-yI',1503302250,1503302250),('13225a3e-f16a-ebb0-450d-3a0a00ade5ca','2','邹烨','images/20170821155810599a9292eebce.jpg','0','','',0.00,0,'o2d00xI436iyXJ6JfaXBHWh9nYKQ','o994OwtVIxStaAbAhClbRi3Ncg40',1503302290,1503302290),('499d7c58-08b3-45e6-1a12-ab99c53f596b','1','顺风²º¹7','images/20170825135130599fbae236c7e.jpg','0','','',0.00,0,'o2d00xP3sn2uwzqoAq0jjHQIYEUc','o994OwiLENsn6oroA1x8Vn-AMQYw',1503640289,1503640290);
