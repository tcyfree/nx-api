<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：保存用户职业和旁趣接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]proPUNCH_save</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
        <td width="190">参数名称</td>
        <td width="127">参数说明</td>
        <td width="562">备注</td>
    </tr>
    <tr>
        <td>token</td>
        <td>登录令牌</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>profession</td>
        <td>职业</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>punch</td>
        <td>旁趣</td>
        <td>神秘学,绘画,文学,影像,摄影,音乐,生活美学,LIFE STYLE,御宅文化,用户自定义	</td>
    </tr>
   
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="47%">响应结果</td>
    <td width="53%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"保存成功"}</td>
    <td><p>&nbsp;</p></td>
  </tr>
<?php require_once("../include/error.inc.php");?>
</table>
</div>


<?php require_once("../include/foot.inc.php");?>