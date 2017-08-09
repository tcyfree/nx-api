<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>


<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：添加收货地址接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]address_add</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="134">参数名称</td>
    <td width="189">参数说明</td>
    <td width="581">备注</td>
    </tr>
  <tr>
    <td>token</td>
    <td width="189">登录令牌</td>
    <td width="581">&nbsp;</td>
  </tr>
 <tr>
     <td>name</td>
     <td>收货人姓名</td>
     <td width="581"></td>
 </tr>
  <tr>
     <td>mobile</td>
     <td>收货人电话</td>
     <td width="581">11位</td>
 </tr>
    <tr>
        <td>email</td>
        <td>邮箱</td>
        <td width="581"></td>
    </tr>
 <tr>
     <td>add_district</td>
     <td>省、市、区</td>
     <td width="581">

     </td>
 </tr>
    <tr>
     <td>add_details</td>
     <td>详细地址</td>
     <td width="581">

     </td>
 </tr>
    <tr>
        <td>orderby</td>
        <td width="300"></td>
        <td width="395">首次添加地址：orderby = 1
            否则：orderby = 0</td>
    </tr>

</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="49%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功！！"}</td>
    <td></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>