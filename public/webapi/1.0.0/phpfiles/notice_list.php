<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取消息通知列表接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]notice_list</td>
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
     <td>noticetype</td>
     <td>获取类型</td>
     <td width="533"><p  class="">1：系统通知</p>
         <p  class="">2：评论回复</p>
	<p  class="">3：点赞评论通知</p>
    <p  class="">4：官方推荐</p>
   </tr>
<?php require_once("../include/page.inc.php");?>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="47%">响应结果</td>
    <td width="53%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功",&quot;infor&quot;:json信息串}</td>
    <td><p>详见（四）特别备注</p></td>
  </tr>
  <?php require_once("../include/error.inc.php");?>
  <?php require_once("../include/totalCount.inc.php");?>
</table>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="72">参数名称</td>
    <td width="173">参数说明</td>
    <td width="626" align="left">备注</td>
  </tr>
   <tr>
    <td>id</td>
    <td>通知主键id</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>keytype</td>
    <td>关联模块类型</td>
    <td align="left"> <p  class="">1：系统通知</p>
        <p  class="">2：帖子回复（帖子代指项目核心业务模型）</p>
        <p  class="">3：点赞</p>
        <p  class="">4：官方推荐</p>
       </td>
  </tr>
  <tr>
    <td>keyid</td>
    <td>关联模块主键id</td>
    <td align="left"><p>通过keytype+keyid的组合来跳转不同模块详情页，具体见底部“特别提示”。</p></td>
  </tr>
   <tr>
      <td>titlename</td>
      <td>标题</td>
      <td align="left">&nbsp;</td>
  </tr>
  <tr>
      <td>content</td>
      <td>通知内容</td>
      <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>client_id</td>
    <td>通知所属用户主键id</td>
    <td align="left"></td>
  </tr>
   <tr>
    <td>from_id</td>
    <td>通知来源用户主键id</td>
    <td align="left"></td>
  </tr>
     <tr>
    <td>nickname</td>
    <td>昵称</td>
    <td align="left">&nbsp;</td>
  </tr>
     <tr>
    <td>avatar</td>
    <td>头像</td>
    <td align="left">&nbsp;</td>
  </tr>
   
    <tr>
    <td>looktype</td>
    <td>标记位</td>
    <td align="left"><p>1未读 2已读</p></td>
  </tr>
    <tr>
    <td>regdate</td>
    <td>通知日期</td>
    <td align="left">&nbsp;</td>
  </tr>  
</table>
<span>
<p class="inforstyle">特别提示：
<p class="inforstyle">当keytype=1时，keyid=notice_id;(此时需跳转系统消息详情模块) 
<p class="inforstyle">当keytype=2或3或4时，keyid=blog_id;(此时需跳转帖子详情模块) 

<p>&nbsp;</p>
<p>&nbsp;</p>
</span>
</div>
<?php require_once("../include/foot.inc.php");?>