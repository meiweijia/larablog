/*
 * File: app/view/liebiao.js
 *
 * This file was generated by Sencha Architect version 3.1.0.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 5.0.x library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 5.0.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */
Ext.create('Ext.data.Store',
    {
        storeId: 'gongwen',
        fields: ['wenhao', 'biaoti', 'riqi', 'laiwen', 'jingbanren', 'chakan', 'xiazai', 'dayin', 'fuzhi'],
        data: {
            'items': [
                {
                    'wenhao': '湘纪办【2015】1号',
                    'biaoti': '关于组织推荐干部参加省纪委省监察厅公开选调考试的通知',
                    'riqi': '2015-01-12',
                    'laiwen': '省纪委',
                    'jingbanren': '刘赛华',
                    'chakan': '查看',
                    'xiazai': '下载',
                    'dayin': '打印',
                    'fuzhi': '复制'
                }
            ]
        },
        proxy: {
            type: 'memory',
            reader: {
                type: 'json',
                rootProperty: 'items'
            }
        }
    }
);
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
        title: '公文列表',
        reference: 'blog',
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
                        text: '新增',
                        listeners: {
                            click: {
                                fn: function () {
                                    Ext.create('MyApp.view.win.UploadWin').show();
                                }
                            }
                        }
                    },
                    {
                        xtype: 'button',
                        glyph: 0xf044,
                        text: '编辑'
                    },
                    {
                        xtype: 'button',
                        glyph: 0xf1f8,
                        text: '删除'
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
                store: 'gongwen',
                region: 'center',
                selType: 'checkboxmodel',
                listeners: {
                    afterrender: 'onGridPanelAfterrender'
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
                                case 0:
                                    v = '草稿';
                                    break;
                                case 1:
                                    v = '已发布';
                                    break;
                                case 2:
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
