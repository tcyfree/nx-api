<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：上传文件（图片，音视频）并保存到服务器</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]file_upload</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="80">参数名称</td>
    <td width="276">参数说明</td>
    <td width="455" align="left">备注</td>
  </tr>
   <tr>
     <td>token</td>
     <td width="276">登录令牌</td>
     <td width="455" align="left">&nbsp;</td>
   </tr>
    <tr>
      <td>keytype</td>
      <td>上传操作类型</td>
      <td align="left"><p>1：个人头像图片</p>
          <p>2：快递单号拍照</p>
          <p>其余依次递增扩展...</p></td>
    </tr>
    <tr>
     <td>keyid</td>
     <td>关联模块主键id</td>
     <td align="left"><p>当keytype=1时，keyid=0；</p>
                    <p>当keytype=2时，keyid=pay_id；</p>
     </td>
   </tr>
 <tr>
     <td>temp_file</td>
     <td>临时需要上传的文件控件名称</td>
     <td align="left"> 对应表单type=&quot;file&quot; 中的name值 </td>
   </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="32%">响应结果</td>
    <td width="68%" align="left">备注</td>
  </tr>
  <tr>
    <td><p>{"success":true,"msg":"操作成功&quot;,&quot;infor&quot;:null}</p></td>
    <td align="left"></td>
  </tr>
  <?php require_once("../include/error.inc.php");?>
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>