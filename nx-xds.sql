# Host: localhost  (Version: 5.5.53)
# Date: 2017-08-14 19:11:44
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "xds_act_plan"
#

DROP TABLE IF EXISTS `xds_act_plan`;
CREATE TABLE `xds_act_plan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '外键，关联所属行动社群ID',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通模式 1 普通模式+挑战者模式',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '行动计划名称',
  `cover_image` varchar(127) NOT NULL DEFAULT '' COMMENT '封面图片',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '行动计划简介',
  `total_participant` int(11) unsigned NOT NULL DEFAULT '99' COMMENT '累计参与人数',
  `task_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '内含任务总数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动计划表';

#
# Data for table "xds_act_plan"
#


#
# Structure for table "xds_act_plan_user"
#

DROP TABLE IF EXISTS `xds_act_plan_user`;
CREATE TABLE `xds_act_plan_user` (
  `act_plan_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，所属行动计划ID',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，执行用户ID',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='意见与建议';

#
# Data for table "xds_advice"
#

/*!40000 ALTER TABLE `xds_advice` DISABLE KEYS */;
/*!40000 ALTER TABLE `xds_advice` ENABLE KEYS */;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章操作表';

#
# Data for table "xds_article_operate"
#

/*!40000 ALTER TABLE `xds_article_operate` DISABLE KEYS */;
INSERT INTO `xds_article_operate` VALUES (1,2,'1',2014),(2,1,'1',2014),(2,4,'1',2014),(2,6,'1',2014),(2,7,'1',2014),(2,9,'1',2014),(2,10,'1',2014),(2,11,'1',2014),(2,13,'1',2014),(2,17,'1',2014),(2,21,'1',2014),(2,22,'1',2014),(2,27,'1',2014),(3,7,'1',2014),(3,22,'1',2014),(3,34,'1',2014),(5,20,'1',2014),(5,21,'1',2014),(5,23,'1',2014),(5,24,'1',2014),(8,2,'1',2014),(8,25,'1',2014),(8,34,'1',2014),(9,7,'1',2014),(10,8,'1',2014),(11,2,'1',2014),(11,28,'1',2014),(11,33,'1',2014),(11,34,'1',2014),(12,5,'1',2014),(12,34,'1',2014),(13,4,'1',2014),(18,9,'1',2014);
/*!40000 ALTER TABLE `xds_article_operate` ENABLE KEYS */;

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


#
# Structure for table "xds_auth_user"
#

DROP TABLE IF EXISTS `xds_auth_user`;
CREATE TABLE `xds_auth_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，权限ID',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，用户ID',
  `community_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '联合主键，行动社ID',
  PRIMARY KEY (`Id`),
  KEY `联合主键` (`auth_id`,`user_id`,`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户权限对应表';

#
# Data for table "xds_auth_user"
#


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
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='文章操作表';

#
# Data for table "xds_comment_operate"
#

/*!40000 ALTER TABLE `xds_comment_operate` DISABLE KEYS */;
INSERT INTO `xds_comment_operate` VALUES (2,2,1,2014),(5,2,6,2014),(8,2,7,2014),(13,2,17,2014),(29,5,21,2014),(30,5,20,2014),(31,5,24,2014),(32,5,23,2014),(35,3,22,2014),(37,8,25,2014),(39,2,22,2014),(44,11,28,2014),(50,2,27,2014),(51,3,34,2014),(52,12,34,2014),(53,2,21,2014),(55,11,34,2014),(59,11,33,2014),(60,8,34,2014),(64,8,2,2014),(65,13,4,2014),(74,2,4,2014),(75,11,2,2014),(76,1,2,2014),(77,9,7,2014),(82,10,8,2014),(87,2,9,2014),(88,2,10,2014),(93,12,5,2014),(94,2,11,2014),(95,3,7,2014),(104,18,9,2014),(105,2,13,2014);
/*!40000 ALTER TABLE `xds_comment_operate` ENABLE KEYS */;

#
# Structure for table "xds_community"
#

DROP TABLE IF EXISTS `xds_community`;
CREATE TABLE `xds_community` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '社群ID',
  `outside_id` int(11) unsigned NOT NULL DEFAULT '100001' COMMENT '社群编号(外部ID)',
  `name` varchar(127) NOT NULL DEFAULT '' COMMENT '社群名称',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `cover_image` varchar(127) NOT NULL DEFAULT '' COMMENT '封面图',
  `exclusive_url` varchar(127) NOT NULL DEFAULT '' COMMENT '专属链接',
  `qr_code` varchar(127) NOT NULL DEFAULT '' COMMENT '社群二维码',
  `scale_num` enum('500','1000','2000') NOT NULL DEFAULT '500' COMMENT '成员数量规模限制',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 正常 1 冻结 2 封禁',
  `recommended` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐 0 不推荐 1 推荐',
  `update_num` enum('0','1','2','3') NOT NULL DEFAULT '3' COMMENT '编辑行动社次数，每月只能修改3次',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '社群创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `seo_title` varchar(100) NOT NULL DEFAULT '',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '',
  `seo_description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `name` (`name`) COMMENT '搜索'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='行动社表';

#
# Data for table "xds_community"
#

INSERT INTO `xds_community` VALUES (1,100001,'','','','','','500',0,0,'3',0,0,0,'','','');

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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属行动社群ID',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所有者ID(用户ID)',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '关联类型 0 创始人 1 管理员 2 成员',
  `msg_only_admin` enum('0','1') NOT NULL DEFAULT '0' COMMENT '只接受管理员私信 0=关闭，1=开启。',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 未退群 1 已退群 2被暂停成员资格',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '加入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新状态时间',
  PRIMARY KEY (`Id`),
  KEY `community_id` (`community_id`,`user_id`) COMMENT '复合主键',
  KEY `type` (`type`) COMMENT 'type'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='社群用户对应表';

#
# Data for table "xds_community_user"
#

INSERT INTO `xds_community_user` VALUES (1,1,1,0,'0','0',0,0),(2,1,1,0,'0','0',0,0),(3,1,1,0,'0','0',0,0),(4,2,1,0,'0','0',0,0),(5,2,2,0,'0','0',0,0);

#
# Structure for table "xds_notice"
#

DROP TABLE IF EXISTS `xds_notice`;
CREATE TABLE `xds_notice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0系统通知 1被@通知',
  `keyid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关联模块主键ID,比如交流区内容ID',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '通知内容',
  `to_user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '通知所属用户主键ID',
  `from_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '通知来源作者主键ID(关联头像时使用)',
  `looktype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0未读 1已读',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '通知时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='消息表';

#
# Data for table "xds_notice"
#

/*!40000 ALTER TABLE `xds_notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `xds_notice` ENABLE KEYS */;

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
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '用户状态;0:禁用,1:正常',
  `reg_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '注册IP',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `last_login_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  PRIMARY KEY (`id`),
  KEY `number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "xds_user"
#

INSERT INTO `xds_user` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','68662449','','',1,'127.0.0.1',1502682504,1502682504,'',0);

#
# Structure for table "xds_user_info"
#

DROP TABLE IF EXISTS `xds_user_info`;
CREATE TABLE `xds_user_info` (
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '外键，用户UUID',
  `sex` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '性别;0:保密,1:男,2:女',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像',
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

INSERT INTO `xds_user_info` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7',1,'好好地 :)','images/2017081418472959917fc1a4288.jpg','','',0.00,0,'o2d00xFpaFdhyl0Itf29kmvK78Jg','ow9BAw33SatfPEFsZtW5PR1Lvofw',1502682504,1502707649);
