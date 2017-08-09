<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取成员列表信息</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]client_list</td>
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
    <td>登录令牌码</td>
    <td>&nbsp;</td>
  </tr>
    <tr class="">
        <td>keytype</td>
        <td>列表类型</td>
        <td width="533" align="left"><p>1：全部成员</p>
            <p>2：顶赞成员 </p>
            <p>3：评论成员</p>
            <p>4：附近用户 </p>
<p>5：我的好友 </p>
            <p>其余待扩展......</p></td>
    </tr>
    <tr  class="">
        <td>keyid</td>
        <td>关联主键</td>
        <td width="533" align="left"><p>当keytype=1时，keyid=0；</p>
            <p>当keytype=2时，keyid=blog_id；</p>
<p>当keytype=3时，keyid=blog_id；</p>
<p>当keytype=4时，keyid=[lng,lat]；</p>
<p>当keytype=5时，keyid=0；</p></td>
    </tr>      
    <tr>
        <td>keyword</td>
        <td>搜索关键字</td>
        <td width="533" align="left"><p>如果传&quot;无&quot;，表示不按关键字搜索</p></td>
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
    <td><p>详见（五）特别备注</p></td>
  </tr>
  <?php require_once("../include/error.inc.php");?>
  <?php require_once("../include/totalCount.inc.php");?>
</table>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td>参数名称</td>
    <td width="226">参数说明</td>
    <td width="598">备注</td>
  </tr>
  <tr>
      <td>client_id</td>
      <td>成员主键id</td>
      <td>用于点击头像进入主页</td>
  </tr>
 <tr>
     <td>nickname</td>
     <td>昵称</td>
     <td><p>&nbsp;</p></td>
 </tr>
    <tr>
        <td>charindex</td>
        <td>昵称首字母索引</td>
        <td>全部是小写字母</td>
    </tr>
  <tr>
    <td>avatar</td>
    <td>头像</td>
    <td>&nbsp;</td>
  </tr>
<tr>
    <td>sex</td>
    <td>性别</td>
    <td>&nbsp;</td>
</tr>
    <tr>
     <td>district_name</td>
     <td>地区</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>selfsign</td>
     <td>个性签名</td>
     <td>&nbsp;</td>
   </tr>
    <tr  class="">
        <td>lng</td>
        <td>所处精度</td>
        <td>&nbsp;</td>
    </tr>
    <tr  class="">
        <td>lat</td>
        <td>所处纬度</td>
        <td>&nbsp;</td>
    </tr>
</table>
<p>&nbsp;</p>
</div>
<?php require_once("../include/foot.inc.php");?>