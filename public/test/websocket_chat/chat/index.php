<?php
session_start();
include './Mysql.class.php';

//模拟一个随机用户  生产环境需要根据登录的用户来获取用户名等信息
if(!isset($_SESSION['user'])){
	$_SESSION['user'] = getUser();
}
//定义一个频道(最好加密)
if(!isset($_SESSION['channel']) || $_SESSION['channel'] == '' ){
	$_SESSION['channel'] ='ch2';
}

$db = new Mysql($config);
$data = $db->select('channel',[],"name='{$_SESSION['channel']}'");

$msgs = $db->order('id desc')->limit('5')->select('message',[],"ch_id='{$data[0]['id']}'");


//生成随机用户函数(生产环境直接使用登录的用户名即可)
function getUser($length = 5)
{ 
	$str = '';
	for ($i = 0; $i < $length; $i++) 
	{ 
		$str .= chr(mt_rand(65, 90)); 
	} 
	return $str; 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线聊天</title>
<link rel="stylesheet" type="text/css" href="css/chat.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
<script src="js/pushstream.js" type="text/javascript" language="javascript" charset="utf-8"></script>

<?php
$host = "192.168.31.223"; //聊天服务器主机地址
$port = "8080";//端口
$sendurl = "send.php";//发送数据时接收数据的地址 可以是http://*** 如果需要跨域需要使用jsonp形式
?>

<script type="text/javascript" language="javascript" charset="utf-8">
    //有数据返回时执行
    function messageReceived(text, id, channel) {

		var data = $.parseJSON(text.replace(/'/g,'"'));
		var str = '<div class="message clearfix" >' + '<div class="wrap-text"><h5 class="clearfix">' + data.user + '</h5><div>'  + data.msg.replace("*#", "<img src='img/").replace("#*", ".gif'/>") + '</div></div>' + '<div class="wrap-ri"><div clsss="clearfix"><span>' + data.time + '</span></div></div><div style="clear:both;"></div></div>';

		$('#msg').append(str);
		$('#chat01_content').scrollTop( $('#chat01_content')[0].scrollHeight );
        getUser(data.user);
    };

    var pushstream = new PushStream({
      host: "<?php echo $host;?>",
      port: "<?php echo $port;?>",
      modes: "websocket",
      messagesPublishedAfter: 5,
      messagesControlByArgument: true
    });
    pushstream.onmessage = messageReceived;
    pushstream.addChannel('<?php echo $_SESSION['channel'];?>');
    pushstream.connect();
    

	//发送数据
	function send(){
		 var msg = $("#textarea").val();
		 if(msg != ''){
			 $("#textarea").val('');
			 $.post("<?php echo $sendurl;?>",{msg:msg},function(result){
					//
			 });
		 }
	}
	//获取当前聊天用户
	function getUser(username){
		 var key = new Array();
		 if(username != ''){
			key[0] = username;
		 }
		$(".chat03_content ul").each(function () {  
         $(this).find('li').each(function() {
			 if($(this).text() != username){
				key.push($(this).text());
			 }
         });
      });
	  var str = '';
      //遍历该数组可以获取所有值
      for (var i = 0 ; i < key.length; i++) {
		  str += '<li><a href="javascript:;" class="chat03_name">' + key[i] +  '</a></li>';
      }
	  $(".chat03_content ul").html(str);
	}
</script>
<!--[if lt IE 7]>
<script src="js/IE7.js" type="text/javascript"></script>
<![endif]-->
<!--[if IE 6]>
<script src="js/iepng.js" type="text/javascript"></script>
<script type="text/javascript">
EvPNG.fix('body, div, ul, img, li, input, a, span ,label'); 
</script>
<![endif]-->
</head>
<body>

    <div class="content">
	
        <div class="chatBox">
		
            <div class="chatLeft">
                <div class="chat01">
                    <div class="chat01_title">
                        <ul class="talkTo">
                           
						</ul>
                        <a class="close_btn" href="javascript:;"></a>
                    </div>

                    <div class="chat01_content" id="chat01_content">
                       
                        <div class="message_box mes3" style="display: block;" id="msg">

						
                        </div>
                     
                    </div>
                </div>
                <div class="chat02">
                    <div class="chat02_title">
                        <a class="chat02_title_btn ctb01" href="javascript:;"></a>
                       
                        <div class="wl_faces_box">
                            <div class="wl_faces_content">
                                <div class="title">
                                    <ul>
                                        <li class="title_name">常用表情</li><li class="wl_faces_close"><span>&nbsp;</span></li></ul>
                                </div>
                                <div class="wl_faces_main">
                                    <ul>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_01.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_02.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_03.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_04.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_05.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_06.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_07.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_08.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_09.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_10.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_11.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_12.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_13.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_14.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_15.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_16.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_17.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_18.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_19.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_20.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_21.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_22.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_23.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_24.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_25.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_26.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_27.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_28.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_29.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_30.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_31.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_32.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_33.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_34.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_35.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_36.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_37.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_38.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_39.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_40.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_41.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_42.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_43.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_44.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_45.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_46.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_47.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_48.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_49.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_50.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_51.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_52.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_53.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_54.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_55.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_56.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_57.gif" /></a></li>
                                        <li><a href="javascript:;">
                                            <img src="img/emo_58.gif" /></a></li><li><a href="javascript:;">
                                                <img src="img/emo_59.gif" /></a></li><li><a href="javascript:;">
                                                    <img src="img/emo_60.gif" /></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wlf_icon">
                            </div>
                        </div>
                    </div>
                    <div class="chat02_content">
                        <textarea id="textarea"></textarea>
                    </div>
                    <div class="chat02_bar">
                        <ul>
                                 <li style="right: 5px; top: 5px;">
								 <a href="javascript:;">
                                <img src="img/send_btn.jpg"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="chatRight">
                <div class="chat03">
                    <div class="chat03_title">
                        <label class="chat03_title_t">
                            成员列表</label>
                    </div>
                    <div class="chat03_content">
                        <ul><li><a href="javascript:;" class="chat03_name"></a></li></ul>
                    </div>
                </div>
            </div>
            <div style="clear: both;">
            </div>
        </div>
    </div>
<div style="width:300px;text-align:center;margin:0px auto; font:normal 14px/24px 'MicroSoft YaHei';">
<p><h2>测试聊天，随机生成用户名</h2></p>
<p><a href="https://www.liminghulian.com" target="_blank" >本测试demo来自黎明互联官方https://www.liminghulian.com</a>更多资源请访问官网</p>
</div>

<script>
<?php
sort($msgs);
foreach($msgs as $v){
	echo "messageReceived(\"{$v['content']}\", '', '');";
}

?>
</script>
</body>
</html>