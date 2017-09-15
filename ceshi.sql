# Host: rm-2ze125ne5236itso9o.mysql.rds.aliyuncs.com  (Version: 5.6.34)
# Date: 2017-09-15 18:56:27
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

INSERT INTO `xds_act_plan` VALUES ('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划004','http://api.xingdongshe.com/images/nx-xds-logo.jpg','004简介',19.00,'0',100,2,1504764696,1504764696,0),('185b6957-3732-3ca0-3b96-8fd9a7295363','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划001','http://api.xingdongshe.com/images/nx-xds-logo.jpg','001简介',20.00,'1',102,0,1503975099,1503977300,0),('2eab278c-a0fd-b21f-3cbb-262a928ce51f','892c80b0-750c-0742-c6a4-5c1105285bee','这是第四个行动计划','http://weixin.xingdongshe.com/static/img/user/img4.png','这是行动计划的简介',45.00,'0',99,0,1505383596,1505383596,0),('4db41cdd-ee87-54a9-9864-4c0efb4237e2','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','003简介',19.00,'0',100,0,1504763790,1504763790,0),('4e7f6f47-9b3e-b9c1-a5a7-bc8879f7ab4b','892c80b0-750c-0742-c6a4-5c1105285bee','这是第九个行动计划','http://weixin.xingdongshe.com/static/img/user/img4.png','这是行动计划的简介',45.00,'0',99,0,1505383653,1505383653,0),('90756233-db97-0acd-5b4d-ca1607f9c7ea','892c80b0-750c-0742-c6a4-5c1105285bee','这是第六个行动计划','http://weixin.xingdongshe.com/static/img/user/img6.png','这是行动计划的简介',45.00,'0',99,0,1505383624,1505383624,0),('9425baea-cf1d-5bb5-203a-91f72fcd18fd','892c80b0-750c-0742-c6a4-5c1105285bee','这是第五个行动计划','http://weixin.xingdongshe.com/static/img/user/img5.png','这是行动计划的简介',45.00,'0',99,0,1505383611,1505383611,0),('a88b4fc0-0652-d590-a162-4574de7b903d','892c80b0-750c-0742-c6a4-5c1105285bee','这是第一个行动计划','http://weixin.xingdongshe.com/static/img/user/img1.png','这是行动计划的简介',45.00,'0',99,10,1505383477,1505383477,0),('ae006054-4185-5f46-c031-4ef2f6ceb4ff','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','002简介',19.00,'0',99,0,1505213933,1505213933,0),('b885ed62-8eaa-6b98-213d-30ef17e2f189','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','002简介',19.00,'0',102,0,1504780182,1504780182,0),('b890bdde-48f4-28d9-6f24-3791b32a986e','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','002简介',1.00,'1',100,0,1504750325,1505268796,0),('d18b8df2-7d8f-c936-da01-17a98252b7ee','ec16645b-cc9c-a7c8-536f-955219154cd2','作为管理员创建的行动计划No.1','http://weixin.xingdongshe.com/static/img/user/img7.png','描述什么的最烦了!',33.00,'1',99,0,1505464333,1505464333,0),('da3c2cf4-75ef-1c01-d295-2ecb1f4750e1','892c80b0-750c-0742-c6a4-5c1105285bee','这是第十个行动计划','http://weixin.xingdongshe.com/static/img/user/img4.png','这是行动计划的简介',45.00,'0',99,0,1505383661,1505383661,0),('e059d9f5-0b98-1a68-dd19-70e19c83da87','892c80b0-750c-0742-c6a4-5c1105285bee','这是第三个行动计划','http://weixin.xingdongshe.com/static/img/user/img3.png','这是行动计划的简介',45.00,'0',99,0,1505383582,1505383582,0),('ef9c7602-db5d-5a87-b2d8-137a71632563','892c80b0-750c-0742-c6a4-5c1105285bee','这是第二个行动计划','http://weixin.xingdongshe.com/static/img/user/img2.png','这是行动计划的简介',45.00,'0',99,0,1505383572,1505383572,0),('f2c7eaa1-3a19-ec2c-0077-a8bb9dca9bb3','892c80b0-750c-0742-c6a4-5c1105285bee','这是第七个行动计划','http://weixin.xingdongshe.com/static/img/user/img7.png','这是行动计划的简介',45.00,'0',99,0,1505383634,1505383634,0),('f53c4e29-43f7-80a3-e5c5-36606a0725a1','892c80b0-750c-0742-c6a4-5c1105285bee','这是第八个行动计划','http://weixin.xingdongshe.com/static/img/user/img4.png','这是行动计划的简介',45.00,'0',99,0,1505383644,1505383644,0);

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

INSERT INTO `xds_act_plan_record` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','185b6957-3732-3ca0-3b96-8fd9a7295363','0',1503975099),('0a9064ba-711f-5049-9300-c0cc88e1edf7','185b6957-3732-3ca0-3b96-8fd9a7295363','1',1503977300),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b890bdde-48f4-28d9-6f24-3791b32a986e','0',1504750325),('0a9064ba-711f-5049-9300-c0cc88e1edf7','4db41cdd-ee87-54a9-9864-4c0efb4237e2','0',1504763790),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','0',1504764696),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b885ed62-8eaa-6b98-213d-30ef17e2f189','0',1504780182),('0a9064ba-711f-5049-9300-c0cc88e1edf7','ae006054-4185-5f46-c031-4ef2f6ceb4ff','0',1505213933),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b890bdde-48f4-28d9-6f24-3791b32a986e','1',1505268796),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','a88b4fc0-0652-d590-a162-4574de7b903d','0',1505383477),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','ef9c7602-db5d-5a87-b2d8-137a71632563','0',1505383572),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','e059d9f5-0b98-1a68-dd19-70e19c83da87','0',1505383582),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','2eab278c-a0fd-b21f-3cbb-262a928ce51f','0',1505383596),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','9425baea-cf1d-5bb5-203a-91f72fcd18fd','0',1505383611),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','90756233-db97-0acd-5b4d-ca1607f9c7ea','0',1505383625),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','f2c7eaa1-3a19-ec2c-0077-a8bb9dca9bb3','0',1505383634),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','f53c4e29-43f7-80a3-e5c5-36606a0725a1','0',1505383644),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','4e7f6f47-9b3e-b9c1-a5a7-bc8879f7ab4b','0',1505383653),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','da3c2cf4-75ef-1c01-d295-2ecb1f4750e1','0',1505383661),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','d18b8df2-7d8f-c936-da01-17a98252b7ee','0',1505464333);

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

