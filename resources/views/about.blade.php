@extends('layouts.app')

@section('content')
    <div class="d-block card">
        <div class="card-body shadow">
            <h3>About me</h3>
            <p>Hi，我叫梅渭甲，今年{{ date('Y')-1990 }}歲，畢業於湖南信息職業技術學院。我是奮鬥在深圳壹線的PHP後端工程師，正在在努力成為壹個全棧工程師。</p>
            <ul>
                <li>現主玩 PHP，熟悉並熟練使用 laravel 框架，理解 laravel 框架的核心技術，包括但不限於 IOC，Facade，服務容器、服務提供者，並在項目中有實際使用經驗。
                </li>
                <li>熟悉 C#，熟悉 EF 框架。</li>
                <li>略懂 CSS，普通小修改沒問題；略懂 js，能寫 js 函數實現壹些簡單功能，jQuery 能不太熟練使用，曾經很熟悉 Extjs。</li>
                <li>熟悉 Windows、linux 系統，能在 linux 熟練安裝軟件包括 yum、apt-get 和源碼編譯安裝；</li>
                <li>熟悉 Mysql，熟悉基本的 Sql 語句。</li>
                <li>熟悉 Redis，並在項目中有實際使用經驗。</li>
            </ul>
            <p>對計算機、天文物理有著濃厚興趣，崇拜愛因斯坦。</p>
            <blockquote class="blockquote">
                <p class="mb-0">The value of a man resides in what he gives and not in what he is capable of receiving.</p>
                <p class="mb-0">壹個人的價值，在於他貢獻了什麽，而不在於他能得到什麽。</p>
                <footer class="blockquote-footer text-right"><cite title="Source Title">阿爾伯特·愛因斯坦</cite></footer>
            </blockquote>
            <h3>編程之路</h3>
            <ul>
                <li>小學的時候通 CS 接觸計算機。</li>
                <li>初中的時候迷戀上電子遊並影響到學業。</li>
                <li>
                    高中的時候因為想著免費上網、破解網吧收費系統接觸壹些技術性東西；也因為想要盜取別人 QQ 號而接觸到壹些黑客技術；也正是因為壹些黑客技術需要軟件，所及接觸到開發軟件，那是我心中的軟件就是做桌面軟件；繼續迷戀電子遊戲並影響了學業。
                </li>
                <li>大學雖然不是什麽好大學，只是個專科；但是選擇了軟件工程這個專業，因為這是我所喜歡的；後來才知道大部分軟件都是 B/S，並且十分排斥，認為這就是做網站，並沒什麽技術含量。</li>
                <li>大學的時候，還是對網吧收費系統有著怨念；後來通過下載網吧收費系統去研究，得到壹個免費上網的方法，那就是那陣子我剛好學到了數據庫，收費系統安裝的時候會有默認賬號密碼，於是我就通過默認的賬號密碼，
                    在學校附近的網吧挨個跑去測試，有很多家網吧竟然都沒有修改密碼，於是往自己的賬號總充錢（原諒我的年輕，這應該算盜竊了）。
                </li>
                <li>
                    大學期間參加學校網絡安全比賽，從四個信息安全班中殺出重圍，成為三個人之壹，贏得了人生中的第二個蘋果產品，壹個 iPod 作為在網絡安全競賽中優異成績的獎勵，並得到了長沙壹家網絡公司去實習的機會，但是我沒有去，我是軟體工程班的。
                </li>
                <li>
                    在第壹家公司遇到重要的編程導師，壹個非常厲害的大牛，並且在他身上學習到很多東西，主要是思路以及對待工作的態度，他也很樂意教我。
                </li>
            </ul>
            <h3>關於本站</h3>
            <p>本站是我自己在工作之余寫出了的，邊學習邊寫。</p>
            <p>本站基於 <a href="https://laravel.com" target="_blank">laravel</a> 實現後端，通過 <a href="https://getbootstrap.com/" target="_blank">bootstrap</a> 實現前端
            </p>
            <p>引用了壹些開源拓展包，感謝每個開源貢獻者的辛勤勞動。</p>
        </div>
    </div>
@endsection
