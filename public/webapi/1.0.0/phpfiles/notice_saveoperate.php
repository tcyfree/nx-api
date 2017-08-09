<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：保存用户通知操作接口</span>
    <input type="hidden" name="hiddenField" id="hiddenField" />
</p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]notice_saveoperate</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="88">参数名称</td>
    <td width="136">参数说明</td>
    <td width="617" align="left">备注</td>
    </tr>
  <tr>
    <td>token</td>
    <td width="136">登陆令牌</td>
    <td width="617" align="left">&nbsp;</td>
  </tr>
 <tr>
     <td>id</td>
     <td>通知主键id</td>
     <td align="left"><p>从 <a href="#" onclick="javascript:sysOpenTab('menu_get_notice_list','通知列表','phpfiles/notice_list.php')">通知列表</a> 获取</p></td>
 </tr>
<tr>
    <td>keytype</td>
    <td>关联模块类型</td>
    <td align="left">从 <a href="#" onclick="javascript:sysOpenTab('menu_get_notice_list','通知列表','phpfiles/notice_list.php')">通知列表</a> 获取</td>
  </tr>
  <tr>
    <td>looktype</td>
    <td>标记位</td>
    <td align="left">从 <a href="#" onclick="javascript:sysOpenTab('menu_get_notice_list','通知列表','phpfiles/notice_list.php')">通知列表</a> 获取</td>
  </tr>
  <tr>
    <td>keyid</td>
    <td>关联模块主键id</td>
    <td align="left"><p>&nbsp;</p></td>
  </tr>
  <tr>
      <td>operatetype</td>
      <td>操作类型</td>
      <td align="left"><p>&nbsp;</p>
          <p>1：置为已读          </p>
          <p>2：删除单条</p>
          <p>其余待扩展...</p>
<p>&nbsp;</p></td>
  </tr>
</table>
<p><span class="inforstyle">特别说明：id,keytype,keyid 均从 <a href="#" onclick="javascript:sysOpenTab('menu_get_notice_list','获取列表','phpfiles/notice_list.php')">通知列表</a> 接口获得，此处由客户端传递是为了减少服务器查询次数，提高运行效率。</span></p>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="51%">响应结果</td>
    <td width="49%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功"}</td>
    <td><p>&nbsp;</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>