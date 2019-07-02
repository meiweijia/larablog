<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('commentStore');
    }

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
        $order = $request->input('order');
        $limit = 3;
        $comments = $article->comments()
            ->with(['user:id,name,avatar'])
            ->whereNull('root_id')
            ->orderBy('created_at', $order)
            ->paginate(10)
            ->toArray();
        foreach ($comments['data'] as $index => $comment) {
            $comments['data'][$index]['children']['data'] = Comment::query()
                ->with([
                    'parent:id,name,user_id',
                    'parent.user:id,name',
                    'user:id,name'
                ])
                ->where('root_id', $comment['id'])
                ->offset(0)
                ->limit($limit)
                ->get()
                ->toArray();
            $comments['data'][$index]['children']['total'] = Comment::query()
                    ->where('root_id', $comment['id'])
                    ->count() - $limit;
        }
        return $comments;
    }

    public function getChildrenComments(Request $request, $id)
    {
        $page = $request->input('page') ?? 0;
        $limit = $request->input('limit') ?? 10;
        $comment = Comment::query()->with([
            'parent:id,name,user_id',
            'parent.user:id,name',
            'user:id,name'
        ])
            ->where('root_id', $id)
            ->offset(3 + $limit * $page)
            ->limit($limit)
            ->get();
        $total = Comment::query()
            ->where('root_id', $id)
            ->count();
        return [
            'comment' => $comment,
            'total' => $total - $limit * ($page + 1) - 3,
            'page' => $page
        ];
    }

    /**
     * @param Request $request
     * @param Article $article
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function commentStore(Request $request, Article $article)
    {
        $this->validate($request, [
            'comment' => 'required|string',
        ]);
        $data = $request->only([
            'comment',
            'parent_id',
            'root_id',
        ]);
        $data['user_id'] = Auth::id();
        $article->comments()->create($data);

        return 1;
    }
}