INSERT INTO `xds_act_plan_user` VALUES ('185b6957-3732-3ca0-3b96-8fd9a7295363','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504262063),('b890bdde-48f4-28d9-6f24-3791b32a986e','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504750571),('4db41cdd-ee87-54a9-9864-4c0efb4237e2','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504763888),('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504780062),('b885ed62-8eaa-6b98-213d-30ef17e2f189','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','0',1505201311),('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0',0),('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0',0),('a88b4fc0-0652-d590-a162-4574de7b903d','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0',0);

#
# Structure for table "xds_advice"
#

DROP TABLE IF EXISTS `xds_advice`;
CREATE TABLE `xds_advice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '意见反馈表',
  `content` varchar(255) DEFAULT NULL COMMENT '意见内容',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '外键，用户主键id',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '用户昵称，冗余字段',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='意见与建议';

#
# Data for table "xds_advice"
#

INSERT INTO `xds_advice` VALUES (1,'内容003','0a9064ba-711f-5049-9300-c0cc88e1edf7','好好的',1504864307),(2,'内容003','0a9064ba-711f-5049-9300-c0cc88e1edf7','好好的',1504864376);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` char(36) NOT NULL DEFAULT '' COMMENT '授权用户ID',
  `to_user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，被授权用户ID',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，行动社ID',
  `auth` varchar(8) NOT NULL DEFAULT '' COMMENT '权限值，以,分隔',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `联合主键` (`to_user_id`,`community_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户权限对应表';

#
# Data for table "xds_auth_user"
#

INSERT INTO `xds_auth_user` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','76826caa-6894-f6b9-3ac3-de33e01879c2','1,2,3,4',1503655234,1503655234,0),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3','',1503885836,1503887556,0),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7','b9d25df4-8e9e-f917-f559-4872db0b9ea6','ec16645b-cc9c-a7c8-536f-955219154cd2','1,2,3,4',0,0,0);

#
# Structure for table "xds_blocked_list"
#

DROP TABLE IF EXISTS `xds_blocked_list`;
CREATE TABLE `xds_blocked_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，加入黑名单用户ID',
  `blocked_user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，被加入黑名单用户ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`blocked_user_id`) COMMENT '联合主键'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='黑名单';

#
# Data for table "xds_blocked_list"
#

