# Host: rm-2ze125ne5236itso9o.mysql.rds.aliyuncs.com  (Version: 5.6.34)
# Date: 2017-09-07 18:53:38
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "xds_act_plan"
#

DROP TABLE IF EXISTS `xds_act_plan`;
CREATE TABLE `xds_act_plan` (
  `id` char(36) NOT NULL DEFAULT '',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '外键，关联所属行动社群ID',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '行动计划名称',
  `cover_image` varchar(127) NOT NULL DEFAULT '' COMMENT '封面图片',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '行动计划简介',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '费用',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通模式 1 普通模式+挑战者模式',
  `total_participant` int(11) unsigned NOT NULL DEFAULT '99' COMMENT '累计参与人数',
  `task_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '内含任务总数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动计划表';

#
# Data for table "xds_act_plan"
#

INSERT INTO `xds_act_plan` VALUES ('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划004','http://api.xingdongshe.com/images/nx-xds-logo.jpg','004简介',19.00,'0',100,2,1504764696,1504764696,0),('185b6957-3732-3ca0-3b96-8fd9a7295363','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划001','http://api.xingdongshe.com/images/nx-xds-logo.jpg','001简介',20.00,'1',102,0,1503975099,1503977300,0),('4db41cdd-ee87-54a9-9864-4c0efb4237e2','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','003简介',19.00,'0',100,0,1504763790,1504763790,0),('b885ed62-8eaa-6b98-213d-30ef17e2f189','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','002简介',19.00,'0',100,0,1504780182,1504780182,0),('b890bdde-48f4-28d9-6f24-3791b32a986e','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','002简介',19.00,'0',100,0,1504750325,1504750325,0);

#
# Structure for table "xds_act_plan_record"
#

DROP TABLE IF EXISTS `xds_act_plan_record`;
CREATE TABLE `xds_act_plan_record` (
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '操作人ID',
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '行动计划ID',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '操作类型 0 创建 1 编辑',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '操作时间',
  KEY `user_id` (`user_id`,`act_plan_id`,`type`,`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='操作记录';

#
# Data for table "xds_act_plan_record"
#

INSERT INTO `xds_act_plan_record` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','185b6957-3732-3ca0-3b96-8fd9a7295363','0',1503975099),('0a9064ba-711f-5049-9300-c0cc88e1edf7','185b6957-3732-3ca0-3b96-8fd9a7295363','1',1503977300),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b890bdde-48f4-28d9-6f24-3791b32a986e','0',1504750325),('0a9064ba-711f-5049-9300-c0cc88e1edf7','4db41cdd-ee87-54a9-9864-4c0efb4237e2','0',1504763790),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','0',1504764696),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b885ed62-8eaa-6b98-213d-30ef17e2f189','0',1504780182);

#
# Structure for table "xds_act_plan_user"
#

