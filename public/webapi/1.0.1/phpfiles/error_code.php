<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
<p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：错误编码汇总表</span></p>
<p>&nbsp;</p>
<table width="90%" border="1" class="dbTable">
  <tr class="td_header">
    <td width="37%">error_code标识</td>
    <td width="63%">描述说明</td>
  </tr>
    <tr>
        <td>999</td>
        <td><?php echo $msg["999"]?></td>
    </tr>
  <tr>
    <td>10000</td>
    <td><?php echo $msg["10000"]?></td>
  </tr>

    <td>20001</td>
    <td><?php echo $msg["20001"]?></td>
  </tr>

  
</table>
<p class="inforstyle">提示： 在整个项目当中，所有的error_code，标识和描述说明具有唯一性。 例如： 10000 错误编码在任何服务响应当中，都代表“ <?php echo $msg["10000"]?>”。</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>