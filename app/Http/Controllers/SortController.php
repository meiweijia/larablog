<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sort;

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
}