INSERT INTO `xds_blocked_list` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','b9d25df4-8e9e-f917-f559-4872db0b9ea6',1505095787,0),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7','86966993-d3e4-e722-223d-bf16fc2e8421',1505179893,1505196673);

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
  `scale_num` enum('10000') NOT NULL DEFAULT '10000' COMMENT '成员数量规模限制',
  `pay_num` enum('500') NOT NULL DEFAULT '500' COMMENT '付费用户人数',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '状态 0 正常 1 冻结 2 封禁',
  `recommended` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否推荐 0 不推荐 1 推荐',
  `search` enum('0','1') NOT NULL DEFAULT '0' COMMENT '允许被搜索和推荐 0 允许 1 不允许',
  `update_num` tinyint(3) NOT NULL DEFAULT '30' COMMENT '编辑行动社次数，每月只能修改3次',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '社群创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `name` (`name`) COMMENT '搜索',
  KEY `outside_id` (`outside_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动社表';

#
# Data for table "xds_community"
#

INSERT INTO `xds_community` VALUES ('15ef0f98-5584-6b57-42a9-2103d462b589','24774216','我美不美','快点夸我可爱啊，漂亮的小姐姐','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505283866,1505385110),('2553b1b3-7ecc-990b-ef97-dd727eb4ae2a','75532463','再来一个试试2','这个就看看result.data是什么','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505209038,1505385110),('4c129a60-59e2-4ef2-63c2-f2bde7ccca19','33146465','啦啦啦','哩哩啦啦','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505350887,1505385110),('523255d2-8de8-3a03-ea11-26c4a0099866','97993966','测试创建','测试安卓','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',1,1505375620,1505441970),('57cf5bc4-f4b0-51a1-3a6e-cb7563598570','63515449','22','134649','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505354221,1505385110),('58d153d9-1702-e225-7cbc-59a453386bca','21313657','啊就是比较安静安康2','焦恩俊睡觉啊可','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505354305,1505385110),('60470447-7bac-250f-892d-5e72e7987285','30056807','测试第二版','今天的测试','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505268038,1505385110),('67ff98d2-677b-fb18-8dad-83a39b2e8766','47377862','不是教案233','wjjwjsjsjs','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505354258,1505385110),('76826caa-6894-f6b9-3ac3-de33e01879c2','83008910','电影欣赏06','简介方法 v 反反复复反反复复看一下哦','http://weixin.xingdongshe.com/static/img/user/img1.png','','','','500','0','1','0',3,1503369259,1505385110),('7cb0ad89-113b-2a14-f3ad-9b7fa77b33fd','34158620','222','企鹅区委区233','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505208788,1505385110),('89217c66-df49-cd9b-b11e-50a51d6e33be','47183041','电影赏析03','16224','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','','500','0','0','0',3,1503373975,1505385110),('892c80b0-750c-0742-c6a4-5c1105285bee','35794877','行动计划002','再次测试 测试编辑后跳转然后返回到index','http://weixin.xingdongshe.com/static/img/user/img1.png','','','','500','0','0','0',3,1503311264,1505385110),('ac6f603f-6880-3b25-25d5-89f8f57fce55','58804156','公寓1112','嫌疑人消防队员333','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505209432,1505385110),('c95134b4-83d5-ce44-6e79-c3273f807e71','35629250','测试第一版跳转','测试 非第0个index应该是可以了','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505267942,1505385110),('d14e020f-fe08-5ddb-020f-1fb439342478','45096318','哈哈哈','哈哈哈哈哈哈','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505379254,1505385110),('e20d3eea-4164-01ab-fd23-aa2e93836b09','70151805','如何将安2','热节哀口腔健康','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505354280,1505385110),('ec16645b-cc9c-a7c8-536f-955219154cd2','66612548','电影欣赏02','简介','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','','500','0','0','0',3,1505379481,1505385110),('ec685e49-3456-6a37-8220-be6bb35868ae','29165367','悟空的行动社','悟空的行动社的简介','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',29,1505385971,1505417530);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` char(36) NOT NULL DEFAULT '0' COMMENT '所属行动社群ID',
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '所有者ID(用户ID)',
  `type` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '关联类型 0 社长 1 管理员 2 成员',
  `msg_only_admin` enum('0','1') NOT NULL DEFAULT '0' COMMENT '只接受管理员私信 0=关闭，1=开启。',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 未退群 1 已退群 2被暂停成员资格',
  `pay` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否为付费用户 0 否 1 是',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '加入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新状态时间',
  PRIMARY KEY (`id`),
  KEY `community_id` (`community_id`,`user_id`) COMMENT '复合主键',
  KEY `type` (`type`) COMMENT 'type'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='社群用户对应表';

#
# Data for table "xds_community_user"
#

INSERT INTO `xds_community_user` VALUES (1,'892c80b0-750c-0742-c6a4-5c1105285bee','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','1','1',1503311264,1503912845),(2,'76826caa-6894-f6b9-3ac3-de33e01879c2','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0','0','0',1503369259,1503369259),(3,'58d153d9-1702-e225-7cbc-59a453386bca','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','0','0','0',1503388656,1503388656),(4,'76826caa-6894-f6b9-3ac3-de33e01879c2','86966993-d3e4-e722-223d-bf16fc2e8421','2','0','2','0',1505300251,1505300251),(5,'892c80b0-750c-0742-c6a4-5c1105285bee','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0','0','0',1505300251,1503901971),(6,'76826caa-6894-f6b9-3ac3-de33e01879c2','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','0','1',1505300251,1505201312),(7,'89217c66-df49-cd9b-b11e-50a51d6e33be','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','0','0',1505300251,1505300251),(8,'892c80b0-750c-0742-c6a4-5c1105285bee','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0','0','0',1505300251,1505300251),(9,'892c80b0-750c-0742-c6a4-5c1105285bee','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1505300251,1505300251),(10,'7cb0ad89-113b-2a14-f3ad-9b7fa77b33fd','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1505208788,1505208788),(11,'2553b1b3-7ecc-990b-ef97-dd727eb4ae2a','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1505209038,1505209038),(12,'ac6f603f-6880-3b25-25d5-89f8f57fce55','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1505209432,1505209432),(13,'c95134b4-83d5-ce44-6e79-c3273f807e71','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0','0','0',1505267942,1505267942),(14,'60470447-7bac-250f-892d-5e72e7987285','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0','0','0',1505268038,1505268038),(15,'15ef0f98-5584-6b57-42a9-2103d462b589','499d7c58-08b3-45e6-1a12-ab99c53f596b','0','0','0','0',1505283866,1505283866),(16,'4c129a60-59e2-4ef2-63c2-f2bde7ccca19','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','0','0',1505350887,1505350887),(17,'57cf5bc4-f4b0-51a1-3a6e-cb7563598570','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1505354221,1505354221),(18,'67ff98d2-677b-fb18-8dad-83a39b2e8766','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1505354258,1505354258),(19,'e20d3eea-4164-01ab-fd23-aa2e93836b09','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1505354280,1505354280),(20,'58d153d9-1702-e225-7cbc-59a453386bca','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1505354305,1505354305),(21,'523255d2-8de8-3a03-ea11-26c4a0099866','0f584f9c-befb-a17e-b205-765cd7efde33','0','0','0','0',1505375620,1505375620),(22,'d14e020f-fe08-5ddb-020f-1fb439342478','13225a3e-f16a-ebb0-450d-3a0a00ade5ca','0','0','0','0',1505379254,1505379254),(23,'ec685e49-3456-6a37-8220-be6bb35868ae','16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0','0','0','0',1505385971,1505385971),(24,'76826caa-6894-f6b9-3ac3-de33e01879c2','b9d25df4-8e9e-f917-f559-4872db0b9ea6','2','0','0','0',0,0),(25,'ec16645b-cc9c-a7c8-536f-955219154cd2','b9d25df4-8e9e-f917-f559-4872db0b9ea6','1','0','0','0',0,0);

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
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '计划名称',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='收支明细交易表';

#
# Data for table "xds_income_expenses"
#

INSERT INTO `xds_income_expenses` VALUES (11,'185b6957-3732-3ca0-3b96-8fd9a7295363','A901620085576844',1.99,'行动计划名称',1504262008,1504262008),(12,'185b6957-3732-3ca0-3b96-8fd9a7295363','A901620624007858',1.99,'行动计划名称',1504262062,1504262062),(13,'b890bdde-48f4-28d9-6f24-3791b32a986e','A907505704780862',19.00,'行动计划002',1504750570,1504750570),(14,'4db41cdd-ee87-54a9-9864-4c0efb4237e2','A907638878415470',19.00,'行动计划003',1504763887,1504763887),(15,'0f6f6fba-c7ab-a432-d47a-0ff04b75a972','A907800616973137',19.00,'行动计划004',1504780061,1504780061),(16,'b885ed62-8eaa-6b98-213d-30ef17e2f189','A907804255607868',19.00,'行动计划002',1504780425,1504780425),(17,'b885ed62-8eaa-6b98-213d-30ef17e2f189','A908681166925343',19.00,'行动计划002',1504868116,1504868116),(18,'b885ed62-8eaa-6b98-213d-30ef17e2f189','A912013108395671',19.00,'行动计划002',1505201310,1505201310);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='收支对应用户表';

#
# Data for table "xds_income_expenses_user"
#

INSERT INTO `xds_income_expenses_user` VALUES (17,'0a9064ba-711f-5049-9300-c0cc88e1edf7',11,'0',1504262008),(18,'cb2395b7-7660-7134-85c9-612d4f4c74b5',11,'1',1504262009),(19,'0a9064ba-711f-5049-9300-c0cc88e1edf7',12,'0',1504262062),(20,'cb2395b7-7660-7134-85c9-612d4f4c74b5',12,'1',1504262063),(21,'0a9064ba-711f-5049-9300-c0cc88e1edf7',13,'0',1504750570),(22,'cb2395b7-7660-7134-85c9-612d4f4c74b5',13,'1',1504750571),(23,'0a9064ba-711f-5049-9300-c0cc88e1edf7',14,'0',1504763888),(24,'cb2395b7-7660-7134-85c9-612d4f4c74b5',14,'1',1504763888),(25,'0a9064ba-711f-5049-9300-c0cc88e1edf7',15,'0',1404780061),(26,'cb2395b7-7660-7134-85c9-612d4f4c74b5',15,'1',1504780062),(27,'0a9064ba-711f-5049-9300-c0cc88e1edf7',16,'0',1504780425),(28,'cb2395b7-7660-7134-85c9-612d4f4c74b5',16,'1',1504780426),(29,'0a9064ba-711f-5049-9300-c0cc88e1edf7',17,'0',1504868117),(30,'cb2395b7-7660-7134-85c9-612d4f4c74b5',17,'1',1504868117),(31,'0a9064ba-711f-5049-9300-c0cc88e1edf7',18,'0',1505201311),(32,'cb2395b7-7660-7134-85c9-612d4f4c74b5',18,'1',1505201311);

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
) ENGINE=InnoDB AUTO_INCREMENT=406 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户登录记录表';

