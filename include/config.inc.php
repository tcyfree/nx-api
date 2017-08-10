<?php
/*
| --------------------------------------------------------
| 	文件功能：系统顶层核心配置文件
|	程序作者：唐成勇（技术部）
|	时间版本：2017-01-06
| --------------------------------------------------------
*/
/*
| --------------------------------------------------------
定义系统调试模式开关,false:关闭 true:开启（可打印详细错误信息,正式上线请设置为false）
特别注意：
（1）验证码1234和苹果测试推送严格依赖此开关标记
当SYS_DEBUG_MODE为true时，验证码为1234，苹果推送为测试环境推送；
当SYS_DEBUG_MODE为false时，验证码为真实码，苹果推送必须AppStore上线后才能收到
（2）支付宝或银联在调试模式下会记录日志到 插件根目录\log.txt
| --------------------------------------------------------
*/
define("SYS_DEBUG_MODE",true);
define("SYS_SERVER_TYPE",1);//1:本机localhost 2:公司测试机146  3：公司正式服务器 4:客户正式服务器
define("SYS_GROUP_NAME","group1");//    group1是开发小组名，需要换成你自己的
define("SYS_UPLOAD_MAX",5);//上传文件最大限制，单位：M（需要php.ini环境支持）
/*
| --------------------------------------------------------
定义项目基本配置信息
| --------------------------------------------------------
*/
define("HEMA_PID","5");//定义公司分配的项目编号（非常重要,比如调用公司短信网关等）
define("HEMA_PWD","kSwzv6IOrdgq5PUn");//定义公司分配的项目登录密码，非常重要
define("SYS_EN_NAME","nx-xds");	//定义项目英文名称
define("SYS_ZH_NAME","行动社"); 		//定义项目中文名称（不允许超过6个汉字）
define("SYS_COMPANY","深圳暖象科技有限公司");  //定义客户公司名称
define("SYS_SERVICE_PHONE","010-5762-6310");	//定义客户公司电话

define("ANDROID_MUST_UPDATE","0"); 		//安卓客户端强制更新，0：不强制 1：强制
define("ANDROID_LAST_VERSION","1.0.0");//安卓最新版本号，客户端升级使用
define("IPHONE_MUST_UPDATE","0"); 		//苹果客户端强制更新，0：不强制 1：强制
define("IPHONE_LAST_VERSION","1.0.0");	//苹果最新版本号，客户端升级使用

switch(SYS_SERVER_TYPE)
{
	case 1://本机localhost
		define("SYS_SERVER_IP","localhost");
		define("SYS_ROOT","http://".SYS_SERVER_IP."/".SYS_EN_NAME."/");	//定义项目根地址(网络绝对路径)
		define("SYS_ROOT_URL","/");			//定义项目根地址（本地相对路径）
		define('DB_HOST', 'localhost');	//数据库服务器主机地址(此处可以使用内网IP提升速度)
		define('DB_USER', 'nx-xds'); 		//数据库帐号
		define('DB_PWD', 'Nx-xds2017'); 		//数据库密码
		define('DB_NAME', 'nx-xds'); 	//数据库名
		break;

	case 2://公司正式服务器
		define("SYS_SERVER_IP","nx-xds.com");	//此处必须是域名
		define("SYS_ROOT","http://".SYS_SERVER_IP."/".SYS_EN_NAME."/");	//定义项目根地址(网络绝对路径)	
		define("SYS_ROOT_URL","/".SYS_EN_NAME."/");					//定义项目根地址(本地相对路径)	
		define('DB_HOST', '127.0.0.1');		//数据库服务器主机地址(此处可以使用内网IP提升速度)
		define('DB_USER', 'root'); 			//数据库帐号
		define('DB_PWD', 'XXXX'); 	//数据库密码
		break;

	default:
		die("服务器类型配置错误");
}

/*
| --------------------------------------------------------
定义业务耦合信息（此区域请根据业务情况适当配置和扩展）
| --------------------------------------------------------
*/
define("SYS_ANDROID_URL",SYS_ROOT."download/com.example.zhijianyuechuang.playmusic.apk");//定义Android升级路径
define("SYS_IPHONE_URL","https://itunes.apple.com/cn/app/biaobiao/id844008952?mt=8");//定义iPhone升级路径

//↓↓↓↓↓↓↓以下配置信息，如无特殊需要，请勿随便改动↓↓↓↓↓↓↓

/*
| --------------------------------------------------------------------
定义系统运行级别信息（以下区域内的配置，如无特殊情况，请勿改动）
| --------------------------------------------------------------------
*/

define("SYS_ROOT_PATH",dirname(dirname(__FILE__))."/");	 //定义项目根地址(本地绝对路径)system.core.php使用
define("SYS_PAGE_SIZE",10);								//定义列表页面数量大小
define("SYS_DENY_MSG","非法访问！请联系管理员。【唐成勇 QQ:1946644259】");//定义错误提示信息
define("SYS_ERROR_MSG","系统运行异常，请联系管理员。【唐成勇 QQ:1946644259】");//定义错误提示信息
define("SYS_WEB_SERVICE",SYS_ROOT."index.php/webservice/");		//定义WebService配置路径(网络绝对路径)
define("SYS_PLUGINS",SYS_ROOT."plugins/");						//定义插件根路径（网络绝对路径）
define("SYS_PLUGINS_URL",SYS_ROOT_URL."plugins/");		//定义插件根路径（本地相对路径）
define("SYS_EXTJS_URL",SYS_ROOT_URL."plugins/extjs4/");	//定义ExtJS配置路径（本地相对路径）
define("ADMIN_ROOT_URL",SYS_ROOT_URL."web/Webadmin/");	//定义管理后台根路径（本地相对路径）
/*
| --------------------------------------------------------
定义头部信息
| --------------------------------------------------------
*/
error_reporting(E_ALL & ~E_NOTICE);//设置系统错误提示级别，非常重要
date_default_timezone_set('PRC'); //设置时区为中国，非常重要

ini_set("session.cookie_httponly", 1);
session_start();//启用session机制，非常重要,切勿删除

header("Access-Control-Allow-Origin:*");

header('content-type:application:json;charset=utf8');

?>