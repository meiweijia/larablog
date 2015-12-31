<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/24
 * Time: 21:26
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    public function __construct()
    {

    }

    protected $table = 'comments';

    public function update_comment($input = array())
    {
        $user = user::get();
        $data = array('content' => $_POST['content']);
        if (empty($_POST['parent_id']))
        {
            //文章评论
            $data['thread'] = self::maxThread($node_id);
            $data['parent_id'] = 0;
        }
        else
        {
            //评论回复
            $data['thread'] = $this->maxSuThread($_POST['parent_id']);
            $data['parent_id'] = $_POST['parent_id'];
        }
        $data['node_id'] = $node_id;
        $data['status'] = 1;

        list($cmt_id,) = Db::insert('comments', array_keys($data))
            ->values(array_values($data))
            ->execute();

        Db::update('nodes')  //更新文章评论数
            ->set(array('cmt_num' => Db::expr('cmt_num + 1')))
            ->where('id', '=', $node_id)
            ->execute();
        feed::comment($data+array('id' => $cmt_id), node::get($node_id));
        return $cmt_id;
    }

    public function getComment($topic_id)
    {
        $comments = $this->where('topic_id',$topic_id)
            ->orderBy(DB::raw('SUBSTRING(thread, 1, (LENGTH(thread) - 1))'),'ASC')
            ->get()->toArray();
        return $comments;
    }

    public function getReply($topic_id,$parent_id){

    }

    public function maxThread($topic_id)
    {
        return $this->select('thread')
            ->where('topic_id',$topic_id)
            ->orderBy('thread','DESC')
            ->first();
    }

    public function maxSuThread($parent_id)
    {

        $thread = $this->select('thread')
            ->where('parent_id',$parent_id)
            ->orderBy(DB::raw('SUBSTRING(thread, 1, (LENGTH(thread) - 1))'),'DESC')
            ->first();
        if (!$thread)
        {
            $thread = $this->select('thread')
                ->where('id', $parent_id)
                ->first();
        }
        return $thread;
    }

}