#
# Data for table "xds_login_history"
#

INSERT INTO `xds_login_history` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502846529),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502846854),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502847199),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502847287),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502849670),(6,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502849885),(7,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502855749),(8,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502868288),(9,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502877709),(10,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502882795),(11,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502956583),(12,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502957394),(13,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503044694),(14,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298062),(15,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298084),(16,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298198),(17,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298820),(18,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503301749),(19,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503301998),(20,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503302245),(21,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503302985),(22,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303086),(23,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303101),(24,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303105),(25,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303120),(26,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305541),(27,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305640),(28,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305822),(29,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503306529),(30,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503306539),(31,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503310969),(32,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503310980),(33,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311156),(34,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311319),(35,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311869),(36,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311882),(37,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311887),(38,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311921),(39,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311940),(40,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503313917),(41,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503313926),(42,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1503329207),(43,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1503329219),(44,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503368781),(45,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503369812),(46,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503628644),(47,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1503640290),(48,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1503640483),(49,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503641543),(50,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504164544),(51,'cb2395b7-7660-7134-85c9-612d4f4c74b5','0',1504249902),(52,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504257748),(53,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259239),(54,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259662),(55,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259672),(56,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259800),(57,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259806),(58,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260007),(59,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260076),(60,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260080),(61,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260490),(62,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260500),(63,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260587),(64,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260592),(65,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504262850),(66,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504490332),(67,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504490336),(68,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504492741),(69,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495420),(70,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495566),(71,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495813),(72,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504496366),(73,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504497075),(74,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504501646),(75,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504504403),(76,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504506610),(77,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504506774),(78,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504507146),(79,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504508457),(80,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504509058),(81,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504511068),(82,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504511151),(83,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511302),(84,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511366),(85,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511375),(86,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513423),(87,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513508),(88,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513553),(89,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504514535),(90,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504583862),(91,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504583868),(92,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504584570),(93,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504584713),(94,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','0',1504584952),(95,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589680),(96,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589716),(97,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589761),(98,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589854),(99,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590142),(100,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590225),(101,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590445),(102,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590484),(103,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590795),(104,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590949),(105,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591017),(106,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591096),(107,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591240),(108,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504591353),(109,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591491),(110,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591697),(111,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591783),(112,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504592909),(113,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504592972),(114,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593021),(115,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593488),(116,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593514),(117,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593646),(118,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593672),(119,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593704),(120,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593715),(121,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593790),(122,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593800),(123,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594218),(124,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594239),(125,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594241),(126,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594291),(127,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594292),(128,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594317),(129,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594343),(130,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594373),(131,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594381),(132,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594393),(133,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594404),(134,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594448),(135,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594460),(136,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594513),(137,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594537),(138,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594611),(139,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594615),(140,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594631),(141,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594662),(142,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594662),(143,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504606887),(144,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609208),(145,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609252),(146,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609493),(147,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504610074),(148,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659776),(149,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659882),(150,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659965),(151,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504660077),(152,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660228),(153,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660308),(154,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660360),(155,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660431),(156,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660657),(157,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660676),(158,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660710),(159,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660800),(160,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660958),(161,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504661094),(162,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504661417),(163,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504666148),(164,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1504666757),(165,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504666779),(166,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504669459),(167,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504669900),(168,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504670864),(169,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504670972),(170,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504671916),(171,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677797),(172,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677945),(173,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677959),(174,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677992),(175,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678003),(176,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678084),(177,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678341),(178,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504679072),(179,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504679921),(180,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504679989),(181,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680740),(182,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680761),(183,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680824),(184,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680837),(185,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680871),(186,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680883),(187,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680894),(188,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504683298),(189,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504695196),(190,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504697043),(191,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504746658),(192,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504748000),(193,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504748192),(194,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504750205),(195,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504750249),(196,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504756178),(197,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756280),(198,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756358),(199,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756827),(200,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756993),(201,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757059),(202,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757188),(203,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757323),(204,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504758490),(205,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504759610),(206,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763669),(207,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763704),(208,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763817),(209,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764169),(210,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764249),(211,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764407),(212,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764439),(213,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764645),(214,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504767265),(215,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504768408),(216,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504774013),(217,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504774083),(218,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504774852),(219,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504776023),(220,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504778596),(221,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504779226),(222,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504783075),(223,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504785637),(224,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504832621),(225,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504832867),(226,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504835133),(227,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836657),(228,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836673),(229,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836754),(230,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836795),(231,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836926),(232,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504837880),(233,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504838301),(234,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504839165),(235,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504843386),(236,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504843465),(237,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504843505),(238,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504843787),(239,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504851775),(240,'bf670625-f384-b056-fab9-4c3f45314aa2','0',1504853402),(241,'bf670625-f384-b056-fab9-4c3f45314aa2','0',1504854033),(242,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504861329),(243,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504861583),(244,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504861603),(245,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504862203),(246,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504863926),(247,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504864085),(248,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504864205),(249,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504864263),(250,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504864338),(251,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504864362),(252,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504864420),(253,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504864756),(254,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504864853),(255,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504865009),(256,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504865151),(257,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504865698),(258,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504869114),(259,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504925383),(260,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505091801),(261,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505092891),(262,'13225a3e-f16a-ebb0-450d-3a0a00ade5ca','0',1505109429),(263,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505112739),(264,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505112986),(265,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505113182),(266,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505113277),(267,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505113519),(268,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505113646),(269,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505113870),(270,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505113924),(271,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114037),(272,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114510),(273,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114569),(274,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505114695),(275,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114699),(276,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505114805),(277,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114972),(278,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505115069),(279,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505115197),(280,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1505115857),(281,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505119750),(282,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505123325),(283,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505178518),(284,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505180402),(285,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505180632),(286,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505184853),(287,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505184951),(288,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505185066),(289,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505185163),(290,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505185328),(291,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505186116),(292,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505186189),(293,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505186258),(294,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505186918),(295,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505187122),(296,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505187295),(297,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505188651),(298,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505188796),(299,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505189031),(300,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','0',1505191659),(301,'aab70efb-92e5-7f6c-423f-e3d4e4f5ac83','0',1505195124),(302,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505195814),(303,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505196167),(304,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505197032),(305,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505198702),(306,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505200069),(307,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505200184),(308,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505200651),(309,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505200747),(310,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505200783),(311,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505201166),(312,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505207331),(313,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505207439),(314,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505207537),(315,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505208762),(316,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505210545),(317,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505211249),(318,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505211370),(319,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505211696),(320,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505211776),(321,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505211990),(322,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505212318),(323,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505212653),(324,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505212724),(325,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505212758),(326,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505212856),(327,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505213546),(328,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505213616),(329,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505214127),(330,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505214195),(331,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505214281),(332,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505214308),(333,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505214355),(334,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505215232),(335,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505215320),(336,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505215557),(337,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505215655),(338,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505215856),(339,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505216409),(340,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505264811),(341,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505264822),(342,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505268343),(343,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1505276550),(344,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505281499),(345,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505281740),(346,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505282110),(347,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505282213),(348,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505282278),(349,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505282422),(350,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505283028),(351,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505283175),(352,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505283324),(353,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505283545),(354,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505283896),(355,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505284224),(356,'501969d6-b26d-bb2d-29e3-5264a923def9','0',1505285272),(357,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505285342),(358,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505285468),(359,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505286036),(360,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505287318),(361,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505287493),(362,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505298008),(363,'cb2395b7-7660-7134-85c9-612d4f4c74b5','0',1505298142),(364,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505298325),(365,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505298644),(366,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505299211),(367,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505299666),(368,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505300243),(369,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505300361),(370,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505350826),(371,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505351484),(372,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505354048),(373,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505354159),(374,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505355866),(375,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505356047),(376,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505356440),(377,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505356866),(378,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505357219),(379,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505357844),(380,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505358059),(381,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505359494),(382,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505359704),(383,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505360449),(384,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505368979),(385,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505369005),(386,'0f584f9c-befb-a17e-b205-765cd7efde33','0',1505369075),(387,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505369426),(388,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505370559),(389,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505373118),(390,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505373619),(391,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505374025),(392,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505374595),(393,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505376592),(394,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505377230),(395,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505377425),(396,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505378192),(397,'a4e6de38-15c9-9199-f139-68f8d3571899','0',1505379783),(398,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505380096),(399,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505386168),(400,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505437510),(401,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505442348),(402,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505443602),(403,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505444379),(404,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505444667),(405,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505450214),(406,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505460979),(407,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505461326),(408,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505464028),(409,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505464190),(410,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505468821),(411,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505470048),(412,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505470388),(413,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505470660),(414,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505470950),(415,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505471263),(416,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505471356),(417,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472086),(418,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472486),(419,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472637),(420,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472729),(421,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472815);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='充值表';

