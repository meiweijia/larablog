/**
 * Created by Administrator on 2015/11/21.
 */
Ext.define('MyApp.view.custom.UEditor', {
    extend: Ext.form.FieldContainer,
    alias: 'widget.ueditor',
    alternateClassName: 'Ext.form.UEditor',
    ueditorInstance: null,
    initialized: false,
    initComponent: function () {
        var me = this;
        var id = me.id + '-ueditor';
        me.html = '<script id="' + id + '" type="text/plain" name="' + me.name + '"></script>';
        me.callParent(arguments);
        me.on('render', function () {
            console.log(me.width);
            var width = me.width;
            var height = me.height;
            var config = {
                initialFrameWidth: width,
                zIndex:999999,
                initialFrameHeight: height,
                scaleEnabled: true,
toolbars: [
[
'source', //源代码
'|',
'undo', //撤销
'redo', //重做
'|',
'bold', //加粗
'italic', //斜体
'underline', //下划线
'strikethrough', //删除线
'|',
'superscript', //上标
'subscript', //下标
'|',
'forecolor', //字体颜色
'backcolor', //背景色
'|',
'formatmatch', //格式刷
'removeformat', //清除格式
'|',
'insertorderedlist', //有序列表
'insertunorderedlist', //无序列表
'|',
'customstyle', //自定义标题
'paragraph', //段落格式
'insertcode', //代码语言
'fontfamily', //字体
'fontsize', //字号
],
[

'indent', //首行缩进
'justifyleft', //居左对齐
'justifyright', //居右对齐
'justifycenter', //居中对齐
'justifyjustify', //两端对齐
'directionalityltr', //从左向右输入
'directionalityrtl', //从右向左输入
'|',
'fontborder', //字符边框
'blockquote', //引用
'pasteplain', //纯文本粘贴模式
'|',
'horizontal', //分隔线
'link', //超链接
'unlink', //取消链接
'|',
'attachment', //附件
'simpleupload', //单图上传
'insertimage', //多图上传
'|',
'emotion', //表情
'spechars', //特殊字符
'pagebreak', //分页
'lineheight', //行间距
'autotypeset', //自动排版
'drafts', // 从草稿箱加载
'preview', //预览
]
]
            };
            /**
             * 实例化UE
             */
            me.ueditorInstance = UE.getEditor(id,config);
            me.ueditorInstance.ready(function () {
                me.initialized = true;
                me.ueditorInstance.addListener('contentChange', function () {
                    me.fireEvent('change', me);
                });
            });
        });
    },
    getValue: function () {
        var me = this,
            value = '';
        if (me.initialized) {
            value = me.ueditorInstance.getContent();
        }
        me.value = value;
        return value;
    },
    setValue: function (value) {
        var me = this;
        if (value === null || value === undefined) {
            value = '';
        }
        console.log(me.initialized);
        if (me.initialized) {
            me.ueditorInstance.setContent(value);
        }
        return me;
    },
    onDestroy: function () {
        this.ueditorInstance.destroy();
    }
});