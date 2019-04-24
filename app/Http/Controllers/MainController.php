<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\ArticleService;
use App\Services\SiteMapService;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class MainController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, ArticleService $articleService, $page = 1)
    {
        $request->merge(['page' => $page]);
        $articles = $articleService->get();
        return view('layouts.index', compact('articles'));
    }

    public function getArticleByCategory($name)
    {
        $category = Category::where('uri', $name)
            ->first();
        if (!$category)
            abort(404);
        $articles = $category->articles()
            ->select('articles.id', 'articles.title', 'articles.author', 'articles.excerpt','categories.title as category_name','categories.uri as category', 'articles.created_at')
            ->leftJoin('categories', 'articles.category', '=', 'categories.id')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('layouts.index', compact('articles'));
    }

    public function about()
    {
        return view('layouts.about');
    }

    public function work()
    {
        return view('am.work');
    }

    public function siteMap(SiteMapService $mapService)
    {
        return response($mapService->buildMap())
            ->header('Content-type', 'text/xml');
    }

    public function contact()
    {
        return view('am.contact');
    }

    public function test()
    {
        return Redis::hmset('test.key', 'field1', 'value1', 'field2', 'value2');
        return 'ok';
    }
}
