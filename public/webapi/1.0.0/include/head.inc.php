<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//加载系统顶层核心配置文件
require_once dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/include/system.core.php";
//根据文件夹名获取当前版本号（需要区别操作系统）
$path=dirname(dirname(__FILE__));
//if(strrpos($path,"\\"))//如果是windows
if(sys_isLinuxOS())//如果是linux
	$version=substr($path,strrpos($path,"/")+1,strlen($path)-strrpos($path,"/")); 	 

else	
	$version=substr($path,strrpos($path,"\\")+1,strlen($path)-strrpos($path,"\\"));

define("SYS_VERSION",$version);
define("SYS_API_TITLE",SYS_ZH_NAME."__RESTFul API在线手册 ( 版本号: ".SYS_VERSION." )");
define("SYS_API_ROOT",SYS_ROOT_URL."public/webapi/".SYS_VERSION."/");//务必使用虚拟目录的相对路径，提升加载速度
?>
<title><?php echo SYS_API_TITLE?></title>
<script type="text/javascript">
var SYS_API_TITLE="<?php echo SYS_API_TITLE?>";
var SYS_HELPER="系统使用过程中，如有任何问题请联系【唐成勇 QQ在线支持：1946644259】";
var SYS_API_ROOT="<?php echo SYS_API_ROOT?>";
var SYS_EXTJS_URL="<?php echo  SYS_EXTJS_URL?>";
</script>
<!--引入自定义CSS，注意加载顺序和路径写法-->
<link rel="stylesheet" type="text/css" href="<?php echo SYS_EXTJS_URL?>whbstyle.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SYS_EXTJS_URL?>resources/css/ext-all-default.css" />

<script src="<?php echo SYS_EXTJS_URL?>bootstrap.js" ></script>
<script src="<?php echo SYS_EXTJS_URL?>whbfunction.js"></script>
</head>
<body>
<div id="loading-mask"></div> 
<div id="loading">
<img src="<?php echo SYS_EXTJS_URL?>images/loading1.gif"/>&nbsp;&nbsp;正在加载数据，请稍候...
</div>