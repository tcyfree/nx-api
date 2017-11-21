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
							id: 'menu_client_root',
							text: '用户相关',
							expanded: true,
							children: [
                                // {
                                //     id: 'user_login',
                                //     text: '微信授权',
                                //     //cls: 'redStyle',
                                //     hrefTarget: SYS_API_ROOT + 'phpfiles/client_login.php',
                                //     leaf: true
                                // },
                                {
									id: 'wx_unionid',
									text: '否关注公众号',
									hrefTarget: SYS_API_ROOT + 'phpfiles/wx_unionid.php',
									leaf: true
                                },
                                {
									id: 'user_info',
									text: '用户信息',
                                    cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/user_info.php',
									leaf: true
								},
                                {
                                    id: 'user_edit',
                                    text: '编辑用户',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/user_edit.php',
                                    leaf: true
                                },
								{
									id: 'user_login_out',
									text: '用户登出',
									hrefTarget: SYS_API_ROOT + 'phpfiles/client_loginout.php',
									leaf: true
								},
								{
									id: 'advice',
									text: '意见与建议',
									hrefTarget: SYS_API_ROOT + 'phpfiles/advice.php',
									leaf: true
								},
								{
									id: 'menu_block',
									text: '黑名单相关',
									expanded: true,
									children: [
                                        {
                                            id: 'block_add',
                                            text: '加入黑名单',
                                            hrefTarget: SYS_API_ROOT + 'phpfiles/user_block.php',
                                            leaf: true
                                        },
                                        {
                                            id: 'blocked_list',
                                            text: '我的黑名单',
                                            hrefTarget: SYS_API_ROOT + 'phpfiles/user_blocked_list.php',
                                            leaf: true
                                        },
										{
											id: 'block_delete',
											text: '解除黑名单',
											hrefTarget: SYS_API_ROOT + 'phpfiles/user_block_delete.php',
											leaf: true
										}
									]
								}
							]
						},
						{
							id: 'menu_oss',
							text: '上传相关',
							expanded: true,
							children: [
								// {
								// 	id: 'oss_sts',
								// 	text: '获取上传凭证STS',
								// 	hrefTarget: SYS_API_ROOT + 'phpfiles/oss_sts.php',
								// 	leaf: true
								// },
								{
									id: 'oss_policy',
									text: '获取Policy',
									hrefTarget: SYS_API_ROOT + 'phpfiles/oss_policy.php',
									leaf: true
								},
								{
									id: 'oss_policy_callback',
									text: '获取Policy及Callback',
									hrefTarget: SYS_API_ROOT + 'phpfiles/oss_policy_callback.php',
									leaf: true
								}
							]
						},
						{
							id: 'menu_community',
							text: '行动社',
							expanded: true,
							children: [
								{
									id: 'community_create',
									text: '创建行动社',
                                    cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/community_create.php',
									leaf: true
								},
								{
									id: 'community_list',
									text: '行动社列表',
									hrefTarget: SYS_API_ROOT + 'phpfiles/community_list.php',
									leaf: true
								},
								{
									id: 'community_detail',
									text: '行动社详情',
									cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/community_detail.php',
									leaf: true
								},
								{
									id: 'Settings',
									text: '设置',
									expanded: true,
									children: [
                                        {
                                            id: 'community_update',
                                            text: '编辑行动社',
											cls: 'redStyle',
                                            hrefTarget: SYS_API_ROOT + 'phpfiles/community_update.php',
                                            leaf: true
                                        },
										{
											id: 'allow',
											text: '是否允许被搜索或被推荐',
											hrefTarget: SYS_API_ROOT + 'phpfiles/community_allow.php',
											leaf: true
										},
										{
											id: 'members',
											text: '成员列表',
											cls: 'redStyle',
											hrefTarget: SYS_API_ROOT + 'phpfiles/members_list.php',
											leaf: true
										},
                                        {
                                            id: 'menu_member',
                                            text: '成员相关',
                                            expanded: true,
                                            children:[
                                                {
                                                    id: 'suspend_member',
                                                    text: '暂停/恢复成员',
                                                    hrefTarget: SYS_API_ROOT + 'phpfiles/members_suspend.php',
                                                    leaf: true
                                                }
                                            ]
                                        },
										{
											id: 'manager',
											text: '设置管理员',
											hrefTarget: SYS_API_ROOT + 'phpfiles/community_manager.php',
											leaf: true
										},
										{
											id: 'transfer',
											text: '转让行动社',
											hrefTarget: SYS_API_ROOT + 'phpfiles/community_transfer.php',
											leaf: true
										},
										{
											id: 'user_info_number',
											text: '获取number用户信息',
											hrefTarget: SYS_API_ROOT + 'phpfiles/user_info_number.php',
											leaf: true
										},
										{
											id: 'report',
											text: '投诉',
											hrefTarget: SYS_API_ROOT + 'phpfiles/community_report.php',
											leaf: true
										},
										{
											id: 'leave',
											text: '退出行动社/辞去管理员',
											hrefTarget: SYS_API_ROOT + 'phpfiles/community_leave.php',
											leaf: true
										}
									]
								},
								{
									id: 'menu_recommend',
									text: '推荐行动社',
									expanded: true,
									children: [
										{
											id: 'recommend_list',
											text: '推荐列表',
											hrefTarget: SYS_API_ROOT + 'phpfiles/recommend_list.php',
											leaf: true
										},
										{
											id: 'free_join',
											text: '免费加入',
											hrefTarget: SYS_API_ROOT + 'phpfiles/community_free_join.php',
											leaf: true
										}
									]
								},
								{
									id: 'search',
									text: '搜索',
									expanded: true,
									children: [
										{
											id: 'search_community',
											text: '搜索行动社',
											hrefTarget: SYS_API_ROOT + 'phpfiles/community_search.php',
											leaf: true
										},
                                        {
                                            id: 'search_act_plan',
                                            text: '搜索行动计划',
                                            hrefTarget: SYS_API_ROOT + 'phpfiles/act_plan_search.php',
                                            leaf: true
                                        }
									]

								}
							]
						},
						{
							id: 'menu_act_plan',
							text: '行动计划',
							expanded: true,
							children: [
								{
									id: 'create',
									text: '创建行动计划',
									hrefTarget: SYS_API_ROOT + 'phpfiles/act_plan_create.php',
									leaf: true
								},
								{
									id: 'update',
									text: '编辑行动计划',
									hrefTarget: SYS_API_ROOT + 'phpfiles/act_plan_update.php',
									leaf: true
								},
								{
									id: 'join',
									text: '参加行动计划',
									hrefTarget: SYS_API_ROOT + 'phpfiles/act_plan_join.php',
									leaf: true
								},
								{
									id: 'join_user',
									text: '我参加的行动计划',
									cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/act_plan_join_user.php',
									leaf: true
								},
								{
									id: 'act_plan_list_by_community',
									text: '行动社下行动计划',
									hrefTarget: SYS_API_ROOT + 'phpfiles/act_plan_community.php',
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
									id: 'task_create',
									text: '创建任务',
									hrefTarget: SYS_API_ROOT + 'phpfiles/task_create.php',
									leaf: true
								},
								{
									id: 'task_update0',
									text: '编辑任务',
									hrefTarget: SYS_API_ROOT + 'phpfiles/task_update.php',
									leaf: true
								},
								{
									id: 'task_list',
									text: '任务列表',
                                    // cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/task_list.php',
									leaf: true
								},
								{
									id: 'task_detail',
									text: '任务详情',
                                    cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/task_detail.php',
									leaf: true
								},
								{
									id: 'task_go',
									text: 'GO',
									hrefTarget: SYS_API_ROOT + 'phpfiles/task_go.php',
									leaf: true
								},
								{
									id: 'challenge',
									text: '挑战相关',
									expanded: true,
									children: [
                                        {
                                            id: 'task_feedback',
                                            text: '反馈状态',
                                            hrefTarget: SYS_API_ROOT + 'phpfiles/task_feedback.php',
                                            leaf: true
                                        },
										{
											id: 'task_feedback_create',
											text: '提交反馈',
											hrefTarget: SYS_API_ROOT + 'phpfiles/task_feedback_create.php',
											leaf: true
										}
									]
								},
								{
									id: 'task_accelerate',
									text: '任务加速',
									hrefTarget: SYS_API_ROOT + 'phpfiles/task_accelerate.php',
									leaf: true
								},
								{
									id: 'feedback',
									text: '反馈相关',
									expanded: true,
									children: [
										{
											id: 'feedback_others',
											text: '反馈列表',
											hrefTarget: SYS_API_ROOT + 'phpfiles/feedback_others_list.php',
											leaf: true
										},
										{
											id: 'feedback_detail',
											text: '反馈详情',
											cls: 'redStyle',
											hrefTarget: SYS_API_ROOT + 'phpfiles/feedback_detail.php',
											leaf: true
										},
										{
											id: 'feedback_pass_or_fail',
											text: '反馈通过或不通过',
											hrefTarget: SYS_API_ROOT + 'phpfiles/feedback_pass_or_fail.php',
											leaf: true
										},
										{
											id: 'feedback_look',
											text: '是否有反馈',
											hrefTarget: SYS_API_ROOT + 'phpfiles/feedback_look.php',
											leaf: true
										}
									]
								}
							]
						},
						{
							id: 'menu_wallet',
							text: '我的钱包',
							expanded: true,
							children: [
								{
									id: 'weixin',
									text: '充值',
									expanded: true,
									children: [
                                        {
                                            id: 'create_order',
                                            text: '创建订单',
                                            hrefTarget: SYS_API_ROOT + 'phpfiles/wallet_create_order.php',
                                            leaf: true
                                        },
                                        {
                                            id: 'prepay',
                                            text: '预支付交易单',
                                            hrefTarget: SYS_API_ROOT + 'phpfiles/wallet_prepay.php',
                                            leaf: true
                                        },
										{
											id: 'waller_user',
											text: '钱包余额',
											hrefTarget: SYS_API_ROOT + 'phpfiles/wallet_user.php',
											leaf: true
										}
									]
								},
								{
									id: 'income_expenses',
									text: '收支明细',
									hrefTarget: SYS_API_ROOT + 'phpfiles/income_expenses.php',
									leaf: true
								},
								{
									id: 'recharge_list',
									text: '充值明细',
									hrefTarget: SYS_API_ROOT + 'phpfiles/wallet_recharge_list.php',
									leaf: true
								}

							]
						},
						{
							id: 'menu_execution',
							text: '行动力',
							expanded: true,
							children: [
								{
									id: 'execution_rank',
									text: '我的行动力和排行榜',
									hrefTarget: SYS_API_ROOT + 'phpfiles/execution_rank.php',
									leaf: true
								},
								{
									id: 'execution_tracker',
									text: '行动力记录',
									hrefTarget: SYS_API_ROOT + 'phpfiles/execution_tracker.php',
									leaf: true
								}
							]
						},
						{
							id: 'menu_communication',
							text: '交流区相关',
							expanded: true,
							children: [
								{
									id: 'communication_create',
									text: '发布条目',
									hrefTarget: SYS_API_ROOT + 'phpfiles/communication_create.php',
									leaf: true
								},
								{
									id: 'communication_list',
									text: '交流区列表',
                                    cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/communication_list.php',
									leaf: true
								},
								{
									id: 'communication_delete',
									text: '删除条目',
									hrefTarget: SYS_API_ROOT + 'phpfiles/communication_delete.php',
									leaf: true
								},
								{
									id: 'do_like',
									text: '点赞/取消点赞',
									hrefTarget: SYS_API_ROOT + 'phpfiles/communication_do_like.php',
									leaf: true
								},
								{
									id: 'communication_detail',
									text: '条目详情',
									hrefTarget: SYS_API_ROOT + 'phpfiles/communication_detail.php',
									leaf: true
								},
								{
									id: 'menu_comment',
									text: '评论相关',
									expanded: true,
									children: [
										{
											id: 'comment_create',
											text: '发评论',
											hrefTarget: SYS_API_ROOT + 'phpfiles/comment_create.php',
											leaf: true
										},
										{
											id: 'comment_list',
											text: '评论列表',
											hrefTarget: SYS_API_ROOT + 'phpfiles/comment_list.php',
											leaf: true
										},
										{
											id: 'comment_do_like',
											text: '点赞/取消点赞',
											hrefTarget: SYS_API_ROOT + 'phpfiles/comment_do_like.php',
											leaf: true
										}
									]
								},
								{
									id: 'communication_user_list',
									text: '用户条目列表',
									hrefTarget: SYS_API_ROOT + 'phpfiles/communication_user_list.php',
									leaf: true
								}
							]
						},
						{
							id: 'menu_notice',
							text: '提醒相关',
							expanded: true,
							children: [
                                {
                                	id: 'notice_look',
									text: '是否提醒',
									hrefTarget: SYS_API_ROOT + 'phpfiles/notice_look.php',
									leaf: true
								},
								{
									id: 'notice_list',
									text: '提醒列表',
									hrefTarget: SYS_API_ROOT + 'phpfiles/notice_list.php',
									leaf: true
								},
								{
									id: 'notice_delete',
									text: '清空提醒',
									hrefTarget: SYS_API_ROOT + 'phpfiles/notice_delete.php',
									leaf: true
								},
								{
									id: 'all_look',
									text:'所有未读',
									hrefTarget: SYS_API_ROOT + 'phpfiles/all_look.php',
									leaf: true
								}
							]
						},
						{
							id: 'wei_xin_menu',
							text: '微信相关',
							expanded: true,
							children: [
								{
									id: 'wei_xin_audio',
									text: '音频uri',
									hrefTarget: SYS_API_ROOT + 'phpfiles/wei_xin_audio.php',
									leaf: true
								}
							]
						},
						{
							id: 'message_menu',
							text: '私信相关',
							expanded: true,
							children: [
								{
									id: 'msg_create',
									text: '发私信',
									hrefTarget: SYS_API_ROOT + 'phpfiles/msg_create.php',
									leaf: true
								},
                                {
                                    id: 'msg_details_list',
                                    text: '私信详情列表',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/msg_details_list.php',
                                    leaf: true
                                },
                                {
                                    id: 'msg_summary_list',
                                    text: '我的私信',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/msg_summary_list.php',
                                    leaf: true
                                },
                                {
                                    id: 'msg_delete',
                                    text: '清空对话',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/msg_delete.php',
                                    leaf: true
                                },
                                {
                                    id: 'msg_look',
                                    text: '是否有新私信',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/msg_look.php',
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