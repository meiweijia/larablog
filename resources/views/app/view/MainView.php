Ext.define('MyApp.view.MainView',
    {
        extend: 'Ext.container.Viewport',
        alias: 'widget.mainview',

        requires: [
            'MyApp.view.MainViewViewModel',
            'MyApp.view.MainViewViewController',
            'Ext.tree.Panel',
            'Ext.tree.View',
            'Ext.tab.Panel',
            'Ext.tab.Tab',
            'Ext.toolbar.Toolbar'
        ],

        controller: 'mainview',
        listeners: {
            afterrender: 'onMainViewAfterRender'
        },
        viewModel: {
            type: 'mainview'
        },
        itemId: 'mainView',
        layout: 'border',

        items: [
            {
                xtype: 'panel',
                reference: 'viewportLeftPanel',
                region: 'west',
                split: true,
                width: 200,
                layout: {
                    type: 'accordion'
                },
                defaults: {
                    xtype: 'treepanel',
                    rootVisible: false,
                    singleExpand: true,
                    useArrows: true,
                    line: false,
                    loadMask: true,
                    listeners: {
                        expand: 'onMainViewportLeftPanelExpand',
                        itemclick: 'onTreepanelItemClick'
                    },
                },
                items: [
                    {
                        reference: 'appTreepanel',
                        title: '前台管理',
                        root: {
                            expanded: true,
                            children: [
                                { text: '博文管理', leaf: true,view_class:'MyApp.view.qd.blog' },
                                { text: '栏目管理', leaf: true,view_class:'MyApp.view.qd.sort' },
                                { text: '相册管理', leaf: true,view_class:'MyApp.view.qd.album' },
                                { text: '图片管理', leaf: true,view_class:'MyApp.view.qd.photo' },
                            ]
                        },
                        //listeners: {
                        //    itemclick: 'onTreepanelItemClick',
                        //    beforerender: 'OnappTreepanelAfterrender'
                        //}
                    },
                    {
                        reference: 'secTreepanel',
                        title: '系统管理'
                    }
                ]
            },
            {
                xtype: 'tabpanel',
                reference: 'content_panel',
                region: 'center',
                //overflowX: 'auto',
                defaults: {
                    minWidth: 900,
                    closable: true
                },
                activeTab: 0,
                items: [
                    {
                        xtype: 'panel',
                        reference: 'homeTabpanel',
                        closable: false,
                        glyph: 61461,
                        autoScroll: true,
                        layout: {
                            type: 'vbox',
                            align: 'stretch'
                        },
                        items: []
                    }
                ]
            },
            {
                xtype: 'container',
                region: 'north',
                cls: 'app-header',
                items: [
                    {
                        xtype: 'toolbar',
                        reference: 'topToolbar',
                        ui: 'footer',
                        height: 32,
                        defaults: {
                            xtype: 'tbtext'
                        },
                        items: [
                            {
                                html: '<font size=\"3\">夜风博客后台管理系统</font>'
                            },
                            {
                                xtype: 'tbfill'
                            },
                            {
                                reference: 'organizationTbtext'
                            },
                            {
                                reference: 'departmentTbtext'
                            },
                            {
                                reference: 'staffTbtext'
                            },
                            {
                                xtype: 'button',
                                reference: 'logoutButton',
                                glyph: 61838,
                                listeners:{
                                    click:{
                                        fn:function()
                                        {
                                            window.location.href = '/User/logout';
                                        }
                                    }
                                },
                                tooltip: '退出系统'
                            }
                        ]
                    }
                ]
            },
            {
                xtype: 'container',
                region: 'south',
                items: [
                    {
                        xtype: 'toolbar',
                        reference: 'bottomToolbar',
                        ui: 'footer',
                        height: 30,
                        defaults: {
                            xtype: 'tbtext'
                        },
                        items: [
                            {
                                text: '状态：就绪'
                            },
                            '->',
                            {
                                text: '夜风基于extjs开发'
                            },
                            {
                                text: '18670031244'
                            },
                            {
                                text: 'meiweijia@vip.qq.com'
                            },
                            {
                                itemId: 'clockTbtext',
                                reference: 'clockTbtext'
                            }
                        ]
                    }
                ]
            }
        ]
    }
);