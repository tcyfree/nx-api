<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取楼盘详情信息接口</span></p>
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
    <td><p>v1/estate/:id</p></td>
  </tr>
</table>
<p class="subtitlestyle">（二）参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="16%">参数名称</td>
    <td width="35%">参数说明</td>
    <td width="49%">备注</td>
  </tr>
  <tr>
    <td>id</td>
    <td>楼盘主键id</td>
    <td>从 <a href="#" onclick="javascript:sysOpenTab('menu_get_blog_list','楼盘列表','phpfiles/blog_list.php')">楼盘列表</a> 获取</td>
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
     <td>post_price</td>
     <td width="210">近三个月尺价</td>
     <td width="567"><p>&nbsp;</p></td>
 </tr>
 <tr>
   <td>post_price2</td>
   <td>近一年尺价</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>thumbnail</td>
   <td>成交走势图（一年）</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
     <td>thumbnail2</td>
     <td>成交走势图（五年）</td>
     <td>&nbsp;</td>
 </tr>
    <tr>
        <td>thumbnail3</td>
        <td>租金走势图</td>
        <td>&nbsp;</td>
    </tr>

   <tr>
       <td>post_add</td>
       <td>地址</td>
       <td>&nbsp;</td>
   </tr>
    <tr>
    
       <td>post_year</td>
       <td>入驻年份</td>
       <td></td>
    
   </tr>
   <tr>
    
       <td>post_numbers</td>
       <td>座数</td>
       <td></td>
    
   </tr>
    <tr>
    
       <td>post_ratio</td>
       <td>实用率</td>
       <td></td>
    
   </tr>
   <tr>
       <td>post_acreage</td>
       <td>面积</td>
       <td></td>
   </tr>
   <tr>
       <td>post_device</td>
       <td>会所设备</td>
       <td></td>
   </tr>   <tr>
       <td>post_advantage</td>
       <td>地点优势</td>
       <td></td>
   </tr>   <tr>
       <td>post_data</td>
       <td>尺数间隔资料</td>
       <td></td>
   </tr>
    </tr>   <tr>
        <td>last_deal</td>
        <td>最近成交</td>
        <td></td>
    </tr>

    
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>