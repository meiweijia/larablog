<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\CategoryService;

class CategoryComposer
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function composer(View $view)
    {
        $view->with('categories', $this->categoryService->getList());
    }
}