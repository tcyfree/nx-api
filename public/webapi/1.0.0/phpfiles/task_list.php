<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：行动计划任务列表接口</span></p>
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
    <td>v1/task/:id/:page/:size</td>
  </tr>
</table>
<p class="subtitlestyle">（二）参数列表：</p>
<table width="90%" border="1" class="dbTable">
    <?php require_once("../include/token.inc.php");?>
    <tr>
        <td>id</td>
        <td>行动计划ID</td>
        <td width="533"></td>
    </tr>

<?php require_once("../include/page.inc.php");?>

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
     <td>id</td>
     <td>任务ID</td>
     <td> </td>
  </tr>
    <tr>
        <td>name</td>
        <td>任务名称</td>
        <td></td>
    </tr>
    <tr>
        <td>flag</td>
        <td>0 未参加 1 已参加</td>
        <td></td>
    </tr>
    <tr>
        <td>mode</td>
        <td>行动计划模式</td>
        <td>0 普通模式 1 普通模式+挑战者模式</td>
    </tr>
</table>
    <span class="titlestyle"><font color="red">注：若用户未参加该行动计划的行动社，则去行动计划详情橱窗</font> </span>
</div>


<?php require_once("../include/foot.inc.php");?>