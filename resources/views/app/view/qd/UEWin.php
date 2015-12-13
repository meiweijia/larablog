Ext.define('MyApp.view.win.UEWin',
    {
        extend: 'Ext.window.Window',
        alias: 'widget.uewin',

        requires: [
            'MyApp.view.custom.UEditor',
        ],
        modal: true,
        autoShow: true,
        minHeight: 500,
        height: 'auto',
        glyph: 0xf0ee,
        width: 900,
        layout: 'fit',
        //controller : 'uewin',
        dockedItems: [
            {
                xtype: 'toolbar',
                items: [
                    '->',
                    {
                        xtype: 'button',
                        reference:'saveBtn',
                        glyph: 0xf0c7,
                        text: '保存',
                        listeners:{
                            click:{
                                fn:function(btn)
                                {
                                    var win = btn.up('window');
                                    var form = win.down('form');
                                    var content = form.down('ueditor');
                                    console.log(content);
                                }
                            }
                        }
                    },
                    {
                        xtype: 'button',
                        reference:'closeBtn',
                        glyph: 0xf00d,
                        text: '关闭',
                        listeners:{
                            click:{
                                fn: function (btn) {
                                    btn.up('window').close();
                                }
                            }
                        },
                    }
                ]
            },
        ],
        items: [
            {
                xtype: 'form',
                border:false,
                items: [
                    {
                        xtype:'fieldcontainer',
                        layout: {
                            type: 'table',
                            columns: 3
                        },
                        defaults: {
                            labelWidth: 60,
                            margin: '10 0 0 0',
                            labelAlign: 'right',
                            colspan: 1
                        },
                        items:[
                            {
                                xtype:'hidden',
                                name:'id'
                            },
                            {
                                xtype: 'textfield',
                                name:'post_title',
                                width:'100%',
                                fieldLabel: '标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题',
                                colspan:3
                            },
                            {
                                xtype: 'combobox',
                                name:'post_column',
                                fieldLabel: '栏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目'
                            },
                            {
                                xtype: 'textfield',
                                name:'post_password',
                                fieldLabel: '密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码'
                            },
                        ]
                    },
                    {
                        id: 'articleContent',
                        itemId:'articleContent',
                        margin:10,
                        colspan:3,
                        reference: 'articleContent',
                        xtype: 'ueditor',
                        height:200,
                        name: 'post_content',
                        listeners: {
                            'change': function () {
                                var me = this;
                                me.isChanged = true;
                            }
                        }
                    }
                ]
            }

        ]
    }
);