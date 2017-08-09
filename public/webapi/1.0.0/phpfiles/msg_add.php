<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：发送聊天消息接口</span></p>
<p class="inforstyle">特别提示：</p>
<p class="inforstyle">（1）此聊天模块仅适用于点对点简单聊天模式，客户端采取定时拉取机制实现；</p>
<p class="inforstyle">（2）如果需要群聊，则必须使用OpenFire专业聊天服务器架构实现。</p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]msg_add</td>
  </tr>
</table>
<p class="boldStyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="188">参数名称</td>
    <td width="218">参数说明</td>
    <td width="423" align="left">备注</td>
    </tr>
   <tr>
    <td>token</td>
    <td>登录令牌码</td>
    <td align="left">&nbsp;</td>
  </tr>
     <tr>
       <td>to_id</td>
       <td>对方用户主键id</td>
       <td align="left"><p>&nbsp;</p></td>
   </tr>
     <tr>
       <td>msgtype</td>
       <td>内容类型</td>
       <td align="left"> 1文本 2图片</td>
   </tr>
   <tr>
     <td>content</td>
     <td>聊天内容</td>
     <td width="423" align="left"><p>根据msgtype区分</p>
         <p>当msgtype=1时，content=聊天文本内容；</p>
         <p>当msgtype=2时，content=item1,item2（item1=小图地址，item2=大图地址）；</p></td>
   </tr>   
</table>
<p>特别提示：当msgtype=2时，2个 item 信息从 文件上传 接口获取。</p>
<p class="boldStyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
        <td width="51%">响应结果</td>
        <td width="49%">备注</td>
    </tr>
    <tr>
        <td>{&quot;success&quot;:true,&quot;msg&quot;:&quot;操作成功&quot;]}}</td>
        <td><p>&nbsp;</p></td>
    </tr>
    <?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>