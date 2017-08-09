<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>


<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：添加帖子接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]blog_add</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="134">参数名称</td>
    <td width="189">参数说明</td>
    <td width="581">备注</td>
    </tr>
  <tr>
    <td>token</td>
    <td width="189">登录令牌</td>
    <td width="581">&nbsp;</td>
  </tr>
 <tr>
     <td>name</td>
     <td>标题</td>
     <td width="581">1~12字</td>
 </tr>
  <tr>
     <td>content</td>
     <td>内容</td>
     <td width="581">&nbsp;</td>
 </tr>
 <tr>
     <td>classification</td>
     <td>分类</td>
     <td width="581">
     	神秘学,绘画,文学,影像,摄影,音乐,生活美学,LIFE STYLE,御宅文化,用户自定义	
     </td>
 </tr>
 
  <!--<tr>
     <td>price</td>
     <td>内容详情</td>
     <td width="581">&nbsp;</td>
 </tr>
  <tr>
     <td>valid_period</td>
     <td>揭榜时间</td>
     <td width="581">&nbsp;</td>
 </tr>
  <tr>
     <td>choose</td>
     <td>选择用户回答方式</td>
     <td width="581">以数字组合的方式,如1,3代表以文字或者图片方式回答</td>
 </tr>-->
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="49%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功",&quot;infor&quot;:[{&quot;blog_id&quot;:int}]}}</td>
    <td><p><a href="#" onclick="javascript:sysOpenTab('menu_upload','上传文件','phpfiles/file_upload.php')">上传文件</a> 接口需要用到blog_id关联主键。</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>