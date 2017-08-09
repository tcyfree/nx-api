<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
    <script>whbRemoveMask();</script>

    <div class="contentDIV">
        <p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：获取楼盘列表接口</span></p>
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
                <td><p>v1/estate/:type/:keyword/:page/:page_size</p></td>
            </tr>
        </table>
        <p class="subtitlestyle">（二）</p>
        <table width="90%" border="1" class="dbTable">
            <tr class="td_header">
                <td width="106">参数名称</td>
                <td>参数说明</td>
                <td width="533">备注</td>
            <tr class="">
                <td>type</td>
                <td><p>0：不分类</p>
                    <p>1：网友热论 </p>
                    <p>2：热门成交</p></td>
                <td width="533" align="left">
            </tr>
            <tr class="">
                <td>keyword</td>
                <td>按关键词搜索</td>
                <td><font color="red">默认值0</font></td>
            </tr>
            <?php require_once("../include/page.inc.php");?>
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
                <td>楼盘主键</td>
                <td></td>
            </tr>
            <tr>
                <td>post_title</td>
                <td>名称</td>
                <td></td>
            </tr>
            <tr>
                <td>more</td>
                <td>封面图url</td>
                <td></td>
            </tr>

        </table>
        <p>&nbsp;</p>
    </div>


<?php require_once("../include/foot.inc.php");?>