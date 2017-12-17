<?php
/**
 * Created by PhpStorm.
 * User: mei
 * Date: 2017/12/17
 * Time: 15:31
 */

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Redis;

class CategoryService
{
    private $key;

    public function __construct()
    {
        $this->key = 'blog.categories';
    }

    public function getList()
    {
        if (!Redis::exists($this->key)) {
            $categories = Category::where('parent_id', '>', '0')
                ->select('id', 'title')
                ->get();
            foreach ($categories as $k => $v) {
                Redis::hmset($this->key, $v->id, $v->title);
            }
        }
        return Redis::hgetall($this->key);
    }

    public function getName($id)
    {
        return Redis::hget($this->key, $id);
    }
}