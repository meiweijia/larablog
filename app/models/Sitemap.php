<?php namespace App\Models;

use App\Models\Post;
use App\Models\Album;
use App\Models\Sort;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SiteMap
{
    /**
     * Return the content of the Site Map
     */
    public function getSiteMap()
    {
        if (Cache::has('site-map')) {
            return Cache::get('site-map');
        }
        $siteMap = $this->buildSiteMap();
        Cache::add('site-map', $siteMap, 120);
        return $siteMap;
    }

    /**
     * Build the Site Map
     */
    protected function buildSiteMap()
    {
        $postsInfo = $this->getPostsInfo();
        $dates = array_values($postsInfo);
        sort($dates);
        $lastmod = last($dates);
        $url = trim(url(), '/') . '/';

        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?' . '>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        //��ҳ
        $xml[] = '  <url>';
        $xml[] = "    <loc>$url</loc>";
        $xml[] = "    <lastmod>$lastmod</lastmod>";
        $xml[] = '    <changefreq>Daily</changefreq>';
        $xml[] = '    <priority>1</priority>';
        $xml[] = '  </url>';
        //��ҳ
        $pages = $this->getPostsCount();
        $yu = $pages % 5;
        $count = intval($pages / 5);
        $count += $yu === 1 ? 1 : 0;
        for ($i = 2; $i <= $count; $i++) {
            $xml[] = '  <url>';
            $xml[] = "    <loc>{$url}?page={$i}</loc>";
            $xml[] = "    <lastmod>$lastmod</lastmod>";
            $xml[] = '    <changefreq>Daily</changefreq>';
            $xml[] = '    <priority>1</priority>';
            $xml[] = '  </url>';
        }
        //����
        $sortSrv = new Sort();
        $sorts = $sortSrv->get_sort();
        foreach ($sorts as $k => $v) {
            $xml[] = '  <url>';
            $xml[] = "    <loc>{$url}category/{$sorts[$k]['alias']}</loc>";
            $xml[] = "    <lastmod>$lastmod</lastmod>";
            $xml[] = '    <priority>0.8</priority>';
            $xml[] = "  </url>";
        }
        //���
        $xml[] = '  <url>';
        $xml[] = "    <loc>{$url}album</loc>";
        $xml[] = "    <lastmod>$lastmod</lastmod>";
        $xml[] = '    <changefreq>Daily</changefreq>';
        $xml[] = '    <priority>0.8</priority>';
        $xml[] = '  </url>';
        //����
        $xml[] = '  <url>';
        $xml[] = "    <loc>{$url}about</loc>";
        $xml[] = "    <lastmod>$lastmod</lastmod>";
        $xml[] = '    <changefreq>Daily</changefreq>';
        $xml[] = '    <priority>0.8</priority>';
        $xml[] = '  </url>';
        //����
        foreach ($postsInfo as $k => $v) {
            $xml[] = '  <url>';
            $xml[] = "    <loc>{$url}post/$k.html</loc>";
            $xml[] = "    <lastmod>$lastmod</lastmod>";
            $xml[] = '    <priority>0.9</priority>';
            $xml[] = "  </url>";
        }
        //����б�
        $albumsInfo = $this->getAlbumsInfo();
        foreach ($albumsInfo as $k => $v) {
            $xml[] = '  <url>';
            $xml[] = "    <loc>{$url}album/$k</loc>";
            $xml[] = "    <lastmod>$lastmod</lastmod>";
            $xml[] = '    <priority>0.6</priority>';
            $xml[] = "  </url>";
        }
        $xml[] = '</urlset>';
        return join("\n", $xml);
    }

    /**
     * Return all the posts as $url => $date
     */
    protected function getPostsInfo()
    {
        return Post::where('created_at', '<=', Carbon::now())
            ->where('post_status', 1)
            ->orderBy('created_at', 'desc')
            ->lists('updated_at', 'id')
            ->all();
    }

    protected function getPostsCount()
    {
        return Post::where('created_at', '<=', Carbon::now())
            ->where('post_status', 1)
            ->orderBy('created_at', 'desc')
            ->count();
    }

    protected function getAlbumsInfo()
    {
        return Album::where('created_at', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->lists('updated_at', 'id')
            ->all();
    }
}