<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取空间详情信息接口</span></p>
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
    <td><p>v1/space/:id</p></td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="16%">参数名称</td>
    <td width="35%">参数说明</td>
    <td width="49%">备注</td>
  </tr>
    <?php require_once("../include/token.inc.php");?>
  <tr>
    <td>id</td>
    <td>空间主键id</td>
    <td>从 <a href="#" onclick="javascript:sysOpenTab('menu_get_blog_list','空间列表','phpfiles/sapce_list.php')">空间等列表</a> 获取</td>
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
        <td>空间主键</td>
        <td></td>
    </tr>
  <tr>
    <td>post_title</td>
    <td>标题</td>
    <td></td>
  </tr>
  <tr>
    <td>photos</td>
    <td>展示图</td>
    <td><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>photos2</td>
    <td>平面图</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
     <td>agent_info</td>
     <td width="210">代理人信息</td>
     <td width="567"><p>&nbsp;</p></td>
 </tr>
 <tr>
   <td>type</td>
   <td>是否收藏</td>
   <td>0 否 1 是</td>
 </tr>
    <tr>
        <td>last_deal</td>
        <td>其它热门空间推荐</td>
        <td></td>
    </tr>

    
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>