DROP TABLE IF EXISTS `xds_act_plan_user`;
CREATE TABLE `xds_act_plan_user` (
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，所属行动计划ID',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，执行用户ID',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通模式 1 挑战者模式',
  `finish` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否已结束该计划',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '参加时间',
  KEY `user_id` (`user_id`,`act_plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动计划 用户对应表';

#
# Data for table "xds_act_plan_user"
#

INSERT INTO `xds_act_plan_user` VALUES ('185b6957-3732-3ca0-3b96-8fd9a7295363','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504262063),('b890bdde-48f4-28d9-6f24-3791b32a986e','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504750571),('4db41cdd-ee87-54a9-9864-4c0efb4237e2','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504763888),('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504780062),('b885ed62-8eaa-6b98-213d-30ef17e2f189','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504780426);

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
  `key_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关联ID',
  `key_type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 投诉 1 文章',
  `uri` varchar(64) NOT NULL DEFAULT '' COMMENT '资源uri',
  `type` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '资源类型：0 图片 1 音频 2 视频',
  `suffix` varchar(10) NOT NULL DEFAULT '' COMMENT '文件后缀名,不包括点',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `more` text COMMENT '其它详细信息,JSON格式',
  PRIMARY KEY (`id`),
  KEY `key_id` (`key_id`,`key_type`,`type`,`create_time`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='资源表';

#
# Data for table "xds_asset"
#

INSERT INTO `xds_asset` VALUES (5,0,'0','9f8344c89c4e7d50b70e8c636d4ebe6a6f44beea7fca0815c9f7bdd3d8cb0d10','0','jpg',1501663633,NULL),(6,4,'0','4','0','',1503910458,NULL),(7,4,'0','4','0','',1503910458,NULL),(8,5,'0','http://www.baidu.com','0','',1503910527,NULL),(9,5,'0','http://www.baidu.com','0','',1503910527,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='权限表';

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

INSERT INTO `xds_auth_user` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3',1503649565,1503649565,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3,4',1503649608,1503649608,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3,43',1503649613,1503649613,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3',1503655234,1503655234,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3','',1503885836,1503887556,0);

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
  `recommended` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否推荐 0 不推荐 1 推荐',
  `search` enum('0','1') NOT NULL DEFAULT '0' COMMENT '允许被搜索和推荐 0 允许 1 不允许',
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

INSERT INTO `xds_community` VALUES ('48eed6c0-f298-8020-d673-633d4101d5f3','42163987','电影赏析04','简介','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','2000','0','1','0','3',0,0),('76826caa-6894-f6b9-3ac3-de33e01879c2','83008910','电影欣赏06','简介','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','2000','0','1','0','3',1503369259,1503629903),('89217c66-df49-cd9b-b11e-50a51d6e33be','47183041','电影赏析03','16224','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','2000','0','0','0','3',1503373975,1503393168),('892c80b0-750c-0742-c6a4-5c1105285bee','35794877','电影赏析','16224','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','500','0','0','0','3',1503311264,1503393168),('ec16645b-cc9c-a7c8-536f-955219154cd2','66612548','电影欣赏02','简介','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','2000','0','0','0','3',0,0);

#
# Structure for table "xds_community_recommend"
#

DROP TABLE IF EXISTS `xds_community_recommend`;
CREATE TABLE `xds_community_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` char(36) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='行动社推荐表';

#
# Data for table "xds_community_recommend"
#

INSERT INTO `xds_community_recommend` VALUES (1,'48eed6c0-f298-8020-d673-633d4101d5f3',15222222);

#
# Structure for table "xds_community_transfer"
#

DROP TABLE IF EXISTS `xds_community_transfer`;
CREATE TABLE `xds_community_transfer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '转让人',
  `to_user_id` char(36) NOT NULL DEFAULT '' COMMENT '被转让人',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '被转让行动社ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '转让时间',
  PRIMARY KEY (`Id`),
  KEY `user_id` (`user_id`,`to_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='行动社转让记录表';

#
# Data for table "xds_community_transfer"
#

INSERT INTO `xds_community_transfer` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3',1503893124),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3',1503901326),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3',1503901357),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3',1503901427),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','892c80b0-750c-0742-c6a4-5c1105285bee',1503901971);

#
# Structure for table "xds_community_user"
#

DROP TABLE IF EXISTS `xds_community_user`;
CREATE TABLE `xds_community_user` (
  `community_id` char(36) NOT NULL DEFAULT '0' COMMENT '所属行动社群ID',
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '所有者ID(用户ID)',
  `type` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '关联类型 0 社长 1 管理员 2 成员',
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

INSERT INTO `xds_community_user` VALUES ('892c80b0-750c-0742-c6a4-5c1105285bee','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','0','1',1503311264,1503912845),('76826caa-6894-f6b9-3ac3-de33e01879c2','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0','0',1503369259,1503369259),('ec16645b-cc9c-a7c8-536f-955219154cd2','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','0',1503388656,1503388656),('76826caa-6894-f6b9-3ac3-de33e01879c2','86966993-d3e4-e722-223d-bf16fc2e8421','2','0','0',0,0),('48eed6c0-f298-8020-d673-633d4101d5f3','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0','0',0,1503901427),('892c80b0-750c-0742-c6a4-5c1105285bee','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0','0',0,1503901971),('48eed6c0-f298-8020-d673-633d4101d5f3','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','0',1504577164,1504577164),('76826caa-6894-f6b9-3ac3-de33e01879c2','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','0',0,0),('89217c66-df49-cd9b-b11e-50a51d6e33be','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','0',0,0),('892c80b0-750c-0742-c6a4-5c1105285bee','b9d25df4-8e9e-f917-f559-4872db0b9ea6','2','0','0',0,0),('892c80b0-750c-0742-c6a4-5c1105285bee','3e0b1448-7562-48cc-f885-3986a3bee7fa','2','0','0',0,0);

#
# Structure for table "xds_execution_record"
#

DROP TABLE IF EXISTS `xds_execution_record`;
CREATE TABLE `xds_execution_record` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动力积累表';

#
# Data for table "xds_execution_record"
#


#
# Structure for table "xds_income_expenses"
#

DROP TABLE IF EXISTS `xds_income_expenses`;
CREATE TABLE `xds_income_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '行动计划ID',
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '消费金额',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通 1 挑战模式',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '计划名称',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='收支明细交易表';

#
# Data for table "xds_income_expenses"
#

INSERT INTO `xds_income_expenses` VALUES (11,'185b6957-3732-3ca0-3b96-8fd9a7295363','A901620085576844',1.99,'0','行动计划名称',1504262008,1504262008),(12,'185b6957-3732-3ca0-3b96-8fd9a7295363','A901620624007858',1.99,'0','行动计划名称',1504262062,1504262062),(13,'b890bdde-48f4-28d9-6f24-3791b32a986e','A907505704780862',19.00,'0','行动计划002',1504750570,1504750570),(14,'4db41cdd-ee87-54a9-9864-4c0efb4237e2','A907638878415470',19.00,'0','行动计划003',1504763887,1504763887),(15,'0f6f6fba-c7ab-a432-d47a-0ff04b75a972','A907800616973137',19.00,'0','行动计划004',1504780061,1504780061),(16,'b885ed62-8eaa-6b98-213d-30ef17e2f189','A907804255607868',19.00,'0','行动计划002',1504780425,1504780425);

#
# Structure for table "xds_income_expenses_user"
#

DROP TABLE IF EXISTS `xds_income_expenses_user`;
CREATE TABLE `xds_income_expenses_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '用户ID',
  `ie_id` int(11) unsigned DEFAULT '0' COMMENT '收支明细表ID',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 支出 1 收入',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '交易时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='收支对应用户表';

#
# Data for table "xds_income_expenses_user"
#

INSERT INTO `xds_income_expenses_user` VALUES (17,'0a9064ba-711f-5049-9300-c0cc88e1edf7',11,'0',1504262008),(18,'cb2395b7-7660-7134-85c9-612d4f4c74b5',11,'1',1504262009),(19,'0a9064ba-711f-5049-9300-c0cc88e1edf7',12,'0',1504262062),(20,'cb2395b7-7660-7134-85c9-612d4f4c74b5',12,'1',1504262063),(21,'0a9064ba-711f-5049-9300-c0cc88e1edf7',13,'0',1504750570),(22,'cb2395b7-7660-7134-85c9-612d4f4c74b5',13,'1',1504750571),(23,'0a9064ba-711f-5049-9300-c0cc88e1edf7',14,'0',1504763888),(24,'cb2395b7-7660-7134-85c9-612d4f4c74b5',14,'1',1504763888),(25,'0a9064ba-711f-5049-9300-c0cc88e1edf7',15,'0',1504780061),(26,'cb2395b7-7660-7134-85c9-612d4f4c74b5',15,'1',1504780062),(27,'0a9064ba-711f-5049-9300-c0cc88e1edf7',16,'0',1504780425),(28,'cb2395b7-7660-7134-85c9-612d4f4c74b5',16,'1',1504780426);

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
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户登录记录表';

#
# Data for table "xds_login_history"
#

INSERT INTO `xds_login_history` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502846529),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502846854),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502847199),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502847287),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502849670),(6,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502849885),(7,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502855749),(8,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502868288),(9,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502877709),(10,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502882795),(11,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502956583),(12,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502957394),(13,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503044694),(14,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298062),(15,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298084),(16,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298198),(17,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298820),(18,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503301749),(19,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503301998),(20,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503302245),(21,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503302985),(22,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303086),(23,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303101),(24,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303105),(25,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303120),(26,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305541),(27,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305640),(28,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305822),(29,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503306529),(30,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503306539),(31,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503310969),(32,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503310980),(33,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311156),(34,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311319),(35,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311869),(36,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311882),(37,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311887),(38,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311921),(39,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311940),(40,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503313917),(41,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503313926),(42,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1503329207),(43,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1503329219),(44,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503368781),(45,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503369812),(46,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503628644),(47,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1503640290),(48,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1503640483),(49,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503641543),(50,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504164544),(51,'cb2395b7-7660-7134-85c9-612d4f4c74b5','0',1504249902),(52,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504257748),(53,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259239),(54,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259662),(55,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259672),(56,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259800),(57,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259806),(58,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260007),(59,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260076),(60,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260080),(61,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260490),(62,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260500),(63,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260587),(64,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260592),(65,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504262850),(66,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504490332),(67,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504490336),(68,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504492741),(69,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495420),(70,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495566),(71,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495813),(72,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504496366),(73,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504497075),(74,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504501646),(75,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504504403),(76,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504506610),(77,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504506774),(78,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504507146),(79,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504508457),(80,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504509058),(81,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504511068),(82,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504511151),(83,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511302),(84,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511366),(85,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511375),(86,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513423),(87,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513508),(88,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513553),(89,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504514535),(90,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504583862),(91,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504583868),(92,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504584570),(93,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504584713),(94,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','0',1504584952),(95,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589680),(96,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589716),(97,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589761),(98,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589854),(99,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590142),(100,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590225),(101,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590445),(102,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590484),(103,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590795),(104,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590949),(105,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591017),(106,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591096),(107,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591240),(108,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504591353),(109,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591491),(110,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591697),(111,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591783),(112,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504592909),(113,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504592972),(114,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593021),(115,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593488),(116,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593514),(117,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593646),(118,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593672),(119,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593704),(120,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593715),(121,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593790),(122,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593800),(123,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594218),(124,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594239),(125,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594241),(126,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594291),(127,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594292),(128,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594317),(129,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594343),(130,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594373),(131,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594381),(132,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594393),(133,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594404),(134,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594448),(135,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594460),(136,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594513),(137,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594537),(138,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594611),(139,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594615),(140,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594631),(141,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594662),(142,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594662),(143,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504606887),(144,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609208),(145,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609252),(146,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609493),(147,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504610074),(148,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659776),(149,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659882),(150,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659965),(151,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504660077),(152,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660228),(153,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660308),(154,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660360),(155,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660431),(156,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660657),(157,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660676),(158,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660710),(159,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660800),(160,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660958),(161,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504661094),(162,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504661417),(163,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504666148),(164,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1504666757),(165,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504666779),(166,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504669459),(167,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504669900),(168,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504670864),(169,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504670972),(170,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504671916),(171,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677797),(172,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677945),(173,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677959),(174,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677992),(175,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678003),(176,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678084),(177,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678341),(178,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504679072),(179,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504679921),(180,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504679989),(181,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680740),(182,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680761),(183,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680824),(184,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680837),(185,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680871),(186,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680883),(187,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680894),(188,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504683298),(189,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504695196),(190,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504697043),(191,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504746658),(192,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504748000),(193,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504748192),(194,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504750205),(195,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504750249),(196,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504756178),(197,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756280),(198,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756358),(199,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756827),(200,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756993),(201,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757059),(202,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757188),(203,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757323),(204,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504758490),(205,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504759610),(206,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763669),(207,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763704),(208,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763817),(209,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764169),(210,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764249),(211,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764407),(212,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764439),(213,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764645),(214,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504767265),(215,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504768408),(216,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504774013),(217,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504774083),(218,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504774852),(219,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504776023),(220,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504778596),(221,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504779226);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '充值用户ID',
  `total_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `out_trade_no` varchar(32) NOT NULL DEFAULT '' COMMENT '系统内部订单号，要求32个字符内，只能是数字、大小写字母_-|*@ ，且在同一个商户号下唯一。',
  `prepay_id` varchar(100) DEFAULT NULL COMMENT '订单微信支付的预订单id（用于发送模板消息）',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0：未支付  1：已支付',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '订单创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新订单状态时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='充值表';

#
# Data for table "xds_recharge"
#

INSERT INTO `xds_recharge` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831651224789325',NULL,0,1504165122,1504165122),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831652073143610',NULL,0,1504165207,1504165207),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831652654722839',NULL,0,1504165265,1504165265),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653176605432',NULL,0,1504165317,1504165317),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653546833674',NULL,0,1504165354,1504165354),(6,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653792742874',NULL,0,1504165379,1504165379),(7,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831654336723090',NULL,0,1504165433,1504165433),(8,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831656081469243',NULL,0,1504165608,1504165608),(9,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831659955432043','wx20170901114414151de0a88b0185848662',0,1504165995,1504237516),(10,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831680489285070','wx201709011056238f318d45650355899405',0,1504168049,1504234645),(11,'0a9064ba-711f-5049-9300-c0cc88e1edf7',16.88,'A901379125965895','wx20170901115133bde858dcda0601456091',0,1504237912,1504237955);

