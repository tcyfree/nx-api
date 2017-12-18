# Host: rm-2ze125ne5236itso9o.mysql.rds.aliyuncs.com  (Version: 5.6.34)
# Date: 2017-11-30 11:12:46
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "qxd_act_plan"
#

DROP TABLE IF EXISTS `qxd_act_plan`;
CREATE TABLE `qxd_act_plan` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` char(36) NOT NULL DEFAULT '',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '外键，关联所属行动社群ID',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '行动计划名称',
  `cover_image` varchar(127) NOT NULL DEFAULT '' COMMENT '封面图片',
  `description` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '行动计划简介',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '费用',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通模式 1 普通模式+挑战者模式',
  `total_participant` int(11) unsigned NOT NULL DEFAULT '99' COMMENT '累计参与人数',
  `task_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '内含任务总数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `community_id` (`community_id`,`mode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动计划表';

#
# Structure for table "qxd_act_plan_record"
#

DROP TABLE IF EXISTS `qxd_act_plan_record`;
CREATE TABLE `qxd_act_plan_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '操作人ID',
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '行动计划ID',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '操作类型 0 创建 1 编辑',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`act_plan_id`,`type`,`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='操作记录';

#
# Structure for table "qxd_act_plan_user"
#

DROP TABLE IF EXISTS `qxd_act_plan_user`;
CREATE TABLE `qxd_act_plan_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，所属行动计划ID',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，执行用户ID',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 普通模式 1 挑战者模式',
  `finish` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否已结束该计划',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '参加时间',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`act_plan_id`),
  KEY `act_plan_id` (`act_plan_id`,`user_id`,`mode`,`finish`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动计划 用户对应表';

#
# Structure for table "qxd_advice"
#

DROP TABLE IF EXISTS `qxd_advice`;
CREATE TABLE `qxd_advice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '意见反馈表',
  `content` varchar(255) DEFAULT NULL COMMENT '意见内容',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '外键，用户主键id',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '用户昵称，冗余字段',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提交时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='意见与建议';

#
# Structure for table "qxd_asset"
#

DROP TABLE IF EXISTS `qxd_asset`;
CREATE TABLE `qxd_asset` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='资源表';

#
# Structure for table "qxd_auth"
#

