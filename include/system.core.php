<?php
/*
| --------------------------------------------------------
| 	文件功能：系统通用核心函数定义文件（所有函数均以sys_开头）（表示system系统）
|	程序作者：唐成勇（技术部）
|	特别提示：本核心函数文件作为FrameWork的底层承载部分，由唐成勇专职维护，请勿更改
| --------------------------------------------------------
*/
//嵌入系统核心文件
require_once "config.inc.php";
require_once "language.inc.php";
require_once(dirname(dirname(__FILE__)))."/public/plugins/JWT/jwt.php";//引用jwt机制
//require_once(dirname(dirname(__FILE__)))."/plugins/qiniu/vendor/autoload.php";//引用七牛SDK文件

//重写$_GET,$_POST,$_REQUEST,$_SESSION "读取" 机制，防止sql注入攻击，屏蔽Notice型报警
function _GET($parm){
	return isset($_GET[$parm]) ? sys_check_string($_GET[$parm]) : ""; //默认返回空串
}
function _POST($parm){
	return isset($_POST[$parm]) ? sys_check_string($_POST[$parm]) : ""; //默认返回空串
}
function _REQUEST($parm){
	return isset($_REQUEST[$parm]) ? sys_check_string($_REQUEST[$parm]) : ""; //默认返回空串
}
function _SESSION($parm){
	return isset($_SESSION[$parm]) ? sys_check_string($_SESSION[$parm]) : ""; //默认返回空串
}
//字符串安全过滤，防止sql注入
function sys_check_string($string)
{
	$result=trim(preg_replace('/script|select|insert|update|delete/','',$string));
	//如果项目管理后台有富文本编辑器，请勿屏蔽太多内容
	$result = str_replace("20%",'',$result);//屏蔽空格
	$result = str_replace("'",'',$result);//屏蔽单引号，否则会影响JSON解析
	$result = str_replace('"','',$result);//屏蔽双引号，否则会影响JSON解析
	$result = str_replace('<','《',$result);//转义为中文
	$result = str_replace('>','》',$result);//转义为中文
	return $result;
}

//校正客户端传来的带英文逗号的id数字组合串为标准格式
function sys_get_idlist($id_list)
{
	$start=substr($id_list,0,1);
	$end=substr($id_list,-1);
	if($start==",") $id_list=substr($id_list,1);
	if($end==",") $id_list=substr($id_list,0,-1);
	return $id_list;
}
//将带英文逗号的字母组合串格式化输出（sql中in 对字符串必须加引号）
function sys_get_strlist($parm_list)
{
	$str_list=sys_get_idlist($parm_list);
	$temp_array = explode(',', $str_list);
	foreach ($temp_array as $k => $v) {
		$temp_array[$k] = "'".$v."'";
	}
	$str_list = implode(',', $temp_array);
	return $str_list;
}


//判断操作系统类型
function sys_isLinuxOS()
{
	return (strrpos(strtolower(PHP_OS),"win") === false);
}

//获取系统提示语 language.inc.php
function sys_get_msg($parm){
	global $msg;
	return $msg[$parm];
}


//获取系统唯一串号
function sys_get_no()
{
	//时间戳再加4位随机数，共18位
	return date("YmdHis").sys_create_code();
}
//获取系统交易订单号（统一支付宝，微信交易单号）
function sys_get_payno($type_prefix="wx")//默认充值类型
{
	//格式形如："支付类型前缀+14位时间戳+4位随机数+"ID"+client_id(非固定长度)"（举例：wx201612281644572812CID7）；
	return $type_prefix.date("YmdHis").sys_create_code()."CID".sys_get_cid();
}
//获取4位定长数字随机串
function sys_create_code()
{
	return rand(1000,9999);
}
//向客户端发送JSON串
function sys_out_json($parm_array)
{
	//防止PHP自带json_encode函数把中文转成unicode(必须是PHP5.4以上版本)
	//die(json_encode($parm_array,JSON_UNESCAPED_UNICODE));
	/**
	 * 添加接口处理时间
	 */
	$parm_array['processTime'] = sys_processTime();

	if (version_compare(PHP_VERSION,'5.4.0','<'))
        echo json_encode($parm_array);
    else{
		//PHP5.4才支持JSON_UNESCAPED_UNICODE这个参数，此参数是让中文字符在json_encode的时候不用转义，减少数据传输量。
		echo json_encode($parm_array, JSON_UNESCAPED_UNICODE);
	}
	die();//非常重要，请勿删除
}

