<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取个人相关列表信息</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]person_list</td>
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
    <td>keytype</td>
    <td>获取类型</td>
    <td>1：我的作品 <br />
    	2：我的点赞 <br />
        3：我的收藏 <br />
    </td>
  </tr>
 <?php require_once("../include/page.inc.php");?>
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
    <td>nickname</td>
    <td>发帖人昵称</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>id</td>
    <td>帖子主键</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>imgurlbig</td>
    <td>封面（大）</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>imgurl</td>
    <td>封面（小）</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>name</td>
    <td>标题</td>
    <td>&nbsp;</td>
  </tr>
<tr>
    <td>imgRGB</td>
    <td>主色调</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>classification</td>
    <td>分类</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>regdate</td>
    <td>时间</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
       <td>viewscount</td>
       <td>观看量</td>
       <td>&nbsp;</td>
   </tr>
  <tr>
    <td>replycount</td>
    <td>回复数</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>goodcount</td>
    <td>点赞数</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>collectcount</td>
    <td>收藏数</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><font color="#FF0000">randRGB</font></td>
    <td><font color="#FF0000">随机RGB</font></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>