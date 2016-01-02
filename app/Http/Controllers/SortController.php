<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sort;
use App\Models\Post;

class SortController extends Controller
{
    public function update(Request $request)
    {
        $input = $request->all();
        $sort_data['id'] = $input['id'];
        $sort_data['name'] = $input['name'];
        $sort_data['password'] = $input['password'];
        $sortSrv = new Sort();
        $res['success'] = $sortSrv->update_sort($sort_data);
        $res['msg'] = '发布成功！';
        return $res;
    }

    function getPostBySort($alias)
    {
        $postSrv = new Post();
        $sortSrv = new Sort();
        $data['posts'] = $postSrv->getPostBySort($alias);
        $data['alias'] = $sortSrv->get_sort_name($alias);
        if($data['posts'] == null)
        {
            abort(404);
        }
        return view('mei.sort')->with('data', $data);
    }
}