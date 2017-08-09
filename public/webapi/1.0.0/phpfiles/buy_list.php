<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：已购商品列表</span>(已付款订单列表)</p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td>[sys_web_service]buy_list</td>
  </tr>
</table>
<p class="subtitlestyle">（二）POST参数列表：</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
        <td width="106">参数名称</td>
        <td>参数说明</td>
        <td width="533" align="left">备注</td>
    </tr>
   <tr>
     <td>token</td>
     <td>登录令牌</td>
     <td width="533" align="left">&nbsp;</td>
   </tr>
   <?php require_once("../include/page.inc.php");?>
</table>
<p class="subtitlestyle">（三）服务接口响应请求：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="47%">响应结果</td>
    <td width="53%">备注</td>
  </tr>
  <tr>
    <td>{"success":true,"msg":"操作成功",&quot;infor&quot;:json信息串}</td>
    <td><p>详见（五）特别备注</p></td>
  </tr>
  <?php require_once("../include/error.inc.php");?>
  <?php require_once("../include/totalCount.inc.php");?>
</table>
<p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
<table width="90%" border="1" class="dbTable">
    <tr class="td_header">
        <td width="89">参数名称</td>
        <td width="190">参数说明</td>
        <td width="600">备注</td>
    </tr>
    <tr>
        <td>id</td>
        <td>购物车记录主键id</td>
        <td>特别注意：订单号等同于记录主键id</td>
    </tr>
    <tr>
        <td>client_id</td>
        <td>用户id</td>
        <td>&nbsp;</td>
    </tr>
  <tr>
        <td>keyid</td>
        <td>商品id</td>
        <td>比如blog_id</td>
    </tr>
   <tr>
        <td>buycount</td>
        <td>购买份数</td>
        <td>&nbsp;</td>
    </tr>
     <tr>
        <td>total_fee</td>
        <td>订单交易金额</td>
        <td><p>total_fee=商品现价price*购买份数buycount</p>
            <p>（购买时静态化到购物车数据表）</p></td>
    </tr>
    
    <tr>
        <td>content</td>
        <td>商品内容</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>imgurl</td>
        <td>商品图片</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>payflag</td>
        <td>付款状态</td>
        <td>0未付 1已付</td>
    </tr>
      <tr>
          <td>regdate</td>
          <td>日期</td>
          <td></td>
      </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php require_once("../include/foot.inc.php");?>