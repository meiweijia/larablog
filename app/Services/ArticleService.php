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
    public function get(){
        $articles = Article::where('status', 1)
            ->select('id', 'title', 'author', 'excerpt', DB::raw('category as category_name'), 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return $articles;
    }

    public function getCount(){
        $count = Article::where('status', 1)
            ->count();
        return $count;
    }
}