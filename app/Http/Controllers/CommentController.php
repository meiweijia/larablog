<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function __construct()
    {

    }

    function GetTest(Request $request)
    {
        DB::connection()->enableQueryLog();
        $res['data'] = $this->getComment(0);
        $res['msg'] = '你猜啊';
        $res['sql']= DB::getQueryLog();
        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    /**
     * 获取文章的所有评论
     * @param $topic_id
     * @return mixed
     */
    public function getComment($topic_id)
    {
        $commentSrv = new Comment();
        $comments = $commentSrv->getComment($topic_id);
        $first = 0;
        foreach($comments as $k=>$comment)
        {
            if($comment['partent_id'] == 0 )
            {
                $first = $k;
            }
        }
        return $k;
    }

    /**
     * 获取最新的评论
     * @param $topic_id
     * @return string
     */
    public function maxThread($topic_id)
    {
        $commentSrv = new Comment();
        $comment = $commentSrv->maxThread($topic_id);
        return isset($comment) ? $this->addThd($comment->thread) : '01/';
    }

    /**
     * 获取评论最新回复
     * @param $parent_id
     * @return string
     */
    public function maxSuThread($parent_id)
    {
        $commentSrv = new Comment();
        $comment = $commentSrv->maxSuThread($parent_id);
        $thread = $comment ? $comment->thread : null;
        return strpos($thread, '.') ? $this->addThd($thread) : substr($thread, 0, -1) . '.01/';
    }

    /**
     * thread转换操作
     * @param $thread
     * @return string
     */
    public function addThd($thread)
    {
        $prefix = '';
        $num = substr($thread, 0, -1);
        if (strpos($thread, '.') !== FALSE) {
            $prefix = substr($thread, 0, -3);
            $num = substr($thread, -3, 3);
        }
        //48-57 -> 0-9
        $num1 = ord($num[1]);
        if ($num1 < 57)
            return $prefix . $num[0] . chr($num1 + 1) . '/';
        if ($num1 == 57)
            return $prefix . $num[0] . 'a' . '/';
        //97-122 -> a-z
        if ($num1 < 122)
            return $prefix . $num[0] . chr($num1 + 1) . '/';
        if ($num1 == 122) {
            $num0 = ord($num[0]);
            if ($num0 < 57)
                return $prefix . chr($num0 + 1) . '0/';
            if ($num0 == 57)
                return $prefix . 'a0/';
            if ($num0 < 122)
                return $prefix . chr($num0 + 1) . '0/';
        }
    }
}