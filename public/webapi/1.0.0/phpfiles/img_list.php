<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取图片列表（或相册列表）信息</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td><p>[sys_web_service]img_list</p></td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="16%">参数名称</td>
    <td width="35%">参数说明</td>
    <td width="49%">备注</td>
  </tr>
  <tr>
    <td>keytype</td>
    <td>列表类型</td>
    <td>
      <P>2：帖子内插图片 </P>
      其余待扩展....

    </td>
  </tr>
  <tr>
    <td>keyid</td>
    <td>关联主键</td>
    <td>
      <P>当keytype=2时，keyid=blog_id； </P>
      其余待扩展....

    </td>
  </tr>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
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
</table>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
    <td width="118">参数名称</td>
    <td width="210">参数说明</td>
    <td width="567">备注</td>
  </tr>
   <tr>
    <td>id</td>
    <td>主键id</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>client_id</td>
    <td>作者主键id</td>
    <td></td>
  </tr>
     <tr>
    <td>keytype</td>
    <td>关联类型</td>
    <td> 2:帖子 其余待扩展</td>
  </tr>
<tr>
    <td>keyid</td>
    <td>关联模块类型主键id</td>
    <td></td>
  </tr>
  <tr>
  <tr>
      <td>imgurlbig</td>
      <td>大图地址</td>
      <td><p class="redstyle">&nbsp;</p></td>
  </tr>
    <tr>
     <td>imgurl</td>
     <td>缩略图地址</td>
     <td><p class="redstyle">&nbsp;</p></td>
   </tr>  
  <tr>
      <td>regdate</td>
      <td>上传时间</td>
      <td>&nbsp;</td>
  </tr> 
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>