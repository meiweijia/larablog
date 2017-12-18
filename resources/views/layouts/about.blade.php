@extends('layouts.main')
@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <h3>About me <a class="pull-right" href="{{route('resume')}}">简历</a></h3>
            <p>你好，我叫梅渭甲，今年@php echo date('Y')-1990;@endphp岁，毕业于湖南信息职业技术学院。我是奋斗在深圳一线的PHP后端工程师，正在在努力成为一个全栈工程师。</p>
            <ul>
                <li>现在主攻PHP，熟悉并熟练使用laravel框架，理解laravel框架的核心技术，包括但不限于IOC，Facade，服务容器、服务提供者，并在项目中有实际使用经验；理解OOP，因为是学C#出身。
                </li>
                <li>熟悉C#，熟悉EF框架。</li>
                <li>略懂CSS，普通小修改没问题；略懂js，能写js函数实现一些简单功能，jQuery能不太熟练使用，曾经很熟悉Extjs。</li>
                <li>熟悉windows、linux系统，能在linux熟练安装软件包括yum、apt-get和源码编译安装；</li>
                <li>熟悉Mysql，熟悉基本的Sql语句。</li>
                <li>熟悉redis，并在项目中有实际使用经验。</li>
            </ul>
            <p>对计算机、天文物理有着浓厚兴趣，崇拜爱因斯坦。</p>
            <blockquote class="blockquote-reverse">
                <p>The value of a man resides in what he gives and not in what he is capable of receiving.
                <p/>
                <p>一个人的价值，在于他贡献了什么，而不在于他能得到什么。— 阿尔伯特·爱因斯坦</p>
            </blockquote>
            <h3>编程之路</h3>
            <ul>
                <li>小学的时候通CS接触计算机。</li>
                <li>初中的时候迷恋上电子游并影响到学业。</li>
                <li>
                    高中的时候因为想着免费上网、破解网吧收费系统接触一些技术性东西；也因为想要盗取别人QQ号而接触到一些黑客技术；也正是因为一些黑客技术需要软件，所及接触到开发软件，那是我心中的软件就是做桌面软件；继续迷恋电子游戏并影响了学业。
                </li>
                <li>大学虽然不是什么好大学，只是个专科；但是选择了软件工程这个专业，因为这是我所喜欢的；后来才知道大部分软件都是B/S，并且十分排斥，认为这就是做网站，并没什么技术含量。</li>
                <li>大学的时候，还是对网吧收费系统有着怨念；后来通过下载网吧收费系统去研究，得到一个免费上网的方法，那就是那阵子我刚好学到了数据库，收费系统安装的时候会有默认账号密码，于是我就通过默认的账号密码，
                    在学校附近的网吧挨个跑去测试，有很多家网吧竟然都没有修改密码，于是往自己的账号总充钱（原谅我的年轻，这应该算盗窃了）。
                </li>
                <li>
                    大学期间参加学校网络安全比赛，从四个信息安全班中杀出重围，成为三个人之一，赢得了人生中的第二个苹果产品，一个iPod作为在网络安全竞赛中优异成绩的奖励，并得到了长沙一家网络公司去实习的机会，但是我没有去，我是软件工程班的。
                </li>
                <li>
                    在第一家公司遇到重要的编程导师，一个非常厉害的大牛，并且在他身上学习到很多东西，主要是思路以及对待工作的态度，他也很乐意教我。
                </li>
                <li>
                    15年用laravel写了本站的第一版；此次是第三次重构本站代码了。
                </li>
            </ul>
            <h3>关于本站</h3>
            <p>本站是我自己在工作之余写出了的，边学习边写。</p>
            <p>本站基于<a href="https://laravel.com" target="_blank">laravel</a>实现后端，通过<a href="https://getbootstrap.com/"
                                                                                      target="_blank">bootstrap</a>实现前端
            </p>
            <p>引用了一些开源拓展包，感谢每个开源贡献者的辛勤劳动。</p>
        </div>
    </div>
@endsection
