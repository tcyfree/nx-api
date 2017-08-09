<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：百度推送插件说明</span></p>
<p>客户端收到百度推送后，根据keytype和keyid来区分各个业务模块</p>
<p>系统规定如下：</p>
<table width="67%" border="1" class="dbTable">
    <tr class="td_header">
        <td colspan="2" align="center">参数设置</td>
        <td width="61%">备注</td>
    </tr>
    <tr>
        <td width="17%" height="23">keytype=0</td>
        <td width="22%">keyid=0</td>
        <td>适用于 系统通知 模块</td>
    </tr>
    <tr class="">
        <td>keytype=1</td>
        <td>keyid=to_id</td>
        <td><p>适用于 单人聊天 模块</p></td>
    </tr>
    <tr class="">
        <td>keytype=2</td>
        <td>keyid=group_id</td>
        <td><p>适用于 群体聊天 模块</p></td>
    </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

<?php require_once("../include/foot.inc.php");?>