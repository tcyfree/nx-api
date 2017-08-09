if (window.name != "mainframe") 
     window.location.href = "Default.htm"; 

/*
Copyright (c) 2012 cwisme

Contact:  Email:cwisme@qq.com

*/
Ext.popup = function(){
    //var msgCt;
    function createBox(s, c) {
        return '<div class="msg"><font color=' + c + '>' + s + '</font></div>';
    }
    return {
        msg: function (text, color) {
            color = typeof (color) == 'undefined' ? 'green' : color;
            if (!window.parent.msgCt) {
                window.parent.msgCt = Ext.DomHelper.insertFirst(window.parent.window.document.body, { id: 'msg-div' }, true);//document.body
            }
            var s = Ext.String.format.apply(String, Array.prototype.slice.call(arguments, 0));
            var m = Ext.DomHelper.append(window.parent.msgCt, createBox(s, color), true);
            m.hide();
            m.slideIn('t').ghost("t", { delay: 1500, remove: true});
            
            window.parent.RemoveMsg()

        },
        init : function(){
        }
    };
}();



var StringBuilder = function(){
     this.cache = [];
     if(arguments.length)this.append.apply(this,arguments);
 }
 StringBuilder.prototype = {
     prepend:function(){
         this.cache.splice.apply(this.cache,[].concat.apply([0,0],arguments));
         return this;
     },
     append:function(){
         this.cache = this.cache.concat.apply(this.cache,arguments);
         return this;
     },
     toString:function(){
         return this.getString();
     },
     getString:function(){
         return this.cache.join('');    
     }
 }
 
 var GetAjax = function(url,params){
    Ext.Ajax.request({
        url: url,
        params : params,
        success: function(response, opts) {
            return Ext.decode(response.responseText);
        },
        failure: function(response, opts) {
            return Ext.decode('{success:false,msg:"网络出现异常，与服务器断开连接！"}');
        }
    });
 }