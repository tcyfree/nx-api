<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：编辑发货信息地址接口</span>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]express_save</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="23%">参数名称</td>
    <td width="25%">参数说明</td>
    <td width="52%">备注</td>
    </tr>
  <tr>
    <td>token</td>
    <td>登录令牌码</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>id</td>
    <td>发货信息主键id</td>
    <td></td>
  </tr>
  <tr>
    <td>express_name</td>
    <td>物流公司</td>
    <td width="581"></td>
  </tr>
  <tr>
    <td>express_number</td>
    <td>快递单号</td>
    <td width="581"></td>
  </tr>

  </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="31%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"恭喜，操作成功"}</td>
    <td></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>