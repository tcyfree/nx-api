<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：验证随机码服务接口</span>
<span class="inforstyle">（先申请，后验证）</span>
</p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]code_verify</td>
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
    <td>mobile</td>
    <td></td>
    <td>手机号码</td>
  </tr>
  <tr>
    <td>code</td>
    <td>4位随机号码</td>
    <td>测试阶段固定向服务器提交“1234”</td>
    </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="48%">响应结果</td>
    <td width="52%" colspan="2">备注</td>
    </tr>
  <tr>
    <td><p>{"success":true,"msg":"操作成功&quot;,&quot;infor&quot;:[{&quot;temp_token&quot;:&quot;TK_8606_13798568785&quot;}]}</p></td>
    <td colspan="2"><p>验证成功服务器会返回一个临时token，</p>
      <p>系统注册模块或重设密码模块需要用到。</p></td>
    </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>