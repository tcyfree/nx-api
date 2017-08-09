<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：用户登录接口</span></p>
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
    <td>v1/app_user/:mobile/:password</td>
  </tr>
</table>
<p class="subtitlestyle">（二）参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="23%">参数名称</td>
    <td width="25%">参数说明</td>
    <td width="52%">备注</td>
    </tr>
  <tr>
    <td>mobile</td>
    <td></td>
    <td></td>
    </tr>
     
  <tr>
    <td>password</td>
      <td><font color="#FF0000">登录密码(加密)</font></td>
    <td>加密算法同注册一样</td>
    </tr>
    
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="31%">备注</td>
  </tr>
  <tr>
    <td><p>{"success":true,"msg":"操作成功&quot;,&quot;infor&quot;:json信息串}</p></td>
    <td><p>详见（四）特别备注</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明，仅列出部分关键字段）</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="16%">参数名称</td>
    <td width="27%">参数说明</td>
    <td width="57%">备注</td>
  </tr>
  <tr>
    <td>token</td>
    <td>令牌</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
       <td>user_nickname</td>
       <td>用户昵称</td>
       <td>&nbsp;</td>
   </tr>
    <tr>
        <td>id</td>
        <td>用户主键</td>
        <td>&nbsp;</td>
    </tr>

  </table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>