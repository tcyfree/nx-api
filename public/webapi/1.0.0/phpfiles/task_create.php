<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：创建计划任务接口</span></p>
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
    <td>v1/task</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td>参数名称</td>
    <td width="226">参数说明</td>
    <td width="598">备注</td>
    </tr>
 <?php require_once ("../include/token.inc.php"); ?>
    <tr>
        <td>act_plan_id</td>
        <td width="226">行动计划ID</td>
        <td width="598"</td>
    </tr>
 <tr>
   <td>name</td>
   <td width="226">名称</td>
   <td width="598">50个字符以内</td>
 </tr>
  <tr>
   <td>requirement</td>
   <td width="226">要求</td>
   <td width="598">不超过300个字符</td>
 </tr>
 <tr>
     <td>reference_time</td>
     <td>参考用时(秒）</td>
     <td>&nbsp;</td>
 </tr>
    <tr>
        <td>content</td>
        <td>内容</td>
        <td>&nbsp;富文本</td>
    </tr>
    <tr>
        <td>release</td>
        <td>发布否</td>
        <td>&nbsp;0 否 1 是</td>
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