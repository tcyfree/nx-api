//EXTJS 登录处理文件
function LoginWin(){
    Ext.QuickTips.init();
    var form = Ext.create('Ext.form.Panel', {
        layout: 'absolute',
        defaultType: 'textfield',
        border: true,
        fieldDefaults: {
            msgTarget: 'side',
            labelWidth: 30,
            x: 5,
            allowBlank: false,
            anchor: '-5'
        },
        items: [{
            fieldLabel: '账号',
            fieldWidth: 40,
            y: 15,
            name: 'UserName',
            id: 'UserName',
            listeners: {
                "specialkey": function (field, e) {
                    if (e.keyCode == 13)
                        Ext.getCmp("PWD").focus(true, true);
                }
            }
        }, {
            fieldLabel: '密码',
            fieldWidth: 60,
            inputType: "password",
            msgTarget: 'side',
            y: 45,
            name: 'PWD',
            id: "PWD",
            listeners: {
                "specialkey": function (field, e) {
                    if (e.keyCode == 13) {
                        if (this.up('form').getForm().isValid()) {
                            var user = Ext.getCmp("UserName").getValue();
                            var pwd = Ext.getCmp("PWD").getValue();
                            LoginAction(user, pwd);
                        }
                    }
                    else if (e.keyCode == 9)
                        Ext.getCmp("UserName").focus(true, true);
                }
            }
        }, {
            xtype: 'checkboxfield',
            boxLabel: '记住账号', 
            y: 75, x: 100,
            id: 'rememberme'
        }, {
            xtype: 'checkboxfield',
            boxLabel: '自动登录', 
            y: 75, x:166,
            id: 'loginauot'
        }
        ],
        buttons: [{
            text: '确定',
            id:"btnlogin",
            handler: function() {
                if (this.up('form').getForm().isValid()) {
                    var user = Ext.getCmp("UserName").getValue();
                    var pwd = Ext.getCmp("PWD").getValue();
                    LoginAction(user, pwd);
                }
            }
        },{
            text: '取消',
            handler: function() {
                this.up('form').getForm().reset();
                Ext.getCmp("UserName").focus(true, true);
            }
        }]
    });

    var win = Ext.create('Ext.Window', {
        title: '请登录--权限管理系统',
        width: 250,
        height: 167,
        layout: 'fit',
        closable: false,
        resizable: false,
        plain:true,
        modal: true,
        items: form
    });
    win.show();
    Ext.getCmp("UserName").focus(true, true);

    var uname = getCookie('cookieName_username');
    var upass = getCookie('cookieName_password')
    if (uname != null && !uname.toString().isnullorempty()) {
        Ext.getCmp("UserName").setValue(uname);
        Ext.getCmp("PWD").focus(true, true);
        Ext.getCmp("rememberme").setValue(true);
    }
    if (uname != null && !uname.toString().isnullorempty() && upass != null && !upass.toString().isnullorempty()) {
        LoginAction(uname, upass, false);
    }
}

function LoginAction(user, pwd, type)
{
    if (user == 'admin' && pwd == 'admin') {

//        delCookie('cookie_login');
//        setCookie('cookie_login', pwd, 20);
        
        if (Ext.getCmp('rememberme').getValue()) {
            delCookie('cookieName_username');
            setCookie('cookieName_username', user);
        }
        else {
            delCookie('cookieName_username');
            delCookie('cookieName_password');
        }
        if (Ext.getCmp("loginauot").getValue()) {
            delCookie('cookieName_username');
            delCookie('cookieName_password');
            setCookie('cookieName_username', user);
            setCookie('cookieName_password', pwd);
        }
        window.location.href = "Main.htm";
    }
    else {
        if(typeof (type) == "undefined")
            Ext.MessageBox.alert('<font color=red>温馨提示</font>', '<font color=red>账号或密码错误，请重新输入！</font>', act);
    }
}

function act(btn)
{
    Ext.getCmp("PWD").focus(true, true);
}
