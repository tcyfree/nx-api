<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：行动社_社长简介接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
      <td width="15%">请求类型</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
      <td>PUT</td>
    <td>v2/community/chief_profile</td>
  </tr>
</table>
<p class="subtitlestyle">（二）参数列表：</p>
<table width="90%" border="1" class="dbTable">
    <?php require_once ("../include/required_or_optional.php") ?>
    <?php require_once ("../include/token.required.php"); ?>
    <tr>
        <td>community_id</td>
        <td>行动社ID</td>
        <td>&nbsp;是</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>profile</td>
        <td>简介</td>
        <td>&nbsp;是</td>
        <td>&nbsp;</td>
    </tr>

   
</table>
<!--<p class="inforstyle">特别说明：个人资料中的头像请参考 <a href="#" onclick="javascript:sysOpenTab('menu_upload_file','上传文件','phpfiles/file_upload.php')">上传文件</a> 接口。</p>-->
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="47%">响应结果</td>
    <td width="53%">备注</td>
  </tr>
  <tr>
    <td>{"code":201,"msg":"ok","errorCode":0}</td>
    <td><p>&nbsp;</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>