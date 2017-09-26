# Host: rm-2ze125ne5236itso9o.mysql.rds.aliyuncs.com  (Version: 5.6.34)
# Date: 2017-09-26 10:18:28
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

INSERT INTO `xds_act_plan` VALUES ('0ef9462a-d1a4-4089-3025-0a053ea110e8','e20d3eea-4164-01ab-fd23-aa2e93836b09','耳机日久见是埃及卡吗','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/9va49YvX1TtL2L1RKCeC7dWJUR65GT9e.png','大家极大的九十斤说你什么吗',20.00,'1',99,0,1506318401,1506318401,0),('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划004','http://api.xingdongshe.com/images/nx-xds-logo.jpg','004简介',19.00,'0',101,2,1504764696,1504764696,0),('185b6957-3732-3ca0-3b96-8fd9a7295363','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划001','http://api.xingdongshe.com/images/nx-xds-logo.jpg','001简介',20.00,'1',103,0,1503975099,1503977300,0),('186e78c3-d884-40b0-5b4b-87991525f143','523255d2-8de8-3a03-ea11-26c4a0099866','2222','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/GHzTWncjzvir5FVnVh81UiLdWHVnkBBp.png','4444',2.00,'0',99,0,1506318459,1506318459,0),('2eab278c-a0fd-b21f-3cbb-262a928ce51f','892c80b0-750c-0742-c6a4-5c1105285bee','这是第四个行动计划','http://weixin.xingdongshe.com/static/img/user/img4.png','这是行动计划的简介',45.00,'0',99,0,1505383596,1505383596,0),('4db41cdd-ee87-54a9-9864-4c0efb4237e2','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','003简介',19.00,'0',101,0,1504763790,1504763790,0),('4e7f6f47-9b3e-b9c1-a5a7-bc8879f7ab4b','892c80b0-750c-0742-c6a4-5c1105285bee','这是第九个行动计划','http://weixin.xingdongshe.com/static/img/user/img4.png','这是行动计划的简介',45.00,'0',99,0,1505383653,1505383653,0),('503025f3-04d9-2d41-3d57-e18a662b443a','5e539f48-231e-7eb5-145c-646da24ae942','竖着耳朵的兔子','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/BKrkPuj7kDQsn3cSB1QvgyFtQxGusGGi.png','这种下我说要求学院子大码女装店主银耳边防守望月城里孩子就算错',45.00,'1',99,0,1506069512,1506069512,0),('69b6961c-d4f8-754a-1b3b-68277d8db3a0','5e539f48-231e-7eb5-145c-646da24ae942','是啊他用来吧','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/sEtFxEuq4VHRn0y20Qd9skbV57Jvrg1k.png','这么大家伙食了个头条纹的连衣裙',33.00,'0',99,0,1506069720,1506069720,0),('6a7a3466-99be-d490-393b-862199fff6a4','a7e3276b-95c7-806f-c6c9-a6d004011c15','行动计划12223','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/Yj6cRsk5vfFzDrmvs5xdLQnGnkef9hn5.png','点就打晋级案件的建设卡啊可',1.00,'0',99,0,1506318236,1506318236,0),('6d68daf3-4f26-5b4c-229b-9907453a8781','5e539f48-231e-7eb5-145c-646da24ae942','这是从编辑页面过来的','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/qCgDSh97BkBnbR6Kd7kr1tSqTHxp9LXE.png','你的时候就是说',48.00,'0',99,0,1506069331,1506075743,0),('80e0efd0-7232-cd54-72fd-57b6811cb81f','ec685e49-3456-6a37-8220-be6bb35868ae','第一个行动社的第一个','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/HWBH5gQXDay9Fhda4y5BWj8KPn4yLEBe.png','第一个行动社的第一个行动计划的简介',1.00,'1',99,0,1506322861,1506322861,0),('90756233-db97-0acd-5b4d-ca1607f9c7ea','892c80b0-750c-0742-c6a4-5c1105285bee','这是第六个行动计划','http://weixin.xingdongshe.com/static/img/user/img6.png','这是行动计划的简介',45.00,'0',99,0,1505383624,1505383624,0),('9425baea-cf1d-5bb5-203a-91f72fcd18fd','892c80b0-750c-0742-c6a4-5c1105285bee','这是第五个行动计划','http://weixin.xingdongshe.com/static/img/user/img5.png','这是行动计划的简介',45.00,'0',100,0,1505383611,1505383611,0),('9b047d08-5096-6a4e-2603-7629673c3bf2','a7e3276b-95c7-806f-c6c9-a6d004011c15','行动eurifjsaj','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/vYXxkvvdJ6Xp9FBCundefinedfPigqqbtqgWxzUH.png','点就打晋级案件的建设卡啊可',49.00,'1',99,0,1506318280,1506318280,0),('a88b4fc0-0652-d590-a162-4574de7b903d','892c80b0-750c-0742-c6a4-5c1105285bee','这是第一个行动计划','http://weixin.xingdongshe.com/static/img/user/img1.png','这是行动计划的简介',45.00,'0',99,10,1505383477,1505383477,0),('ae006054-4185-5f46-c031-4ef2f6ceb4ff','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','002简介',19.00,'0',99,0,1505213933,1505213933,0),('b885ed62-8eaa-6b98-213d-30ef17e2f189','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','002简介',19.00,'0',103,0,1504780182,1504780182,0),('b890bdde-48f4-28d9-6f24-3791b32a986e','76826caa-6894-f6b9-3ac3-de33e01879c2','行动计划002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','002简介',1.00,'1',100,0,1504750325,1505268796,0),('b9819e90-164e-4728-1729-0a2683d27359','58d153d9-1702-e225-7cbc-59a453386bca','qwertyy','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/WTSULEEr85sTvwwnyP87S43ggpain9kg.png','沙发上网费是阿阿阿方的',1.00,'0',99,0,1506318345,1506318345,0),('d18b8df2-7d8f-c936-da01-17a98252b7ee','ec16645b-cc9c-a7c8-536f-955219154cd2','作为管理员创建的行动计划No.1','http://weixin.xingdongshe.com/static/img/user/img7.png','描述什么的最烦了!',33.00,'1',99,0,1505464333,1505464333,0),('d5d1eb94-bebd-1f2f-bf31-23e1616f935e','5e539f48-231e-7eb5-145c-646da24ae942','强调节能够意思吧唧','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/w7wg4w9HdQd0gfF7LLzprkU25q7Ft6c3.png','一定程度假水电费',45.00,'1',99,0,1506065696,1506075291,0),('da3c2cf4-75ef-1c01-d295-2ecb1f4750e1','892c80b0-750c-0742-c6a4-5c1105285bee','这是第十个行动计划','http://weixin.xingdongshe.com/static/img/user/img4.png','这是行动计划的简介',45.00,'0',99,0,1505383661,1505383661,0),('e059d9f5-0b98-1a68-dd19-70e19c83da87','892c80b0-750c-0742-c6a4-5c1105285bee','这是第三个行动计划','http://weixin.xingdongshe.com/static/img/user/img3.png','这是行动计划的简介',45.00,'0',100,0,1505383582,1505383582,0),('ef9c7602-db5d-5a87-b2d8-137a71632563','892c80b0-750c-0742-c6a4-5c1105285bee','这是第二个行动计划','http://weixin.xingdongshe.com/static/img/user/img2.png','这是行动计划的简介',45.00,'0',99,0,1505383572,1505383572,0),('f2c7eaa1-3a19-ec2c-0077-a8bb9dca9bb3','892c80b0-750c-0742-c6a4-5c1105285bee','这是第七个行动计划','http://weixin.xingdongshe.com/static/img/user/img7.png','这是行动计划的简介',45.00,'0',99,0,1505383634,1505383634,0),('f53c4e29-43f7-80a3-e5c5-36606a0725a1','892c80b0-750c-0742-c6a4-5c1105285bee','这是第八个行动计划','http://weixin.xingdongshe.com/static/img/user/img4.png','这是行动计划的简介',45.00,'0',99,0,1505383644,1505383644,0);

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