//向客户端输出错误信息(500表示是服务器端异常错误，需要重试)
function sys_out_fail($parmMsg=NULL,$errorNumber=500)
{
	unset($result_array);
	$result_array['success'] = false;//注意：为了和extjs兼容，此处必须不带引号

	if(empty($parmMsg)) $parmMsg="操作失败！";
	else $parmMsg=	$parmMsg;

	$result_array['msg'] = $parmMsg;
	$result_array['error_code'] = $errorNumber;

	sys_out_json($result_array);
}
//向客户端输出成功信息
function sys_out_success($parmMsg=NULL,$infor_array=NULL)
{
	unset($result_array);
	$result_array['success'] = true;//注意：为了和extjs兼容，此处必须不带引号

	if(empty($parmMsg)) $parmMsg="操作成功！";

	$result_array['msg'] = $parmMsg;
	$result_array['infor'] = $infor_array;//固定输出infor字段，以适配各种复杂情况
	sys_out_json($result_array);
}

//封装一下简单（默认）输出(result一般是数据库操作返回影响的行数)
function sys_out_result($result,$msg = null)
{
	if($result != 0)
		sys_out_success($msg);
	else
		sys_out_fail($msg);
}
//封装一下简单输出(404专用于处理客户端id传错时的情况)
function sys_out_404()
{
	sys_out_fail(sys_get_msg(404),404);
}


//重写判空函数（把0排除）
function sys_check_empty($parm)
{
	if(!isset($parm) || strlen(trim($parm))==0)
		return true;
	return false;
}
//检测多个post参数是否完整并且不为空值
function sys_check_post($post_array) {
	foreach ($post_array as $parm) {
		if (!isset($_POST[$parm]) || sys_check_empty($_POST[$parm])) {
			sys_out_fail($parm." 参数不能为空",100);
		}
	}
}
//检测单个post参数是否完整（前台不再生成数组以便节省开销）
function sys_check_post_single($parm)
{
	if (!isset($_POST[$parm]) || sys_check_empty($_POST[$parm]) || $_POST[$parm]=='null') {
		sys_out_fail($parm." 参数不能为空",100);
	}
}

//防止枚举类型非法提交
function sys_check_keytype($parmType,$maxValue)
{
	if(!is_numeric($parmType) || $parmType>$maxValue ||$parmType<0)
		sys_out_fail('keytype取值范围不正确',101);
}

//后台管理员登录有效性检测，为提高调试效率暂时屏蔽
function sys_check_admin()
{
	if (!_SESSION('admin_id')) {
		/*echo "没有登录";
		header("location:".ADMIN_ROOT_URL."index.html");*/
		sys_out_fail(sys_get_msg(200),200);
		exit(0);
	}
}

function sys_check_temp_token()
{
	//!_SESSION('temp_token')防止不登录直接调用方法
	if(_SESSION('temp_token')!=_POST('temp_token') || !_SESSION('temp_token')){
		sys_out_fail(sys_get_msg(200),200);
	}
}

//退出登录
function sys_login_out()
{
	session_unset(); //释放内存
	session_destroy(); //删除临时文件
}

//根据client_id来生成并返回token
/**
 * 功能：生成Token信息串
 * @param $client_id  用户id
 * @param $salt 干扰字符串
 * @param $iat iat(issued at): 在什么时候签发的(UNIX时间)，是否使用是可选的；
 * @param $exp exp(expires): 什么时候过期，这里是一个Unix时间戳，是否使用是可选的；
 * @return string
 */
