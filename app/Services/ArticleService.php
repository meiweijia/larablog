<?php
/**
 * Created by PhpStorm.
 * User: mei
 * Date: 18-6-21
 * Time: 上午11:48
 */

namespace App\Services;


use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleService
{
    public function get()
    {
        $articles = Article::query()
            ->select('articles.id', 'articles.title', 'articles.author', 'articles.excerpt','categories.title as category_name','categories.uri as category', 'articles.created_at')
            ->leftJoin('categories', 'articles.category', '=', 'categories.id')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return $articles;
    }

    public function getCount()
    {
        $count = Article::where('status', 1)
            ->count();
        return $count;
    }
}