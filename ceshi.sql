# Host: rm-2ze125ne5236itso9o.mysql.rds.aliyuncs.com  (Version: 5.6.34)
# Date: 2017-09-01 18:51:35
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
# Structure for table "xds_act_plan_user"
#

DROP TABLE IF EXISTS `xds_act_plan_user`;
CREATE TABLE `xds_act_plan_user` (
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，所属行动计划ID',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，执行用户ID',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通模式 1 挑战者模式',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '参加时间',
  KEY `user_id` (`user_id`,`act_plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动计划 用户对应表';

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='收支明细交易表';

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='收支对应用户表';

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户登录记录表';

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
  `release` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 未发布 1 发布',
  `order` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`),
  KEY `post_date` (`create_time`) USING BTREE,
  KEY `type_status_date` (`create_time`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='任务表';

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
