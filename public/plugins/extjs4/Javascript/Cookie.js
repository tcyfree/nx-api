/**
 * ����Cookie   ���   
 * @param name
 * @param value
 * @return
 */
function setCookie(name,value,mins)//����������һ����cookie�����ӣ�һ����ֵ
{
    mins = typeof (mins) == 'undefined' ? 10080 : mins;
    //�� cookie �������� 30 �� -1Ϊ������رա���
    if (mins != -1) {
        var exp = new Date(); ;   //new Date("December 31, 9998");
        exp.setTime(exp.getTime() + mins * 60 * 1000);
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
    }else{
        document.cookie = name + "="+ escape (value) + ";expires=-1";
    }
}

/**
 * ����Cookie ��ȡ   ��̨������escape����
 * @param name
 * @return
 */
function getCookie(name)//ȡcookies����
{
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
    if(arr != null) return unescape(arr[2]); return null;
}
/**
 * ����Cookie ɾ��
 * @param name
 * @return
 */
function delCookie(name)//ɾ��cookie
{   
    var exp = new Date();
    exp.setTime(exp.getTime() - (86400 * 1000 * 1));
    var cval=getCookie(name);
    if(cval!=null)
        document.cookie = name + "="+ escape (cval) + ";expires="+exp.toGMTString();
}
/**
 * ��String ���trim����
 */
String.prototype.trim=function(){
    return this.replace(/(^\s*)|(\s*$)/g, "");
}
/**
 * ��String���isNullOrempty�ķ���
 */
String.prototype.isnullorempty=function(){
    if(this==null||typeof(this)=="undefined"||this.trim()=="")
        return true;
    return false;
}