#
# Structure for table "xds_report"
#

DROP TABLE IF EXISTS `xds_report`;
CREATE TABLE `xds_report` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '投诉内容',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '投诉人ID',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '行动社ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投诉时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='投诉表';

#
# Data for table "xds_report"
#

INSERT INTO `xds_report` VALUES (1,'62559261','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee',1503909404),(2,'62559261','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee',1503909421),(3,'62559261','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee',1503910305),(4,'62559261','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee',1503910458),(5,'62559261','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee',1503910527);

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
  `id` char(36) NOT NULL DEFAULT '',
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '所属行动计划ID',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '任务标题',
  `requirement` varchar(255) NOT NULL DEFAULT '' COMMENT '任务要求',
  `content` text COMMENT '文章内容',
  `reference_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '参考时间',
  `release` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 未发布 1 发布',
  `order` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `finish` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否已结束该任务 0 否 1 是',
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

INSERT INTO `xds_task` VALUES ('3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容003',10,'1',0,'0',1504766152,1504766152,0),('49bf4c81-63a1-e06a-1074-8908cc0b1c42','185b6957-3732-3ca0-3b96-8fd9a7295363','行动01','要求01','内容',123,'1',0,'0',1504694707,1504694707,0),('633b6005-6e2d-75ea-c823-d96ca3fe5745','185b6957-3732-3ca0-3b96-8fd9a7295363','行动任务001','001要求','asdfg',123,'1',0,'0',1503988088,1503990071,0),('6514a394-7ea8-d382-f590-eb5581a5e2e1','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容003',10,'1',0,'0',1504765247,1504765247,0),('a4905edc-7437-6126-6702-6c08788d0758','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容',10,'1',0,'0',1504764979,1504764979,0),('b871952c-bca8-4471-3fa5-e6c6bc0b7523','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容003',10,'1',0,'0',1504765290,1504765290,0),('f75d9b53-f8c3-9a65-b412-5b4e53a5be9b','185b6957-3732-3ca0-3b96-8fd9a7295363','行动','要求','内容',123,'1',0,'0',1504682510,1504682510,0);

#
# Structure for table "xds_task_accelerate"
#

DROP TABLE IF EXISTS `xds_task_accelerate`;
CREATE TABLE `xds_task_accelerate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属任务ID',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '获得助力加速的用户ID',
  `from_user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '给予助力加速的用户ID',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '助力加速状态：0 未加速  1成功加速',
  PRIMARY KEY (`id`)
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
# Structure for table "xds_task_record"
#

DROP TABLE IF EXISTS `xds_task_record`;
CREATE TABLE `xds_task_record` (
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '操作人ID',
  `task_id` char(36) NOT NULL DEFAULT '' COMMENT '行动计划ID',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '操作类型 0 创建 1 编辑',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '操作时间',
  KEY `user_id` (`user_id`,`task_id`,`type`,`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='操作记录';

