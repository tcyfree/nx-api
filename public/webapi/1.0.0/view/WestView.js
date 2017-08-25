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
					iconCls: 'menuroot',
					expanded: true,
					children: [
						{
							id: 'menu_errorcode',
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
                                        }
									]
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