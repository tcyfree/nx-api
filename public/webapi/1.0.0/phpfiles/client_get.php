<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取用户个人资料接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]client_get</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="14%">参数名称</td>
    <td width="29%">参数说明</td>
    <td width="57%">备注</td>
    </tr>
   <tr>
    <td>token</td>
    <td>登录令牌</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
     <td>id</td>
     <td>通过被访问用户主键获取</td>
     <td><p class="inforstyle">&nbsp;</p></td>
   </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="31%">备注</td>
  </tr>
  <tr>
    <td><p>{"success":true,"msg":"操作成功&quot;,&quot;infor&quot;:json信息串}</p></td>
    <td><p>详见（四）特别备注</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>

<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
<p  class="inforstyle">（1）friendflag: 0：未关注,1：已关注</p>
<p>（2）其余字段请参考 <a href="#" onclick="javascript:sysOpenTab('menu_login','系统登录','phpfiles/client_login.php')">系统登录</a>  接口中的infor字段说明。</p>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>