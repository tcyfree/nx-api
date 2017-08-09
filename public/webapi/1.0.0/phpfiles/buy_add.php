<?php require_once("../include/head.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：插入购买记录接口</span>
<span class="inforstyle">（<font color="red">用户购买并付款成功后，调用此接口将用户购买记录添加到数据库</font>）</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]buy_add</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="19%">参数名称</td>
    <td width="21%">参数说明</td>
    <td width="60%">备注</td>
    </tr>
   <tr>
    <td>token</td>
    <td>登录令牌</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>id</td>
    <td>练习主键teach_id</td>
    <td>从 <a href="#" onclick="javascript:sysOpenTab('course_get','练习详情','phpfiles/course_get.php')">练习详情等相关</a> 获取</td>
  </tr>
   <tr>
       <td>teacher_id</td>
       <td>老师主键id</td>
       <td >&nbsp;同上</td>

   </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="31%">备注</td>
  </tr>
  <tr>
    <td><p>{"success":true,"msg":"操作成功！&quot;}</p></td>
    <td><p>&nbsp;</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>