//whb:定义系统通用富文本编辑框(扩展自kindeditor)
Ext.define("Ext.ux.form.WhbKindEditor",{
	extend:'Ext.form.field.TextArea',
    alias: 'widget.whbkindeditor',//xtype名称
	width:"100%",//外层通过anchor:98%控制
	height:400,//外部可更改
    initComponent: function () {		
         this.html = "<textarea id='" + this.getId() + "-input' name='" + this.name + "'></textarea>";
         this.callParent(arguments);
         this.on("afterrender", function (t) {
             this.inputEL = Ext.get(this.getId() + "-input");
			 //console.log(t);
             this.editor = KindEditor.create('textarea[name="' + this.name + '"]', {
                 //因为主框架是用相对定位，故此处不能用getHeight方法
				 //height: t.getHeight()-18,//有底边高度，需要减去
                 //width: t.getWidth() - t.getLabelWidth(),//宽度需要减去label的宽度
				 //height:260,
				 //width:300,
				 width:this.width,
				 height:this.height,
				 basePath: SYS_PLUGINS_URL+'kindeditor/',				 
                 uploadJson: SYS_PLUGINS_URL+'kindeditor/php/upload_json.php',//路径自己改一下
                 fileManagerJson:SYS_PLUGINS_URL+ 'kindeditor/php/file_manager_json.php',//路径自己改一下
                 resizeMode: 0,//不能手动拖动长宽
                 wellFormatMode: true,
                 newlineTag: 'br',
				 filterMode:false,//允许输入html
                 allowFileManager: true,
                 allowPreviewEmoticons: true,
                 allowImageUpload: true,
                 items: [
				 	// 'multiimage',//暂时屏蔽多图上传
                    /* '|', 'undo', 'redo', '|', 'preview',, 'code', 'cut', 'copy', 'paste','plainpaste', 'wordpaste',  
					 '|', 'justifyleft', 'justifycenter', 'justifyright',
					 '|','insertorderedlist', 'insertunorderedlist',
					 '|','formatblock', 'fontname', 'fontsize',
					 '|', 'forecolor', 'bold','italic', 'underline', 
					 '|', 'lineheight', '|', 'table', '|','link', 'unlink','|', 'emoticons', 'image',
                     '|', 'source', '|','fullscreen', '|', 'about'*/
					 'source', '|', 'undo', 'redo', '|', 'preview', 'template', 'cut', 'copy', 'paste',
					 'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
					 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
					 'superscript', 'quickformat', 'selectall', '|', 'fullscreen', 
					 //'/',
					 'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
		             'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
		             'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
		             'anchor', 'link', 'unlink', '|', 'about'
                 ]
             });
         });
         /*this.on("resize", function (t, w, h) {
			  if (this.editor) {
				  this.editor.resize(w - t.getLabelWidth(), h-18);
			  }             
         });*/
     },
     setValue: function (value) {
         if (this.editor) {
             this.editor.html(value);
         }
     },
     reset: function () {
         if (this.editor) {
             this.editor.html('');
         }
     },
     setRawValue: function (value) {
         if (this.editor) {
             this.editor.html(value);
         }
     },
     getValue: function () {
         if (this.editor) {
             return this.editor.html();
         } else {
             return ''
         }
     },
     getRawValue: function () {
         if (this.editor) {
             return this.editor.html();
         } else {
             return ''
         }
     }
});