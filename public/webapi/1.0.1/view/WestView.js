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
                            text: '行动社相关',
                            expanded: true,
                            children: [
                                {
                                    id: 'community_list',
                                    text: '行动社列表',
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/community_list.php',
                                    leaf:true
                                },
								{
									id: 'community_profile',
									text: '行动社简介',
									cls: 'redStyle',
									hrefTarget: SYS_API_ROOT + 'phpfiles/community_profile.php',
									leaf:true
								}
                            ]
                        },
						{
							id: 'community_user',
							text: '行动社用户相关',
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
                                    hrefTarget: SYS_API_ROOT + 'phpfiles/activity_list.php',
                                    leaf: true
                                },
								{
									id: 'activity_get',
									text: '详情',
									hrefTarget: SYS_API_ROOT + 'phpfiles/activity_get.php',
									leaf: true
								},
								{
									id: 'activity_put',
									text: '编辑',
									hrefTarget: SYS_API_ROOT + 'phpfiles/activity_put.php',
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
									hrefTarget: SYS_API_ROOT + 'phpfiles/course_list.php',
									leaf: true
								},
								{
									id: 'course_get',
									text: '详情',
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