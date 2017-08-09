<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取微信认证地址(登录)</span>
<!--<span class="inforstyle">（<font color="red">获取access_token</font>）</span></p>-->
</p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]auth_getcode</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="190">参数名称</td>
    <td width="127">参数说明</td>
    <td width="562">备注</td>
    </tr>
    
   <tr>
     <td>client_id</td>
     <td></td>
     <td><p></p></td>
   </tr>
  <tr>
    <td>token</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>


</table>

<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="53%">响应结果</td>
    <td width="47%" colspan="2">结果说明备注</td>
    </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功！","infor":{"client_id":47},"processTime":"0.4217389s"}</td>
    <td colspan="2"><p>&nbsp;</p>1.返回结果是client_id字段表明该用户没有绑定电话号码
    <p>2.返回token表明用户正常登录成功了</p></td>
    </tr>
<?php require_once("../include/error.inc.php");?></table>
</div>


<?php require_once("../include/foot.inc.php");?>