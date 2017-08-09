<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
    <script>whbRemoveMask();</script>

    <div class="contentDIV">
        <p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" width="16" height="16" /> <span class="titlestyle">功能描述：經紀公司代理的在租售的空间列表</span></p>
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
                <td><p>v1/estate/:id/:page/:page_size</p></td>
            </tr>
        </table>
        <p class="subtitlestyle">（二）</p>
        <table width="90%" border="1" class="dbTable">
            <tr class="td_header">
                <td width="106">参数名称</td>
                <td>参数说明</td>
                <td width="533">备注</td>
            <tr class="">
                <td>id</td>
                <td>楼盘主键id</td>
                <td width="533" align="left">
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
                <td>空间主键</td>
                <td></td>
            </tr>
            <tr>
                <td>post_title</td>
                <td>名称</td>
                <td></td>
            </tr>
            <tr>
                <td>update_time</td>
                <td>日期</td>
                <td></td>
            </tr>
            <tr>
                <td>post_floor</td>
                <td>楼层</td>
                <td></td>
            </tr>
            <tr>
                <td>post_seat</td>
                <td>座向</td>
                <td></td>
            </tr>
            <tr>
                <td>post_acreage</td>
                <td>尺数</td>
                <td></td>
            </tr>
            <tr>
                <td>post_sell</td>
                <td>售价（万）</td>
                <td></td>
            </tr>
            <tr>
                <td>post_sell2</td>
                <td>尺价（元）</td>
                <td></td>
            </tr>

        </table>
        <p>&nbsp;</p>
    </div>


<?php require_once("../include/foot.inc.php");?>