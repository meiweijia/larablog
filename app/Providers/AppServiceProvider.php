<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('zh');

        View::share('categories', Category::query()->select('title', 'uri','count')->where('parent_id', '>', 0)->get());
        View::share('tags', Tag::query()->select('title','uri')->get());
    }
}
