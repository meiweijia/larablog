<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
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

    public function search(Request $request)
    {
        $articles = Article::query()
            ->with(['category:id,title,uri', 'tags:id,title,uri'])
            ->where('status', 1)
            ->where('content', 'like', '%' . $request->input('q') . '%')
            ->orderByDesc('created_at')
            ->paginate(5);
        return view('home', compact('articles'));
    }

    public function about()
    {
        return view('about');
    }
}
