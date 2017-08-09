<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>


<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：用户申请提现接口</span></p>

<p class="boldStyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>具体的地址</td>
    <td>[sys_web_service]feeaccount_remove</td>
  </tr>
</table>
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
    <td>keytype</td>
    <td>关联业务类型</td>
    <td align="center"><p>&nbsp;</p>
        <p>0：支付宝提现</p>
        <p>1：银行卡号</p>
        <p>其他业务类型依次扩展(比如：微信提现)...</p>
        <p>&nbsp;</p></td>
  </tr>
    <tr>
    <td>withdraw</td>
    <td>提现金额</td>
    <td></td>
  </tr>
  <tr>
    <td>name</td>
    <td>姓名</td>
    <td></td>
  </tr>
    <tr>
        <td>alipay_number</td>
        <td>支付宝账号</td>
        <td></td>
    </tr>
    <tr>
        <td>account_number</td>
        <td>银行卡号</td>
        <td></td>
    </tr>
    <tr>
        <td>bank</td>
        <td>开户行</td>
        <td></td>
    </tr>
 <tr>
        <td>subbranch</td>
        <td>开户支行</td>
        <td></td>
    </tr>


</table>
<p class="boldStyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
        <td width="51%">响应结果</td>
        <td width="31%">备注</td>
    </tr>
    <tr>
        <td><p>{&quot;success&quot;:true,&quot;msg&quot;:&quot;操作成功&quot;}</p></td>
        <td><p></p></td>
    </tr>
    <?php require_once("../include/error.inc.php");?>
</table>
</div>

<?php require_once("../include/foot.inc.php");?>