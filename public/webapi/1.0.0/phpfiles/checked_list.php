<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取消息通知列表接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]checked_list</td>
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
     <td>token</td>
     <td>登录令牌</td>
     <td width="533">&nbsp;</td>
   </tr>
 
<?php require_once("../include/page.inc.php");?>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="47%">响应结果</td>
    <td width="53%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功",&quot;infor&quot;:json信息串}</td>
    <td><p>详见（四）特别备注</p></td>
  </tr>
  <?php require_once("../include/error.inc.php");?>
  <?php require_once("../include/totalCount.inc.php");?>
</table>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="72">参数名称</td>
    <td width="173">参数说明</td>
    <td width="626" align="left">备注</td>
  </tr>
   <tr>
    <td>id</td>
    <td>通知主键id</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>keyid</td>
    <td>关联模块主键id</td>
    <td align="center"><p>通过keyid来跳转详情页，keyid=blog_id</p></td>
  </tr>
  <tr>
      <td>content</td>
      <td>通知内容</td>
      <td align="left">&nbsp;</td>
    <tr>
    <td>looktype</td>
    <td>标记位</td>
    <td align="center"><p>1未读 2已读</p></td>
  </tr>
    <tr>
    <td>regdate</td>
    <td>通知日期</td>
    <td align="left">&nbsp;</td>
  </tr>  
</table>

</div>
<?php require_once("../include/foot.inc.php");?>