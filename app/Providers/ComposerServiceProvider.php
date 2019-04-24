<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use App\Services\CategoryService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.main', function ($view) {
            $view->with('categories', Category::where('parent_id', '>', 0)->get());
        });

        View::composer('layouts.main', function ($view) {
            $view->with('tags', Tag::query()->get());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
