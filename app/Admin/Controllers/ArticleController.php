<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Admin\Extensions\Form\MarkdownEditor;

class ArticleController extends Controller
{
    use ModelForm;
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('文章');
            $content->description('列表');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('文章');
            $content->description('编辑');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('文章');
            $content->description('创建');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article::class, function (Grid $grid) {

            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->author('作者');
            $grid->created_at('发布时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Article::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title','标题');
            $form->text('author','作者')->default('admin');
            $form->text('excerpt','摘要');
            $form->text('keywords','关键字');//seo
            $form->text('description','描述');//seo

            $form->markdown('content','内容');

//            $form->select('categories','分类')->options(function ($id) {
//                $user = Article::find($id);
//
//                if ($user) {
//                    return [$user->id => $user->title];
//                }
//            })->ajax('/admin/api/users');//todo 获取分类


            $form->switch('status', '发布?');
            $form->display('updated_at', '最后更新');
        });
    }
}
