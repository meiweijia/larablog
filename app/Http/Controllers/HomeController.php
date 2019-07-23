<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $articles = Article::query()
            ->with(['category:id,title,uri', 'tags:id,title,uri'])
            ->where('status', 1)
            ->when($request->has('q'), function (Builder $query) use ($request) {
                $query->where('content', 'like', '%' . $request->input('q') . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(5);
        return view('home', compact('articles'));
    }

    /**
     * 根据分类获取文章
     *
     * @param $name
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticleByCategory($name)
    {
        $category = Category::query()
            ->where('uri', $name)
            ->first();
        if (!$category)
            abort(404);
        $articles = Article::query()
            ->with(['category:id,title,uri', 'tags:id,title,uri'])
            ->where('status', 1)
            ->where('category_id', $category->id)
            ->orderByDesc('created_at')
            ->paginate(5);
        return view('home', compact('articles'));
    }

    /**
     * 根据标签获取文章
     *
     * @param $name
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticleByTag($name)
    {
        $tag = Tag::query()
            ->where('uri', $name)
            ->first();
        if (!$tag)
            abort(404);

        $article_ids = ArticleTag::query()
            ->where('tag_id', $tag->id)
            ->pluck('article_id');

        $articles = Article::query()
            ->with(['category:id,title,uri', 'tags:id,title,uri'])
            ->where('status', 1)
            ->whereIn('articles.id', $article_ids)
            ->orderByDesc('created_at')
            ->paginate(5);
        return view('home', compact('articles'));
    }

    public function about()
    {
        return view('about');
    }

    public function siteMap()
    {
        $lastModify = Article::query()->orderByDesc('created_at')->pluck('created_at')->first();
        $lastModify = date('Y-m-d', strtotime($lastModify));

        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?' . '>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        //首页
        $xml[] = '<url>';
        $xml[] = '<loc>' . route('index') . '</loc>';
        $xml[] = "<lastmod>$lastModify</lastmod>";
        $xml[] = '<changefreq>weekly</changefreq>';
        $xml[] = '<priority>1</priority>';
        $xml[] = '</url>';
        //分类
        $categories = Category::query()->pluck('uri');
        foreach ($categories as $category) {
            $xml[] = '<url>';
            $xml[] = '<loc>' . route('getArticleByCategory', $category) . '</loc>';
            $xml[] = "<lastmod>$lastModify</lastmod>";
            $xml[] = '<changefreq>weekly</changefreq>';
            $xml[] = '<priority>0.8</priority>';
            $xml[] = '</url>';
        }
        //标签
        $tags = Tag::query()->pluck('uri');
        foreach ($tags as $tag) {
            $xml[] = '<url>';
            $xml[] = '<loc>' . route('getArticleByTag', $tag) . '</loc>';
            $xml[] = "<lastmod>$lastModify</lastmod>";
            $xml[] = '<changefreq>weekly</changefreq>';
            $xml[] = '<priority>0.8</priority>';
            $xml[] = '</url>';
        }
        //关于
        $xml[] = '<url>';
        $xml[] = '<loc>' . route('about') . '</loc>';
        $xml[] = "<lastmod>$lastModify</lastmod>";
        $xml[] = '<changefreq>weekly</changefreq>';
        $xml[] = '<priority>0.8</priority>';
        $xml[] = '</url>';
        //文章
        $articles = Article::query()->where('status', 1)
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
        $xml = join("\n", $xml);
        return response($xml)
            ->header('Content-type', 'text/xml');
    }
}
