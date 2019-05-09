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
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function comment(Request $request)
    {
        $this->validate($request, [
            'article_id' => 'required|integer|min:1',
            'comment' => 'required|string',
            'comment_name' => 'required|string'
        ]);

        $comment = new Comment();
        $comment->article_id = $request->article_id;
        $comment->comment = $request->comment;
        $comment->name = $request->comment_name;

        if ($request->parent_id) {
            $comment->parent_id = $request->parent_id;
        }

        $comment->save();

        return redirect()->to(route('articles.show', $request->article_id) . '#reply-form');

    }
}
