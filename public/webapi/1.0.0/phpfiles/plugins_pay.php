<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>


<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取是一个支付凭据Charge对象，所有和支付相关的要素信息都存储在这个对象中</span></p>
<p class="boldStyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>具体的地址</td>
    <td>[sys_web_service]charge_get</td>
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
    <td>channel</td>
    <td>支付使用的第三方支付渠道</td>
    <td align="center">
        <p>1.微信：wx
        </p>
        <p>2.支付宝：alipay</p>
        <p>3.微信公众号：wx_pub</p></td>
       <p>4.其余待扩张.....</p></td>
  </tr>
  <tr align="center">
    <td>amount</td>
    <td>支付交易金额</td>
    <td align="center"><p></p>单位：元(测试时统一传递0.01元)</p>
        <p>必须是一个介于 0.01 和 10000000 之间的整数</p></td>
  </tr>
    <tr>
        <td>name</td>
        <td width="152">项目标题</td>
        <td width="597" align="left">&nbsp;</td>
    </tr>
    <tr>
        <td>return_name</td>
        <td width="152">回报标题</td>
        <td width="597" align="left">&nbsp;</td>
    </tr>
    <tr>
        <td>id</td>
        <td width="152">项目主键</td>
        <td width="597" align="left">&nbsp;</td>
    </tr>
    <tr>
        <td>return_id</td>
        <td width="152">回报主键id</td>
        <td width="597" align="left">&nbsp;</td>
    </tr>
    <tr>
        <td>address_id</td>
        <td width="152">收货地址id</td>
        <td width="597" align="left">&nbsp;</td>
    </tr>
    <tr>
        <td>username</td>
        <td width="152">仅微信公众号支付需要此参数</td>
        <td width="597" align="left">&nbsp;</td>
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