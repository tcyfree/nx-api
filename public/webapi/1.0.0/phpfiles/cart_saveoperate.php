<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：购物车操作接口</span>
    <input type="hidden" name="hiddenField" id="hiddenField" />
</p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]cart_saveoperate</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="56">参数名称</td>
    <td width="370">参数说明</td>
    <td width="443">备注</td>
    </tr>
  <tr>
    <td>token</td>
    <td width="370">登录令牌</td>
    <td width="443">&nbsp;</td>
  </tr>
 <tr>
     <td>id</td>
     <td>购物车记录主键id</td>
     <td><p>从 购物车列表 获取</p></td>
 </tr>
  <tr>
      <td>keytype</td>
      <td>操作类型</td>
      <td align="left"><p>1：单个删除</p>
<p>2：清空购物车(此时id固定传0)</p>
<p>其余待扩展...</p></td>
  </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="49%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功"}</td>
    <td><p>&nbsp;</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>