<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ArticlesController extends Controller
{
    function __construct(){
        $this->middleware('auth')
        ->except('index','show','store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
//        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $articles
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $articles,$id)
    {
        $article = $articles->select('id','title', 'author','keywords','description','content','categories','created_at')
            ->findOrFail($id);
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $articles)
    {
        return view('articles.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $articles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $articles,$id)
    {
        return $articles->where('id',$id)
            ->delete();
    }
}
