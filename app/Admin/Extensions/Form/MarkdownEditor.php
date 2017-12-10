<?php
/**
 * Created by PhpStorm.
 * User: mei
 * Date: 2017/12/10
 * Time: 21:59
 */

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class MarkdownEditor extends Field
{
    protected $view = 'admin::form.editor';
    protected static $css = [
        '/css/bootstrap-markdown.min.css',
    ];
    protected static $js = [
        '//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js',
        '//cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js',
        '/js/bootstrap-markdown.js',
        '/js/bootstrap-markdown.zh.js',
    ];

    /**
     * Default rows of textarea.
     *
     * @var int
     */
    protected $rows = 5;

    /**
     * Set rows of textarea.
     *
     * @param int $rows
     *
     * @return $this
     */
    public function rows($rows = 5)
    {
        $this->rows = $rows;

        return $this;
    }

    public function render()
    {
        $this->script = <<<EOT
        $('#$this->id').markdown({
            language:'zh'
        });
EOT;
        return parent::render()->with(['rows' => $this->rows]);
    }
}