function sys_get_token($client_id)
{
	$Payload['client_id'] = $client_id;
	//获取4位定长数字随机串
	$Payload['salt'] = sys_create_code();
	//在什么时候签发的(UNIX时间)，是否使用是可选的；
	$Payload['iat'] = time();
	//什么时候过期，这里是一个Unix时间戳，是否使用是可选的；
	$Payload['exp'] = strtotime("+3650 day");

	$myToken = jwt_encode($Payload);

	return $myToken;
}
//根据client_key和user_id来生成并返回ck
function sys_get_ck($client_key,$user_id)
{
	$ck =thrift_get_ck($client_key,$user_id);
	return $ck;
}
//根据ck，client_key, client_secret来生成并返回access_token
function sys_access_token($temp_array)
{
	$access_token =thrift_access_token($temp_array);
	return $access_token;
}
/**
 * 检查登录令牌是否有效(此处直接为检查$_POST['token']）,防止不登录直接调用方法。
 * 当检测成功后，$client_id = $_SESSION['client_id'],不必再次调用sys_get_cid();
 */
function sys_check_token()
{
	try {
		$client_id = sys_get_cid();

		if(empty($client_id)){
			throw new Exception();
		}

		$_SESSION['client_id'] = $client_id;

	} catch (Exception $e) {
		//捕获JWT抛出的异常，Wrong number of segments
		sys_out_fail(sys_get_msg(200),200);
	}

}

/**
 * 1、通过access_token 拿用户ID，当为0时兼容无登录状态查看帖子详情；
 * 2、此函数同时兼容不强制要求token的接口。
 * @return int|mixed
 */
function sys_get_cid()
{
	//检查post完整性
	if (!isset($_SERVER['HTTP_TOKEN']) || sys_check_empty($_SERVER['HTTP_TOKEN'])) {
		sys_out_fail("token 参数不能为空",100);
	}
	try {

		$client_id = jwt_decode($_SERVER['HTTP_TOKEN']);

	} catch (Exception $e) {
		//捕获JWT抛出的异常，Wrong number of segments
		$client_id = 0;
		return $client_id;
	}

	return $client_id;

}function sys_get_temp_token($parmStr)
{
	$myToken= "TK_".sys_create_code()."_".$parmStr;//命名规则：TK_6位随机数_用户登录名(此登录名重设密码时需要用到，不可或缺)
	$_SESSION['temp_token']=$myToken;
	$_SESSION['mobile'] = $parmStr;
	return $myToken;
}

//////////////////============= 手机&邮件发送 =============////////////////////

//发送验证码，并且60s时效
function sys_send_code($username)
{

	if(SYS_DEBUG_MODE)
	{
        $_SESSION['last_access'] = time();
        $_SESSION['mobile'] = $username;
		$_SESSION['verify_code']='1234';   //测试阶段，固定使用1234
		sys_out_success('开发模式，验证码默认为：1234');
	}
	else
	{
		//超过60秒才能再次请求发送验证码 !isset($_SESSION['last_access'])||
		if((time()-$_SESSION['last_access']) <= 60){
			sys_out_fail("距离上次获取验证码未超过60s！");
		}
		$_SESSION['last_access'] = time();
		$_SESSION['verify_code']=sys_create_code();
		$content="为：".$_SESSION['verify_code'];//4位验证码

		//将xml数据转换成数组格式
		$res_array = (array)send_verify_code($username,$content);//如果是手机验证，则需要发送手机短信
		$ret = (array)$res_array['result'];
		if($ret['success'] == true){
			sys_out_success('验证码发送成功！');
		}else{
			//记录错误日志
			sys_log($res_array);
			sys_out_fail('发送失败！错误码：'.$res_array['sub_code'].'错误描述：'.$res_array['sub_msg']);
		}
	}
}
//澳门电信发送验证码，并且60s时效
function tel_send_code($username)
{
    $_SESSION['mobile'] = $username;

    if(SYS_DEBUG_MODE)
    {
        $_SESSION['last_access'] = time();
        $_SESSION['verify_code']='1234';   //测试阶段，固定使用1234
        sys_out_success('开发模式，验证码默认为：1234');
    }
    else
    {
        //超过120秒才能再次请求发送验证码 !isset($_SESSION['last_access'])||
        if((time()-$_SESSION['last_access']) <= 120){
            sys_out_fail("距离上次获取验证码未超过120s！");
        }
        $_SESSION['last_access'] = time();
        $_SESSION['verify_code']=sys_create_code();
        $verify_code = $_SESSION['verify_code'];//4位验证码

        //将xml数据转换成数组格式
        $ret = sendSMS($username,$verify_code);//如果是手机验证，则需要发送手机短信

        if($ret == true){
            sys_out_success('验证码发送成功！');
        }else{
            //记录错误日志
            sys_log($ret);
            sys_out_fail('发送失败！错误描述：'.$ret);
        }
    }
}
//验证随机码是否正确
function sys_check_code($parmCode)
{
	if(SYS_DEBUG_MODE)
	{
		if($parmCode == "1234")
			return true;//测试阶段固定传1234
	}
	else
	{
		if($_SESSION['verify_code'] && $parmCode ==$_SESSION['verify_code']){
			//这句是让验证码被使用后就立刻失效.
//			unset($_SESSION['verify_code']);
			return true;//正式部署
		}

	}

	sys_out_fail(sys_get_msg(103),103);
}

