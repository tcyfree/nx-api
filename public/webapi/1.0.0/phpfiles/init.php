<?php require_once("../include/head.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/config.inc.php");?>
<?php require_once(SYS_ROOT_PATH."include/language.inc.php");?>
<script>whbRemoveMask();</script>

<div class="contentDIV">
    <p><img src="<?php echo SYS_EXTJS_URL?>images/apple2.gif" alt="" width="16" height="16" /> <span class="titlestyle">功能描述：获取系统初始化信息接口</span> <span class="inforstyle">（此方法应该在登录之前调用）</span> </p>
    <p class="subtitlestyle">（一）服务接口请求地址：</p>
    <table width="90%" border="1" class="dbTable">
        <tr class="td_header">
            <td width="15%">字段名称</td>
            <td width="85%">字段信息</td>
        </tr>
        <tr>
            <td>请求的地址</td>
            <td>[sys_root]index.php/webservice/index/init（<span class="inforstyle">不含版本号</span>）</td>
        </tr>
    </table>
    <p><span class="inforstyle">特别提示：[sys_root]定义请参考系统首页接口说明。</span></p>
    <p class="subtitlestyle">（二）POST参数列表：</p>
    <table width="90%" border="1" class="dbTable">
        <tr class="td_header">
            <td width="19%">参数名称</td>
            <td width="25%">参数说明</td>
            <td width="56%">备注</td>
        </tr>
        <tr>
            <td>lastloginversion</td>
            <td>登录所用的系统版本号</td>
            <td><p>记录用户的登录版本，便于日后维护统计，默认1.0.0版本登录。</p></td>
        </tr>
        <tr>
            <td colspan="3"><p class="inforstyle">【以下为可选项，运营推广换量时使用】</p></td>
        </tr>
        <tr>
            <td>device_sn</td>
            <td>客户端硬件串号</td>
            <td>苹果和安卓均需要传递</td>
        </tr>
        <tr>
            <td>device_mac</td>
            <td>客户端MAC地址</td>
            <td>苹果专用，安卓无需传递</td>
        </tr>
    </table>
    <p class="subtitlestyle">（三）服务接口响应请求：</p>
    <table width="90%" border="1" class="dbTable">
        <tr class="td_header">
            <td width="40%">响应结果</td>
            <td width="42%">备注</td>
        </tr>
        <tr>
            <td><p>{&quot;success&quot;:true,&quot;msg&quot;:&quot;操作成功&quot;;,&quot;infor&quot;:{json信息串}}</p></td>
            <td><p>详见（四）特别备注</p></td>
        </tr>
        <?php require_once("../include/error.inc.php");?>
    </table>
    <p><span class="subtitlestyle">（四）特别备注</span>（infor字段说明）</p>
    <table width="90%" border="1" class="dbTable">
        <tr class="td_header">
            <td width="15%">参数名称</td>
            <td width="25%">参数说明</td>
            <td width="60%" align="left">备注</td>
        </tr>
        <tr class="inforstyle">
            <td> sys_web_service</td>
            <td>后台服务根路径(含版本号)</td>
            <td align="left"><p>&nbsp;</p>
                <p>形如：
                    <?php 
	$login_version="V".str_replace(".","",SYS_VERSION);
	echo SYS_WEB_SERVICE.$login_version.'/<br><br>';
	echo "说明：".$login_version."是服务器转换处理后的版本号，V100 对应客户端版本是1.0.0";
	?>
                </p>
                <p>&nbsp;</p></td>
        </tr>
      <tr class="inforstyle">
            <td> sys_plugins</td>
            <td>第三方插件根路径</td>
            <td align="left"><p>&nbsp;</p>
                <p>形如：
                    <?php 	echo SYS_PLUGINS.'<br>';	?>
                </p>
                <p>&nbsp;</p></td>
        </tr>   
        <tr>
            <td>android_must_update</td>
            <td>安卓强制更新标记</td>
            <td align="left"><p>0：不强制 1：强制</p>
            <p>（当软件架构进行了较大变动，客户端必须强制用户升级到最新版本）</p></td>
        </tr>
          <tr>
            <td>android_last_version</td>
            <td>安卓最新版本号</td>
            <td align="left">将该信息与安卓本机版本号比对，如果不相等，则提醒在线升级</td>
        </tr>
           <tr>
            <td>iphone_must_update</td>
            <td>苹果强制更新标记</td>
            <td align="left"><p>0：不强制 1：强制</p>
               <p>（当软件架构进行了较大变动，客户端必须强制用户升级到最新版本）</p></td>
        </tr>
          <tr>
            <td>iphone_last_version</td>
            <td>苹果最新版本号</td>
            <td align="left">将该信息与苹果本机版本号比对，如果不相等，则提醒在线升级</td>
        </tr>
      
        <tr>
            <td>sys_pagesize</td>
            <td>系统规定单页记录数</td>
            <td align="left">此参数在系统列表分页时需要用到，默认：10</td>
        </tr>
        <tr>
            <td>sys_service_phone</td>
            <td>我公司统一客服电话</td>
            <td align="left">前台客服解疑释惑专用，目前是&quot;186xxxxxxx&quot;</td>
        </tr>
        <!--    <tr>
        <td>sys_default_nopic</td>
        <td>系统默认图片</td>
        <td>形如：<?php echo SYS_DEFAULT_NOPIC;?>，固定尺寸 110*110</td>
    </tr>-->
        <tr>
            <td>android_update_url</td>
            <td>安卓软件更新地址</td>
            <td align="left"><p>类似
                <?php 	echo SYS_ANDROID_URL;	?>
            </p></td>
        </tr>
        <tr>
            <td>iphone_update_url</td>
            <td>苹果软件更新地址</td>
            <td align="left"><p>类似
                <?php 	echo SYS_IPHONE_URL;	?>
            </p></td>
        </tr>
       
    </table>
    <p><span class="inforstyle">特别提示：</span></p>
    <p class="inforstyle"><font color="red">（1）当初始化返回的json数据无法解析时，请复制网址：<?php echo SYS_ROOT?>bom.php到浏览器回车运行</font></p>
    <p><span class="inforstyle">（2）客户端通过init接口后获取到sys_web_service值后，后面的所有接口(除去第三方插件)一定要根据此字段值来组装具体地址，</span><span class="inforstyle">服务器根据客户端传递</span><span class="inforstyle">lastloginversion参数</span><span class="inforstyle">来动态配置此值，以便兼容不同版本的客户端访问。</span></p>
<p><span class="inforstyle">（3）客户端通过init接口后获取到sys_plugins值后，所有第三方插件接口一定要根据此字段值来组装具体地址</span>。</p>
    <p class="inforstyle">（4）无论任何项目，任何带默认性质的图像（包括但不限于默认头像，个人主页顶部默认背景图等），此类图片客户端都应当配置到本缓存中，当发现服务器</p>
    <p class="inforstyle">返回数据为空或服务器图片异常丢失时，即需要用此类默认图片填充图像显示控件。</p>
     <p><span class="subtitlestyle">（五）其他相关说明</span></p>
    <p><b>(1) 关于webview视图：</b></p>
<p> 关于我们：[sys_web_service]+&quot;webview/parm/aboutus&quot;;</p>
    <p>注册协议：[sys_web_service]+&quot;webview/parm/protocal&quot;；</p>
    <!--<p>联系客服：[sys_web_service]+&quot;webview/parm/service&quot;；</p>-->
   
    <p>其余待扩展.....</p>
    <p><b></b></p>
    <p>&nbsp;</p>
</div>


<?php require_once("../include/foot.inc.php");?>