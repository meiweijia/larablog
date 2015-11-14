@extends('mei.main')

@section('post')
    <?php echo "<script>document.title= '相册 - 梅渭甲的个人博客';</script>";?>
    <div id="content" class="right-col-fixed">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home fa-sm"></i></a></li>
            <li class="active">相册</li>
        </ol>
        <h3 class="text-center">相册列表</h3>
        <?php
        foreach ($albums as $album) {
            $img_def_url = 'img/thumbnail.png';
            echo "
                <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>
                <div class='thumbnail'>
                    <a href='/album/{$album->id}'>
                        <img src='http://b206.photo.store.qq.com/psb?/V11LAT1J0P2PG5/xqlYt17gR7f5wzSmU*p5I4OYkUffUD469rgmqIcBDPA!/b/YYdHz3qrjgAAYoLL03qWjgAAb4rX03oqjQAA&bo=ngL3AUAGsAQBBbo!&rf=viewer_4'
                             alt='...'>
                        <div class='caption hidden-xs'>
                            <span>{$album->name}（1p）</span>
                        </div>
                    </a>
                </div>
            </div>
            ";
        }
        ?>


    </div>
    <script>setNavActive('album');</script>
@stop