#
# Data for table "xds_task_record"
#

INSERT INTO `xds_task_record` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','633b6005-6e2d-75ea-c823-d96ca3fe5745','0',1503988089),('0a9064ba-711f-5049-9300-c0cc88e1edf7','633b6005-6e2d-75ea-c823-d96ca3fe5745','1',1503990006),('0a9064ba-711f-5049-9300-c0cc88e1edf7','633b6005-6e2d-75ea-c823-d96ca3fe5745','1',1503990063),('0a9064ba-711f-5049-9300-c0cc88e1edf7','633b6005-6e2d-75ea-c823-d96ca3fe5745','1',1503990071),('0a9064ba-711f-5049-9300-c0cc88e1edf7','f75d9b53-f8c3-9a65-b412-5b4e53a5be9b','0',1504682510),('0a9064ba-711f-5049-9300-c0cc88e1edf7','49bf4c81-63a1-e06a-1074-8908cc0b1c42','0',1504694707),('0a9064ba-711f-5049-9300-c0cc88e1edf7','6514a394-7ea8-d382-f590-eb5581a5e2e1','0',1504765247),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b871952c-bca8-4471-3fa5-e6c6bc0b7523','0',1504765291),('0a9064ba-711f-5049-9300-c0cc88e1edf7','3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','0',1504766152);

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

