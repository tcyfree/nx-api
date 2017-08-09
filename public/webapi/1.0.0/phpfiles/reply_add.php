<?php require_once("../include/head.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：添加评论接口</span>&nbsp;</p>
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
    <td>v1/reviews</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="23%">参数名称</td>
    <td width="20%">参数说明</td>
    <td width="57%" align="left">备注</td>
    </tr>
    <?php require_once("../include/token.inc.php");?>
   <tr>
     <td>key_id</td>
     <td>关联主键id</td>
     <td align="left">
         </td>
   </tr>
   <tr>
       <td>content</td>
       <td>回复内容</td>
       <td align="left"><p class="inforstyle">&nbsp;</p></td>
   </tr>
   <tr class="inforstyle">
       <td>parent_id</td>
       <td>父楼主键&nbsp;id </td>
       <td align="left">仅在跟楼回复时有效，否则固定传0</td>
   </tr>
    <tr >
       <td>user_nickname</td>
       <td> 留言姓名</td>
       <td ></td>
   </tr>
    <tr >
        <td>checkcode</td>
        <td> 验证码</td>
        <td ><td></td></td>
    </tr>


</table>
<p class="inforstyle">【特别提示】如果是跟楼回复,客户端应当按照【回复+空格+父楼昵称+冒号+回复内容】的格式，将content在后台自行组串。</p>
<p class="inforstyle">【跟楼示例】回复 张丽丽：你说的太好了，赞一个。</p>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="31%">备注</td>
  </tr>
  <tr>
    <td><p>{"success":true,"msg":"恭喜，操作成功！&quot;}</p></td>
    <td><p>&nbsp;</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>