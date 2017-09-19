<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：发布内容接口</span></p>
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
    <td>v1/communication</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">

 <?php require_once ("../include/required_or_optional.php"); ?>
 <?php require_once ("../include/token.required.php"); ?>
    <tr>
        <td>community_id</td>
        <td >行动社ID</td>
        <td >是</td>
        <td ></td>
    </tr>
    <tr>
        <td>content</td>
        <td >发布内容</td>
        <td >是</td>
        <td ></td>
    </tr>
    <tr>
        <td>location</td>
        <td >位置</td>
        <td >是</td>
        <td ></td>
    </tr>
    <tr>
        <td>@user_ids</td>
        <td >被@用户id的json值类型：数组</td>
        <td >否</td>
        <td >形如："@user_ids":["0a9064ba-711f-5049-9300-c0cc88e1edf7","501969d6-b26d-bb2d-29e3-5264a923def9"]</td>
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