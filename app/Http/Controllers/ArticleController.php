<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Query\Builder;
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
            ->with([
                'category:id,title,uri',//分类
                'tags:id,title,uri',//标签
                'comments' => function ($query) {//评论 过滤根节点的评论
                    $query->whereNull('root_id');
                },
                'comments.children',//评论下所有的回复
                'comments.children.parent:id,name',//评论的父级
                'comments.children.user:id,name',//评论的用户信息
            ])
            ->where('status', 1)
            ->findOrFail($id);
        return view('article', compact('article'));
    }

    public function commentShow(Request $request, Article $article)
    {
        $comments = $article->comments()
            ->whereNull('root_id')
            ->simplePaginate(10)
            ->toArray();
        foreach ($comments['data'] as $index => $comment) {
            $comments['data'][$index]['children'] = Comment::query()
                ->with([
                    'parent:id,name',
                    'user:id,name'
                ])
                ->where('parent_id', $comment['id'])
                ->paginate(3)
                ->toArray();
        }
        return $comments;
    }

    public function getChildrenComments($id)
    {
        $comment = Comment::query()->with([
            'parent:id,name',
            'user:id,name'
        ])
            ->where('parent_id', $id)
            ->paginate(10);
        return $comment;
    }

    /**
     * @param Request $request
     * @param Article $article
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function commentStore(Request $request, Article $article)
    {
        $this->validate($request, [
            'comment' => 'required|string',
            'name' => 'required|string'
        ]);

        $article->comments()->create($request->only([
            'comment',
            'name',
            'parent_id',
            'root_id'
        ]));

        return redirect()->to(route('articles.show', $article) . '#reply-box');

    }
}
