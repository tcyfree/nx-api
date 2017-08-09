<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：检查账号是否已绑定电话	</span>
  <span class="Redstyle">(若未绑定需要先绑定电话才能支付)</span>
</p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]mobile_verify</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="19%">参数名称</td>
    <td width="18%">参数说明</td>
    <td width="42%">备注</td>
    </tr>
  <tr>
    <td>token</td>
    <td></td>
    <td></td>
  </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="48%">响应结果</td>
    <td width="52%" colspan="2">备注</td>
    </tr>
  <tr>
    <td><p>{"success":true,"msg":"已绑定电话号码！！！","infor":null}</p></td>
    <td><span class="inforstyle">若未绑定，则需要先绑定在支付</span></td>
    </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>