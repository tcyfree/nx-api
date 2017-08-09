<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：申请随机验证码接口</span>
<span class="inforstyle">（先申请，后验证）</span>
</p>
<p><span class="inforstyle">特别提示：60秒过后，点击“重新发送验证码”时，再调用一遍此接口即可。</span></p>
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
    <td>v1/code/:mobile/:type</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="18%">参数名称</td>
    <td width="28%">参数说明</td>
    <td width="54%">备注</td>
  </tr>
  <tr>
    <td>mobile</td>
    <td></td>
    <td>手机号码</td>
  </tr>
    <tr>
        <td>type</td>
        <td>获取类型</td>
        <td>0 注册 1 找回密码</td>
    </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="53%">响应结果</td>
    <td width="47%">备注</td>
  </tr>
  <tr>
    <td><p>{"success":true,"msg":"操作成功"} </p></td>
    <td>&nbsp;</td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>
<?php require_once("../include/foot.inc.php");?>