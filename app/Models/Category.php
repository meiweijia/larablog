<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ModelTree,AdminBuilder;
    //
    public function articles(){
         return $this->belongsTo(Article::class,'id','category');
    }
}
