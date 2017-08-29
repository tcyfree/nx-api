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
								{
									id: 'user_login',
									text: '微信授权',
									//cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/client_login.php',
									leaf: true
								},
								{
									id: 'user_token',
									text: '获取token',
									hrefTarget: SYS_API_ROOT + 'phpfiles/user_token.php',
									leaf: true
								},
								{
									id: 'user_info',
									text: '用户信息',
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
									text: '获取上传凭证',
									hrefTarget: SYS_API_ROOT + 'phpfiles/oss_sts.php',
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