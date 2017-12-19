<?php

namespace App\Providers;

use App\Models\Category;
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
            $categoryService = new CategoryService();
            $categoryService->getList();
            $view->with('categories', Category::where('parent_id', '>', 0)->get());
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
