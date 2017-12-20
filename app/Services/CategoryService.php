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
    private $nameKey;

    public function __construct()
    {
        $this->nameKey = 'blog:categories:name';
    }

    public function getList()
    {
        if (!Redis::exists($this->nameKey)) {
            $categories = Category::where('parent_id', '>', '0')
                ->select('id', 'title')
                ->get();
            foreach ($categories as $k => $v) {
                Redis::hset($this->nameKey, $v->id, $v->title);
            }
        }
        return Redis::hgetall($this->nameKey);
    }

    public function getName($id)
    {
        return Redis::hget($this->nameKey, $id);
    }
}