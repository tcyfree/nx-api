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
				// 	{
				// 	id: 'menu_get_init',
				// 	text: '系统初始化',
				// 	hrefTarget: SYS_API_ROOT + 'phpfiles/init.php',
				// 	leaf: true
				// },
				{
					id: 'menu_errorcode',
					text: '错误编码表',
					hrefTarget: SYS_API_ROOT + 'phpfiles/error_code.php',
					leaf: true
				},
					{
                        id:'menu_slide_root',
                        text:'展示相关',
                        hrefTarget:SYS_API_ROOT + 'phpfiles/slide.php',
                        leaf: true
                    },
				{
					id: 'menu_sys_verify',
					text: '验证相关',
					expanded: true,
					children: [
					{
						id: 'menu_get_code',
						text: '随机码获取',
						hrefTarget: SYS_API_ROOT + 'phpfiles/code_get.php',
						leaf: true
					},
						]
				},
				//{
				//	id: 'menu_file_root',
				//	text: '文件相关',
				//	expanded: false,
				//	children: [{
				//		id: 'menu_upload_file',
				//		text: '文件上传',
				//		hrefTarget: SYS_API_ROOT + 'phpfiles/file_upload.php',
				//		leaf: true
				//	}	]
				//},
				{
					id: 'menu_client_root',
					text: '用户相关',
					expanded: true,
					children: [{
						id: 'menu_login',
						text: '用户登录',
						//cls: 'redStyle',
						hrefTarget: SYS_API_ROOT + 'phpfiles/client_login.php',
						leaf: true
					},
					{
						id: 'menu_login_out',
						text: '退出登录',
						hrefTarget: SYS_API_ROOT + 'phpfiles/client_loginout.php',
						leaf: true
					},
					{
						id: 'menu_reg',
						text: '用户注册',
						hrefTarget: SYS_API_ROOT + 'phpfiles/client_add.php',
						leaf: true
					},

						{
							id: 'menu_reset_password',
							text: '忘记密码',
							hrefTarget: SYS_API_ROOT + 'phpfiles/password_reset.php',
							leaf: true
						}

						]
					},
					{
					id: 'menu_blog_root',
					text: '楼盘相关',
					//cls: 'redStyle',
					expanded: true,
					children: [
						{
							id: 'menu_get_blog_list',
							text: '楼盘列表',
							hrefTarget: SYS_API_ROOT + 'phpfiles/blog_list.php',
							leaf: true
						},
                        {
                            id: 'menu_get_link_list',
                            text: '推荐公司',
                            hrefTarget: SYS_API_ROOT + 'phpfiles/link.php',
                            leaf: true
                        },
					{
						id: 'menu_get_blog_detail',
						text: '楼盘详情',
						hrefTarget: SYS_API_ROOT + 'phpfiles/blog_get.php',
						leaf: true
					},
                        {
                            id: 'menu_reply_add',
                            text: '评论添加',
                            hrefTarget: SYS_API_ROOT + 'phpfiles/reply_add.php',
                            leaf: true
                        },
                        {
                            id: 'menu_get_reply_list',
                            text: '评论列表',
                            hrefTarget: SYS_API_ROOT + 'phpfiles/reply_list.php',
                            leaf: true
                        },
                        {
                            id: 'menu_get_space_list',
                            text: '空间列表',
                            hrefTarget: SYS_API_ROOT + 'phpfiles/space_list.php',
                            leaf: true
                        },
                        {
                            id: 'menu_get_space_detail',
                            text: '空间详情',
                            hrefTarget: SYS_API_ROOT + 'phpfiles/space_get.php',
                            leaf: true
                        },
                        {
                            id: 'menu_get_news_list',
                            text: '新闻列表',
                            hrefTarget: SYS_API_ROOT + 'phpfiles/news_list.php',
                            leaf: true
                        },
                        {
                            id: 'menu_get_news_get',
                            text: '新闻详情',
                            hrefTarget: SYS_API_ROOT + 'phpfiles/news_get.php',
                            leaf: true
                        },
					{
						id: 'menu_dolike',
						text: '收藏',
						hrefTarget: SYS_API_ROOT + 'phpfiles/dolike.php',
						leaf: true
					},
                        {
                            id: 'menu_unsell',
                            text: '經紀公司代理的在租售的空间列表',
                            hrefTarget: SYS_API_ROOT + 'phpfiles/unsell.php',
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