<?php
/**
  * 获取文章中的图片
  * @param $content 文章内容
  * @param $order 图片类型
  * 
  * @return string 图片路径;
  */
function getImgs($content,$order='ALL'){
		$pattern="/<img.*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$content,$match);
		if(isset($match[1])&&!empty($match[1])){
			if($order==='ALL'){
				return $match[1];
			}
			if(is_numeric($order)&&isset($match[1][$order])){
				return $match[1][$order];
			}
		}
		return '';
	}
	
/**
  * 获取分页的HTML内容
  * @param integer $page 当前页
  * @param integer $pages 总页数
  * @param string $url 跳转url地址    最后的页数以 '&page=x' 追加在url后面
  * 
  * @return string HTML内容;
  */
function getPageHtml($page, $pages, $url=''){
  //最多显示多少个页码
  $_pageNum = 5;
  //当前页面小于1 则为1
  $page = $page<1?1:$page;
  //当前页大于总页数 则为总页数
  $page = $page > $pages ? $pages : $page;
  //页数小当前页 则为当前页
  $pages = $pages < $page ? $page : $pages;

  //计算开始页
  $_start = $page - floor($_pageNum/2);
  $_start = $_start<1 ? 1 : $_start;
  //计算结束页
  $_end = $page + floor($_pageNum/2);
  $_end = $_end>$pages? $pages : $_end;

  //当前显示的页码个数不够最大页码数，在进行左右调整
  $_curPageNum = $_end-$_start+1;
  //左调整
  if($_curPageNum<$_pageNum && $_start>1){  
   $_start = $_start - ($_pageNum-$_curPageNum);
   $_start = $_start<1 ? 1 : $_start;
   $_curPageNum = $_end-$_start+1;
  }
  //右边调整
  if($_curPageNum<$_pageNum && $_end<$pages){ 
   $_end = $_end + ($_pageNum-$_curPageNum);
   $_end = $_end>$pages? $pages : $_end;
  }

  $_pageHtml = '<ul class="pagination">';

  if($page>1){
   $_pageHtml .= '<li><a  title="上一页" href="'.$url.'?page='.($page-1).'"><<</a></li>';
  }
  for ($i = $_start; $i <= $_end; $i++) {
   if($i == $page){
    $_pageHtml .= '<li class="active"><a>'.$i.'</a></li>';
   }else{
    $_pageHtml .= '<li><a href="'.$url.'?page='.$i.'">'.$i.'</a></li>';
   }
  }

  if($page<$_end){
   $_pageHtml .= '<li><a  title="下一页" href="'.$url.'?page='.($page+1).'">>></a></li>';
  }
  $_pageHtml .= '</ul>';
  echo $_pageHtml;
 }

 /*
 *这里是分页条
 *$totle 总数
 *$displaypg 显示几个
 */
function pageft($totle,$displaypg=5,$shownum=1,$showlvtao=7)
{
	//$index = $_SERVER['SERVER_NAME'];//首页
	$page = isset($_GET['page'])?
	$_GET['page']:1;
	$url = '';
	$pagenav='';
	if(!$url){ $url=$_SERVER["REQUEST_URI"];}
	$parse_url=parse_url($url);
	$url_query=isset($parse_url["query"])?$parse_url["query"]:null; //单独取出URL的查询字串
	if($url_query){
		//因为URL中可能包含了页码信息，我们要把它去掉，以便加入新的页码信息。
		//这里用到了正则表达式，请参考“PHP中的正规表达式”
		$url_query=preg_replace("/(^|&)page=$page/","",$url_query);
		//将处理后的URL的查询字串替换原来的URL的查询字串：
		$url=str_replace($parse_url["query"],$url_query,$url);

		//在URL后加page查询信息，但待赋值：
		if($url_query) $url.="&page"; else $url.="page";
	}
	else {
		$url.="?page";
	}
	//echo $url;
	//////////
	//页码计算：
	$lastpg=ceil($totle/$displaypg); //最后页，也是总页数
	$page=min($lastpg,$page);
	$prepg=$page-1; //上一页
	$nextpg=($page==$lastpg ? 0 : $page+1); //下一页
	$firstcount=($page-1)*$displaypg;

	//如果只有一页则跳出函数：
	if($lastpg<=1) return false;

	//if($prepg) $pagenav.="<a href='$url=1'>首页</a>"; else $pagenav.='<span class="disabled">首页</span>';
	if($prepg) 
	{
		if($prepg==1)
		{
			$pagenav.="<li><a href='/'>上一页</a></li>";
		}
		else
		{
			$pagenav.="<li><a href='$url=$prepg'>上一页</a></li>";
		}
	}else{
		$pagenav.='<li class="prev-page"></li>';
	}
	if ($shownum==1){
		$o=$showlvtao;//中间页码表总长度，为奇数
		$u=ceil($o/2);//根据$o计算单侧页码宽度$u
		$f=$page-$u;//根据当前页$currentPage和单侧宽度$u计算出第一页的起始数字
		//str_replace('{p}',,$fn)//替换格式
		if($f<0){$f=0;}//当第一页小于0时，赋值为0
		$n=$lastpg;//总页数,20页
		if($n<1){$n=1;}//当总数小于1时，赋值为1
		if($page==1){
			$pagenav.='<li class="active"><span class="current">1</span></li>';
		}else{
			$pagenav.="<li class='prev-page'><a href='/'>1</a></li>"; //第一页
		}
		///////////////////////////////////////
		for($i=1;$i<=$o;$i++){
			if($n<=1){break;}//当总页数为1时
			$c=$f+$i;//从第$c开始累加计算
			if($i==1 && $c>2){
				$pagenav.='...';
			}
			if($c==1){continue;}
			if($c==$n){break;}
			if($c==$page){
				$pagenav.='<li class="active"><span class="current">'.$page.'</span></li>';
			}else{
				$pagenav.="<li><a href='$url=$c'>$c</a></li>"; //中间页
			}
			if($i==$o && $c<$n-1){
				$pagenav.='...';
			}
			if($i>$n){break;}//当总页数小于页码表长度时	
		}
		if($page==$n && $n!=1){
			$pagenav.='<li class="active"><span class="current">'.$n.'</span></li>';
		}else{
			$pagenav.="<li><a href='$url=$n'>$n</a></li>"; //最后页
			}
		}
		if($nextpg)
			$pagenav.="<li class='next-page'><a href='$url=$nextpg'>下一页</a></li>";
		else
			$pagenav.='<li class="next-page"></li>';
		//if($nextpg) $pagenav.="<a href='$url=$lastpg'>尾页</a>"; else $pagenav.='<span class="disabled">尾页</span>';
		return $pagenav;
}
function test()
{
	echo '123';
}

/*
*获取完整主页URL
*/
function home_url()
{
	return 'http://'.$_SERVER['HTTP_HOST'].'/';
}
function changestring($content,$url)
{
    preg_match_all("/<img(.*)src=\"([^\"]+)\"[^>]+>/",$content,$matches);
    if(!empty($matches)){
        $imgurl = $matches[2];
        foreach($imgurl as $val){
            preg_match("/^.*\/ueditor\/php/",$val,$res);
            $content = isset($res[0])?str_replace($res[0],$url,$content):$content;
        }
    }else{
        return FALSE;
    }
    return $content;
}
?>
