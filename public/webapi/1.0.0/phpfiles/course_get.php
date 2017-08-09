<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取课程详情信息接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td><p>[sys_web_service]blog_get</p></td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="16%">参数名称</td>
    <td width="35%">参数说明</td>
    <td width="49%">备注</td>
  </tr>
  <tr>
    <td>token</td>
    <td>登录令牌</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>id</td>
    <td>练习主键teach_id</td>
    <td>从 <a href="#" onclick="javascript:sysOpenTab('course_list','练习列表','phpfiles/course_list.php')">练习列表等相关</a> 获取</td>
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
    <td>teacher_id</td>
    <td>老师主键id</td>
    <td>用于点击老师头像进入作者主页</td>
  </tr>
  <tr>
    <td>nickname</td>
    <td>昵称</td>
    <td><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>avatar</td>
    <td>头像</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
     <td>name</td>
     <td width="210">标题</td>
     <td width="567"><p>&nbsp;</p></td>
 </tr>
<tr>
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
  </tr>

 <tr>
     <td>content</td>
     <td width="210">课程简介</td>
     <td width="567"><p>&nbsp;</p></td>
 </tr>
 <!--<tr>
   <td>goodcount</td>
   <td>顶赞数</td>
   <td>&nbsp;</td>
 </tr>-->
 <!--<tr>
     <td>replycount</td>
     <td>回复数</td>
     <td>&nbsp;</td>
 </tr>-->
 <!-- <tr>
   <td> duration</td>
   <td>音，视频 播放时长</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>imgurlbig</td>
   <td>大图地址</td>
   <td>当videourl不为空时，此字段存储的是视频首帧图片</td>
 </tr>-->
 <!-- <tr>
   <td>imgurl</td>
   <td>&nbsp;</td>
   <td>当videourl不为空时，此字段存储的是视频首帧图片</td>
 </tr>-->
<!-- <tr>
   <td>imgcount</td>
   <td>图片总计数</td>
   <td><p>一个整数</p></td>
 </tr>
 <tr>
     <td>audiourl</td>
     <td>音频地址</td>
     <td>不含音频时为空</td>
 </tr>-->
 <tr>
     <td>videourl</td>
     <td>视频地址</td>
     <td>&nbsp;</td>
 </tr>
   <tr>
       <td>regdate</td>
       <td>发布时间</td>
       <td>&nbsp;</td>
   </tr>
    <tr>
    
       <td><font color="#FF0000">friendflag</font></td>
       <td><font color="#FF0000">关注标识</font></td>
       <td><font color="#FF0000">0：未关注  1：已关注</font></td>
    
   </tr>
    <tr>
    
       <td><font color="#FF0000">buy_flag</font></td>
       <td><font color="#FF0000">是否已购买</font></td>
       <td><font color="#FF0000">0：未购买  1：已购买</font></td>
    
   </tr>
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>