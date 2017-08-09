<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取聊天纪录接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]msg_list</td>
  </tr>
</table>
<p class="boldStyle">（二）POST参数列表：</p>
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
     <td>to_id</td>
     <td>对方主键id</td>
     <td>对应<a href="#" onclick="javascript:sysOpenTab('menu_get_notice_list','通知列表','phpfiles/notice_list.php')">通知列表</a>中的keyid(keytype=3聊天模式)</td>
   </tr>
<?php require_once("../include/page.inc.php");?>

</table>
<p class="boldStyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
        <td width="47%">响应结果</td>
        <td width="53%">备注</td>
    </tr>
    <tr>
        <td>{&quot;success&quot;:true,&quot;msg&quot;:&quot;操作成功&quot;,&quot;infor&quot;:json信息串}</td>
        <td><p>详见（五）特别备注</p></td>
    </tr>
    <?php require_once("../include/error.inc.php");?>
    <?php require_once("../include/totalCount.inc.php");?>
</table>
<p><span class="boldStyle">（四）特别备注</span>（infor字段说明）</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
        <td width="72">参数名称</td>
        <td width="178">参数说明</td>
        <td width="579">备注</td>
    </tr>
    <tr>
        <td>id</td>
        <td>主键id</td>
        <td>&nbsp;</td>
    </tr>
       <tr>
       <td>msgtype</td>
       <td>内容类型</td>
       <td> 1文本 2图片  </td>
   </tr>
    <tr>
        <td>client_id</td>
        <td>作者主键id</td>
        <td>用于点击作者头像进入作者主页</td>
    </tr>
    <tr>
        <td>nickname</td>
        <td>对方昵称</td>
        <td><p>&nbsp;</p></td>
    </tr>
    <tr>
        <td>avatar</td>
        <td>对方头像</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>content</td>
        <td width="178">聊天内容</td>
        <td width="579"><p>根据msgtype区分</p>
            <p>当msgtype=1时，content=聊天文本内容；</p>
            <p>当msgtype=2时，content=item1,item2（item1=小图地址，item2=大图地址）；</p></td>
    </tr>
    <tr>
        <td>regdate</td>
        <td>聊天时间</td>
        <td>&nbsp;</td>
    </tr>
</table>
<p>&nbsp;</p>
</div>
<?php require_once("../include/foot.inc.php");?>