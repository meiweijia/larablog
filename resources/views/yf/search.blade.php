@extends('yf.main')
@section('title')
<?php echo '夜风 - 梅渭甲的个人博客'; ?>
@stop
@section('body')
<body class="search search-results">
@stop
@section('post')
	<div class="title">
		<h3><?php echo '“'.$_REQUEST['s'].'”的搜索结果'; ?></h3>
		<!-- <ul class="more">
			<li><a target="_blank" href="http://www.daqianduan.com/theme/xiu">XIU主题</a></li>
			<li><a target="_blank" href="http://www.daqianduan.com/theme/d8">D8主题</a></li>
			<li><a target="_blank" href="http://www.daqianduan.com/nav">前端导航</a></li>
			<li><a target="_blank" href="http://www.daqianduan.com/tools">前端工具箱</a></li>
		</ul> -->
	</div>
	<?php
	foreach($posts as $post)
	{
		$img_url = getImgs($post->post_content,0);
		$web_url = getcwd();
		$img_def_url = '/images/thumbnail.png';
		$img_url = $web_url.$img_url;
		//echo $img_url;
		$img_url = is_file($img_url)?$img_url:$img_def_url;
		$content = mb_substr(strip_tags($post->post_content),0,80,'UTF-8');
		$post_date = substr($post->created_at,0,10);
		echo "<article class='excerpt excerpt-1'>
		<a target='_blank' class='focus' href='/post/{$post->id}.html'><img src='{$img_url}' class='thumb' style='display: inline;'/></a>
		<header><a class='cat' href='/fenlei'>分类<i></i></a> <h2><a target='_blank' href='/post/{$post->id}.html' title='{$post->post_title}'>{$post->post_title}</a></h2></header>
		<p class='meta'><time><i class='fa fa-clock-o'></i>{$post_date}</time><a target='_blank' class='pc' href='/post/{$post->id}.html#comments'><i class='fa fa-comments-o'></i><span class='ds-thread-count' data-thread-key='$post->id' data-count-type='comments'></span></a></p>
		<p class='note'>{$content}</p>
		<a target='_blank' href ='/post/{$post->id}.html' class='cat' style='float:right'>阅读全文</a>
		</article>";

	}
	$total = $posts->total();//总文章数
		$count_page = $posts->count(); //总页数
		$total_page = $posts->total();
		$url = $_SERVER['HTTP_HOST'];
		//getPageHtml($cur_page,$count_page);
		echo '<div class="pagination"><ul>'.pageft($total,5).'</ul></div>';
	?>
	<script>
		function highlight(idVal, keyword) {
			var textbox = document.getElementById(idVal);
			if ("" == keyword) return;
			var temp = textbox.innerHTML;
			console.log(temp);
			var htmlReg = new RegExp("\<.*?\>", "i");
			var arr = new Array();
			for (var i = 0; true; i++) {
				var tag = htmlReg.exec(temp);
				if (tag) {
					arr[i] = tag;
				} else {
					break;
				}
				temp = temp.replace(tag, "{[(" + i + ")]}");
			}
			words = decodeURIComponent(keyword.replace(/\,/g, ' ')).split(/\s+/);
			for (w = 0; w < words.length; w++) {
				var r = new RegExp("(" + words[w].replace(/[(){}.+*?^$|\\\[\]]/g, "\\$&") + ")", "ig");
				temp = temp.replace(r, "<b style='color:Red;'>$1</b>");
			}
			for (var i = 0; i < arr.length; i++) {
				temp = temp.replace("{[(" + i + ")]}", arr[i]);
			}
			textbox.innerHTML = temp;
		};
		$('#navto-search').hide();
		var word = '<?php echo $_REQUEST['s']; ?>';
		setTimeout(function () {
			highlight('content',word)
		},200);
	</script>
@stop