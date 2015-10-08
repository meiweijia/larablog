<?php
@$page = $_GET['page'];
if(!function_exists('pageft'))
{

function pageft($totle,$displaypg=20,$shownum=0,$showtext=0,$showselect=0,$showlvtao=7,$url='')
{
global $page,$firstcount,$pagenav,$_SERVER;

//为使函数外部可以访问这里的“$displaypg”，将它也设为全局变量。注意一个变量重新定义为全局变量后，原值被覆盖，所以这里给它重新赋值。
$GLOBALS["displaypg"]=$displaypg;

if(!$page) $page=1;

//如果$url使用默认，即空值，则赋值为本页URL：
if(!$url){ $url=$_SERVER["REQUEST_URI"];}

//URL分析：
$parse_url=parse_url($url);
$url_query=isset($parse_url["query"])?$parse_url["query"]:null; //单独取出URL的查询字串
print_r($url_query);
echo '|';
if($url_query){
//因为URL中可能包含了页码信息，我们要把它去掉，以便加入新的页码信息。
//这里用到了正则表达式，请参考“PHP中的正规表达式”
print_r($url_query);
echo '|';
$url_query=preg_replace("/(^|&)page=$page/","",$url_query);
print_r($url_query);
echo '|';
//将处理后的URL的查询字串替换原来的URL的查询字串：
$url=str_replace($parse_url["query"],$url_query,$url);

//在URL后加page查询信息，但待赋值：
if($url_query) $url.="&page"; else $url.="page";
}else {
$url.="?page";
}
//页码计算：
$lastpg=ceil($totle/$displaypg); //最后页，也是总页数
$page=min($lastpg,$page);
$prepg=$page-1; //上一页
$nextpg=($page==$lastpg ? 0 : $page+1); //下一页
$firstcount=($page-1)*$displaypg;

//开始分页导航条代码：
if ($showtext==1){
$pagenav="<span class='disabled'>".($totle?($firstcount+1):0)."-".min($firstcount+$displaypg,$totle)."/$totle 记录</span><span class='disabled'>$page/$lastpg 页</span>";
}else{
$pagenav="";	
}
//如果只有一页则跳出函数：
if($lastpg<=1) return false;

if($prepg) $pagenav.="<a href='$url=1'>首页</a>"; else $pagenav.='<span class="disabled">首页</span>';
if($prepg) $pagenav.="<a href='$url=$prepg'>上一页</a>"; else $pagenav.='<span class="disabled">上一页</span>';
if ($shownum==1){
	$o=$showlvtao;//中间页码表总长度，为奇数
	$u=ceil($o/2);//根据$o计算单侧页码宽度$u
	$f=$page-$u;//根据当前页$currentPage和单侧宽度$u计算出第一页的起始数字
	//str_replace('{p}',,$fn)//替换格式
	if($f<0){$f=0;}//当第一页小于0时，赋值为0
	$n=$lastpg;//总页数,20页
	if($n<1){$n=1;}//当总数小于1时，赋值为1
	if($page==1){
		$pagenav.='<span class="current">1</span>';
	}else{
		$pagenav.="<a href='$url=1'>1</a>";
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
			$pagenav.='<span class="current">'.$page.'</span>';
		}else{
			$pagenav.="<a href='$url=$c'>$c</a>";
		}
		if($i==$o && $c<$n-1){
			$pagenav.='...';
		}
		if($i>$n){break;}//当总页数小于页码表长度时	
	}
	if($page==$n && $n!=1){
		$pagenav.='<span class="current">'.$n.'</span>';
	}else{
		$pagenav.="<a href='$url=$n'>$n</a>";
		}
}

if($nextpg) $pagenav.="<a href='$url=$nextpg'>下一页</a>"; else $pagenav.='<span class="disabled">下一页</span>';
if($nextpg) $pagenav.="<a href='$url=$lastpg'>尾页</a>"; else $pagenav.='<span class="disabled">尾页</span>';
if ($showselect==1){
//下拉跳转列表，循环列出所有页码：
$pagenav.="跳至<select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'>\n";
for($i=1;$i<=$lastpg;$i++){
if($i==$page) $pagenav.="<option value='$i' selected>$i</option>\n";
else $pagenav.="<option value='$i'>$i</option>\n";
}
$pagenav.="</select>页";
}
}
}
?>