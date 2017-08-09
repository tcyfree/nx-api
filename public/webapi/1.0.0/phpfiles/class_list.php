<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：进入不同的模块</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]tea_cla_list</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="23%">参数名称</td>
    <td width="25%">参数说明</td>
    <td width="52%">备注</td>
    </tr>
  <tr>
    <td>keytype</td>
    <td>模块类别</td>
    <td>各数值代表：1热门 2教程 3最新</td>
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
<?php require_once("../include/totalCount.inc.php");?>
</table>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明，仅列出部分关键字段）</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="16%">参数名称</td>
    <td width="27%">参数说明</td>
    <td width="57%">备注</td>
  </tr>
  <tr>
    <td>teachid</td>
    <td>教学帖子图片id</td>
    <td>每个教学类里面三个模块的图片id，代表一类帖子</td>
  </tr>
  <tr>
    <td>imgurl</td>
    <td>图片地址</td>
    <td>每个教学类里面三个模块的图片地址</td>
  </tr>
   <tr>
    <td>pageVisit</td>
    <td>访问量</td>
    <td>教学内容的访问量</td>
  </tr>
    </tr>
   <tr>
    <td>regdate</td>
    <td>上传时间</td>
    <td>此教学内容上传的时间</td>
  </tr>
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>