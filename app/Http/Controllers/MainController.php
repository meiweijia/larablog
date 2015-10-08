<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class MainController extends Controller {

    public function GetIndex()
    {
		$post_obj = new Post();
		$post = $post_obj->GetListPost();
		return view('yf.index')->with('posts', $post);
    }
	
	public function GetListPost()
	{
		$post_obj = new Post();
		$post = $post_obj->GetListPost();
		return $post;
	}
}