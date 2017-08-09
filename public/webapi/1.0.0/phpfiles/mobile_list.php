<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：邀请通讯录号码安装软件接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]mobile_list</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
 <tr class="td_header">
    <td width="106">参数名称</td>
    <td>参数说明</td>
    <td width="533">备注</td>
  </tr>
 <tr>
     <td>token</td>
     <td>登录令牌</td>
     <td width="533">&nbsp;</td>
   </tr>
 <tr>
     <td>mobile_list</td>
     <td>本机通讯录手机号码串</td>
     <td width="533">中间用英文逗号分割，比如“13556878956,13785589685”</td>
   </tr>
</table><p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="40%">响应结果</td>
    <td width="42%">备注</td>
  </tr>
  <tr>
    <td><p>{"success":true,"msg":"操作成功&quot;,&quot;infor&quot;:json信息串}</p></td>
    <td><p>详见（四）特别备注</p></td>
  </tr>
  <?php require_once("../include/error.inc.php");?>
    <tr>
    <td colspan="2"><p>注意：此接口无需分页。</p></td>
    </tr>
</table>
<p class=redstyle>特别说明：客户端应该将自身手机号在“已安装列表”中进行过滤屏蔽。</p>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
<p>请参考 <a href="#" onclick="javascript:sysOpenTab('menu_login','系统登录','phpfiles/client_login.php')">系统登录</a> 接口中的infor字段说明。</p>
<p>&nbsp;</p>
</div>
<?php require_once("../include/foot.inc.php");?>