<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
use App\Models\SiteMap;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    function callApi(Request $request,$class,$method)
    {

        DB::connection()->enableQueryLog();
        $input = $request->all();
        $result['success'] = false;
        $class_sub = 'App\Models\\';
        $class = $class_sub.$class;
        if(!class_exists($class))
        {
            $result['msg'] = '类'.$class.'不存在';
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        }
        if(!method_exists($class,$method))
        {
            $result['msg'] = '方法'.$method.'不存在';
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        }
        $classSrv = new $class;
        try{
            $result = $classSrv->$method($input);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        $result['sql'] = DB::getQueryLog();
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function GetIndex(Request $request)
    {
        $postSrv = new Post();
        $sortSrv = new Sort();
        $data['posts'] = $postSrv->GetListPost();
        $data['sorts'] = $sortSrv->get_sort();
        $postArr = $data['posts']->toArray();
        if(count($postArr['data'])== 0)
        {
            abort(404);
        }
        return view('mei.index')->with('data', $data);
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