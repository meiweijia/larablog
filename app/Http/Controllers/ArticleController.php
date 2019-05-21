<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::query()
            ->with(['category:id,title,uri', 'tags:id,title,uri', 'comments', 'comments.parent:id,order', 'comments.user:id,name'])
            ->where('status', 1)
            ->findOrFail($id);
        return view('article', compact('article'));
    }

    /**
     * @param Request $request
     * @param Article $article
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function comment(Request $request,Article $article)
    {
        $this->validate($request, [
            'comment' => 'required|string',
            'name' => 'required|string'
        ]);

        $article->comments()->create($request->only([
            'comment',
            'name',
            'parent_id'
        ]));

        return redirect()->to(route('articles.show', $article) . '#reply-form');

    }
}
