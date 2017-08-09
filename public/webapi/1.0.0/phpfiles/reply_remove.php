<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>


<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：删除帖子回复接口</span>
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
    <td>[sys_web_service]reply_remove</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td>参数名称</td>
    <td width="226">参数说明</td>
    <td width="598">备注</td>
    </tr>
  <tr>
    <td>token</td>
    <td width="226">登录令牌</td>
    <td width="598">&nbsp;</td>
  </tr>
   <tr>
     <td>keyid</td>
     <td>关联帖子主键id</td>
     <td align="center"><p> &nbsp;keyid=blog_id</p>
         </td>
   </tr>
 <tr>
   <td>id</td>
   <td width="226">回复主键id</td>
   <td width="598"><p>一般从 <a href="#" onclick="javascript:sysOpenTab('menu_get_reply_list','评论列表','phpfiles/reply_list.php')">评论列表</a> 接口进入</p></td>
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