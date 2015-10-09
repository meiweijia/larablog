<?php

namespace App\Http\Controllers;
use Cache;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

	/*
	根据ID，返回文章信息
	*/
	public function getpost($id)
	{
		if (Cache::has('post'.$id)) {
			$post = Cache::get('post'.$id);
		}
		else{
			$post_obj = new Post();
			$post = $post_obj->getpost($id);
		}
		return view('yf.post')->with('post', $post);
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
		$post_data['post_author'] = $input['post_author'];
		$post_data['post_excerpt'] = $input['post_excerpt'];
		$post_data['post_key_words'] = $input['key_words'];
		$post_data['post_content'] =$input['editorValue'];
		$post_data['post_column'] =$input['column'];
		$post_data['post_status'] = $input['post_status'];
		$post_data['comment_status'] = $input['can_comment'];
		$post_data['post_password'] = $input['post_password'];
		//$post_data['post_type'] = $input['post_type'];
		$post_data['created_at'] = date('Y-m-d H:i:s');
		$postSrv = new Post();
		$res['success'] = $postSrv->update_post($post_data);
		return $res;
		
	}
}