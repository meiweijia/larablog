<?php
/**
 * Created by PhpStorm.
 * User: mei
 * Date: 2017/12/18
 * Time: 22:20
 */

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