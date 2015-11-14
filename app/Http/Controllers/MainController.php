<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class MainController extends Controller {

    public function GetIndex(Request $request)
    {
		$input = $request->only('s');
		$post_obj = new Post();
		$post = $post_obj->GetListPost($input);
		$view = isset($input['s'])?'yf.search':'mei.index';
		return view($view)->with('posts', $post);
    }
	
	public function GetListPost()
	{
		$post_obj = new Post();
		$post = $post_obj->GetListPost();
		return $post;
	}

	public function GetAbout(Request $request)
	{
		//这里考虑写一些配置信息，直接到后台配置。而不是直接些源码
		return view('mei.about')->with('about', '');
	}

}