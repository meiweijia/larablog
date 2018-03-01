<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class MainController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $page = 1)
    {
        $request->merge(['page' => $page]);
        $articles = Article::where('status', 1)
            ->select('id', 'title', 'author', 'excerpt', DB::raw('category as category_name'), 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('layouts.index', compact('articles'));
    }

    public function getArticleByCategory($name)
    {
        $category = Category::where('uri', $name)
            ->first();
        if (count($category) < 1)
            abort(404);
        $articles = $category->articles()
            ->where('status',1)
            ->select('id', 'title', 'author', 'excerpt', 'category', 'created_at')
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

    public function contact()
    {
        return view('am.contact');
    }

    public function test()
    {
        return Redis::hmset('test.key','field1','value1','field2','value2');
        return 'ok';
    }
}
