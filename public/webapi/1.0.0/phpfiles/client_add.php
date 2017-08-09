<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：用户注册接口</span>
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
    <td>v1/app_user</td>
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
     <td>mobile</td>
     <td>用户注册名</td>
     <td><p>手机号</p></td>
   </tr>
    <tr>
        <td>code</td>
        <td>验证码</td>
        <td><p></p></td>
    </tr>
  <tr>
    <td>password</td>
    <td>登录密码</td>
    <td><font color="#FF0000">需要先加密再传入后台</font></td>
  </tr>
    <tr>
        <td>user_nickname</td>
        <td>昵称</td>
        <td></td>
    </tr>

 

</table>
<!--<p class="inforstyle">特别说明：个人资料中的头像请参考 <a href="#" onclick="javascript:sysOpenTab('menu_upload_file','上传文件','phpfiles/file_upload.php')">上传文件</a> 接口。</p>-->
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="53%">响应结果</td>
    <td width="47%" colspan="2">结果说明备注</td>
    </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功",&quot;infor&quot;:json信息串}</td>
      <td><p>详见（四）特别备注</p></td>
    </tr>
<?php require_once("../include/error.inc.php");?></table>
    <p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
    <table width="90%" border="1" class="dbTable">
        <tr class="td_header">
            <td>参数名称</td>
            <td width="226">参数说明</td>
            <td width="598">备注</td>
        </tr>
        <tr>
            <td>token</td>
            <td>登录令牌</td>
            <td></td>
        </tr>

    </table>
</div>


<?php require_once("../include/foot.inc.php");?>