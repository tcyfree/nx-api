/**
 * 操作Cookie   添加   
 * @param name
 * @param value
 * @return
 */
function setCookie(name,value,mins)//两个参数，一个是cookie的名子，一个是值
{
    mins = typeof (mins) == 'undefined' ? 10080 : mins;
    //此 cookie 将被保存 30 天 -1为浏览器关闭　　
    if (mins != -1) {
        var exp = new Date(); ;   //new Date("December 31, 9998");
        exp.setTime(exp.getTime() + mins * 60 * 1000);
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
    }else{
        document.cookie = name + "="+ escape (value) + ";expires=-1";
    }
}

/**
 * 操作Cookie 提取   后台必须是escape编码
 * @param name
 * @return
 */
function getCookie(name)//取cookies函数
{
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
    if(arr != null) return unescape(arr[2]); return null;
}
/**
 * 操作Cookie 删除
 * @param name
 * @return
 */
function delCookie(name)//删除cookie
{   
    var exp = new Date();
    exp.setTime(exp.getTime() - (86400 * 1000 * 1));
    var cval=getCookie(name);
    if(cval!=null)
        document.cookie = name + "="+ escape (cval) + ";expires="+exp.toGMTString();
}
/**
 * 给String 添加trim方法
 */
String.prototype.trim=function(){
    return this.replace(/(^\s*)|(\s*$)/g, "");
}
/**
 * 给String添加isNullOrempty的方法
 */
String.prototype.isnullorempty=function(){
    if(this==null||typeof(this)=="undefined"||this.trim()=="")
        return true;
    return false;
}