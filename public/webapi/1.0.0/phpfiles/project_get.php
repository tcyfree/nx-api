<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取项目详情信息接口</span></p>
<p class="subtitlestyle">（一）服务接口请求地址：</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="15%">字段名称</td>
    <td width="85%">字段信息</td>
    </tr>
  <tr>
    <td>请求的地址</td>
    <td><p>[sys_web_service]project_get</p></td>
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
    <td>id</td>
    <td>项目主键id</td>
    <td></td>
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
    <td>项目id</td>
    <td></td>
  </tr>
  <tr>
    <td>format_start_time</td>
    <td>开始时间</td>
    <td><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>format_end_time</td>
    <td>结束时间</td>
    <td>&nbsp;</td>
  </tr>

 <tr>
     <td>project_description</td>
     <td width="210">项目详情</td>
     <td width="567"><p>&nbsp;</p></td>
 </tr>
 <tr>
   <td>video</td>
   <td>视频简介</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>videourl</td>
   <td>视频封面</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
     <td>mode</td>
     <td>项目模式</td>
     <td>&nbsp;</td>
 </tr>
    <tr>
     <td>share_content</td>
     <td>分享内容</td>
     <td>&nbsp;</td>
 </tr>
    <tr>
        <td>return_name</td>
        <td>回报标题</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>quota_left</td>
        <td>剩余名额</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>return_date</td>
        <td>回报天数</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>return_description</td>
        <td>回报描述</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>support_money</td>
        <td>支持金额</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>return_description</td>
        <td>回报描述</td>
        <td>&nbsp;</td>
    </tr>
    <tr>

        <td>flag</td>
        <td>是否包邮</td>
        <td>0：不包邮  1：包邮</td>

    </tr>
    <tr>

        <td>collectflag</td>
        <td>是否已收藏</td>
        <td>0：未收藏  1：已收藏</td>

    </tr>
    <tr>

        <td>projectStatus</td>
        <td>项目状态</td>
        <td>0即将开始、1正在进行、2往期回顾</td>

    </tr>


    
</table>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>