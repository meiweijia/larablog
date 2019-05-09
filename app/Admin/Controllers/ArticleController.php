<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ArticleController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('文章')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('文章')
            ->description('详情')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('文章')
            ->description('编辑')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('文章')
            ->description('新建')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);

        $grid->id('Id');
        $grid->title('标题');
        //$grid->author('Author');
        //$grid->excerpt('Excerpt');
        //$grid->keywords('关键字');
        //$grid->description('描述');
        //$grid->content('内容');
        $grid->status('状态')->display(function ($value) {
            return $value ? '发布' : '草稿';
        });
        $grid->comment_status('能否评论')->display(function ($value) {
            return $value ? '能' : '否';
        });
        //$grid->comment_count('Comment count');
        $grid->category()->title('分类');
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');
        //$grid->deleted_at('Deleted at');

        $grid->model()->orderBy('created_at', 'desc');
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        //$show->id('Id');
        $show->title('标题');
        $show->author('作者');
        $show->excerpt('摘要');
        $show->keywords('关键字');
        $show->description('描述');
        $show->content('内容');
        //$show->status('Status');
        //$show->comment_status('Comment status');
        //$show->comment_count('Comment count');
        //$show->category_id('Category id');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        //$show->deleted_at('Deleted at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);

        $form->text('title', '标题');
        $form->text('author', '作者')->default('meiweijia');
        $form->select('category_id', '分类')->options(Category::query()->where('parent_id', '>', 0)->pluck('title', 'id'));
        $form->multipleSelect('tags', '标签')->options(Tag::all()->pluck('title', 'id'));
        $form->text('excerpt', '摘要');
        $form->text('keywords', '关键字');
        $form->text('description', '描述');
        $form->markdown('content', '内容');
        $form->switch('status', '发布？')->default(1);
        $form->switch('comment_status', '评论？')->default(1);

        return $form;
    }
}
