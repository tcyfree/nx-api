<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：行动计划最近参加人头像接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
      <td width="15%">请求类型</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
      <td>GET</td>
    <td>v2/plan/the_last_join</td>
  </tr>
</table>
<p class="subtitlestyle">（二）GET参数列表：</p>
<table width="90%" border="1" class="dbTable">

 <?php require_once ("../include/required_or_optional.php"); ?>
 <?php require_once ("../include/token.required.php"); ?>
    <tr>
        <td>id</td>
        <td >行动计划ID</td>
        <td >是</td>
        <td ></td>
    </tr>
</table>
    <?php require_once ("../include/json_info.php"); ?>

    <p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明，仅列出部分关键字段）</p>
    <table width="90%" border="1" class="dbTable">
        <tr class="td_header">
            <td width="16%">参数名称</td>
            <td width="27%">参数说明</td>
            <td width="57%">备注</td>
        </tr>
        <tr>
            <td>avatar</td>
            <td>头像</td>
            <td>&nbsp;</td>
        </tr>

    </table>
    <p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>