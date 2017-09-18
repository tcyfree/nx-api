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
                                // {
									// id: 'user_token',
									// text: '获取token',
									// hrefTarget: SYS_API_ROOT + 'phpfiles/user_token.php',
									// leaf: true
                                // },
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
								{
									id: 'oss_sts',
									text: '获取上传凭证STS',
									hrefTarget: SYS_API_ROOT + 'phpfiles/oss_sts.php',
									leaf: true
								},
								{
									id: 'oss_policy',
									text: '获取policy及签名 ',
									hrefTarget: SYS_API_ROOT + 'phpfiles/oss_policy.php',
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
											id: 'report',
											text: '投诉',
											hrefTarget: SYS_API_ROOT + 'phpfiles/community_report.php',
											leaf: true
										},
										{
											id: 'leave',
											text: '退出行动社',
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
									id: 'task_accelerate',
									text: '任务加速',
									hrefTarget: SYS_API_ROOT + 'phpfiles/task_accelerate.php',
									leaf: true
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