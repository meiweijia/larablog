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

}