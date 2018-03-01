<?php

namespace App\Models;

use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d H:i', strtotime($value));
    }

    /**
     * 获取分类的名字。
     *
     * @param  string $value
     * @return string
     */
    public function getCategoryNameAttribute($value)
    {
        $categoryService = new CategoryService();
        $value = $categoryService->getName($value);
        return $value;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}