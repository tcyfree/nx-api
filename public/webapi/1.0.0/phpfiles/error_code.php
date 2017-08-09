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
    <td>100</td>
    <td><?php echo $msg["100"]?></td>
  </tr>
  <tr>
    <td>101</td>
    <td><?php echo $msg["101"]?></td>
  </tr>
  <tr>
    <td>102</td>
    <td><?php echo $msg["102"]?></td>
  </tr>
   <tr>
    <td>103</td>
    <td><?php echo $msg["103"]?></td>
  </tr>
   <tr>
    <td>104</td>
    <td><?php echo $msg["104"]?></td>
  </tr>
  <tr>
    <td>105</td>
    <td><?php echo $msg["105"]?></td>
  </tr>
  <tr>
    <td>106</td>
    <td><?php echo $msg["106"]?></td>
  </tr>
  <tr>
    <td>107</td>
    <td><?php echo $msg["107"]?></td>
  </tr>
  <tr>
    <td>108</td>
    <td><?php echo $msg["108"]?></td>
  </tr>
   <tr>
    <td>109</td>
    <td><?php echo $msg["109"]?></td>
  </tr>
    <tr class="redStyle">
        <td>110</td>
        <td><?php echo $msg["110"]?></td>
    </tr>
    <tr>
        <td>111</td>
        <td><?php echo $msg["111"]?></td>
    </tr>
    <tr>
        <td>112</td>
        <td><?php echo $msg["112"]?></td>
    </tr>
   <tr class="redStyle">
       <td>200</td>
       <td><?php echo $msg["200"]?></td>
   </tr>
    <!--
     <tr>
    <td>203</td>
    <td><?php echo $msg["203"]?></td>
  </tr>
 <tr>
    <td>204</td>
    <td><?php echo $msg["204"]?></td>
  </tr>
  <tr>
    <td>205</td>
    <td><?php echo $msg["205"]?></td>
  </tr>
   <tr>
    <td>207</td>
    <td><?php echo $msg["207"]?></td>
  </tr>
   <tr>
    <td>208</td>
    <td><?php echo $msg["208"]?></td>
  </tr>
    <tr>
    <td>209</td>
    <td><?php echo $msg["209"]?></td>
  </tr>
    <tr>
    <td>206</td>
    <td><?php echo $msg["206"]?></td>
  </tr>-->
  <tr>
    <td>300</td>
    <td><?php echo $msg["300"]?></td>
  </tr>
  <tr>
    <td>301</td>
    <td><?php echo $msg["301"]?></td>
  </tr>
  <tr>
    <td>302</td>
    <td><?php echo $msg["302"]?></td>
  </tr>
<tr>
    <td>304</td>
    <td><?php echo $msg["304"]?></td>
  </tr>
   <tr>
       <td>402</td>
       <td><?php echo $msg["402"]?></td>
   </tr>
  <tr>
    <td>403</td>
    <td><?php echo $msg["403"]?></td>
  </tr>
  <tr>
    <td>404</td>
    <td><?php echo $msg["404"]?></td>
  </tr>
  <tr>
    <td>500</td>
    <td><?php echo $msg["500"]?></td>
  </tr>
  
</table>
<p class="inforstyle">提示： 在整个项目当中，所有的error_code，标识和描述说明具有唯一性。 例如： 102 错误编码在任何服务响应当中，都代表“ <?php echo $msg["102"]?>”。</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>