INSERT INTO `xds_act_plan_record` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','185b6957-3732-3ca0-3b96-8fd9a7295363','0',1503975099),('0a9064ba-711f-5049-9300-c0cc88e1edf7','185b6957-3732-3ca0-3b96-8fd9a7295363','1',1503977300),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b890bdde-48f4-28d9-6f24-3791b32a986e','0',1504750325),('0a9064ba-711f-5049-9300-c0cc88e1edf7','4db41cdd-ee87-54a9-9864-4c0efb4237e2','0',1504763790),('0a9064ba-711f-5049-9300-c0cc88e1edf7','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','0',1504764696),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b885ed62-8eaa-6b98-213d-30ef17e2f189','0',1504780182),('0a9064ba-711f-5049-9300-c0cc88e1edf7','ae006054-4185-5f46-c031-4ef2f6ceb4ff','0',1505213933),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b890bdde-48f4-28d9-6f24-3791b32a986e','1',1505268796),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','a88b4fc0-0652-d590-a162-4574de7b903d','0',1505383477),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','ef9c7602-db5d-5a87-b2d8-137a71632563','0',1505383572),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','e059d9f5-0b98-1a68-dd19-70e19c83da87','0',1505383582),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','2eab278c-a0fd-b21f-3cbb-262a928ce51f','0',1505383596),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','9425baea-cf1d-5bb5-203a-91f72fcd18fd','0',1505383611),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','90756233-db97-0acd-5b4d-ca1607f9c7ea','0',1505383625),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','f2c7eaa1-3a19-ec2c-0077-a8bb9dca9bb3','0',1505383634),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','f53c4e29-43f7-80a3-e5c5-36606a0725a1','0',1505383644),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','4e7f6f47-9b3e-b9c1-a5a7-bc8879f7ab4b','0',1505383653),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','da3c2cf4-75ef-1c01-d295-2ecb1f4750e1','0',1505383661),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','d18b8df2-7d8f-c936-da01-17a98252b7ee','0',1505464333),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','d5d1eb94-bebd-1f2f-bf31-23e1616f935e','0',1506065696),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','6d68daf3-4f26-5b4c-229b-9907453a8781','0',1506069331),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','503025f3-04d9-2d41-3d57-e18a662b443a','0',1506069512),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','69b6961c-d4f8-754a-1b3b-68277d8db3a0','0',1506069720),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','d5d1eb94-bebd-1f2f-bf31-23e1616f935e','1',1506074896),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','d5d1eb94-bebd-1f2f-bf31-23e1616f935e','1',1506075026),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','d5d1eb94-bebd-1f2f-bf31-23e1616f935e','1',1506075133),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','d5d1eb94-bebd-1f2f-bf31-23e1616f935e','1',1506075291),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','6d68daf3-4f26-5b4c-229b-9907453a8781','1',1506075743),('c3a9548d-832d-57f2-fdd9-18f9dc397fb5','6a7a3466-99be-d490-393b-862199fff6a4','0',1506318236),('c3a9548d-832d-57f2-fdd9-18f9dc397fb5','9b047d08-5096-6a4e-2603-7629673c3bf2','0',1506318280),('c3a9548d-832d-57f2-fdd9-18f9dc397fb5','b9819e90-164e-4728-1729-0a2683d27359','0',1506318345),('c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0ef9462a-d1a4-4089-3025-0a053ea110e8','0',1506318401),('c3a9548d-832d-57f2-fdd9-18f9dc397fb5','186e78c3-d884-40b0-5b4b-87991525f143','0',1506318459),('16e1481c-86e7-b9a5-e707-a1b2cdf766c3','80e0efd0-7232-cd54-72fd-57b6811cb81f','0',1506322861);

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

