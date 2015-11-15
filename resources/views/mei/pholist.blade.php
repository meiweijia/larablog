@extends('mei.main')

@section('post')
    <?php $album_name = ($result['album']->name);?>
    <?php echo "<script>document.title= '{$album_name} - 梅渭甲的个人博客';</script>";?>

    <div id="content" class="right-col-fixed">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home fa-sm"></i></a></li>
            <li><a href="/album">相册</a></li>
            <li class="active"><?php echo $album_name;?></li>
        </ol>
        <h3 class="text-center"><?php echo $album_name;?></h3>
        <div id="photo-list">
            <?php
            foreach($result['photo'] as $photo)
            {
                $bast_path = storage_path();
                $img_url = home_url().$photo->path;
                $data = substr($photo->created_at,0,10);
                echo "
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>
                <div class='thumbnail'>
                    <a href='javascript:(0);' title='{$photo->name}'>
                        <img src='{$img_url}' alt='...'>
                    </a>
                    <div class='caption hidden-xs' style='text-align: center'>
                        <span class='text-center'>上传时间：{$data}</span>
                    </div>
                </div>
            </div>
                ";
            }
            ?>

        </div>

    </div>
    <script type='text/javascript' src="/layer/layer.min.js"></script>
    <script>setNavActive('album');</script>
    <script>
        ;
        !function () {
            layer.use('/layer/extend/layer.ext.js', function () {
                //初始加载即调用，所以需放在ext回调里
                layer.ext = function () {
                    layer.photosPage({
                        html: '<div style="padding:20px;">这里传入自定义的html<p>相册支持左右方向键，支持Esc关闭</p><p>另外还可以通过异步返回json实现相册。更多用法详见官网。</p><p id="change"></p></div>',
                        title: '快捷模式-获取页面元素包含的所有图片',
                        id: 100, //相册id，可选
                        parent: '#photo-list'
                    });
                };
            });
        }();
    </script>
@stop