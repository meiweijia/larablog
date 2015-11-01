<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/1
 * Time: 14:07
 */

namespace App\Models;


class Sitemap
{
    function create_xml()
    {
        $content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
       http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
';
        $data_array = array(
            array(
                'loc' => 'http://www.phpernote.com/',
                'priority' => '1.0',
                'lastmod' => '2012-06-03T04:20:32-08:00',
                'changefreq' => 'always'
            ),
            array(
                'loc' => 'http://www.phpernote.com/php/',
                'priority' => '0.5',
                'lastmod' => '2012-06-03T04:20:32-08:00',
                'changefreq' => 'daily'
            ),
            array(
                'loc' => 'http://www.phpernote.com/php/',
                'priority' => '0.5',
                'lastmod' => '2012-06-03T04:20:32-08:00',
                'changefreq' => 'daily'
            )
        );
        foreach ($data_array as $data) {
            $content .= $this->create_item($data);
        }
        $content .= '</urlset>';
        //return $content;
        $fp = fopen('sitemap.xml', 'w+');
        fwrite($fp, $content);
        fclose($fp);
    }

    function create_item($data)
    {
        $item = "<url>\n";
        $item .= "<loc>" . $data['loc'] . "</loc>\n";
        $item .= "<priority>" . $data['priority'] . "</priority>\n";
        $item .= "<lastmod>" . $data['lastmod'] . "</lastmod>\n";
        $item .= "<changefreq>" . $data['changefreq'] . "</changefreq>\n";
        $item .= "</url>\n";
        return $item;
    }

    /**
     * 指定位置插入字符串
     * @param $str  原字符串
     * @param $i    插入位置
     * @param $substr 插入字符串
     * @return string 处理后的字符串
     */
    function insertToStr($str, $i, $substr)
    {
        //指定插入位置前的字符串
        $startstr = "";
        for ($j = 0; $j < $i; $j++) {
            $startstr .= $str[$j];
        }

        //指定插入位置后的字符串
        $laststr = "";
        for ($j = $i; $j < strlen($str); $j++) {
            $laststr .= $str[$j];
        }

        //将插入位置前，要插入的，插入位置后三个字符串拼接起来
        $str = $startstr . $substr . $laststr;

        //返回结果
        return $str;
    }
}