INSERT INTO `xds_act_plan_user` VALUES ('185b6957-3732-3ca0-3b96-8fd9a7295363','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504262063),('b890bdde-48f4-28d9-6f24-3791b32a986e','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504750571),('4db41cdd-ee87-54a9-9864-4c0efb4237e2','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0',1504763888),('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','0',1504780062),('b885ed62-8eaa-6b98-213d-30ef17e2f189','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','0',1505201311),('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0',0),('a88b4fc0-0652-d590-a162-4574de7b903d','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0',0),('4db41cdd-ee87-54a9-9864-4c0efb4237e2','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0',1505964854),('0f6f6fba-c7ab-a432-d47a-0ff04b75a972','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0',1505964901),('e059d9f5-0b98-1a68-dd19-70e19c83da87','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0',1505964981),('9425baea-cf1d-5bb5-203a-91f72fcd18fd','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0',1505965000),('185b6957-3732-3ca0-3b96-8fd9a7295363','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0',1505965227),('b885ed62-8eaa-6b98-213d-30ef17e2f189','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0',1505965292),('a88b4fc0-0652-d590-a162-4574de7b903d','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','0',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户权限对应表';

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
  `id` char(36) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '发表评论的用户ID',
  `communication_id` char(36) NOT NULL DEFAULT '' COMMENT '条目ID',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `likes` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点赞数',
  `status` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '1' COMMENT '状态,1:通过,0:未通过',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`),
  KEY `comment_post_ID` (`communication_id`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `table_id_status` (`communication_id`,`status`),
  KEY `createtime` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='评论表';

#
# Data for table "xds_comment"
#

INSERT INTO `xds_comment` VALUES ('90fa2b3c-2ca8-a704-5012-c63846f276db','0a9064ba-711f-5049-9300-c0cc88e1edf7','08d24c5e-f07b-7aa0-59e6-840e89752fe5','reply',0,'1',1505893953,0),('93025cb7-9e7a-7f16-74ec-61ec8487fbd9','0a9064ba-711f-5049-9300-c0cc88e1edf7','08d24c5e-f07b-7aa0-59e6-840e89752fe5','reply',1,'1',1505893818,0);

#
# Structure for table "xds_comment_operate"
#

DROP TABLE IF EXISTS `xds_comment_operate`;
CREATE TABLE `xds_comment_operate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '' COMMENT '操作人主键id',
  `comment_id` char(36) NOT NULL DEFAULT '' COMMENT '评论主键ID',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='评论操作表';

#
# Data for table "xds_comment_operate"
#

INSERT INTO `xds_comment_operate` VALUES (107,'0a9064ba-711f-5049-9300-c0cc88e1edf7','90fa2b3c-2ca8-a704-5012-c63846f276db',1505903400,1505904909),(108,'0a9064ba-711f-5049-9300-c0cc88e1edf7','90fa2b3c-2ca8-a704-5012-c63846f276db',1505904864,1505904909),(109,'0a9064ba-711f-5049-9300-c0cc88e1edf7','93025cb7-9e7a-7f16-74ec-61ec8487fbd9',1505904929,1505904945),(110,'0a9064ba-711f-5049-9300-c0cc88e1edf7','93025cb7-9e7a-7f16-74ec-61ec8487fbd9',1505904950,0);

#
# Structure for table "xds_communication"
#

DROP TABLE IF EXISTS `xds_communication`;
CREATE TABLE `xds_communication` (
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
  PRIMARY KEY (`id`),
  KEY `type_status_date` (`create_time`,`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='交流区表';

#
# Data for table "xds_communication"
#

INSERT INTO `xds_communication` VALUES ('08d24c5e-f07b-7aa0-59e6-840e89752fe5','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,1,1505888853,1505889468,1505889468),('1b28e915-cf14-48a7-7082-434350201c7d','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,3,1505888864,1505888864,0),('208f7818-98f0-de13-b362-d30d56cd7487','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,0,1506067659,1506067659,0),('32cafb99-6fe3-266e-c881-7e4de5af27d6','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,0,1506067874,1506067874,0),('45011af0-bf92-d395-fdca-3e9bd04ddc5c','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,0,1506067620,1506067620,0),('5f114da3-b998-68b9-78c1-5602a308bd76','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,0,1506067885,1506067885,0),('61393c3c-770d-b358-85da-03b46b43990a','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,0,1506067586,1506067586,0),('707a6f6c-01f8-a174-80d4-29ca291be878','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,0,1506067687,1506067687,0),('b8497cc0-d857-5d5e-c040-a93ee12fd7c7','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,0,1506067915,1506067915,0),('d2ea82da-45f6-2bac-6e22-f535040af1d0','0a9064ba-711f-5049-9300-c0cc88e1edf7','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,0,1506067552,1506067552,0),('f8701657-13ec-928b-35ab-c4b72bfa3ef1','501969d6-b26d-bb2d-29e3-5264a923def9','892c80b0-750c-0742-c6a4-5c1105285bee','132','中国',0,0,0,23,1505808525,1505808525,0);

#
# Structure for table "xds_communication_operate"
#

DROP TABLE IF EXISTS `xds_communication_operate`;
CREATE TABLE `xds_communication_operate` (
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '联合主键，操作人ID',
  `communication_id` char(36) NOT NULL DEFAULT '0' COMMENT '联合主键，交流表ID',
  `type` enum('1') NOT NULL DEFAULT '1' COMMENT '操作类型：1 顶赞 其他依次扩展（收藏等）',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `delete_time` int(11) NOT NULL DEFAULT '0',
  KEY `user_id` (`user_id`,`communication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文章操作表';

#
# Data for table "xds_communication_operate"
#

INSERT INTO `xds_communication_operate` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','08d24c5e-f07b-7aa0-59e6-840e89752fe5','1',1506075806,1506076903),('0a9064ba-711f-5049-9300-c0cc88e1edf7','098740d8-0548-2a0b-262c-6acf1844f89b','1',1505813687,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','b3ddd848-af27-a87f-a1d7-df9168abdad6','1',0,0),('0a9064ba-711f-5049-9300-c0cc88e1edf7','08d24c5e-f07b-7aa0-59e6-840e89752fe5','1',1506076359,1506076903),('0a9064ba-711f-5049-9300-c0cc88e1edf7','08d24c5e-f07b-7aa0-59e6-840e89752fe5','1',1506076389,1506076903),('0a9064ba-711f-5049-9300-c0cc88e1edf7','08d24c5e-f07b-7aa0-59e6-840e89752fe5','1',1506076782,1506076903),('0a9064ba-711f-5049-9300-c0cc88e1edf7','08d24c5e-f07b-7aa0-59e6-840e89752fe5','1',1506076832,1506076903),('0a9064ba-711f-5049-9300-c0cc88e1edf7','08d24c5e-f07b-7aa0-59e6-840e89752fe5','1',1506076886,1506076903);

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

INSERT INTO `xds_community` VALUES ('15ef0f98-5584-6b57-42a9-2103d462b589','24774216','我美不美','快点夸我可爱啊，漂亮的小姐姐','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505283866,1505385110),('2553b1b3-7ecc-990b-ef97-dd727eb4ae2a','75532463','再来一个试试2','这个就看看result.data是什么','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505209038,1505385110),('3d47ba2f-c77f-d0e6-2c3a-157ceba4a2e1','71948547','QWERTY','去玩儿如果','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/PWWuqHKhyC73sPV9k85FvSb1UL5WYundefinedgT.png','','','10000','500','0','0','0',30,1506048972,1506048972),('4c129a60-59e2-4ef2-63c2-f2bde7ccca19','33146465','啦啦啦','哩哩啦啦','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505350887,1505385110),('523255d2-8de8-3a03-ea11-26c4a0099866','97993966','测试创建','测试安卓','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',1,1505375620,1505441970),('57cf5bc4-f4b0-51a1-3a6e-cb7563598570','63515449','22','134649','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505354221,1505385110),('58d153d9-1702-e225-7cbc-59a453386bca','21313657','行动社222','焦恩俊睡觉啊可','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',2,1505354305,1506318517),('5b4a5093-0237-ef6c-eeae-3c0d1b835046','39363238','嗯嗯嗯','嗯嗯……','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/L33pyUtPk35DpuqgkxCWx4Q5EBE2X9Uundefined.png','','','10000','500','0','0','0',30,1506302396,1506302396),('5e539f48-231e-7eb5-145c-646da24ae942','31676103','这些好看','这种类专业人士透露自己','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/YUWchpXC5BQ3JqssEuuDBfEc5hahKJkp.png','','','10000','500','0','0','0',26,1506051076,1506059331),('5f3d274c-0ab9-d9a6-8e5a-4a150f8ba29d','50347194','还是不懂就到家九点半','九分就是大姐夫你付款','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/RgPFp8S4Uks3yjHVdx8aqeeT7ST5Puz7.png','','','10000','500','0','0','0',30,1506051579,1506051579),('60470447-7bac-250f-892d-5e72e7987285','30056807','测试第二版','今天的测试','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505268038,1505385110),('67ff98d2-677b-fb18-8dad-83a39b2e8766','47377862','行动社444','wjjwjsjsjs','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/G96ieDL5kbfbdXEdYiWTQE1e9JqEqundefinedud.png','','','10000','500','0','0','0',1,1505354258,1506318606),('681a0f22-4c1c-5344-be33-39f8a06e69c1','50264980','航海圈','哈哈哈哈','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/Vt8RU0sHCjundefinedRvidTEryLiXjundefinedR7z2udL1.png','','','10000','500','0','0','0',30,1506228486,1506228486),('76826caa-6894-f6b9-3ac3-de33e01879c2','83008910','电影欣赏06','简介方法 v 反反复复反反复复看一下哦','http://weixin.xingdongshe.com/static/img/user/img1.png','','','','500','0','1','0',3,1503369259,1505385110),('7cb0ad89-113b-2a14-f3ad-9b7fa77b33fd','34158620','222','企鹅区委区233','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505208788,1505385110),('89217c66-df49-cd9b-b11e-50a51d6e33be','47183041','电影赏析03','16224','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','','500','0','0','0',3,1503373975,1505385110),('892c80b0-750c-0742-c6a4-5c1105285bee','35794877','行动计划002','再次测试 测试编辑后跳转然后返回到index','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/bexz0mVeCugundefined7bteURKYDqSrexttqf8v.png','','','','500','0','0','0',2,1503311264,1506158665),('8f5aa4d9-7249-9515-80a9-ee8839a5db12','37327689','悟空的第二个行动社','第二个行动社的简介','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/Rt0csWVFtLfd0bXmLF4tUv062if4sicp.png','','','10000','500','0','0','0',29,1506076611,1506212493),('915b0a9c-cd31-de64-9b67-0412dd064938','36372697','qwers','为撒','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/bbxBHkCFE0nKPzaDQ34phfYFUGY6mPvE.png','','','10000','500','0','0','0',30,1506048167,1506048167),('9b3c8069-acba-6686-3e35-a3dbc4872d8d','51001064','test','test','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/52GCszuJF4BF0fSXsrjCFhuRkrayundefinedt7Q.png','','','10000','500','0','0','0',30,1506050916,1506050916),('a35c2d83-eef2-b6c3-d4ad-5776068293ff','12278648','请问让他','去无为人团圆','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/jwtvDKGtwb1QaH1YhPYaRQVTmJRkbTLC.png','','','10000','500','0','0','0',30,1506049825,1506049825),('a39fb9d1-42fb-96e6-9a4a-4e38e85237f6','91146348','去无为儿童','去玩微亻条鱼呵呵还是','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/K9esQ23E5aWxzEPzCH1shDTundefinedF1c9vkxf.png','','','10000','500','0','0','0',30,1506050583,1506050583),('a7e3276b-95c7-806f-c6c9-a6d004011c15','33224771','行动社111','请问嗯她与ii','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/GnGB5JXixrKuXnhyrSPjhTfHbECX76gz.png','','','10000','500','0','0','0',29,1506051573,1506318491),('ac6f603f-6880-3b25-25d5-89f8f57fce55','58804156','公寓1112','嫌疑人消防队员333','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505209432,1505385110),('c95134b4-83d5-ce44-6e79-c3273f807e71','35629250','测试第一版跳转','测试 非第0个index应该是可以了','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505267942,1505385110),('d14e020f-fe08-5ddb-020f-1fb439342478','45096318','哈哈哈','哈哈哈哈哈哈','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',3,1505379254,1505385110),('dc632f78-d7e8-18e6-1e37-d2e759329e7c','35418236','test返回id','我的风格是按到大啊','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/0Xkundefineds86119KYy7CnjuuXY4DQeUgXEpjm.png','','','10000','500','0','0','0',30,1506050362,1506050362),('e20d3eea-4164-01ab-fd23-aa2e93836b09','70151805','行动社333','热节哀口腔健康','http://weixin.xingdongshe.com/static/img/user/img1.png','','','10000','500','0','0','0',2,1505354280,1506318536),('ec16645b-cc9c-a7c8-536f-955219154cd2','66612548','电影欣赏02','简介','http://api.xingdongshe.com/images/nx-xds-logo.jpg','','','','500','0','0','0',3,1505379481,1505385110),('ec685e49-3456-6a37-8220-be6bb35868ae','29165367','悟空的行动社','悟空的行动社的简介','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/LkvW9ngSpPhf4KBa3tabvGUK8zRk5r5k.png','','','10000','500','0','0','0',27,1505385971,1506212547),('f0f46fdc-7bab-a032-0103-11808713c251','11524951','qwrtgg','请问让他','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/bezVcundefinedVdXcQxrW7YikydVbDfbundefineddpH5xP.png','','','10000','500','0','0','0',30,1506049714,1506049714);

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

INSERT INTO `xds_community_transfer` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3',1503893124),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3',1503901326),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3',1503901357),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','48eed6c0-f298-8020-d673-633d4101d5f3',1503901427),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7','cb2395b7-7660-7134-85c9-612d4f4c74b5','892c80b0-750c-0742-c6a4-5c1105285bee',1503901971),(7,'0a9064ba-711f-5049-9300-c0cc88e1edf7','499d7c58-08b3-45e6-1a12-ab99c53f596b','5b4a5093-0237-ef6c-eeae-3c0d1b835046',1506389736);

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
  `delete_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '退出时间',
  PRIMARY KEY (`id`),
  KEY `community_id` (`community_id`,`user_id`) COMMENT '复合主键',
  KEY `type` (`type`) COMMENT 'type'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='社群用户对应表';

#
# Data for table "xds_community_user"
#

INSERT INTO `xds_community_user` VALUES (2,'76826caa-6894-f6b9-3ac3-de33e01879c2','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0','0','0',1503369259,1503369259,0),(4,'76826caa-6894-f6b9-3ac3-de33e01879c2','86966993-d3e4-e722-223d-bf16fc2e8421','2','0','2','0',1505300251,1505300251,0),(5,'892c80b0-750c-0742-c6a4-5c1105285bee','cb2395b7-7660-7134-85c9-612d4f4c74b5','0','0','0','0',1505300251,1503901971,0),(6,'76826caa-6894-f6b9-3ac3-de33e01879c2','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','0','1',1505300251,1505201312,0),(7,'89217c66-df49-cd9b-b11e-50a51d6e33be','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0','0','0',1505300251,1505300251,0),(8,'892c80b0-750c-0742-c6a4-5c1105285bee','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0','0','1',1505300251,1505965000,0),(9,'892c80b0-750c-0742-c6a4-5c1105285bee','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1505300251,1505300251,0),(10,'7cb0ad89-113b-2a14-f3ad-9b7fa77b33fd','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1505208788,1505208788,0),(11,'2553b1b3-7ecc-990b-ef97-dd727eb4ae2a','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1505209038,1505209038,0),(12,'ac6f603f-6880-3b25-25d5-89f8f57fce55','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1505209432,1505209432,0),(13,'c95134b4-83d5-ce44-6e79-c3273f807e71','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0','0','0',1505267942,1505267942,0),(14,'60470447-7bac-250f-892d-5e72e7987285','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0','0','0',1505268038,1505268038,0),(15,'15ef0f98-5584-6b57-42a9-2103d462b589','499d7c58-08b3-45e6-1a12-ab99c53f596b','0','0','0','0',1505283866,1505283866,0),(17,'57cf5bc4-f4b0-51a1-3a6e-cb7563598570','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1505354221,1505354221,0),(18,'67ff98d2-677b-fb18-8dad-83a39b2e8766','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1505354258,1505354258,0),(19,'e20d3eea-4164-01ab-fd23-aa2e93836b09','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1505354280,1505354280,0),(20,'58d153d9-1702-e225-7cbc-59a453386bca','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1505354305,1505354305,0),(21,'523255d2-8de8-3a03-ea11-26c4a0099866','0f584f9c-befb-a17e-b205-765cd7efde33','0','0','0','0',1505375620,1505375620,0),(22,'d14e020f-fe08-5ddb-020f-1fb439342478','13225a3e-f16a-ebb0-450d-3a0a00ade5ca','0','0','0','0',1505379254,1505379254,0),(23,'ec685e49-3456-6a37-8220-be6bb35868ae','16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0','0','0','0',1505385971,1505385971,0),(24,'76826caa-6894-f6b9-3ac3-de33e01879c2','b9d25df4-8e9e-f917-f559-4872db0b9ea6','2','0','0','1',0,1506330846,0),(25,'ec16645b-cc9c-a7c8-536f-955219154cd2','b9d25df4-8e9e-f917-f559-4872db0b9ea6','1','0','0','0',0,0,0),(26,'915b0a9c-cd31-de64-9b67-0412dd064938','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1506048167,1506048167,0),(27,'3d47ba2f-c77f-d0e6-2c3a-157ceba4a2e1','0f584f9c-befb-a17e-b205-765cd7efde33','0','0','0','0',1506048972,1506048972,0),(28,'f0f46fdc-7bab-a032-0103-11808713c251','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1506049714,1506049714,0),(29,'a35c2d83-eef2-b6c3-d4ad-5776068293ff','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1506049825,1506049825,0),(30,'dc632f78-d7e8-18e6-1e37-d2e759329e7c','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1506050362,1506050362,0),(31,'a39fb9d1-42fb-96e6-9a4a-4e38e85237f6','3e0b1448-7562-48cc-f885-3986a3bee7fa','0','0','0','0',1506050583,1506050583,0),(32,'9b3c8069-acba-6686-3e35-a3dbc4872d8d','0f584f9c-befb-a17e-b205-765cd7efde33','0','0','0','0',1506050916,1506050916,0),(33,'5e539f48-231e-7eb5-145c-646da24ae942','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0','0','0','0',1506051076,1506051076,0),(34,'a7e3276b-95c7-806f-c6c9-a6d004011c15','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0','0','0','0',1506051573,1506051573,0),(35,'5f3d274c-0ab9-d9a6-8e5a-4a150f8ba29d','0f584f9c-befb-a17e-b205-765cd7efde33','0','0','0','0',1506051579,1506051579,0),(36,'8f5aa4d9-7249-9515-80a9-ee8839a5db12','16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0','0','0','0',1506076611,1506076611,0),(37,'681a0f22-4c1c-5344-be33-39f8a06e69c1','3ca03517-fc7f-d67c-45c3-5ce84f58d92d','0','0','0','0',1506228486,1506228486,0),(39,'892c80b0-750c-0742-c6a4-5c1105285bee','13225a3e-f16a-ebb0-450d-3a0a00ade5ca','2','0','0','0',1506323531,1506323531,0),(41,'5e539f48-231e-7eb5-145c-646da24ae942','c3a9548d-832d-57f2-fdd9-18f9dc397fb5','2','0','0','0',1506326257,1506326257,0),(43,'5b4a5093-0237-ef6c-eeae-3c0d1b835046','499d7c58-08b3-45e6-1a12-ab99c53f596b','0','0','0','0',1506389736,1506389736,0);

#
# Structure for table "xds_community_user_record"
#

DROP TABLE IF EXISTS `xds_community_user_record`;
CREATE TABLE `xds_community_user_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_id` char(36) NOT NULL DEFAULT '',
  `user_id` char(36) NOT NULL DEFAULT '',
  `type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '关联类型 1 管理员 2 成员',
  `pay` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否为付费用户 0 否 1 是',
  `join_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '加入时间',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '退出时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户退出行动记录表';

#
# Data for table "xds_community_user_record"
#

INSERT INTO `xds_community_user_record` VALUES (2,'5b4a5093-0237-ef6c-eeae-3c0d1b835046','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0',0,1506389737),(4,'4c129a60-59e2-4ef2-63c2-f2bde7ccca19','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0',0,1506390127),(5,'892c80b0-750c-0742-c6a4-5c1105285bee','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0',0,1506390159),(6,'58d153d9-1702-e225-7cbc-59a453386bca','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','0',0,1506390357),(7,'58d153d9-1702-e225-7cbc-59a453386bca','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0',2017,1506390582),(8,'58d153d9-1702-e225-7cbc-59a453386bca','0a9064ba-711f-5049-9300-c0cc88e1edf7','2','0',1506390671,1506390676),(9,'e20d3eea-4164-01ab-fd23-aa2e93836b09','b9d25df4-8e9e-f917-f559-4872db0b9ea6','2','0',1506390930,1506391009),(10,'58d153d9-1702-e225-7cbc-59a453386bca','b9d25df4-8e9e-f917-f559-4872db0b9ea6','2','0',1506323955,1506391142);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='收支明细交易表';

#
# Data for table "xds_income_expenses"
#

INSERT INTO `xds_income_expenses` VALUES (11,'185b6957-3732-3ca0-3b96-8fd9a7295363','A901620085576844',1.99,'行动计划名称',1504262008,1504262008),(12,'185b6957-3732-3ca0-3b96-8fd9a7295363','A901620624007858',1.99,'行动计划名称',1504262062,1504262062),(13,'b890bdde-48f4-28d9-6f24-3791b32a986e','A907505704780862',19.00,'行动计划002',1504750570,1504750570),(14,'4db41cdd-ee87-54a9-9864-4c0efb4237e2','A907638878415470',19.00,'行动计划003',1504763887,1504763887),(15,'0f6f6fba-c7ab-a432-d47a-0ff04b75a972','A907800616973137',19.00,'行动计划004',1504780061,1504780061),(16,'b885ed62-8eaa-6b98-213d-30ef17e2f189','A907804255607868',19.00,'行动计划002',1504780425,1504780425),(17,'b885ed62-8eaa-6b98-213d-30ef17e2f189','A908681166925343',19.00,'行动计划002',1504868116,1504868116),(18,'b885ed62-8eaa-6b98-213d-30ef17e2f189','A912013108395671',19.00,'行动计划002',1505201310,1505201310),(19,'4db41cdd-ee87-54a9-9864-4c0efb4237e2','A921648542750787',19.00,'行动计划003',1505964854,1505964854),(20,'0f6f6fba-c7ab-a432-d47a-0ff04b75a972','A921649018062661',19.00,'行动计划004',1505964901,1505964901),(21,'e059d9f5-0b98-1a68-dd19-70e19c83da87','A921649809560402',45.00,'这是第三个行动计划',1505964980,1505964980),(22,'9425baea-cf1d-5bb5-203a-91f72fcd18fd','A921650005626128',45.00,'这是第五个行动计划',1505965000,1505965000),(24,'185b6957-3732-3ca0-3b96-8fd9a7295363','A921652276141542',20.00,'行动计划001',1505965227,1505965227),(25,'b885ed62-8eaa-6b98-213d-30ef17e2f189','A921652929017391',19.00,'行动计划002',1505965292,1505965292);

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='收支对应用户表';

#
# Data for table "xds_income_expenses_user"
#

INSERT INTO `xds_income_expenses_user` VALUES (17,'0a9064ba-711f-5049-9300-c0cc88e1edf7',11,'0',1504262008),(18,'cb2395b7-7660-7134-85c9-612d4f4c74b5',11,'1',1504262009),(19,'0a9064ba-711f-5049-9300-c0cc88e1edf7',12,'0',1504262062),(20,'cb2395b7-7660-7134-85c9-612d4f4c74b5',12,'1',1504262063),(21,'0a9064ba-711f-5049-9300-c0cc88e1edf7',13,'0',1504750570),(22,'cb2395b7-7660-7134-85c9-612d4f4c74b5',13,'1',1504750571),(23,'0a9064ba-711f-5049-9300-c0cc88e1edf7',14,'0',1504763888),(24,'cb2395b7-7660-7134-85c9-612d4f4c74b5',14,'1',1504763888),(25,'0a9064ba-711f-5049-9300-c0cc88e1edf7',15,'0',1404780061),(26,'cb2395b7-7660-7134-85c9-612d4f4c74b5',15,'1',1504780062),(27,'0a9064ba-711f-5049-9300-c0cc88e1edf7',16,'0',1504780425),(28,'cb2395b7-7660-7134-85c9-612d4f4c74b5',16,'1',1504780426),(29,'0a9064ba-711f-5049-9300-c0cc88e1edf7',17,'0',1504868117),(30,'cb2395b7-7660-7134-85c9-612d4f4c74b5',17,'1',1504868117),(31,'0a9064ba-711f-5049-9300-c0cc88e1edf7',18,'0',1505201311),(32,'cb2395b7-7660-7134-85c9-612d4f4c74b5',18,'1',1505201311),(33,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',19,'0',1505964854),(34,'cb2395b7-7660-7134-85c9-612d4f4c74b5',19,'1',1505964854),(35,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',20,'0',1505964901),(36,'cb2395b7-7660-7134-85c9-612d4f4c74b5',20,'1',1505964901),(37,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',21,'0',1505964980),(38,'3e0b1448-7562-48cc-f885-3986a3bee7fa',21,'1',1505964980),(39,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',22,'0',1505965000),(40,'3e0b1448-7562-48cc-f885-3986a3bee7fa',22,'1',1505965000),(42,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',24,'0',1505965227),(43,'cb2395b7-7660-7134-85c9-612d4f4c74b5',24,'1',1505965227),(44,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',25,'0',1505965292),(45,'cb2395b7-7660-7134-85c9-612d4f4c74b5',25,'1',1505965292);

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
) ENGINE=InnoDB AUTO_INCREMENT=583 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户登录记录表';

#
# Data for table "xds_login_history"
#

INSERT INTO `xds_login_history` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502846529),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502846854),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502847199),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502847287),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502849670),(6,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502849885),(7,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502855749),(8,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502868288),(9,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1',1502877709),(10,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502882795),(11,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502956583),(12,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1502957394),(13,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503044694),(14,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298062),(15,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298084),(16,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298198),(17,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503298820),(18,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503301749),(19,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503301998),(20,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503302245),(21,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503302985),(22,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303086),(23,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303101),(24,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303105),(25,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503303120),(26,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305541),(27,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305640),(28,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503305822),(29,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503306529),(30,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503306539),(31,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503310969),(32,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503310980),(33,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311156),(34,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311319),(35,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311869),(36,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311882),(37,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311887),(38,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311921),(39,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503311940),(40,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503313917),(41,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503313926),(42,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1503329207),(43,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1503329219),(44,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503368781),(45,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1503369812),(46,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503628644),(47,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1503640290),(48,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1503640483),(49,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1503641543),(50,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504164544),(51,'cb2395b7-7660-7134-85c9-612d4f4c74b5','0',1504249902),(52,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504257748),(53,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259239),(54,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259662),(55,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259672),(56,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259800),(57,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504259806),(58,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260007),(59,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260076),(60,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260080),(61,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260490),(62,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260500),(63,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260587),(64,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504260592),(65,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504262850),(66,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504490332),(67,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504490336),(68,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504492741),(69,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495420),(70,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495566),(71,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504495813),(72,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504496366),(73,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504497075),(74,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504501646),(75,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504504403),(76,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504506610),(77,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504506774),(78,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504507146),(79,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504508457),(80,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504509058),(81,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504511068),(82,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504511151),(83,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511302),(84,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511366),(85,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504511375),(86,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513423),(87,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513508),(88,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504513553),(89,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504514535),(90,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504583862),(91,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504583868),(92,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504584570),(93,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504584713),(94,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','0',1504584952),(95,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589680),(96,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589716),(97,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589761),(98,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504589854),(99,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590142),(100,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590225),(101,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590445),(102,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590484),(103,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590795),(104,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504590949),(105,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591017),(106,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591096),(107,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591240),(108,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504591353),(109,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591491),(110,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591697),(111,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504591783),(112,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504592909),(113,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504592972),(114,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593021),(115,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593488),(116,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593514),(117,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593646),(118,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593672),(119,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593704),(120,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593715),(121,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593790),(122,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504593800),(123,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594218),(124,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594239),(125,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594241),(126,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594291),(127,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594292),(128,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594317),(129,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594343),(130,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594373),(131,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594381),(132,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594393),(133,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594404),(134,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594448),(135,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594460),(136,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594513),(137,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594537),(138,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594611),(139,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594615),(140,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594631),(141,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504594662),(142,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504594662),(143,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504606887),(144,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609208),(145,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609252),(146,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504609493),(147,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504610074),(148,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659776),(149,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659882),(150,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504659965),(151,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504660077),(152,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660228),(153,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660308),(154,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660360),(155,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660431),(156,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660657),(157,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660676),(158,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660710),(159,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660800),(160,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504660958),(161,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504661094),(162,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504661417),(163,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504666148),(164,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1504666757),(165,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504666779),(166,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504669459),(167,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504669900),(168,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504670864),(169,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504670972),(170,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504671916),(171,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677797),(172,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677945),(173,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677959),(174,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504677992),(175,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678003),(176,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678084),(177,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504678341),(178,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504679072),(179,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504679921),(180,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504679989),(181,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680740),(182,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680761),(183,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680824),(184,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680837),(185,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680871),(186,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680883),(187,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504680894),(188,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504683298),(189,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504695196),(190,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504697043),(191,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504746658),(192,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504748000),(193,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504748192),(194,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504750205),(195,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504750249),(196,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504756178),(197,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756280),(198,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756358),(199,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756827),(200,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504756993),(201,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757059),(202,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757188),(203,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504757323),(204,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504758490),(205,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504759610),(206,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763669),(207,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763704),(208,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504763817),(209,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764169),(210,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764249),(211,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764407),(212,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764439),(213,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504764645),(214,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504767265),(215,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504768408),(216,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504774013),(217,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504774083),(218,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504774852),(219,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504776023),(220,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504778596),(221,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504779226),(222,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504783075),(223,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504785637),(224,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504832621),(225,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504832867),(226,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504835133),(227,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836657),(228,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836673),(229,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836754),(230,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836795),(231,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504836926),(232,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504837880),(233,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504838301),(234,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504839165),(235,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504843386),(236,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504843465),(237,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504843505),(238,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504843787),(239,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504851775),(240,'bf670625-f384-b056-fab9-4c3f45314aa2','0',1504853402),(241,'bf670625-f384-b056-fab9-4c3f45314aa2','0',1504854033),(242,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504861329),(243,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504861583),(244,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504861603),(245,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504862203),(246,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504863926),(247,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504864085),(248,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504864205),(249,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504864263),(250,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504864338),(251,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1504864362),(252,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504864420),(253,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504864756),(254,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504864853),(255,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1504865009),(256,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504865151),(257,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504865698),(258,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1504869114),(259,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1504925383),(260,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505091801),(261,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505092891),(262,'13225a3e-f16a-ebb0-450d-3a0a00ade5ca','0',1505109429),(263,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505112739),(264,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505112986),(265,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505113182),(266,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505113277),(267,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505113519),(268,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505113646),(269,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505113870),(270,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505113924),(271,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114037),(272,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114510),(273,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114569),(274,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505114695),(275,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114699),(276,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505114805),(277,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505114972),(278,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505115069),(279,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505115197),(280,'0a9064ba-711f-5049-9300-c0cc88e1edf7','0',1505115857),(281,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505119750),(282,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505123325),(283,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505178518),(284,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505180402),(285,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505180632),(286,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505184853),(287,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505184951),(288,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505185066),(289,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505185163),(290,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505185328),(291,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505186116),(292,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505186189),(293,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505186258),(294,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505186918),(295,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505187122),(296,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505187295),(297,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505188651),(298,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505188796),(299,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505189031),(300,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','0',1505191659),(301,'aab70efb-92e5-7f6c-423f-e3d4e4f5ac83','0',1505195124),(302,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505195814),(303,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505196167),(304,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505197032),(305,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505198702),(306,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505200069),(307,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505200184),(308,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505200651),(309,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505200747),(310,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505200783),(311,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505201166),(312,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505207331),(313,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505207439),(314,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505207537),(315,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505208762),(316,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505210545),(317,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505211249),(318,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505211370),(319,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505211696),(320,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505211776),(321,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505211990),(322,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505212318),(323,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505212653),(324,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505212724),(325,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505212758),(326,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505212856),(327,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505213546),(328,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505213616),(329,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505214127),(330,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505214195),(331,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505214281),(332,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505214308),(333,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505214355),(334,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505215232),(335,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505215320),(336,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505215557),(337,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505215655),(338,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505215856),(339,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505216409),(340,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505264811),(341,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505264822),(342,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505268343),(343,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1505276550),(344,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505281499),(345,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505281740),(346,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505282110),(347,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505282213),(348,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505282278),(349,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505282422),(350,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505283028),(351,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505283175),(352,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505283324),(353,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505283545),(354,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505283896),(355,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505284224),(356,'501969d6-b26d-bb2d-29e3-5264a923def9','0',1505285272),(357,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505285342),(358,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505285468),(359,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505286036),(360,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505287318),(361,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505287493),(362,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505298008),(363,'cb2395b7-7660-7134-85c9-612d4f4c74b5','0',1505298142),(364,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505298325),(365,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505298644),(366,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505299211),(367,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505299666),(368,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505300243),(369,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505300361),(370,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505350826),(371,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505351484),(372,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505354048),(373,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505354159),(374,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505355866),(375,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505356047),(376,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505356440),(377,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505356866),(378,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505357219),(379,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505357844),(380,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505358059),(381,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505359494),(382,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505359704),(383,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505360449),(384,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505368979),(385,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505369005),(386,'0f584f9c-befb-a17e-b205-765cd7efde33','0',1505369075),(387,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505369426),(388,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505370559),(389,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505373118),(390,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505373619),(391,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505374025),(392,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505374595),(393,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505376592),(394,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505377230),(395,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505377425),(396,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505378192),(397,'a4e6de38-15c9-9199-f139-68f8d3571899','0',1505379783),(398,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505380096),(399,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505386168),(400,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505437510),(401,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505442348),(402,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505443602),(403,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505444379),(404,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505444667),(405,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505450214),(406,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505460979),(407,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505461326),(408,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505464028),(409,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505464190),(410,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505468821),(411,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505470048),(412,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505470388),(413,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505470660),(414,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505470950),(415,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505471263),(416,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505471356),(417,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472086),(418,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472486),(419,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472637),(420,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472729),(421,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505472815),(422,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505695996),(423,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505697098),(424,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505697173),(425,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505699468),(426,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505699971),(427,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505700786),(428,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505700977),(429,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505701054),(430,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505701209),(431,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505701269),(432,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505701453),(433,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505701641),(434,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505701705),(435,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505701791),(436,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505701851),(437,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505702274),(438,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505702430),(439,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505703006),(440,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505703210),(441,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505703308),(442,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505703432),(443,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505703648),(444,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505704121),(445,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505704352),(446,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505707660),(447,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505712898),(448,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505713064),(449,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505713170),(450,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505713949),(451,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505714409),(452,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505714492),(453,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505715804),(454,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505715881),(455,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505716665),(456,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505717330),(457,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505717458),(458,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505717542),(459,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505718591),(460,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505720064),(461,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505720255),(462,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505720489),(463,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505720605),(464,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505720725),(465,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505720866),(466,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505721144),(467,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505721606),(468,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505722052),(469,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505722258),(470,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505722880),(471,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505722956),(472,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505724462),(473,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505725806),(474,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505727779),(475,'499d7c58-08b3-45e6-1a12-ab99c53f596b','0',1505728371),(476,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505729664),(477,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505784818),(478,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505785139),(479,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505785575),(480,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505786053),(481,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505788195),(482,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505792381),(483,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505792961),(484,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505800039),(485,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505800351),(486,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505800551),(487,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505800702),(488,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505801836),(489,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505802185),(490,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505802327),(491,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505802805),(492,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505803589),(493,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505804331),(494,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505805449),(495,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505807799),(496,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505807982),(497,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505808248),(498,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505808843),(499,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505810871),(500,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505811520),(501,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505813233),(502,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505813816),(503,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505814225),(504,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505814299),(505,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505816731),(506,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505816780),(507,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505817778),(508,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505887069),(509,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505887101),(510,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505888618),(511,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505891119),(512,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505891121),(513,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505892036),(514,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505902243),(515,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505902724),(516,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505955919),(517,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505960533),(518,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505960757),(519,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505960876),(520,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505965399),(521,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505966427),(522,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505974046),(523,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505974149),(524,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505974279),(525,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505974829),(526,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505976001),(527,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1505987329),(528,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1505989841),(529,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1505989952),(530,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506042080),(531,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1506043247),(532,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506046690),(533,'9175a40c-31f2-bbec-2134-27935378cf65','0',1506049639),(534,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506049663),(535,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1506049920),(536,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1506050346),(537,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506051017),(538,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1506051482),(539,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506052357),(540,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1506061200),(541,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1506062547),(542,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506065603),(543,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506068139),(544,'0f584f9c-befb-a17e-b205-765cd7efde33','0',1506068442),(545,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506068517),(546,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1506069081),(547,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506069554),(548,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506069670),(549,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506070100),(550,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506072538),(551,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506072809),(552,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506072823),(553,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506072847),(554,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506076429),(555,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506077289),(556,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506158612),(557,'b49431dc-5f76-2813-547d-198ff2e6e3a8','0',1506178625),(558,'3ca03517-fc7f-d67c-45c3-5ce84f58d92d','0',1506228363),(559,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506301790),(560,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1506303133),(561,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1506305726),(562,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1506310807),(563,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1506311246),(564,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1506311525),(565,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1506311525),(566,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1506317713),(567,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506317986),(568,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506319104),(569,'723885d5-28ac-a37f-45cb-938ae707208a','0',1506320046),(570,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506322705),(571,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506322856),(572,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506322950),(573,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1506323205),(574,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506324971),(575,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506327699),(576,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506329504),(577,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','0',1506334685),(578,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1506387872),(579,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1506388570),(580,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','0',1506389000),(581,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','0',1506390116),(582,'3e0b1448-7562-48cc-f885-3986a3bee7fa','0',1506391914);

#
# Structure for table "xds_notice"
#

DROP TABLE IF EXISTS `xds_notice`;
CREATE TABLE `xds_notice` (
  `id` char(36) NOT NULL DEFAULT '',
  `to_user_id` char(36) NOT NULL DEFAULT '0' COMMENT '通知所属用户主键ID',
  `from_user_id` char(36) NOT NULL DEFAULT '0' COMMENT '通知来源作者主键ID(关联头像时使用)',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 被@ 1 点赞',
  `look` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 未读 1 已读',
  `communication_id` char(36) NOT NULL DEFAULT '' COMMENT '条目ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '通知时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `delete_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to_user_id` (`to_user_id`,`from_user_id`,`type`,`communication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='消息表';

#
# Data for table "xds_notice"
#

INSERT INTO `xds_notice` VALUES ('0bb2070a-dead-329b-8a47-fb844f64b9ee','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','1','08d24c5e-f07b-7aa0-59e6-840e89752fe5',1506076886,1506301610,1506076903),('0d74304e-326d-6c3d-b00c-3730c09903fe','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','1','08d24c5e-f07b-7aa0-59e6-840e89752fe5',1506076389,1506301610,1506076903),('14a51586-852a-c495-e8b9-64035939f188','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','1','b8497cc0-d857-5d5e-c040-a93ee12fd7c7',1505812315,1506301610,0),('2bf09698-ecd8-37eb-f415-10b49596c368','501969d6-b26d-bb2d-29e3-5264a923def0','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','b8497cc0-d857-5d5e-c040-a93ee12fd7c7',1506067915,1506067915,0),('35faa38e-163b-914e-1739-76158521e2f2','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','1','08d24c5e-f07b-7aa0-59e6-840e89752fe5',1506076832,1506301610,1506076903),('777afe4e-3466-c99c-2c92-b8bd53a70dff','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','1','08d24c5e-f07b-7aa0-59e6-840e89752fe5',1506076359,1506301610,1506076903),('8d2e4bdd-ac7c-5f19-48aa-b33ca40ec67c','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','1','5f114da3-b998-68b9-78c1-5602a308bd76',1506067885,1506301610,0),('aca4399c-84b5-4025-b7f0-36c8e05effc6','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','1','08d24c5e-f07b-7aa0-59e6-840e89752fe5',1506076782,1506301610,1506076903),('af7b5956-4aee-9e5c-d407-66239ea524dc','501969d6-b26d-bb2d-29e3-5264a923def0','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','707a6f6c-01f8-a174-80d4-29ca291be878',1506067688,1506067688,0),('cbf9e51f-27bf-b33a-2f45-61887c04f981','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','1','1','08d24c5e-f07b-7aa0-59e6-840e89752fe5',1506075806,1506301610,1506076903),('f193d87c-4e08-630b-302e-7813a3484bad','501969d6-b26d-bb2d-29e3-5264a923def9','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','5f114da3-b998-68b9-78c1-5602a308bd76',1506067885,1506067885,0),('f86de16e-e099-1041-dbd1-c1eb8f19f014','501969d6-b26d-bb2d-29e3-5264a923def9','0a9064ba-711f-5049-9300-c0cc88e1edf7','0','0','707a6f6c-01f8-a174-80d4-29ca291be878',1506067688,1506067688,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='充值表';

#
# Data for table "xds_recharge"
#

INSERT INTO `xds_recharge` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831651224789325',NULL,0,1504165122,1504165122),(2,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831652073143610',NULL,0,1504165207,1504165207),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831652654722839',NULL,0,1504165265,1504165265),(4,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653176605432',NULL,0,1504165317,1504165317),(5,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653546833674',NULL,0,1504165354,1504165354),(6,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831653792742874',NULL,0,1504165379,1504165379),(7,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831654336723090',NULL,0,1504165433,1504165433),(8,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831656081469243',NULL,0,1504165608,1504165608),(9,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831659955432043','wx20170901114414151de0a88b0185848662',0,1504165995,1504237516),(10,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A831680489285070','wx201709011056238f318d45650355899405',0,1504168049,1504234645),(11,'0a9064ba-711f-5049-9300-c0cc88e1edf7',16.88,'A901379125965895','wx20170901115133bde858dcda0601456091',0,1504237912,1504237955),(12,'3e0b1448-7562-48cc-f885-3986a3bee7fa',2.00,'A915420576887101',NULL,0,1505442057,1505442057),(13,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915427413135442','wx2017091510322106cd76905d0609956381',0,1505442741,1505442741),(14,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915432140327075','wx20170915104014dc72ea1dd90767927507',0,1505443214,1505443214),(15,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915432504367540','wx201709151040509b65db72c50850218844',0,1505443250,1505443250),(16,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915433772411620','wx2017091510425711d969993d0012293854',0,1505443377,1505443377),(17,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915436809648040','wx20170915104801cf30c7f87d0237422669',0,1505443680,1505443681),(18,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915437032202036','wx20170915104823fb5526b12c0196351516',0,1505443703,1505443703),(19,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915444634149839','wx201709151101033975281c830713625520',0,1505444463,1505444463),(20,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',1.00,'A915446948903488','wx201709151104558e3e6fcd070795889363',0,1505444694,1505444695),(21,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915449972266720','wx20170915110957b15b08a9a20901606308',0,1505444997,1505444997),(22,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',1.00,'A915450172782902','wx201709151110174f12f1c29a0722429360',0,1505445017,1505445017),(23,'3e0b1448-7562-48cc-f885-3986a3bee7fa',1.00,'A915455707944399','wx20170915111931bce787205d0894006658',0,1505445570,1505445571),(24,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.02,'A915461635328200','wx20170915112924ec303e45160083986014',0,1505446163,1505446164),(25,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.02,'A915462055897272','wx20170915113005b696609f1a0157044256',0,1505446205,1505446206),(26,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.03,'A915463877773854','wx20170915113308559e786ace0986447765',0,1505446387,1505446388),(27,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.04,'A915464806908597','wx20170915113441e7d7710b0a0978717118',0,1505446480,1505446481),(28,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.04,'A915469257547897','wx201709151142064c74926dfd0596281834',0,1505446925,1505446926),(29,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.01,'A915472711731095','wx2017091511475115af16195e0548924637',0,1505447271,1505447271),(30,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.06,'A915476478649901','wx201709151154080dfa0d04240173764482',0,1505447647,1505447648),(31,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.01,'A915479723775104','wx201709151159326f942127b50725816138',0,1505447972,1505447972),(32,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.10,'A915481452967494','wx201709151202251238768bd50396130606',0,1505448145,1505448145),(33,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A915497386577225','wx201709151228595dee06a3360953842642',1,1505449738,1505449739),(34,'0a9064ba-711f-5049-9300-c0cc88e1edf7',0.01,'A915499781979578','wx20170915123258e2f3cb11e70344961389',1,1505449978,1505449978),(35,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.01,'A915614399237088','wx20170915154400d66ec233490121373770',1,1505461439,1505461440),(36,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.01,'A915640423292503','wx2017091516272224305f16900729361808',1,1505464042,1505464042),(37,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.02,'A915640662823509','wx20170915162746a15268cd030539513071',1,1505464066,1505464066),(38,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.01,'A915641370446829','wx20170915162857a7d94243d40557368144',1,1505464137,1505464137),(39,'3e0b1448-7562-48cc-f885-3986a3bee7fa',0.01,'A918297562112702','wx2017091818155644bb6b7d520104754032',0,1505729756,1505729756),(40,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.01,'A920947564557210','wx2017092016055685e73c6eb60359610038',1,1505894756,1505894756),(41,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',99999996.00,'A921647121328116',NULL,0,1505964712,1505964712);

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