//获取并格式化当前时间
function sys_get_time()
{
	return date("Y-m-d H:i:s",time());
}

//////////////////=================== 系统检查 =====================////////////////////

//判断邮箱是否合法（正则表达式）
function sys_check_email($email)
{
	$pregEmail = "/([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i";
    $check_result=preg_match($pregEmail,$email);
	if($check_result) return true;
	return false;
}

//关闭数据库连接，释放内存资源
function sys_close_db($sql_helper)
{
	//手动关闭连接和释放资源
	if($sql_helper)
	{
		$sql_helper->close();
		unset($sql_helper);
	}
}

//通过curl方式获取远程网址内容（file_get_contents(url)效率不如curl高）
function sys_get_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);            //设置访问的url地址
    //curl_setopt($ch,CURLOPT_HEADER,1);            //是否显示头部信息
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);           //设置超时
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);      //跟踪301
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        //返回结果
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

////根据汉字获取拼音
function sys_get_pinyin($str, $charset="utf-8") {
		$restr = '';
		$str = trim($str);
		if ("utf-8" == $charset) {
			$str = iconv("utf-8", "gb2312", $str);
		}
		$slen =strlen($str);
		$pinyins = array();
		$fp = fopen(SYS_ROOT_PATH.'plugins/pinyin.dat', 'r');
		while (!feof($fp)) {
			$line = trim(fgets($fp));
			$pinyins[$line[0] . $line[1]] = substr($line, 3, strlen($line)-3);
		}
		fclose($fp);
		for ($i=0; $i<$slen; $i++) {
			if (ord($str[$i]) > 0x80) {
				$c = $str[$i] . $str[$i+1];
				$i++;
				if (isset($pinyins[$c])) {
					$restr .= $pinyins[$c];
				}else {
					$restr .= "_";
				}
			}elseif (preg_match("/[a-z0-9]/i", $str[$i])) {
				$restr .= $str[$i];
			}else {
				$restr .= "_";
			}
		}
		return $restr;
}
//输出信息到系统日志文件（极端复杂情况下非常实用，请勿删除）
//请注意服务器是否开通fopen配置
function  sys_log($content) {
	if(SYS_DEBUG_MODE)
	{
		$fp = fopen(SYS_ROOT_PATH."sys_debug.log","a+");//
		flock($fp, LOCK_EX) ;
		fwrite($fp,"[".date("Y-m-d H:i:s",time())."]".$content."\n");
		flock($fp, LOCK_UN);
		fclose($fp);
	}
}


/**
 * 接口响应时间
 */
function sys_processTime(){

	$endtime = explode(" ", microtime());
	$endTime = $endtime[1] + $endtime[0];
	$totaltime = ($endTime - $GLOBALS['_beginTime']);
	$processTime = number_format($totaltime, 7);
//	echo "process time: ".$totaltime;
	return $processTime.'s';
}
?>
