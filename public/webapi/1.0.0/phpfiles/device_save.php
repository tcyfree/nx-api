<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：硬件注册保存接口</span>
<span class="inforstyle">（<font color="#FF0000">特别注意：每次登录成功后，都要调用此接口，保证服务器获取客户端最新cid </font>只有注册才能收到系统推送通知）</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]device_save</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="23%">参数名称</td>
    <td width="25%">参数说明</td>
    <td width="52%">备注</td>
    </tr>
  <tr>
    <td>token</td>
    <td>登录令牌码</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>deviceid</td>
    <td>登录手机硬件码</td>
    <td>安卓为："cid" 苹果为："devicetoken"</td>
  </tr>
  <tr>
    <td>devicetype</td>
    <td>登录手机类型</td>
    <td> 1:苹果 2:安卓 </td>
  </tr>
  <!--<tr>
      <td>channelid</td>
      <td>百度推送渠道id</td>
      <td>方便直接从百度后台进行推送测试</td>
  </tr>-->
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="31%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"恭喜，操作成功"}</td>
    <td><p>详见（四）特别备注</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>