<?php

namespace App\Services;


use App\Models\Article;
use App\Models\Category;

class SiteMapService
{
    public function buildMap()
    {
        $articleService = new ArticleService();
        $lastModify = Article::orderByDesc('updated_at')->pluck('updated_at')->first();
        $lastModify = date('Y-m-d', strtotime($lastModify));

        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?' . '>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        //首页
        $xml[] = '<url>';
        $xml[] = '<loc>' . route('root') . '</loc>';
        $xml[] = "<lastmod>$lastModify</lastmod>";
        $xml[] = '<changefreq>weekly</changefreq>';
        $xml[] = '<priority>1</priority>';
        $xml[] = '</url>';
        //分页
        $count = ceil($articleService->getCount() / 5);
        for ($i = 2; $i <= $count; $i++) {
            $xml[] = '<url>';
            $xml[] = '<loc>' . route('page', $i) . '</loc>';
            $xml[] = "<lastmod>$lastModify</lastmod>";
            $xml[] = '<changefreq>weekly</changefreq>';
            $xml[] = '<priority>1</priority>';
            $xml[] = '</url>';
        }
        //分类
        $categories = Category::select('uri')->get();
        foreach ($categories as $k => $v) {
            $xml[] = '<url>';
            $xml[] = '<loc>' . route('Category', $v->uri) . '</loc>';
            $xml[] = "<lastmod>$lastModify</lastmod>";
            $xml[] = '<changefreq>weekly</changefreq>';
            $xml[] = '<priority>0.8</priority>';
            $xml[] = '</url>';
        }
        //标签
        //关于
        $xml[] = '<url>';
        $xml[] = '<loc>' . route('about') . '</loc>';
        $xml[] = "<lastmod>$lastModify</lastmod>";
        $xml[] = '<changefreq>weekly</changefreq>';
        $xml[] = '<priority>0.8</priority>';
        $xml[] = '</url>';
        //文章
        $articles = Article::where('status', 1)
            ->select('id', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($articles as $k => $v) {
            $xml[] = '<url>';
            $xml[] = '<loc>' . route('articles.show', $v->id) . '</loc>';
            $xml[] = '<lastmod>' . date('Y-m-d', strtotime($v->updated_at)) . '</lastmod>';
            $xml[] = '<priority>0.9</priority>';
            $xml[] = "</url>";
        }
        $xml[] = '</urlset>';
        return join("\n", $xml);
    }
}