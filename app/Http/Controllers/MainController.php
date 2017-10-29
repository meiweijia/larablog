<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request,Article $articles,$page=1){
        $request->merge(['page' => $page]);
        $articles = $articles->select('id','title', 'author','keywords','description','content_nohtml','categories','created_at')
            ->orderBy('created_at','desc')
            ->simplePaginate(5);
        if(count($articles)<1)
            abort(404);
        return view('am.index',compact('articles'));
    }

    public function about(){
        return view('am.about');
    }

    public function work(){
        return view('am.work');
    }

    public function contact(){
        return view('am.contact');
    }

    public function qianyi(){
        $users = DB::table('m_posts')->get();
        foreach ($users as $post){
            $articles = new Article();
            $articles->title = $post->post_title;
            $articles->author = $post->post_author;
            $articles->excerpt = $post->post_excerpt;
            $articles->keywords = $post->post_keywords;
            $articles->description = $post->post_description;
            $articles->content = $post->post_content;
            $articles->content_nohtml = strip_tags($post->post_content);
            $articles->created_at = $post->created_at;
            $articles->updated_at = $post->updated_at;
            $articles->save();
        }
        return 'ok';
    }
}
