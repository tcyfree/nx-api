<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取关注数信息</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]follow_num</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
 <tr class="td_header">
    <td width="106">参数名称</td>
    <td>参数说明</td>
    <td width="533">备注</td>
  </tr>
 <tr>
     <td>client_id</td>
     <td>登录令牌</td>
     <td width="533">&nbsp;</td>
   </tr>

</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="47%">响应结果</td>
    <td width="53%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功",&quot;infor&quot;:json信息}</td>
    <td><p>关注数</p></td>
  </tr>
  <?php require_once("../include/error.inc.php");?>
  <?php require_once("../include/totalCount.inc.php");?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php require_once("../include/foot.inc.php");?>