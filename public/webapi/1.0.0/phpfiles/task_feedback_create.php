<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：任务反馈接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
      <td width="15%">请求类型</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
      <td>POST</td>
    <td>v1/task/feedback</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">

 <?php require_once ("../include/required_or_optional.php"); ?>
 <?php require_once ("../include/token.required.php"); ?>
    <tr>
        <td>task_id</td>
        <td width="226">任务ID</td>
        <td width="226">是</td>
        <td width="598"></td>
    </tr>
 <tr>
   <td>content</td>
   <td width="226">反馈内容</td>
     <td width="226">是</td>
   <td width="598"></td>
 </tr>
  <tr>
   <td>location</td>
   <td width="226">位置</td>
      <td width="226">否</td>
   <td width="598"></td>
 </tr>
 <tr>
     <td>to_user_id</td>
     <td>审核人ID</td>
     <td width="226">否</td>
     <td>&nbsp;</td>
 </tr>
    <tr>
        <td>type</td>
        <td>自动审核</td>
        <td width="226">否</td>
        <td>&nbsp;自动审核：type = 1 </td>
    </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="49%">备注</td>
  </tr>
  <?php require_once ("../include/success.inc.php"); ?>
<?php require_once("../include/error.inc.php");?>
</table>
</div>
<?php require_once("../include/foot.inc.php");?>