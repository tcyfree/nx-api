<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>


<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取是一个退款凭据Refund对象</span></p>
<p class="boldStyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>具体的地址</td>
    <td>[sys_web_service]refund_get</td>
  </tr>
</table>
<p class="inforstyle">特别提示：[sys_web_service]定义请参考系统初始化接口说明。</p>
<p class="boldStyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="122">参数名称</td>
    <td width="152">参数说明</td>
    <td width="597">备注</td>
    </tr>
   <tr>
     <td>token</td>
     <td width="152">登录令牌</td>
     <td width="597" align="left">&nbsp;</td>
   </tr>
   <tr>
    <td>charge_id</td>
    <td></td>
    <td align="center"></td>
  </tr>
  <tr align="center">
    <td>amount</td>
    <td>退款金额</td>
    <td align="center">单位：元(测试时统一传递0.01元)</td>
  </tr>
</table>
<p class="boldStyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
        <td width="51%">响应结果</td>
        <td width="31%">备注</td>
    </tr>
    <tr>
        <td><p>{"success":true,"msg":"操作成功&quot;,&quot;infor&quot;:json信息串}</p></td>

    </tr>
    <tr>

    </tr>
    <?php require_once("../include/error.inc.php");?>
</table>

</div>

<?php require_once("../include/foot.inc.php");?>