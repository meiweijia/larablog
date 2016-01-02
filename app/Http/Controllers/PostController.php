<?php

namespace App\Http\Controllers;

use Cache;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class PostController extends Controller
{

	/*
    根据ID，返回文章信息
    */
	public function getpost($id)
	{
		if (Cache::has('post' . $id)) {
			$post = Cache::get('post' . $id);
		} else {
			$post_obj = new Post();
			$post = $post_obj->getpost($id);
		}
		if($post)
		{
			//$post->comment = $this->getComment(0);
			return view('mei.post')->with('post', $post);
		}else{
			return  abort(404);
		}
	}

	public function getComment($topic_id)
	{
		$commentSrv = new Comment();
		$comments = $commentSrv->getComment($topic_id);
		$res = array();
		$ret = array();
		$first = 0;
		foreach($comments as $k=>$comment)
		{
			if($comment['parent_id'] == 0 )
			{
				$res[] = $comment;
				$first++;
			}
			if($comment['parent_id'] != 0)
			{
				$res[$first-1]['child'][] = $comment;
			}
		}
		return $res;
	}


	public function GetListPost(Request $request)
	{
		$input = $request->all();
		$post_obj = new Post();
		$post = $post_obj->GetListPost($input);
		return $post;
	}

	public function update(Request $request)
	{
		$input = $request->all();
		$post_data['id'] = $input['id'];
		$post_data['post_title'] = $input['post_title'];
		$post_data['post_content'] = $input['post_content'];
		$post_data['post_author'] = $input['post_author'];
		$post_data['sort'] = $input['sort'];
		$post_data['post_keywords'] = $input['post_keywords'];
		$post_data['post_description'] = $input['post_description'];
//		$post_data['comment_status'] = $input['can_comment'];
		$post_data['post_status'] = $input['post_status'];
		$post_data['post_password'] = $input['post_password'];
		//$post_data['post_type'] = $input['post_type'];
		$postSrv = new Post();
		$res['success'] = $postSrv->update_post($post_data);
		$res['msg'] = '发布成功！';
		return $res;

	}
}