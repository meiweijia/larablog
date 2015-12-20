
    Ext.define('MyApp.view.qd.blog',
        {
            extend: 'Ext.panel.Panel',
            alias: 'widget.mypanel3',

            requires: [
                'MyApp.view.qd.blogViewModel',
                'MyApp.view.qd.blogViewController',
                'Ext.toolbar.Toolbar',
                'Ext.button.Button',
                'Ext.toolbar.Separator',
                'Ext.form.Panel',
                'Ext.form.field.ComboBox',
                'Ext.form.field.Date',
                'Ext.form.trigger.Spinner',
                'Ext.form.field.Spinner',
                'Ext.grid.Panel',
                'Ext.grid.View',
                'Ext.grid.column.Check'
            ],
            viewModel: {
                type: 'mypanel'
            },
            controller: {
                type: 'mypanel'
            },
            reference: 'blog',
            overflowY: 'auto',
            dockedItems: [
                {
                    xtype: 'toolbar',
                    dock: 'top',
                    padding: '0 0 1 0',
                    style: 'background-color:#F5F5F5; background-image:url();',
                    height: 30,
                    items: [
                        '->',
                        {
                            xtype: 'textfield',
                            labelWidth: 60,
                            fieldLabel: '',
                            emptyText: '请输入关键字'
                        },
                        {
                            xtype: 'button',
                            glyph: 0xf002,
                            text: '查找'
                        },
                        {
                            xtype: 'button',
                            glyph: 0xf0fe,
                            reference: 'addBtn',
                            text: '新增',
                            listeners: {
                                click: 'OnaddBtnClick'
                            }
                        },
                        {
                            xtype: 'button',
                            reference: 'editBtn',
                            glyph: 0xf044,
                            text: '编辑',
                            listeners: {
                                click: 'OneditBtnClick'
                            }
                        },
                        {
                            xtype: 'button',
                            reference: 'delBtn',
                            glyph: 0xf1f8,
                            text: '删除',
                            listeners: {
                                click: 'OndelBtnClick'
                            }
                        }
                    ]
                },
                {
                    xtype: 'pagingtoolbar',
                    reference: 'blog_pagingtoolbar',
                    dock: 'bottom',
                    displayInfo: true
                }
            ],
            items: [
                {
                    xtype: 'gridpanel',
                    enableColumnHide: false,
                    forceFit: false,
                    sortableColumns: false,
                    region: 'center',
                    reference: 'gridpanel',
                    selType: 'checkboxmodel',
                    listeners: {
                        afterrender: 'onGridPanelAfterrender',
                        itemdblclick: 'onGridPanelItemdblclick'
                    },
                    columns: [
                        {
                            xtype: 'gridcolumn',
                            align: 'center',
                            width: 60,
                            dataIndex: 'id',
                            text: 'ID'
                        },
                        {
                            xtype: 'gridcolumn',
                            flex: 2,
                            minWidth: 200,
                            dataIndex: 'post_title',
                            text: '文章标题'
                        },
                        {
                            xtype: 'datecolumn',
                            format: 'Y-m-d H:i:s',
                            align: 'center',
                            flex: 1,
                            minWidth: 100,
                            dataIndex: 'created_at',
                            text: '发表日期'
                        },
                        {
                            xtype: 'gridcolumn',
                            flex: 1,
                            minWidth: 200,
                            dataIndex: 'post_status',
                            text: '文章状态',
                            renderer: function (v) {
                                switch (v) {
                                    case '0':
                                        v = '草稿';
                                        break;
                                    case '1':
                                        v = '已发布';
                                        break;
                                    case '2':
                                        v = '私密';
                                        break;
                                    default:
                                        v = '';
                                }
                                return v;
                            }
                        }
                    ]
                }
            ]

        }
    );
    var click = function (v) {
        Ext.Msg.alert('提示', '我是' + v);
    }
    /**
     *
     */
    Ext.define('MyApp.view.qd.edit',
        {
            extend: 'Ext.window.Window',
            alias: 'widget.uewin',
            title: '发布文章',
            requires: [
                'MyApp.view.custom.UEditor',
            ],
            modal: true,//maximized:true,
            autoShow: true,
            height: 600,
            glyph: 0xf067,
            width: 800,
            layout: 'fit',
            resizable: false,
            controller: 'mypanel',
            listeners: {
                show: 'OneditWinShow'
            },
            dockedItems: [
                {
                    xtype: 'toolbar',
                    items: [
                        '->',
                        {
                            xtype: 'button',
                            reference: 'saveBtn',
                            glyph: 0xf0c7,
                            text: '保存',
                            listeners: {
                                click: {
                                    fn: function (btn) {
                                        var win = btn.up('window');
                                        var form = win.down('form');
                                        var content = win.down('#articleContent').getValue();
                                        form.submit({
                                            clientValidation: true,
                                            url: '/admin/post/update',
                                            params: {
                                                post_content: content
                                            },
                                            success: function (form, action) {
                                                win.close();
                                                Ext.Msg.alert('提示', action.result.msg);
                                            },
                                            failure: function (form, action) {
                                                switch (action.failureType) {
                                                    case Ext.form.action.Action.CLIENT_INVALID:
                                                        Ext.Msg.alert('Failure', 'Form fields may not be submitted with invalid values');
                                                        break;
                                                    case Ext.form.action.Action.CONNECT_FAILURE:
                                                        Ext.Msg.alert('Failure', 'Ajax communication failed');
                                                        break;
                                                    case Ext.form.action.Action.SERVER_INVALID:
                                                        Ext.Msg.alert('Failure', action.result.msg);
                                                }
                                            }
                                        });
                                    }
                                }
                            }
                        },
                        {
                            xtype: 'button',
                            reference: 'closeBtn',
                            glyph: 0xf00d,
                            text: '关闭',
                            listeners: {
                                click: {
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
                    overflowY: 'auto',
                    border: false,
                    layout: {
                        type: 'table',
                        columns: 3
                    },
                    defaults: {
                        labelWidth: 60,
                        width: '97%',
                        margin: '10 0 0 0',
                        labelAlign: 'right',
                        colspan: 1
                    },
                    items: [
                        {
                            xtype: 'hidden',
                            itemId: 'id',
                            name: 'id'
                        },
                        {
                            xtype: 'hidden',
                            name: '_token',
                            value: "<?php echo csrf_token(); ?>"
                        },
                        {
                            xtype: 'hidden',
                            itemId: 'post_author',
                            name: 'post_author',
                            value: 'admin'
                        },
                        {
                            xtype: 'textfield',
                            itemId: 'post_title',
                            name: 'post_title',
                            width: '99%',
                            fieldLabel: '标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题',
                            colspan: 3
                        },
                        {
                            xtype: 'combobox',
                            itemId: 'post_column',
                            name: 'post_column',
                            fieldLabel: '栏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目',
                            store: [
                                '0',
                                '1',
                                '2'
                            ]
                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: '文章状态',
                            editable: false,
                            name: 'post_status',
                            valueField: 'id',
                            displayField: 'value',
                            itemId: 'post_status',
                            store: Ext.create('Ext.data.Store', {
                                fields: [
                                    'id', 'name'
                                ],
                                data: [
                                    {id: 0, value: '草稿'},
                                    {id: 1, value: '已发布'},
                                    {id: 2, value: '加密'}
                                ],
                            })
                        },
                        {
                            xtype: 'textfield',
                            inputType: 'password',
                            itemId: 'post_password',
                            name: 'post_password',
                            fieldLabel: '密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码'
                        },
                        {
                            id: 'articleContent',
                            itemId: 'articleContent',
                            margin: 10,
                            colspan: 3,
                            reference: 'articleContent',
                            xtype: 'ueditor',
                            width: 780,
                            height: 330,
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