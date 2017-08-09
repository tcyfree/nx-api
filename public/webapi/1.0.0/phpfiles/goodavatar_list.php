<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取帖子点赞人头像接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td><p>[sys_web_service]goodavatar_list</p></td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="16%">参数名称</td>
    <td width="35%">参数说明</td>
    <td width="49%">备注</td>
  </tr>
 <!-- <tr>
    <td>token</td>
    <td>登录令牌</td>
    <td>&nbsp;</td>
  </tr>-->
  <tr>
    <td>id</td>
    <td>帖子主键id</td>
    <td>从 <a href="#" onclick="javascript:sysOpenTab('menu_get_blog_list','帖子列表','phpfiles/blog_list.php')">帖子列表等相关</a> 获取</td>
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
    <td>点赞人id</td>
    <td>主键id</td>
    <td>用于点击作者头像进入作者主页</td>
  </tr>
 <!-- <tr>
    <td>nickname</td>
    <td>发布人昵称</td>
    <td><p>&nbsp;</p></td>
  </tr>-->
  <tr>
    <td>avatar</td>
    <td>头像</td>
    <td>&nbsp;</td>
  </tr>
<!--<tr>
    <td>course_duration</td>
    <td>课程时长</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>price</td>
    <td>课程总价</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>valid_period</td>
    <td>有效期限</td>
    <td>&nbsp;</td>
  </tr>-->
 <!--<tr>
     <td>name</td>
     <td width="210">标题</td>
     <td width="567"><p>&nbsp;</p></td>
 </tr>-->
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>