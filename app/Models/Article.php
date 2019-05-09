<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected static function boot()
    {
        parent::boot();
        //新增文章成功后，分类文章数+1
        static::created(function ($model){
            Category::query()->where('id',$model->category_id)->increment('count');
        });

        //生成摘要
        static::saving(function ($model){
            if(!$model->excerpt){
                //markdown 转 html
                $content = \Parsedown::instance()->text($model->content);
                $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($content)));
                $model->excerpt = Str::limit($excerpt,150);
            }
        });

        //删除文章成功后，分类文章数-1
        static::deleted(function ($model){
            Category::query()->where('id',$model->category_id)->decrement('count');
        });
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
