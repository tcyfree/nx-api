<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：行动社详情接口</span></p>
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
    <td>v1/community/:id</td>
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
    <td>行动社主键ID</td>
    <td>从 <a href="#" onclick="javascript:sysOpenTab('community_list','行动社列表','phpfiles/community_list.php')">行动社列表等相关</a> 获取</td>
  </tr>
</table>
<?php require_once ("../include/json_info.php"); ?>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明，仅列出部分关键字段）</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
    <td >参数名称</td>
    <td >参数说明</td>
    <td >备注</td>
  </tr>
  <tr>
    <td>outside_id</td>
    <td>行动社编号ID</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
        <td>exclusive_ulr</td>
        <td>行动社专属链接</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>exclusive_ulr</td>
        <td>行动社专属链接</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>status</td>
        <td>行动社状态</td>
        <td>&nbsp;状态 0 正常 1 冻结 2 封禁</td>
    </tr>
    <tr>
        <td>update_num</td>
        <td>本月剩余编辑次数</td>
        <td>一个月只能修改3次</td>
    </tr>
  <tr>
    <td>qr_code</td>
    <td>二维码</td>
    <td><p>&nbsp;</p></td>
  </tr>
    <tr>
        <td>user.join</td>
        <td>用户是否加入该行动社</td>
        <td>否：false 是：true </td>
    </tr>
    <tr>
        <td>user.status</td>
        <td>0 未退群 1 已退群 2被暂停成员资格 null 未加入</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>user.type</td>
        <td>关联类型 0 社长 1 管理员 2 成员 null 未加入</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>user.count</td>
        <td>用户已加入有效行动社数量</td>
        <td>&nbsp;判断用户是否可免费加入，最多可以参加XXXX个</td>
    </tr>
    <tr>
        <td>user.auth</td>
        <td>管理权限值</td>
        <td>&nbsp;type为1时，不为null。如："1,2,4"来判断管理员是否有对应操作管理权限</td>
    </tr>


 
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>