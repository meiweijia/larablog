<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'name',
        'parent_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            //序号处理
            if (!$model->order) {
                $model->order = static::setOrder($model->article_id);
                if (!$model->order) {
                    return false;
                }
            }

            //markdown 转 html
            $content = \Parsedown::instance()->text($model->comment);
            //过滤标签 防止XSS
            $model->comment = clean($content, 'user_topic_body');
        });

        static::created(function ($model) {
            Article::query()->where('id', $model->article_id)->increment('comment_count');
        });

        static::deleted(function ($model) {
            Article::query()->where('id', $model->article_id)->decrement('comment_count');
        });
    }

    public static function setOrder($article_id)
    {
        $order = static::query()->where('article_id', $article_id)->max('order');
        return $order + 1;
    }

    /**
     * Returns all comments that this comment is the parent of.
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