INSERT INTO `xds_task` VALUES ('09e2c2af-710d-8f61-d777-26c77bfa5d87','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.6\'=','这是要求','这里是富文本',3600,'1',0,1505440518,1505440518,0),('3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动计划002','002简介','1',1,'1',0,1504766152,1505270742,0),('49bf4c81-63a1-e06a-1074-8908cc0b1c42','185b6957-3732-3ca0-3b96-8fd9a7295363','行动01','要求01','内容',123,'1',0,1504694707,1504694707,0),('633b6005-6e2d-75ea-c823-d96ca3fe5745','185b6957-3732-3ca0-3b96-8fd9a7295363','行动任务001','001要求','asdfg',123,'1',0,1503988088,1503990071,0),('6514a394-7ea8-d382-f590-eb5581a5e2e1','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容003',10,'1',0,1504765247,1504765247,0),('73712a59-9576-ca4e-e74d-c73d55690694','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.8\'=','这是要求','这里是富文本',3600,'1',0,1505440529,1505440529,0),('953d295c-70f1-b3ad-1754-dac6b41e996c','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.2\'=','这是要求','这里是富文本',3600,'1',0,1505440016,1505440016,0),('a4905edc-7437-6126-6702-6c08788d0758','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务002','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容',10,'1',0,1504764979,1504764979,0),('b871952c-bca8-4471-3fa5-e6c6bc0b7523','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','行动任务003','http://api.xingdongshe.com/images/nx-xds-logo.jpg','内容003',10,'1',0,1504765290,1504765290,0),('ca5cdd78-bf94-f2e7-029e-5fecd7af8d82','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.7\'=','这是要求','这里是富文本',3600,'1',0,1505440525,1505440525,0),('dca3a198-7ce1-ce66-0ca1-62398d61d881','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.5\'=','这是要求','这里是富文本',3600,'1',0,1505440033,1505440033,0),('e2c26d1f-2db0-513b-1343-201bce4d7d64','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.1\'=','这是要求','这里是富文本',3600,'1',0,1505440007,1505440007,0),('ec02aeb2-ee15-141f-87ed-777b88060832','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.3\'=','这是要求','这里是富文本',3600,'1',0,1505440025,1505440025,0),('ecbf3ca5-1d5e-18fb-b10d-2d57eaa4ba08','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.6\'=','这是要求','这里是富文本',3600,'1',0,1505440038,1505440038,0),('f75d9b53-f8c3-9a65-b412-5b4e53a5be9b','185b6957-3732-3ca0-3b96-8fd9a7295363','行动','要求','内容',123,'1',0,1504682510,1504682510,0),('f9e1d587-6e0c-0614-58c1-3bac00df6655','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.9\'=','这是要求','这里是富文本',3600,'1',0,1505440534,1505440534,0),('fda89456-a12a-4155-a363-9b5a1184a185','a88b4fc0-0652-d590-a162-4574de7b903d','这是第一个行动计划的任务=\'No.4\'=','这是要求','这里是富文本',3600,'1',0,1505440029,1505440029,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='任务加速表';

#
# Data for table "xds_task_accelerate"
#

INSERT INTO `xds_task_accelerate` VALUES (1,'a4905edc-7437-6126-6702-6c08788d0758','86966993-d3e4-e722-223d-bf16fc2e8421','0a9064ba-711f-5049-9300-c0cc88e1edf7',1505440844),(2,'a4905edc-7437-6126-6702-6c08788d0758','cb2395b7-7660-7134-85c9-612d4f4c74b5','0a9064ba-711f-5049-9300-c0cc88e1edf7',1505442867),(3,'a4905edc-7437-6126-6702-6c08788d0758','cb2395b7-7660-7134-85c9-612d4f4c74b5','0a9064ba-711f-5049-9300-c0cc88e1edf7',1505459827),(5,'fda89456-a12a-4155-a363-9b5a1184a185','b9d25df4-8e9e-f917-f559-4872db0b9ea6','0a9064ba-711f-5049-9300-c0cc88e1edf7',1505468132);

#
# Structure for table "xds_task_feedback"
#

DROP TABLE IF EXISTS `xds_task_feedback`;
CREATE TABLE `xds_task_feedback` (
  `id` char(36) NOT NULL DEFAULT '',
  `task_id` char(36) NOT NULL DEFAULT '0' COMMENT '所属任务ID',
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '发起反馈的用户ID',
  `to_user_id` char(36) NOT NULL DEFAULT '0' COMMENT '审核反馈的用户ID',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '反馈内容',
  `location` varchar(255) NOT NULL DEFAULT '' COMMENT '地理位置',
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0 待审核 1 未通过审核 2 审核通过 3 失效',
  `reason` varchar(255) NOT NULL DEFAULT '' COMMENT '未通过审核原因',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务反馈表';

#
# Data for table "xds_task_feedback"
#

INSERT INTO `xds_task_feedback` VALUES ('e5545839-621b-d9c3-8231-8c1b3c196f14','ecbf3ca5-1d5e-18fb-b10d-2d57eaa4ba08','0a9064ba-711f-5049-9300-c0cc88e1edf7','0a9064ba-711f-5049-9300-c0cc88e1edf7','反馈内容','Japan','1','审核失败原因',1505991427,1506052905),('f5545839-621b-d9c3-8231-8c1b3c196f13','a4905edc-7437-6126-6702-6c08788d0758','0a9064ba-711f-5049-9300-c0cc88e1edf7','499d7c58-08b3-45e6-1a12-ab99c53f596b','afddasjfjd;a','中国','0','1',1505721906,1505721906),('f5545839-621b-d9c3-8231-8c1b3c196f15','a4905edc-7437-6126-6702-6c08788d0758','0a9064ba-711f-5049-9300-c0cc88e1edf7','499d7c58-08b3-45e6-1a12-ab99c53f596b','反馈内容','Japan','0','审核失败原因',1505721906,1505721906);

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
  `finish` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 未完成 1 已完成',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='任务用户表';

#
# Data for table "xds_task_user"
#

INSERT INTO `xds_task_user` VALUES (2,'3ddc3170-8166-d78e-2a48-bbc32fbc4dd5','0a9064ba-711f-5049-9300-c0cc88e1edf7','a88b4fc0-0652-d590-a162-4574de7b903d','0',1505459827,0),(3,'fda89456-a12a-4155-a363-9b5a1184a185','b9d25df4-8e9e-f917-f559-4872db0b9ea6','a88b4fc0-0652-d590-a162-4574de7b903d','0',1505468132,0),(4,'fda89456-a12a-4155-a363-9b5a1184a185','0a9064ba-711f-5049-9300-c0cc88e1edf7','a88b4fc0-0652-d590-a162-4574de7b903d','0',1505701579,1505701579),(5,'a4905edc-7437-6126-6702-6c08788d0758','0a9064ba-711f-5049-9300-c0cc88e1edf7','0f6f6fba-c7ab-a432-d47a-0ff04b75a972','0',1505701579,1505701579);

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

INSERT INTO `xds_user` VALUES ('0a9064ba-711f-5049-9300-c0cc88e1edf7','68662449','','','1','127.0.0.1',1502682504,1505115856,'192.168.0.165',1505115856),('0f584f9c-befb-a17e-b205-765cd7efde33','89288325','','','1','113.108.11.52',1505369075,1506068442,'219.133.40.16',1506068442),('13225a3e-f16a-ebb0-450d-3a0a00ade5ca','10483929','','','1','116.7.219.103',1503302290,1505109429,'116.7.216.16',1505109429),('16e1481c-86e7-b9a5-e707-a1b2cdf766c3','13854363','','','1','116.7.219.103',1503302234,1506390116,'116.7.218.97',1506390116),('3ca03517-fc7f-d67c-45c3-5ce84f58d92d','83185897','','','1','117.136.79.97',1506228362,1506228363,'117.136.79.97',1506228363),('3e0b1448-7562-48cc-f885-3986a3bee7fa','48871847','','','1','14.17.37.43',1503301201,1506391914,'116.7.218.97',1506391914),('499d7c58-08b3-45e6-1a12-ab99c53f596b','84996925','','','1','124.239.138.2',1503640289,1505728371,'124.239.138.2',1505728371),('501969d6-b26d-bb2d-29e3-5264a923def9','59121296','','','1','14.17.37.144',1505285271,1505285272,'14.17.37.144',1505285272),('723885d5-28ac-a37f-45cb-938ae707208a','86335450','','','1','14.116.36.68',1506320046,1506320046,'14.116.36.68',1506320046),('86966993-d3e4-e722-223d-bf16fc2e8421','53370684','','','1','127.0.0.1',1502782975,1502782975,'127.0.0.1',1502782975),('9175a40c-31f2-bbec-2134-27935378cf65','36598853','','','1','116.7.218.207',1506049638,1506049639,'116.7.218.207',1506049639),('a4e6de38-15c9-9199-f139-68f8d3571899','19706331','','','1','113.140.110.240',1505379783,1505379783,'113.140.110.240',1505379783),('a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','87148873','','','1','14.17.37.72',1504584951,1505191659,'14.17.37.72',1505191659),('aab70efb-92e5-7f6c-423f-e3d4e4f5ac83','83961921','','','1','116.7.217.232',1505195124,1505195124,'116.7.217.232',1505195124),('b49431dc-5f76-2813-547d-198ff2e6e3a8','92883173','','','1','222.35.68.197',1506178625,1506178625,'222.35.68.197',1506178625),('b9d25df4-8e9e-f917-f559-4872db0b9ea6','30075710','','','1','116.7.218.10',1504259239,1506389000,'116.7.218.97',1506389000),('bf670625-f384-b056-fab9-4c3f45314aa2','74392048','','','1','183.61.52.71',1504853401,1504854033,'183.61.52.71',1504854033),('c3a9548d-832d-57f2-fdd9-18f9dc397fb5','30170075','','','1','14.17.37.43',1505187294,1506334685,'183.61.51.206',1506334685),('cb2395b7-7660-7134-85c9-612d4f4c74b5','62559261','','','1','14.17.37.72',1503302250,1505298142,'14.17.37.72',1505298142);

#
# Structure for table "xds_user_info"
#

DROP TABLE IF EXISTS `xds_user_info`;
CREATE TABLE `xds_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL DEFAULT '0' COMMENT '外键，用户UUID',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别;0:保密,1:男,2:女',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '用户昵称',
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
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户信息表';

#
# Data for table "xds_user_info"
#

INSERT INTO `xds_user_info` VALUES (1,'0a9064ba-711f-5049-9300-c0cc88e1edf7','1','tang镕基','T','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/SnLH3aBPWundefined50qskcWCSkQiJ2rae3kyiK.png','1','132','','o2d00xFpaFdhyl0Itf29kmvK78Jg','ow9BAw33SatfPEFsZtW5PR1Lvofw',1502682504,1505977515),(2,'86966993-d3e4-e722-223d-bf16fc2e8421','1','暖象','N','images/201708151542555992a5ff4ebd2.jpg','0','','','o2d00xH6LHyDA3r1o1ASqzoXhBC0','ow9BAw1VWoxItNT4jw9ROeiK5g6U',1502782975,1502782975),(3,'3e0b1448-7562-48cc-f885-3986a3bee7fa','2','wjasd','W','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/H782m8fjKEqaY7Ln6PYc4uqbySx7dUwQ.png','1','1223456qweqqw134646','','o2d00xD9Yg7qj4qMeKYysRiZiIKE','o994OwnZud1Bpg6D0p8sfMOr8WbA',1503301201,1506048307),(4,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3','1','悟空','W','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/ynHundefinedSsQCmfxiLPundefined7BTH3Rjfi6mFa0m2K.png','1','呵呵哈哈哈','','o2d00xFC-IZSyOeVLqlm1n4YVV-4','o994OwpKJM2IzXE2lbnHq-3wOKlI',1503302234,1506322698),(5,'cb2395b7-7660-7134-85c9-612d4f4c74b5','1','風早君','F','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/undefinedzrfhewKsfQD7W8LgseQK810qLW1Hutg.png','1','hsgsvx','','o2d00xK2N-EjAf9uZ3V_NFdqTWac','o994OwvGngl474czowA0NK1-W-yI',1503302250,1505298244),(6,'13225a3e-f16a-ebb0-450d-3a0a00ade5ca','2','邹烨','Z','images/20170821155810599a9292eebce.jpg','0','','','o2d00xI436iyXJ6JfaXBHWh9nYKQ','o994OwtVIxStaAbAhClbRi3Ncg40',1503302290,1503302290),(7,'499d7c58-08b3-45e6-1a12-ab99c53f596b','1','顺','S','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/VsmrR1V948B8c2WwuybTdJundefinedsundefined3Y1rXkw.png','1','我','','o2d00xP3sn2uwzqoAq0jjHQIYEUc','o994OwiLENsn6oroA1x8Vn-AMQYw',1503640289,1505728404),(8,'b9d25df4-8e9e-f917-f559-4872db0b9ea6','1','改个名字真难','G','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/EqutTxrRzqcPFeXsvpramRGpQcBGbbSE.png','1','大家快乐就是我想到','','o2d00xPNE_YPCeQMsL6-bd2PcZSk','o994OwsQS_TTvMaDROe18zeGxZo4',1504259239,1506046738),(9,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb','1','老张','L','images/2017090512155259ae24f809fe8.jpg','0','','','o2d00xEHkFAO9zLZAE8bW2zuP2Tg','o994Owhfp3jqN890x07a0krbe9zw',1504584951,1504584952),(10,'bf670625-f384-b056-fab9-4c3f45314aa2','1','张树超','Z','images/2017090814500259b23d9a0c3d3.jpg','0','','','o2d00xN3uajky16K4CBxIu_hADHk','o994OwmDbOp7NOGMTkA-voY8ICtc',1504853401,1504853402),(11,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5','1','神的孩','S','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/t4QPk1zesn6S1xyQy0DcPL1RvFvidYj7.png','1','问qwefd123','','o2d00xP6PdeibvdWKP5qqLsXnH3M','o994Owma2ByV6wOR0YUKwGfhA7kE',1505187294,1505786101),(12,'aab70efb-92e5-7f6c-423f-e3d4e4f5ac83','0','这是一个小号','Z','','0','','','o2d00xJzaKVn4j3Wyw9nSO1rLAlY','o994OwkSvxCJTTHMPAwWyV8h9JMc',1505195124,1505195124),(13,'501969d6-b26d-bb2d-29e3-5264a923def9','0','暖象科技行政号','N','','0','','','o2d00xESnAsx1zofrtgGJbeHDllA','o994Owujr7QIOyKivj2zvdbY94Vg',1505285271,1505285272),(14,'0f584f9c-befb-a17e-b205-765cd7efde33','0','暖象科技产品汪','N','http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/3R8GWj51gV54aXhkdtcYbiymf2TQaUsY.png','1','空军建军节66','','o2d00xPSr3fx0PY8wgds1bpPZ_Rk','o994OwnQEdgCBmCs6qEmdKZYLuZE',1505369075,1505375749),(15,'a4e6de38-15c9-9199-f139-68f8d3571899','1','小超','X','images/2017091417030359ba45c767af7.jpg','0','','','o2d00xFj59URhcqqzGdGq2AMGkvA','o994OwsdGMjyiWxAkmTdwMZznhm8',1505379783,1505379783),(16,'9175a40c-31f2-bbec-2134-27935378cf65','2','糖','T','http://auth.xingdongshe.com/images/2017092211071959c47e67298d7.jpg','1','','','o2d00xFemGtzkez6jNUfMVJLDrP0','o994OwpqRrP0JsntIoswuzMkBXyA',1506049638,1506049668),(17,'b49431dc-5f76-2813-547d-198ff2e6e3a8','1','还没想好','H','images/2017092322570559c676416998a.jpg','0','','','o2d00xB_VKaJueeKgr3uKXFSn6RU','o994OwlDaAk-TnwWkGcjBZYDRH_U',1506178625,1506178625),(18,'3ca03517-fc7f-d67c-45c3-5ce84f58d92d','1','王康','W','images/2017092412460359c7388b55608.jpg','0','','','o2d00xCoVHvFvZQI-yWV3-_ZarfU','o994OwqyTQrHQfLUk6EbwUx_9oNw',1506228362,1506228363),(19,'723885d5-28ac-a37f-45cb-938ae707208a','1','Mel','M','images/2017092514140659c89eae7516f.jpg','0','','','o2d00xBEykATgHK98jf3BnuZYXe4','o994OwpX4J0X3HrqHEsWHDSr7Z00',1506320046,1506320046);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='用户财产资源';

#
# Data for table "xds_user_property"
#

INSERT INTO `xds_user_property` VALUES (1,'a9870c27-b006-c7b4-8d1f-f1c651b6a8fb',0.00,10,1504771110,1504771110),(2,'499d7c58-08b3-45e6-1a12-ab99c53f596b',0.00,5,1504771110,1504771110),(3,'0a9064ba-711f-5049-9300-c0cc88e1edf7',162.01,6,1504771110,2147483647),(4,'cb2395b7-7660-7134-85c9-612d4f4c74b5',115.00,7,1504771110,2147483647),(5,'86966993-d3e4-e722-223d-bf16fc2e8421',0.00,0,1504771110,1504771110),(6,'3e0b1448-7562-48cc-f885-3986a3bee7fa',90.04,0,1504771110,2147483647),(7,'b9d25df4-8e9e-f917-f559-4872db0b9ea6',999833.00,0,1504771110,2147483647),(8,'16e1481c-86e7-b9a5-e707-a1b2cdf766c3',0.00,0,1504771110,1504771110),(9,'0f584f9c-befb-a17e-b205-765cd7efde33',0.00,0,1505369075,1505369075),(10,'13225a3e-f16a-ebb0-450d-3a0a00ade5ca',0.00,0,1505369075,1505369075),(11,'c3a9548d-832d-57f2-fdd9-18f9dc397fb5',0.02,0,1505369075,2147483647),(12,'501969d6-b26d-bb2d-29e3-5264a923def9',0.00,0,1505369075,1505369075),(13,'bf670625-f384-b056-fab9-4c3f45314aa2',0.00,0,1505369075,1505369075),(14,'aab70efb-92e5-7f6c-423f-e3d4e4f5ac83',0.00,0,1505369075,1505369075),(17,'a4e6de38-15c9-9199-f139-68f8d3571899',0.00,0,1505379783,1505379783),(18,'9175a40c-31f2-bbec-2134-27935378cf65',0.00,0,1506049638,1506049638),(19,'b49431dc-5f76-2813-547d-198ff2e6e3a8',0.00,0,1506178625,1506178625),(20,'3ca03517-fc7f-d67c-45c3-5ce84f58d92d',0.00,0,1506228363,1506228363),(21,'723885d5-28ac-a37f-45cb-938ae707208a',0.00,0,1506320046,1506320046);
