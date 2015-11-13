/**
 * Created by Administrator on 2015/11/13.
 */
Ext.Loader.setConfig({});

Ext.application({
    views:[
        'MainView'
    ],
    name:'MyApp',
    launch:function(){
        Ext.setGlyphFontFamily('FontAwesome');
        Ext.create('MyApp.view.MainView',{renderTo:Ext.getBody()});
    }
});