DROP TABLE IF EXISTS `qxd_auth`;
CREATE TABLE `qxd_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '权限名称',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';

#
# Structure for table "qxd_auth_user"
#

DROP TABLE IF EXISTS `qxd_auth_user`;
CREATE TABLE `qxd_auth_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` char(36) NOT NULL DEFAULT '' COMMENT '授权用户ID',
  `to_user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，被授权用户ID',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，行动社ID',
  `auth` varchar(8) NOT NULL DEFAULT '' COMMENT '权限值，以,分隔',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `联合主键` (`to_user_id`,`community_id`),
  KEY `from_user_id` (`from_user_id`,`auth`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户权限对应表';

#
# Structure for table "qxd_blocked_list"
#

DROP TABLE IF EXISTS `qxd_blocked_list`;
CREATE TABLE `qxd_blocked_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，加入黑名单用户ID',
  `blocked_user_id` char(36) NOT NULL DEFAULT '' COMMENT '联合主键，被加入黑名单用户ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`blocked_user_id`) COMMENT '联合主键'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='黑名单';

#
# Structure for table "qxd_callback"
#

DROP TABLE IF EXISTS `qxd_callback`;
CREATE TABLE `qxd_callback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_id` char(36) NOT NULL DEFAULT '关联ID',
  `user_id` char(36) NOT NULL DEFAULT '',
  `key_type` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 GO 1 反馈 2 恢复成员资格',
  `deadline` int(11) NOT NULL DEFAULT '0' COMMENT '任务完成截止时间戳',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否已结束 0 否 1 是',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `key_id` (`key_id`,`user_id`,`key_type`,`deadline`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='定时-回调任务表';

#
# Structure for table "qxd_comment"
#

DROP TABLE IF EXISTS `qxd_comment`;
CREATE TABLE `qxd_comment` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` char(36) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '发表评论的用户ID',
  `communication_id` char(36) NOT NULL DEFAULT '' COMMENT '条目ID',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `likes` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点赞数',
  `status` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '1' COMMENT '状态,1:通过,0:未通过',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `comment_post_ID` (`communication_id`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `table_id_status` (`communication_id`,`status`),
  KEY `createtime` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='评论表';

#
# Structure for table "qxd_comment_notice"
#

DROP TABLE IF EXISTS `qxd_comment_notice`;
CREATE TABLE `qxd_comment_notice` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL DEFAULT '',
  `to_user_id` char(36) NOT NULL DEFAULT '',
  `from_user_id` char(36) NOT NULL DEFAULT '',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 条目被评论',
  `look` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否查看 0 否 1 是',
  `comment_id` char(36) NOT NULL DEFAULT '',
  `communication_id` char(36) NOT NULL DEFAULT '',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '评论',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论消息表';

#
# Structure for table "qxd_comment_operate"
#

DROP TABLE IF EXISTS `qxd_comment_operate`;
CREATE TABLE `qxd_comment_operate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '操作人主键id',
  `comment_id` char(36) NOT NULL DEFAULT '' COMMENT '评论主键ID',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='评论操作表';

#
# Structure for table "qxd_communication"
#

DROP TABLE IF EXISTS `qxd_communication`;
CREATE TABLE `qxd_communication` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` char(36) NOT NULL DEFAULT '',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '外键，发表者用户id',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '行动社ID',
  `content` text NOT NULL COMMENT '内容',
  `location` varchar(255) NOT NULL DEFAULT '' COMMENT '位置',
  `likes` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点赞数',
  `comments` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `shares` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '转发数',
  `hits` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '查看数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `type_status_date` (`create_time`,`id`),
  KEY `user_id` (`user_id`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='交流区表';

#
# Structure for table "qxd_communication_operate"
#

DROP TABLE IF EXISTS `qxd_communication_operate`;
CREATE TABLE `qxd_communication_operate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '联合主键，操作人ID',
  `communication_id` char(36) NOT NULL DEFAULT '0' COMMENT '联合主键，交流表ID',
  `type` enum('1') NOT NULL DEFAULT '1' COMMENT '操作类型：1 顶赞 其他依次扩展（收藏等）',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`communication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文章操作表';

#
# Structure for table "qxd_community"
#

DROP TABLE IF EXISTS `qxd_community`;
CREATE TABLE `qxd_community` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0-普通行动社；1-优秀行动社；2-精英行动社；3-专家行动社；99-官方行动社；',
  `update_num` tinyint(3) NOT NULL DEFAULT '3' COMMENT '编辑行动社次数，每月只能修改3次',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '社群创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `name` (`name`) COMMENT '搜索',
  KEY `outside_id` (`outside_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动社表';

#
# Structure for table "qxd_community_recommend"
#

DROP TABLE IF EXISTS `qxd_community_recommend`;
CREATE TABLE `qxd_community_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` char(36) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='行动社推荐表';

#
# Structure for table "qxd_community_transfer"
#

DROP TABLE IF EXISTS `qxd_community_transfer`;
CREATE TABLE `qxd_community_transfer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '转让人',
  `to_user_id` char(36) NOT NULL DEFAULT '' COMMENT '被转让人',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '被转让行动社ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '转让时间',
  PRIMARY KEY (`Id`),
  KEY `user_id` (`user_id`,`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动社转让记录表';

#
# Structure for table "qxd_community_user"
#

DROP TABLE IF EXISTS `qxd_community_user`;
CREATE TABLE `qxd_community_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` char(36) NOT NULL DEFAULT '0' COMMENT '所属行动社群ID',
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '所有者ID(用户ID)',
  `type` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '关联类型 0 社长 1 管理员 2 成员',
  `msg_only_admin` enum('0','1') NOT NULL DEFAULT '0' COMMENT '只接受管理员私信 0=关闭，1=开启。',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 未退群 1 已退群 2被暂停成员资格',
  `pay` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否为付费用户 0 否 1 是',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '加入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新状态时间',
  `delete_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '退出时间',
  PRIMARY KEY (`id`),
  KEY `community_id` (`community_id`,`user_id`) COMMENT '复合主键',
  KEY `type` (`type`) COMMENT 'type',
  KEY `pay` (`pay`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='社群用户对应表';

#
# Structure for table "qxd_community_user_record"
#

DROP TABLE IF EXISTS `qxd_community_user_record`;
CREATE TABLE `qxd_community_user_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` char(36) NOT NULL DEFAULT '',
  `user_id` char(36) NOT NULL DEFAULT '',
  `type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '关联类型 1 管理员 2 成员',
  `pay` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否为付费用户 0 否 1 是',
  `join_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '加入时间',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '退出时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户退出行动记录表';

#
# Structure for table "qxd_execution"
#

DROP TABLE IF EXISTS `qxd_execution`;
CREATE TABLE `qxd_execution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '',
  `task_id` char(36) NOT NULL DEFAULT '' COMMENT '任务ID',
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '冗余字段：行动社ID',
  `execution` int(11) NOT NULL DEFAULT '0' COMMENT '行动力值',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`task_id`,`act_plan_id`,`execution`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动力记录表';

#
# Structure for table "qxd_execution_record"
#

DROP TABLE IF EXISTS `qxd_execution_record`;
CREATE TABLE `qxd_execution_record` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行动力积累表';

#
# Structure for table "qxd_income_expenses"
#

DROP TABLE IF EXISTS `qxd_income_expenses`;
CREATE TABLE `qxd_income_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '行动计划ID',
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '消费金额',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '计划名称',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`),
  KEY `act_plan_id` (`act_plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收支明细交易表';

#
# Structure for table "qxd_income_expenses_user"
#

DROP TABLE IF EXISTS `qxd_income_expenses_user`;
CREATE TABLE `qxd_income_expenses_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '用户ID',
  `ie_id` int(11) unsigned DEFAULT '0' COMMENT '收支明细表ID',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 支出 1 收入',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '交易时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`type`,`ie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收支对应用户表';

#
# Structure for table "qxd_login_history"
#

DROP TABLE IF EXISTS `qxd_login_history`;
CREATE TABLE `qxd_login_history` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '登录用户主键ID',
  `device_type` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0 APP第三方授权 1 PC授权 2 安卓 3 苹果',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  PRIMARY KEY (`Id`),
  KEY `user_id` (`user_id`,`device_type`,`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户登录记录表';

#
# Structure for table "qxd_message"
#

DROP TABLE IF EXISTS `qxd_message`;
CREATE TABLE `qxd_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '',
  `to_user_id` char(36) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '私信内容',
  `look` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否阅读 0 否 1 是',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 回复 1 被回复',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`to_user_id`,`type`,`look`,`create_time`,`delete_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='私信列表';

#
# Structure for table "qxd_notice"
#

DROP TABLE IF EXISTS `qxd_notice`;
CREATE TABLE `qxd_notice` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` char(36) NOT NULL DEFAULT '',
  `to_user_id` char(36) NOT NULL DEFAULT '0' COMMENT '通知所属用户主键ID',
  `from_user_id` char(36) NOT NULL DEFAULT '0' COMMENT '通知来源作者主键ID(关联头像时使用)',
  `type` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 被@ 1 点赞 2 条目被评论',
  `look` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 未读 1 已读',
  `communication_id` char(36) NOT NULL DEFAULT '' COMMENT '条目ID',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '通知时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `delete_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `to_user_id` (`to_user_id`,`from_user_id`,`type`,`communication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='消息表';

#
# Structure for table "qxd_recharge"
#

DROP TABLE IF EXISTS `qxd_recharge`;
CREATE TABLE `qxd_recharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '充值用户ID',
  `total_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `out_trade_no` varchar(32) NOT NULL DEFAULT '' COMMENT '系统内部订单号，要求32个字符内，只能是数字、大小写字母_-|*@ ，且在同一个商户号下唯一。',
  `prepay_id` varchar(100) DEFAULT NULL COMMENT '订单微信支付的预订单id（用于发送模板消息）',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0：未支付  1：已支付',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '订单创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新订单状态时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`out_trade_no`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='充值表';

#
# Structure for table "qxd_report"
#

DROP TABLE IF EXISTS `qxd_report`;
CREATE TABLE `qxd_report` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '投诉内容',
  `images` varchar(512) NOT NULL DEFAULT '' COMMENT '图片json数组',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '投诉人ID',
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '行动社ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投诉时间',
  PRIMARY KEY (`Id`),
  KEY `user_id` (`user_id`,`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='投诉表';

#
# Structure for table "qxd_route"
#

DROP TABLE IF EXISTS `qxd_route`;
CREATE TABLE `qxd_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由ID',
  `full_url` varchar(255) NOT NULL DEFAULT '' COMMENT '完整url',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '实际显示的url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='url路由表';

#
# Structure for table "qxd_task"
#

DROP TABLE IF EXISTS `qxd_task`;
CREATE TABLE `qxd_task` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` char(36) NOT NULL DEFAULT '',
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '所属行动计划ID',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '任务标题',
  `requirement` varchar(255) NOT NULL DEFAULT '' COMMENT '任务要求',
  `content` text COMMENT '任务内容',
  `reference_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '参考时间',
  `release` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 未发布 1 发布',
  `first` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否为第一次发布 0 是 1 否',
  `order` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `post_date` (`create_time`) USING BTREE,
  KEY `type_status_date` (`create_time`,`id`),
  KEY `act_plan_id` (`act_plan_id`,`release`,`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='任务表';

#
# Structure for table "qxd_task_accelerate"
#

DROP TABLE IF EXISTS `qxd_task_accelerate`;
CREATE TABLE `qxd_task_accelerate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` char(36) NOT NULL DEFAULT '' COMMENT '所属任务ID',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '获得助力加速的用户ID',
  `from_user_id` char(36) NOT NULL DEFAULT '' COMMENT '给予助力加速的用户ID',
  `create_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`,`user_id`,`from_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务加速表';

#
# Structure for table "qxd_task_check"
#

DROP TABLE IF EXISTS `qxd_task_check`;
CREATE TABLE `qxd_task_check` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_id` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='反馈点评表';

#
# Structure for table "qxd_task_feedback"
#

DROP TABLE IF EXISTS `qxd_task_feedback`;
CREATE TABLE `qxd_task_feedback` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` char(36) NOT NULL DEFAULT '',
  `task_id` char(36) NOT NULL DEFAULT '0' COMMENT '所属任务ID',
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '发起反馈的用户ID',
  `to_user_id` char(36) NOT NULL DEFAULT '0' COMMENT '点评反馈的用户ID',
  `content` varchar(2048) NOT NULL DEFAULT '' COMMENT '反馈内容',
  `location` varchar(255) NOT NULL DEFAULT '' COMMENT '地理位置',
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0 待点评 1 未通过点评 2 点评通过 3 失效',
  `reason` varchar(255) NOT NULL DEFAULT '' COMMENT '未通过点评原因',
  `look` enum('0','1') NOT NULL DEFAULT '1' COMMENT '反馈者已查看 0 否 1是',
  `to_look` enum('0','1') NOT NULL DEFAULT '0' COMMENT '点评者已查看 0 否 1 是',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `task_id` (`task_id`,`user_id`,`to_user_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务反馈表';

#
# Structure for table "qxd_task_feedback_users"
#

DROP TABLE IF EXISTS `qxd_task_feedback_users`;
CREATE TABLE `qxd_task_feedback_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` char(36) NOT NULL DEFAULT '' COMMENT '行动社ID',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '管理员或社长ID',
  `tag` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '当前被分配任务次数',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `community_id` (`community_id`,`user_id`,`tag`,`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='随机反馈用户ID记录表';

#
# Structure for table "qxd_task_record"
#

DROP TABLE IF EXISTS `qxd_task_record`;
CREATE TABLE `qxd_task_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '操作人ID',
  `task_id` char(36) NOT NULL DEFAULT '' COMMENT '行动计划ID',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '操作类型 0 创建 1 编辑',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`task_id`,`type`,`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='操作记录';

#
# Structure for table "qxd_task_user"
#

DROP TABLE IF EXISTS `qxd_task_user`;
CREATE TABLE `qxd_task_user` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` char(36) NOT NULL DEFAULT '',
  `task_id` char(36) NOT NULL DEFAULT '',
  `user_id` char(36) NOT NULL DEFAULT '',
  `mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '用户参加计划模式：0 普通 1 挑战',
  `act_plan_id` char(36) NOT NULL DEFAULT '' COMMENT '行动计划ID',
  `finish` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 未完成 1 已完成',
  `tag` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否按时完成任务（：挑战） 0 是 1 否',
  `deadline` int(11) NOT NULL DEFAULT '0' COMMENT '结束时间戳',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `task_id` (`task_id`,`user_id`,`mode`,`act_plan_id`,`finish`,`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务用户表';

#
# Structure for table "qxd_transactions"
#

DROP TABLE IF EXISTS `qxd_transactions`;
CREATE TABLE `qxd_transactions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '外键，用户ID',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '交易金额',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 支出 1 收入',
  `order_no` varchar(127) NOT NULL DEFAULT '' COMMENT '订单号',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '交易时间',
  PRIMARY KEY (`Id`),
  KEY `user_id` (`user_id`,`type`,`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='交易记录表';

#
# Structure for table "qxd_user"
#

DROP TABLE IF EXISTS `qxd_user`;
CREATE TABLE `qxd_user` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `id` (`id`),
  KEY `number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Structure for table "qxd_user_info"
#

DROP TABLE IF EXISTS `qxd_user_info`;
CREATE TABLE `qxd_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '外键，用户UUID',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别;0:保密,1:男,2:女',
  `nickname` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '用户昵称',
  `char_index` char(1) NOT NULL DEFAULT '' COMMENT 'nickname拼音首字母索引',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像',
  `from` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 本地图片相对地址 1 完整图片uri  2 OSS图片',
  `signature` varchar(255) NOT NULL DEFAULT '' COMMENT '个性签名',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `unionid` char(32) NOT NULL DEFAULT '' COMMENT '用户统一标识',
  `openid` char(32) NOT NULL DEFAULT '' COMMENT '用户的标识',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`nickname`,`unionid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户信息表';

#
# Structure for table "qxd_user_property"
#

DROP TABLE IF EXISTS `qxd_user_property`;
CREATE TABLE `qxd_user_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '',
  `wallet` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '钱包',
  `execution` int(11) NOT NULL DEFAULT '0' COMMENT '行动力',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `wallet` (`wallet`,`execution`,`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户财产资源';

#
# Structure for table "qxd_user_wx"
#

DROP TABLE IF EXISTS `qxd_user_wx`;
CREATE TABLE `qxd_user_wx` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '',
  `openid` char(32) NOT NULL DEFAULT '',
  `nickname` varchar(64) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0',
  `province` varchar(32) NOT NULL DEFAULT '',
  `city` varchar(32) NOT NULL DEFAULT '',
  `country` varchar(16) NOT NULL DEFAULT '',
  `headimgurl` varchar(255) NOT NULL DEFAULT '',
  `language` varchar(255) NOT NULL DEFAULT '',
  `privilege` varchar(255) NOT NULL DEFAULT '',
  `unionid` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户微信信息表';
