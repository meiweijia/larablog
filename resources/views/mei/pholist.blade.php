@extends('mei.main')

@section('post')
    <?php echo "<script>document.title= '测试{$id} - 梅渭甲的个人博客';</script>";?>
    <div id="content" class="right-col-fixed">

                <div class="posts fullwidth singlepost">
                        <div id="photo-list" class="short arc-con">
                            <h1>测试<?php echo $id; ?></h1>
                            <hr>
                            <div class="shopbox">
                                <div class="thumbnail">
                                    <a href="javascript:(0);" title="测试1（19P）">
                                        <div class="thumbnail-1">
                                        <img  src="http://b206.photo.store.qq.com/psb?/V11LAT1J0P2PG5/xqlYt17gR7f5wzSmU*p5I4OYkUffUD469rgmqIcBDPA!/b/YYdHz3qrjgAAYoLL03qWjgAAb4rX03oqjQAA&bo=ngL3AUAGsAQBBbo!&rf=viewer_4" class="attachment-thumbnail" alt="174710xis3xrfplfxefm3s" original="//7xiwox.com1.z0.glb.clouddn.com/img/thumbnail.png">
                                        </div>
                                    </a>
                                    <p class="phoht meta">
                                        <span class="date_time">上传时间：2015-12-12</span>
                                    </p>
                                </div>
                                <div style="display:none">
                                </div>
                            </div>



                        </div>
                        <p></p>
                </div>

            <!--  END Page  -->

        <!--  END Clearfix  -->
    </div>
    <script type='text/javascript' src="/layer/layer.min.js"></script>
    <script>setNavActive('album');</script>
    <script>
        ;!function(){
            layer.use('extend/layer.ext.js', function(){
                //初始加载即调用，所以需放在ext回调里
                layer.ext = function(){
                    layer.photosPage({
                        html:'<div style="padding:20px;">这里传入自定义的html<p>相册支持左右方向键，支持Esc关闭</p><p>另外还可以通过异步返回json实现相册。更多用法详见官网。</p><p id="change"></p></div>',
                        title: '快捷模式-获取页面元素包含的所有图片',
                        id: 100, //相册id，可选
                        parent:'#photo-list'
                    });
                };
            });
        }();
    </script>
@stop