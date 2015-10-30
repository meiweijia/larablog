﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/lib/html5.js"></script>
<script type="text/javascript" src="/lib/respond.min.js"></script>
<script type="text/javascript" src="/lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/css/H-ui.admin.css" rel="stylesheet" type="text/css" />

<link href="/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="pd-20" style="padding-top:20px;">
  <p class="f-20 text-success">欢迎进入LBlog <span class="f-14">v1.0</span>后台！</p>
  <p>登录次数：18 </p>
  <p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>
  <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th colspan="7" scope="col">信息统计</th>
      </tr>
      <tr class="text-c">
        <th>统计</th>
        <th>资讯库</th>
        <th>图片库</th>
        <th>产品库</th>
        <th>用户</th>
        <th>管理员</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-c">
        <td>总数</td>
        <td>92</td>
        <td>9</td>
        <td>0</td>
        <td>8</td>
        <td>20</td>
      </tr>
      <tr class="text-c">
        <td>今日</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr class="text-c">
        <td>昨日</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr class="text-c">
        <td>本周</td>
        <td>2</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr class="text-c">
        <td>本月</td>
        <td>2</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
    </tbody>
  </table>
  <table class="table table-border table-bordered table-bg mt-20">
    <thead>
      <tr>
        <th colspan="2" scope="col">服务器信息</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th width="200">服务器计算机名</th>
        <td><span id="lbServerName"></span></td>
      </tr>
      <tr>
        <td>服务器IP地址</td>
        <td><?php echo GetHostByName($_SERVER['SERVER_NAME']); ?></td>
      </tr>
      <tr>
        <td>服务器域名</td>
        <td><?php home_url();?></td>
      </tr>
      <tr>
        <td>服务器端口 </td>
        <td><?php echo $_SERVER['SERVER_PORT']; ?></td>
      </tr>
      <tr>
        <td>本文件所在文件夹 </td>
        <td><?php echo __FILE__; ?></td>
      </tr>
      <tr>
        <td>服务器操作系统 </td>
        <td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
      </tr>
      <tr>
        <td>系统所在文件夹 </td>
        <td>C:\WINDOWS\system32</td>
      </tr>
      <tr>
        <td>服务器脚本超时时间 </td>
        <td>30000秒</td>
      </tr>
      <tr>
        <td>服务器的语言种类 </td>
        <td>Chinese (People's Republic of China)</td>
      </tr>
      <tr>
        <td>.NET Framework 版本 </td>
        <td>2.050727.3655</td>
      </tr>
      <tr>
        <td>服务器当前时间 </td>
        <td>2014-6-14 12:06:23</td>
      </tr>
      <tr>
        <td>服务器IE版本 </td>
        <td>6.0000</td>
      </tr>
      <tr>
        <td>服务器上次启动到现在已运行 </td>
        <td>7210分钟</td>
      </tr>
      <tr>
        <td>逻辑驱动器 </td>
        <td>C:\D:\</td>
      </tr>
      <tr>
        <td>CPU 总数 </td>
        <td>4</td>
      </tr>
      <tr>
        <td>CPU 类型 </td>
        <td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
      </tr>
      <tr>
        <td>虚拟内存 </td>
        <td>52480M</td>
      </tr>
      <tr>
        <td>当前程序占用内存 </td>
        <td>3.29M</td>
      </tr>
      <tr>
        <td>Asp.net所占内存 </td>
        <td>51.46M</td>
      </tr>
      <tr>
        <td>当前Session数量 </td>
        <td>8</td>
      </tr>
      <tr>
        <td>当前SessionID </td>
        <td>gznhpwmp34004345jz2q3l45</td>
      </tr>
      <tr>
        <td>当前系统用户名 </td>
        <td>NETWORK SERVICE</td>
      </tr>
    </tbody>
  </table>
</div>
<footer class="footer">
  <p>&copy; 2014-<?php echo date('Y');?> <a style="color: #7ECCE2;" href='/' title="梅渭甲个人博客" target="_parent">夜风</a> All rights reserved |
	  基于 <a style="color: #7ECCE2;" href='http://lumen.laravel.com' target="_blank" title="为速度而生的 Laravel 框架">lumen</a> |
	  Template by <a style="color: #7ECCE2;" href="http://www.h-ui.net/H-ui.admin.shtml" target="_blank">H-ui.admin.v2.3</a></p>
</footer>
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/H-ui.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>