#
# Data for table "xds_recharge"
#

INSERT INTO `xds_recharge` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831651224789325',NULL,0,1504165122,1504165122),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831652073143610',NULL,0,1504165207,1504165207),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831652654722839',NULL,0,1504165265,1504165265),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653176605432',NULL,0,1504165317,1504165317),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653546833674',NULL,0,1504165354,1504165354),(6,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653792742874',NULL,0,1504165379,1504165379),(7,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831654336723090',NULL,0,1504165433,1504165433),(8,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831656081469243',NULL,0,1504165608,1504165608),(9,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831659955432043','wx20170901114414151de0a88b0185848662',0,1504165995,1504237516),(10,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831680489285070','wx201709011056238f318d45650355899405',0,1504168049,1504234645),(11,'0a9064ba-711f-5049-9300-c0cc88e1edf7',16.88,'A901379125965895','wx20170901115133bde858dcda0601456091',0,1504237912,1504237955),(12,'3e0b1448-7562-48cc-f885-3986a3bee7fa',2.00,'A915420576887101',NULL,0,1505442057,1505442057),(13,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915427413135442','wx2017091510322106cd76905d0609956381',0,1505442741,1505442741),(14,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915432140327075','wx20170915104014dc72ea1dd90767927507',0,1505443214,1505443214),(15,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915432504367540','wx201709151040509b65db72c50850218844',0,1505443250,1505443250),(16,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915433772411620','wx2017091510425711d969993d0012293854',0,1505443377,1505443377),(17,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915436809648040','wx20170915104801cf30c7f87d0237422669',0,1505443680,1505443681),(18,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915437032202036','wx20170915104823fb5526b12c0196351516',0,1505443703,1505443703),(19,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915444634149839','wx201709151101033975281c830713625520',0,1505444463,1505444463),(20,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',1.00,'A915446948903488','wx201709151104558e3e6fcd070795889363',0,1505444694,1505444695),(21,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915449972266720','wx20170915110957b15b08a9a20901606308',0,1505444997,1505444997),(22,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',1.00,'A915450172782902','wx201709151110174f12f1c29a0722429360',0,1505445017,1505445017),(23,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915455707944399','wx20170915111931bce787205d0894006658',0,1505445570,1505445571),(24,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.02,'A915461635328200','wx20170915112924ec303e45160083986014',0,1505446163,1505446164),(25,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.02,'A915462055897272','wx20170915113005b696609f1a0157044256',0,1505446205,1505446206),(26,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.03,'A915463877773854','wx20170915113308559e786ace0986447765',0,1505446387,1505446388),(27,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.04,'A915464806908597','wx20170915113441e7d7710b0a0978717118',0,1505446480,1505446481),(28,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.04,'A915469257547897','wx201709151142064c74926dfd0596281834',0,1505446925,1505446926),(29,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.01,'A915472711731095','wx2017091511475115af16195e0548924637',0,1505447271,1505447271),(30,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.06,'A915476478649901','wx201709151154080dfa0d04240173764482',0,1505447647,1505447648),(31,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.01,'A915479723775104','wx201709151159326f942127b50725816138',0,1505447972,1505447972),(32,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.10,'A915481452967494','wx201709151202251238768bd50396130606',0,1505448145,1505448145),(33,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A915497386577225','wx201709151228595dee06a3360953842642',1,1505449738,1505449739),(34,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A915499781979578','wx20170915123258e2f3cb11e70344961389',1,1505449978,1505449978),(35,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.01,'A915614399237088','wx20170915154400d66ec233490121373770',1,1505461439,1505461440),(36,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.01,'A915640423292503','wx2017091516272224305f16900729361808',1,1505464042,1505464042),(37,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.02,'A915640662823509','wx20170915162746a15268cd030539513071',1,1505464066,1505464066),(38,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.01,'A915641370446829','wx20170915162857a7d94243d40557368144',1,1505464137,1505464137);

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

INSERT INTO `xds_task` VALUES ('09e2c2af-710d-8f61-d777-26c77bfa5d87','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.6\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440518,1505440518,0),('3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动计划002','002简介','1',1,'1',0,'0',1504766152,1505270742,0),('49bf4c81-63a1-e06a-1074-8908cc0b1c42','185b6957-3732-3ca0-3b96-8fd9a7295363','行动01','要求01','内容',123,'1',0,'0',1504694707,1504694707,0),('633b6005-6e2d-75ea-c823-d96ca3fe5745','185b6957-3732-3ca0-3b96-8fd9a7295363','行动任务001','001要求','asdfg',123,'1',0,'0',1503988088,1503990071,0),('6514a394-7ea8-d382-f590-eb5581a5e2e1','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容003',10,'1',0,'0',1504765247,1504765247,0),('73712a59-9576-ca4e-e74d-c73d55690694','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.8\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440529,1505440529,0),('953d295c-70f1-b3ad-1754-dac6b41e996c','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.2\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440016,1505440016,0),('a4905edc-7437-6126-6702-6c08788d0758','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容',10,'1',0,'0',1504764979,1504764979,0),('b871952c-bca8-4471-3fa5-e6c6bc0b7523','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容003',10,'1',0,'0',1504765290,1504765290,0),('ca5cdd78-bf94-f2e7-029e-5fecd7af8d82','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.7\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440525,1505440525,0),('dca3a198-7ce1-ce66-0ca1-62398d61d881','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.5\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440033,1505440033,0),('e2c26d1f-2db0-513b-1343-201bce4d7d64','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.1\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440007,1505440007,0),('ec02aeb2-ee15-141f-87ed-777b88060832','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.3\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440025,1505440025,0),('ecbf3ca5-1d5e-18fb-b10d-2d57eaa4ba08','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.6\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440038,1505440038,0),('f75d9b53-f8c3-9a65-b412-5b4e53a5be9b','185b6957-3732-3ca0-3b96-8fd9a7295363','行动','要求','内容',123,'1',0,'0',1504682510,1504682510,0),('f9e1d587-6e0c-0614-58c1-3bac00df6655','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.9\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440534,1505440534,0),('fda89456-a12a-4155-a363-9b5a1184a185','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.4\'=','这是要求','这里是富文本',3600,'1',0,'0',1505440029,1505440029,0);

#
# Structure for table "xds_task_accelerate"
#

DROP TABLE IF EXISTS `xds_task_accelerate`;
CREATE TABLE `xds_task_accelerate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` char(36) NOT NULL DEFAULT '' COMMENT '所属任务ID',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '获得助力加速的用户ID',
  `from_user_id` char(36) NOT NULL DEFAULT '' COMMENT '给予助力加速的用户ID',
  `create_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`,`user_id`,`from_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务加速表';

#
# Data for table "xds_task_accelerate"
#

INSERT INTO `xds_task_accelerate` VALUES (1,'a4905edc-7437-6126-6702-6c08788d0758','86966993-d3e4-e722-223d-bf16fc2e8421','0a9064ba-711f-5049-9300-c0cc88e1edf7',1505440844),(2,'a4905edc-7437-6126-6702-6c08788d0758','cb2395b7-7660-7134-85c9-612d4f4c74b5','0a9064ba-711f-5049-9300-c0cc88e1edf7',1505442867),(3,'a4905edc-7437-6126-6702-6c08788d0758','cb2395b7-7660-7134-85c9-612d4f4c74b5','0a9064ba-711f-5049-9300-c0cc88e1edf7',1505459827),(5,'fda89456-a12a-4155-a363-9b5a1184a185','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0a9064ba-711f-5049-9300-c0cc88e1edf7',1505468132);

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

INSERT INTO `xds_task_record` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','633b6005-6e2d-75ea-c823-d96ca3fe5745','0',1503988089),('0a9064ba-711f-5049-9300-c0cc88e1edf7','633b6005-6e2d-75ea-c823-d96ca3fe5745','1',1503990006),('0a9064ba-711f-5049-9300-c0cc88e1edf7','633b6005-6e2d-75ea-c823-d96ca3fe5745','1',1503990063),('0a9064ba-711f-5049-9300-c0cc88e1edf7','633b6005-6e2d-75ea-c823-d96ca3fe5745','1',1503990071),('0a9064ba-711f-5049-9300-c0cc88e1edf7','f75d9b53-f8c3-9a65-b412-5b4e53a5be9b','0',1504682510),('0a9064ba-711f-5049-9300-c0cc88e1edf7','49bf4c81-63a1-e06a-1074-8908cc0b1c42','0',1504694707),('0a9064ba-711f-5049-9300-c0cc88e1edf7','6514a394-7ea8-d382-f590-eb5581a5e2e1','0',1504765247),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b871952c-bca8-4471-3fa5-e6c6bc0b7523','0',1504765291),('0a9064ba-711f-5049-9300-c0cc88e1edf7','3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','0',1504766152),('0a9064ba-711f-5049-9300-c0cc88e1edf7','3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','1',1505270456),('0a9064ba-711f-5049-9300-c0cc88e1edf7','3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','1',1505270591),('0a9064ba-711f-5049-9300-c0cc88e1edf7','3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','1',1505270611),('0a9064ba-711f-5049-9300-c0cc88e1edf7','3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','1',1505270632),('0a9064ba-711f-5049-9300-c0cc88e1edf7','3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','1',1505270743),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','e2c26d1f-2db0-513b-1343-201bce4d7d64','0',1505440007),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','953d295c-70f1-b3ad-1754-dac6b41e996c','0',1505440016),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','ec02aeb2-ee15-141f-87ed-777b88060832','0',1505440025),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','fda89456-a12a-4155-a363-9b5a1184a185','0',1505440029),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','dca3a198-7ce1-ce66-0ca1-62398d61d881','0',1505440033),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','ecbf3ca5-1d5e-18fb-b10d-2d57eaa4ba08','0',1505440038),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','09e2c2af-710d-8f61-d777-26c77bfa5d87','0',1505440518),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','ca5cdd78-bf94-f2e7-029e-5fecd7af8d82','0',1505440525),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','73712a59-9576-ca4e-e74d-c73d55690694','0',1505440529),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','f9e1d587-6e0c-0614-58c1-3bac00df6655','0',1505440534);

#
# Structure for table "xds_task_user"
#

DROP TABLE IF EXISTS `xds_task_user`;
CREATE TABLE `xds_task_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` char(36) NOT NULL DEFAULT '',
  `user_id` char(36) NOT NULL DEFAULT '',
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '行动计划ID',
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='任务用户表';

#
# Data for table "xds_task_user"
#

INSERT INTO `xds_task_user` VALUES (1,'a4905edc-7437-6126-6702-6c08788d0758','0a9064ba-711f-5049-9300-c0cc88e1edf7','',1505459827),(2,'3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','0a9064ba-711f-5049-9300-c0cc88e1edf7','',1505459827),(3,'fda89456-a12a-4155-a363-9b5a1184a185','b9d25df4-8e9e-f917-f559-4872db0b9ea6','a88b4fc0-0652-d590-a162-4574de7b903d',1505468132);

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

INSERT INTO `xds_user` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','68662449','','','1','127.0.0.1',1502682504,1505115856,'192.168.0.165',1505115856),('0f584f9c-befb-a17e-b205-765cd7efde33','89288325','','','1','113.108.11.52',1505369075,1505369075,'113.108.11.52',1505369075),('13225a3e-f16a-ebb0-450d-3a0a00ade5ca','10483929','','','1','116.7.219.103',1503302290,1505109429,'116.7.216.16',1505109429),('16e1481c-86e7-b9a5-e707-a1b2cdf766c3','13854363','','','1','116.7.219.103',1503302234,1505276550,'116.7.217.232',1505276550),('3e0b1448-7562-48cc-f885-3986a3bee7fa','48871847','','','1','14.17.37.43',1503301201,1505464190,'116.7.216.60',1505464190),('499d7c58-08b3-45e6-1a12-ab99c53f596b','84996925','','','1','124.239.138.2',1503640289,1505283175,'219.148.49.202',1505283175),('501969d6-b26d-bb2d-29e3-5264a923def9','59121296','','','1','14.17.37.144',1505285271,1505285272,'14.17.37.144',1505285272),('86966993-d3e4-e722-223d-bf16fc2e8421','53370684','','','1','127.0.0.1',1502782975,1502782975,'127.0.0.1',1502782975),('a4e6de38-15c9-9199-f139-68f8d3571899','19706331','','','1','113.140.110.240',1505379783,1505379783,'113.140.110.240',1505379783),('a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','87148873','','','1','14.17.37.72',1504584951,1505191659,'14.17.37.72',1505191659),('aab70efb-92e5-7f6c-423f-e3d4e4f5ac83','83961921','','','1','116.7.217.232',1505195124,1505195124,'116.7.217.232',1505195124),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','30075710','','','1','116.7.218.10',1504259239,1505472815,'116.7.216.60',1505472815),('bf670625-f384-b056-fab9-4c3f45314aa2','74392048','','','1','183.61.52.71',1504853401,1504854033,'183.61.52.71',1504854033),('c3a9548d-832d-57f2-fdd9-18f9dc397fb5','30170075','','','1','14.17.37.43',1505187294,1505468821,'14.17.37.43',1505468821),('cb2395b7-7660-7134-85c9-612d4f4c74b5','62559261','','','1','14.17.37.72',1503302250,1505298142,'14.17.37.72',1505298142);

#
# Structure for table "xds_user_info"
#

DROP TABLE IF EXISTS `xds_user_info`;
CREATE TABLE `xds_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '外键，用户UUID',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别;0:保密,1:男,2:女',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像',
  `from` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 本地图片相对地址 1 完整图片uri  2 OSS图片',
  `signature` varchar(255) NOT NULL DEFAULT '' COMMENT '个性签名',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `unionid` char(32) NOT NULL DEFAULT '' COMMENT '用户统一标识',
  `openid` char(32) NOT NULL DEFAULT '' COMMENT '用户的标识',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户信息表';

#
# Data for table "xds_user_info"
#

INSERT INTO `xds_user_info` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1','hh','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/yWqS9n9DQjLrLVffWxsVQJk69R9UCJ7Q.png','1','1232132','','o2d00xFpaFdhyl0Itf29kmvK78Jg','ow9BAw33SatfPEFsZtW5PR1Lvofw',1502682504,1505377771),(2,'86966993-d3e4-e722-223d-bf16fc2e8421','1','暖象','images/201708151542555992a5ff4ebd2.jpg','0','','','o2d00xH6LHyDA3r1o1ASqzoXhBC0','ow9BAw1VWoxItNT4jw9ROeiK5g6U',1502782975,1502782975),(3,'3e0b1448-7562-48cc-f885-3986a3bee7fa','2','wjasd','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/RbP8dCfRQBYKCdpVcSP9Kevwv3FLWG1undefined.png','1','1223456','','o2d00xD9Yg7qj4qMeKYysRiZiIKE','o994OwnZud1Bpg6D0p8sfMOr8WbA',1503301201,1505369750),(4,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','1','悟空','http://auth.xingdongshe.com/images/20170821155715599a925b2d734.jpg','1','','','o2d00xFC-IZSyOeVLqlm1n4YVV-4','o994OwpKJM2IzXE2lbnHq-3wOKlI',1503302234,1505417665),(5,'cb2395b7-7660-7134-85c9-612d4f4c74b5','1','風早君','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/undefinedzrfhewKsfQD7W8LgseQK810qLW1Hutg.png','1','hsgsvx','','o2d00xK2N-EjAf9uZ3V_NFdqTWac','o994OwvGngl474czowA0NK1-W-yI',1503302250,1505298244),(6,'13225a3e-f16a-ebb0-450d-3a0a00ade5ca','2','邹烨','images/20170821155810599a9292eebce.jpg','0','','','o2d00xI436iyXJ6JfaXBHWh9nYKQ','o994OwtVIxStaAbAhClbRi3Ncg40',1503302290,1503302290),(7,'499d7c58-08b3-45e6-1a12-ab99c53f596b','1','顺风???7','images/20170825135130599fbae236c7e.jpg','0','','','o2d00xP3sn2uwzqoAq0jjHQIYEUc','o994OwiLENsn6oroA1x8Vn-AMQYw',1503640289,1503640290),(8,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','1','就改个名字真难','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/bFd5k547np74JEczLPSc9T4itQh8dbju.png','1','大家快乐就是立刻成的事','','o2d00xPNE_YPCeQMsL6-bd2PcZSk','o994OwsQS_TTvMaDROe18zeGxZo4',1504259239,1505379624),(9,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','1','老张','images/2017090512155259ae24f809fe8.jpg','0','','','o2d00xEHkFAO9zLZAE8bW2zuP2Tg','o994Owhfp3jqN890x07a0krbe9zw',1504584951,1504584952),(10,'bf670625-f384-b056-fab9-4c3f45314aa2','1','张树超','images/2017090814500259b23d9a0c3d3.jpg','0','','','o2d00xN3uajky16K4CBxIu_hADHk','o994OwmDbOp7NOGMTkA-voY8ICtc',1504853401,1504853402),(11,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','1','神的孩','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/YJJy6YxhWCsTundefined19a87fvPwTLhditb65G.png','1','问问去','','o2d00xP6PdeibvdWKP5qqLsXnH3M','o994Owma2ByV6wOR0YUKwGfhA7kE',1505187294,1505213204),(12,'aab70efb-92e5-7f6c-423f-e3d4e4f5ac83','0','这是一个小号','','0','','','o2d00xJzaKVn4j3Wyw9nSO1rLAlY','o994OwkSvxCJTTHMPAwWyV8h9JMc',1505195124,1505195124),(13,'501969d6-b26d-bb2d-29e3-5264a923def9','0','暖象科技行政号','','0','','','o2d00xESnAsx1zofrtgGJbeHDllA','o994Owujr7QIOyKivj2zvdbY94Vg',1505285271,1505285272),(14,'0f584f9c-befb-a17e-b205-765cd7efde33','0','暖象科技产品汪','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/3R8GWj51gV54aXhkdtcYbiymf2TQaUsY.png','1','空军建军节66','','o2d00xPSr3fx0PY8wgds1bpPZ_Rk','o994OwnQEdgCBmCs6qEmdKZYLuZE',1505369075,1505375749),(15,'a4e6de38-15c9-9199-f139-68f8d3571899','1','小超','images/2017091417030359ba45c767af7.jpg','0','','','o2d00xFj59URhcqqzGdGq2AMGkvA','o994OwsdGMjyiWxAkmTdwMZznhm8',1505379783,1505379783);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='用户财产资源';

#
# Data for table "xds_user_property"
#

INSERT INTO `xds_user_property` VALUES (1,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb',0.00,10,1504771110,1504771110),(2,'499d7c58-08b3-45e6-1a12-ab99c53f596b',0.00,5,1504771110,1504771110),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7',162.01,6,1504771110,2147483647),(4,'cb2395b7-7660-7134-85c9-612d4f4c74b5',38.00,7,1504771110,2147483647),(5,'86966993-d3e4-e722-223d-bf16fc2e8421',0.00,0,1504771110,1504771110),(6,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.04,0,1504771110,2147483647),(7,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',0.00,0,1504771110,1504771110),(8,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3',0.00,0,1504771110,1504771110),(9,'0f584f9c-befb-a17e-b205-765cd7efde33',0.00,0,1505369075,1505369075),(10,'13225a3e-f16a-ebb0-450d-3a0a00ade5ca',0.00,0,1505369075,1505369075),(11,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.01,0,1505369075,2147483647),(12,'501969d6-b26d-bb2d-29e3-5264a923def9',0.00,0,1505369075,1505369075),(13,'bf670625-f384-b056-fab9-4c3f45314aa2',0.00,0,1505369075,1505369075),(14,'aab70efb-92e5-7f6c-423f-e3d4e4f5ac83',0.00,0,1505369075,1505369075),(17,'a4e6de38-15c9-9199-f139-68f8d3571899',0.00,0,1505379783,1505379783);
