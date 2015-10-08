<h1>php万能分页源码附多种分页效果</h1>
<h2><a href="style.php" target="_blank">所有样式</a></h2>
<h2><a href="page.php" target="_blank">完整配置  pageft($total,$pageSize,1,1,1,5);</a></h2>
<h2><a href="page1.php" target="_blank">pageft($total,$pageSize,0,1,1,5);</a></h2>
<h2><a href="page2.php" target="_blank">pageft($total,$pageSize,0,0,1,5);</a></h2>
<h2><a href="page3.php" target="_blank">pageft($total,$pageSize,0,0,0,5);</a></h2>
<h2><a href="page4.php" target="_blank">pageft($total,$pageSize,1,0,0,15);</a></h2>

<hr />
<a href="/page/page.rar"><b>点我下载----->>>>万能分页源码包下载</b></a>
<hr />
<h1>分页源码使用方法</h1>
<p>
page.class.php 为本分页类的核心文件，其开源免费</p>
<p>css 为演示中所有样式的css样式文件和图片文件</p>
<p>其它php文件为示例文件</p>
<p>使用方法:</p>
<p>引入分页核心文件</p>
<p>&lt;?php include_once('page.class.php');?&gt;</p>
<p>引用你要的分页样式或从我原有的样式中分离出你要的样式</p>
<p>&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/css.css&quot; /&gt;</p>
<p>$pageSize=20;　　　　　　　　//此参数为每页数量<br />
$total=1000;　　　　　　　　 //  数据总数量</p>
<p>pageft($total,$pageSize,1,1,1,5); 配置分页样式</p>
<p>&lt;div class=&quot;pager&quot;&gt;&lt;?php echo $pagenav;?&gt;&lt;/div&gt; class 中为分页样式，中间调用分页效果</p>
<p>OK,完成啦。。。很简单吧。。。</p>
<hr />
<p>下面给段php+mysql 实例演示</p>
<p>..............省略几百字符的数据库连接操作。。。。</p>
<p>&lt;?php<br />
  $pageSize=20;<br />
  　　$page////此处我不写啦，你们自己根据需要来设定<br />
  $sql=&quot;SELECT * FROM `news`  LIMIT $page,$pageSize;<br />
  $total=&quot;select count(*) from news&quot;;<br />
pageft($total,$pageSize,0,1,0,5);</p>
<p>////写你的查询循环<br />
?&gt;  <br />
  &lt;div class=&quot;pager&quot;&gt;&lt;?php echo $pagenav;?&gt;&lt;/div&gt;<br />
　　
</p>
