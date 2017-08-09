<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取地区（城市）列表信息</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td><p>[sys_web_service]district_list</p></td>
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
    <td>parentid</td>
    <td>父级主键id</td>
    <td>
      <P>0：表示获取第一级别（省份或直辖市或自治区）</P>
      <P>-1：表示获取所有地级以上级别城市（含地级）</P></td>
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
    <td>主键id</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>name</td>
    <td>地区名称</td>
    <td></td>
  </tr>
     <tr>
    <td>parentid</td>
    <td>父级别主键</td>
    <td>&nbsp;</td>
  </tr>
<tr>
    <td>nodepath</td>
    <td>节点主键路径串</td>
    <td></td>
  </tr>
  <tr>
  <tr>
      <td>namepath</td>
      <td>节点名称路径串</td>
      <td><p class="redstyle">&nbsp;</p></td>
  </tr>
    <tr>
     <td>charindex</td>
     <td>名称拼音首字母索引</td>
     <td>比如"北京"的charindex为 &quot;B&quot;</td>
   </tr>  
  <tr>
      <td>level</td>
      <td>节点层级</td>
      <td>一个整数</td>
  </tr>
  <tr>
      <td>orderby</td>
      <td>排序优先级</td>
      <td>&nbsp;</td>
  </tr> 
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>