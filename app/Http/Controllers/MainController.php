<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
use App\Models\SiteMap;
use App\Models\Test;

class MainController extends Controller
{

    public function GetIndex(Request $request)
    {
        $post_obj = new Post();
        $post = $post_obj->GetListPost();
        $postArr = $post->toArray();
        if(count($postArr['data'])== 0)
        {
            abort(404);
        }
        return view('mei.index')->with('posts', $post);
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

    public function GetTalk(Request $request)
    {
        //这里考虑写一些配置信息，直接到后台配置。而不是直接些源码
        return view('mei.talk')->with('talk', '');
    }

    public function Search($word)
    {
        $post_obj = new Post();
        $word = urldecode($word);
        $post = $post_obj->GetListPost($word);
        return view('mei.search')->with('posts', $post);
    }

    public function GetSiteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();
        return response($map)
            ->header('Content-type', 'text/xml');
    }

    function checkNum($number)
    {
        if($number>1)
        {
            throw new Exception("Value must be 1 or below");
        }
        return true;
    }
    public function GetTest(Request $request)
    {
        $result['success'] = false;
        $test = new Test();
        $method = $request->only('fn');
        if(!isset($method['fn']))
        {
            $result['msg'] = '缺少参数fn';
        }
        $method = $method['fn'];
        if(!method_exists($test,$method))
        {
            $result['msg'] = '方法'.$method.'不存在';
            return $result;
        }
        try{
            $res = $test->$method('9z/');
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        return $res;
    }
}