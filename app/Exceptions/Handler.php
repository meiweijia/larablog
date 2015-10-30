<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if( !env('APP_DEBUG') and $this->isHttpException($e)) {
            return $this->renderHttpException($request,$e);
        }
        return parent::render($request, $e);
    }

    /**
     * 自定义错误，如果view/errors/ 下存在错误模板，就显示错误模板。
     * @param $request
     * @param HttpException $e
     * @return \Laravel\Lumen\Http\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function renderHttpException($request,HttpException $e)
    {
        $status = $e->getStatusCode();

        if (view()->exists("errors.{$status}"))
        {
            return response(view("errors.{$status}", []), $status);
        }
        else
        {
            return parent::render($request, $e);
        }
    }
    protected function isHttpException(Exception $e)
    {
        return $e instanceof HttpException;
    }

}
