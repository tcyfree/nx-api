Ext.define('WebRoot.view.WestView', {
	extend: 'Ext.panel.Panel',
	alias: 'widget.westview',
	region: 'west',
	title: '菜单',
	iconCls: 'sysmenu',
	collapsible: true,
	split: true,
	border: false,
	frame: true,
	width: 200,
	layout: 'fit',
	initComponent: function() {
		var tree = Ext.create('Ext.tree.Panel', {
			rootVisible: true,
			root: {
					text: '根目录',
					iconCls: 'menu_root',
					expanded: true,
					children: [
						{
							id: 'menu_error_code',
							text: '错误编码表',
							hrefTarget: SYS_API_ROOT + 'phpfiles/error_code.php',
							leaf: true
						},
						{
							id: 'user',
							text: '用户相关',
							expanded: true,
							children: [
								{
									id: 'user_info_profile',
									text: '编辑简介',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/user_info_profile.php',
									leaf: true
								}
							]
						},
                        {
                            id: 'community',
                            text: '社群相关',
                            expanded: true,
                            children: [
                                {
                                    id: 'community_list',
                                    text: '社群列表',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/community_list.php',
                                    leaf:true
                                },
								{
									id: 'community_profile',
									text: '社群简介',
									cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/community_profile.php',
									leaf:true
								}
                            ]
                        },
						{
							id: 'community_user',
							text: '社群用户相关',
							expanded: true,
							children: [
								{
									id: 'community_user_manager',
									text: '管理员列表',
									hrefTarget: SYS_API_ROOT + 'phpfiles/community_user_manager.php',
									leaf:true
								}
							]
						},
                        {
                            id: 'menu_oss',
                            text: 'OSS相关',
                            expanded: true,
                            children: [
                                {
                                    id: 'oss_trans__mp3',
                                    text: '将音频文件转码为mp3',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/oss_trans_mp3.php',
                                    leaf: true
                                }
                            ]
                        },
						{
							id: 'menu_activity',
							text: '活动相关',
							expanded: true,
							children: [
								{
									id: 'activity_post',
									text: '创建',
									hrefTarget: SYS_API_ROOT + 'phpfiles/activity_post.php',
									leaf: true
								},
                                {
                                    id: 'activity_list',
                                    text: '列表',
                                    cls: 'redStyle',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/activity_list.php',
                                    leaf: true
                                },
								{
									id: 'activity_get',
									text: '详情',
									cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/activity_get.php',
									leaf: true
								},
								{
									id: 'activity_put',
									text: '编辑',
									hrefTarget: SYS_API_ROOT + 'phpfiles/activity_put.php',
									leaf: true
								},
								{
									id: 'activity_search',
									text: '搜索',
									hrefTarget: SYS_API_ROOT + 'phpfiles/activity_search.php',
									leaf: true
								},
								{
									id: 'activity_join',
									text: '参加活动',
									hrefTarget: SYS_API_ROOT + 'phpfiles/activity_join.php',
									leaf: true
								},
								{
									id: 'activity_join_list',
									text: '已报名列表',
									hrefTarget: SYS_API_ROOT + 'phpfiles/activity_join_list.php',
									leaf: true
								}
							]
						},
                        {
                            id: 'menu_course',
                            text: '课程相关',
                            expanded: true,
                            children: [
                                {
                                    id: 'course_post',
                                    text: '创建',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/course_post.php',
                                    leaf: true
                                },
								{
									id: 'course_list',
									text: '列表',
                                    cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/course_list.php',
									leaf: true
								},
								{
									id: 'course_get',
									text: '详情',
                                    cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/course_get.php',
									leaf: true
								},
                                {
                                    id: 'course_put',
                                    text: '编辑',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/course_put.php',
                                    leaf: true
                                },
                                {
                                    id: 'course_search',
                                    text: '搜索',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/course_search.php',
                                    leaf: true
                                },
								{
									id: 'course_buy',
									text: '购买课程',
									hrefTarget: SYS_API_ROOT + 'phpfiles/course_buy.php',
									leaf: true
								},
								{
									id: 'menu_syllabus',
									text: '课时相关',
									expanded: true,
									children: [
										{
											id: 'syllabus_post',
											text: '创建',
											hrefTarget: SYS_API_ROOT + 'phpfiles/syllabus_post.php',
											leaf: true
										},
										{
                                            id: 'syllabus_put',
                                            text: '编辑',
                                            hrefTarget: SYS_API_ROOT + 'phpfiles/syllabus_put.php',
                                            leaf: true
										},
										{
											id: 'syllabus_get',
											text: '详情',
											hrefTarget: SYS_API_ROOT + 'phpfiles/syllabus_get.php',
											leaf: true
										},
										{
											id: 'syllabus_list',
											text: '列表',
											hrefTarget: SYS_API_ROOT + 'phpfiles/syllabus_list.php',
											leaf: true
										}
									]
								}
                            ]
                        },
						{
							id: 'act_plan',
							text: '行动计划',
							expanded: true,
							children: [
								{
									id: 'the_last_join',
									text: '最近参加头像',
									hrefTarget: SYS_API_ROOT + 'phpfiles/act_plan_the_last_join.php',
									leaf: true
								}
							]
						},
						{
							id: 'mini_program',
							text: '小程序',
							expanded: true,
							children: [
								{
									id: 'mini_qrcode',
									text: '小程序码',
									hrefTarget: SYS_API_ROOT + 'phpfiles/mini_qrcode.php',
									leaf: true
								},
								{
									id: 'mini_pay',
									text: '支付',
									hrefTarget: SYS_API_ROOT + 'phpfiles/mini_pay.php',
									leaf: true
								},
								{
									id: 'wx_transfer',
									text: '提现',
									hrefTarget: SYS_API_ROOT + 'phpfiles/wx_transfer.php',
									leaf: true
								}
							]
						},
                        {
                            id: 'menu_task',
                            text: '计划任务',
                            expanded: true,
                            children: [
                                {
                                    id: 'task_detail',
                                    text: '详情',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/task_detail.php',
                                    leaf: true
                                },
								{
									id: 'task_feedback_other',
									text: '他人自动点评',
									hrefTarget: SYS_API_ROOT + 'phpfiles/task_feedback_other.php',
									leaf: true
								}
                            ]
                        },
                        {
                            id: 'menu_communication',
                            text: '交流区',
                            expanded: true,
                            children: [
                                {
                                    id: 'communication_list',
                                    text: '交流区列表',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/communication_list.php',
                                    leaf: true
                                }
                            ]
                        },
                        {
                            id: 'menu_comment',
                            text: '评论',
                            expanded: true,
                            children: [
                                {
                                    id: 'comment_post',
                                    text: '发评论',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/comment_create.php',
                                    leaf: true
                                }
                            ]
                        }
					]
			}
		});
		tree.on("itemclick",
		function(view, record) {
			if (record.get('leaf')) {
				var tab = Ext.getCmp('tab_' + record.get('id'));
				if (!tab) {
					tab = Ext.widget("panel", {
						id: 'tab_' + record.get('id'),
						closable: true,
						title: record.get('text'),
						border: false,
						layout: 'fit',
						autoScroll: true,
						html: '<iframe id="iframeA" scrolling="auto" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" src="' + record.get('hrefTarget') + '"></iframe>'
					})
					 Ext.getCmp('centerview').add(tab);
				}
				Ext.getCmp('centerview').setActiveTab(tab);
			}
		});
		this.items = [tree];
		this.callParent();
	}
});