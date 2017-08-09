<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：验证用户名是否合法</span>
<span class="inforstyle">（<font color="red">先验证用户名，再申请和验证随机码，最后调用重设密码</font>）</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]client_verify</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td>参数名称</td>
    <td width="226">参数说明</td>
    <td width="533">备注</td>
  </tr>
  <tr>
    <td>username</td>
    <td width="226">用户登录名</td>
    <td width="533">手机号码</td>
  </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="31%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功"}</td>
    <td><p>详见（四）特别备注</p></td>
  </tr>
  <?php require_once("../include/error.inc.php");?>
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>