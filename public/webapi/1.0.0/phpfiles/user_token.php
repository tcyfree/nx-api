<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取用户token接口</span>
  <input type="hidden" name="hiddenField" id="hiddenField" />
</p>
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
    <td>v1/token/user</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="190">参数名称</td>
    <td width="127">参数说明</td>
    <td width="562">备注</td>
    </tr>
   <tr>
     <td>code</td>
     <td>微信返回CODE码</td>
     <td><p></p></td>
   </tr>
    <tr>
        <td>state</td>
        <td></td>
        <td><p></p></td>
    </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="53%">响应结果</td>
    <td width="47%" colspan="2">结果说明备注</td>
    </tr>
  <tr>
    <td>{json信息串}</td>
      <td><p>详见（四）特别备注</p></td>
    </tr>
</table>
    <p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
    <table width="90%" border="1" class="dbTable">
        <tr class="td_header">
            <td>参数名称</td>
            <td width="226">参数说明</td>
            <td width="598">备注</td>
        </tr>
        <tr>
            <td>token</td>
            <td>令牌</td>
            <td></td>
        </tr>

    </table>
</div>


<?php require_once("../include/foot.inc.php");?>