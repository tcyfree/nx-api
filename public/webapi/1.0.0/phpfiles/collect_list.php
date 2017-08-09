<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：收藏列表接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]collect_list</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
 <tr>
     <td>token</td>
     <td></td>
      <td width="533"></td>
   </tr>
    <tr>
        <td>keytype</td>
        <td>分类获取</td>
        <td width="533">
            <p>0：即将开始</p>
            <p>1：正在进行</p>
            <p>2：已结束</p>
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
    <td>id</td>
    <td>项目id</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
     <td>classification</td>
     <td>分类</td>
     <td>&nbsp;</td>
  </tr>
  <tr>
    <td>name</td>
    <td>标题</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>imgurl</td>
    <td>项目封面</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>day</td>
    <td>天数</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>hour</td>
    <td>小时数</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>minute</td>
    <td>分数</td>
    <td></td>
  </tr>
   <tr>
    <td>second</td>
    <td>秒数</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
       <td>target_amount</td>
       <td>目标金额</td>
       <td>&nbsp;</td>
   </tr>
  <tr>
    <td>supportnum</td>
    <td>支持人数</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>percent</td>
    <td>已完成百分比</td>
    <td>&nbsp;</td>
  </tr>
<tr>
    <td>randRGB</td>
    <td>背景色</td>
    <td>&nbsp;</td>
  </tr>

  
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>