INSERT INTO `xds_user` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','68662449','','','1','127.0.0.1',1502682504,1504492741,'192.168.0.165',1504492741),('13225a3e-f16a-ebb0-450d-3a0a00ade5ca','10483929','','','1','116.7.219.103',1503302290,1503302290,'',0),('16e1481c-86e7-b9a5-e707-a1b2cdf766c3','13854363','','','1','116.7.219.103',1503302234,1504759610,'116.7.218.118',1504759610),('3e0b1448-7562-48cc-f885-3986a3bee7fa','48871847','','','1','14.17.37.43',1503301201,1504779226,'116.7.218.118',1504779226),('499d7c58-08b3-45e6-1a12-ab99c53f596b','84996925','','','1','124.239.138.2',1503640289,1504666756,'124.239.138.2',1504666756),('86966993-d3e4-e722-223d-bf16fc2e8421','53370684','','','1','127.0.0.1',1502782975,1502782975,'127.0.0.1',1502782975),('a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','87148873','','','1','14.17.37.72',1504584951,1504584952,'14.17.37.72',1504584952),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','30075710','','','1','116.7.218.10',1504259239,1504774083,'116.7.218.118',1504774083),('cb2395b7-7660-7134-85c9-612d4f4c74b5','62559261','','','1','14.17.37.72',1503302250,1504249902,'14.17.37.72',1504249902);

#
# Structure for table "xds_user_info"
#

DROP TABLE IF EXISTS `xds_user_info`;
CREATE TABLE `xds_user_info` (
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '外键，用户UUID',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别;0:保密,1:男,2:女',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像',
  `from` enum('0','1','2') CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '0 本地图片相对地址 1 完整图片uri  2 OSS图片',
  `signature` varchar(255) NOT NULL DEFAULT '' COMMENT '个性签名',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `unionid` char(32) NOT NULL DEFAULT '' COMMENT '用户统一标识',
  `openid` char(32) NOT NULL DEFAULT '' COMMENT '用户的标识',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT COMMENT='用户信息表';

#
# Data for table "xds_user_info"
#

INSERT INTO `xds_user_info` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','1','好好的','images/20170817164138599556c2e26bd.jpg','0','123asdetretreter','','o2d00xFpaFdhyl0Itf29kmvK78Jg','ow9BAw33SatfPEFsZtW5PR1Lvofw',1502682504,1503298801),('86966993-d3e4-e722-223d-bf16fc2e8421','1','h','images/201708151542555992a5ff4ebd2.jpg','0','','','o2d00xH6LHyDA3r1o1ASqzoXhBC0','ow9BAw1VWoxItNT4jw9ROeiK5g6U',1502782975,1502782975),('3e0b1448-7562-48cc-f885-3986a3bee7fa','2','、K i d 。','images/20170821154001599a8e518944f.png','0','','','o2d00xD9Yg7qj4qMeKYysRiZiIKE','o994OwnZud1Bpg6D0p8sfMOr8WbA',1503301201,1503301201),('16e1481c-86e7-b9a5-e707-a1b2cdf766c3','1','悟空','images/20170821155715599a925b2d734.jpg','0','','','o2d00xFC-IZSyOeVLqlm1n4YVV-4','o994OwpKJM2IzXE2lbnHq-3wOKlI',1503302234,1503302235),('cb2395b7-7660-7134-85c9-612d4f4c74b5','1','風早君','images/20170821155730599a926a68a3f.jpg','0','','','o2d00xK2N-EjAf9uZ3V_NFdqTWac','o994OwvGngl474czowA0NK1-W-yI',1503302250,1503302250),('13225a3e-f16a-ebb0-450d-3a0a00ade5ca','2','邹烨','images/20170821155810599a9292eebce.jpg','0','','','o2d00xI436iyXJ6JfaXBHWh9nYKQ','o994OwtVIxStaAbAhClbRi3Ncg40',1503302290,1503302290),('499d7c58-08b3-45e6-1a12-ab99c53f596b','1','顺风²º¹7','images/20170825135130599fbae236c7e.jpg','0','','','o2d00xP3sn2uwzqoAq0jjHQIYEUc','o994OwiLENsn6oroA1x8Vn-AMQYw',1503640289,1503640290),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','1','劉尧文','images/2017090117471959a92ca75279f.jpg','0','','','o2d00xPNE_YPCeQMsL6-bd2PcZSk','o994OwsQS_TTvMaDROe18zeGxZo4',1504259239,1504259239),('a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','1','老张','images/2017090512155259ae24f809fe8.jpg','0','','','o2d00xEHkFAO9zLZAE8bW2zuP2Tg','o994Owhfp3jqN890x07a0krbe9zw',1504584951,1504584952);

#
# Structure for table "xds_user_property"
#

DROP TABLE IF EXISTS `xds_user_property`;
CREATE TABLE `xds_user_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '',
  `wallet` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '钱包',
  `execution` int(11) NOT NULL DEFAULT '0' COMMENT '行动力',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `wallet` (`wallet`,`execution`,`create_time`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户财产资源';

#
# Data for table "xds_user_property"
#

INSERT INTO `xds_user_property` VALUES (1,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb',0.00,0,1504771110,1504771110),(2,'499d7c58-08b3-45e6-1a12-ab99c53f596b',0.00,0,1504771110,1504771110),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7',2.00,0,1504771110,2147483647),(4,'cb2395b7-7660-7134-85c9-612d4f4c74b5',0.00,0,1504771110,2147483647),(5,'86966993-d3e4-e722-223d-bf16fc2e8421',0.00,0,1504771110,1504771110),(6,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.00,0,1504771110,1504771110),(7,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',0.00,0,1504771110,1504771110),(8,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3',0.00,0,1504771110,1504771110);
