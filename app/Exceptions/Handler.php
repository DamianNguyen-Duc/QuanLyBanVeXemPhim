<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Exception|Throwable $e)
    {
        if($this->isHttpException($e)) {
            switch ($e->getStatusCode()) {
                // not found
                case 403:
                case 404:
                    return redirect('/');

                // internal error
                // case '500':
                // return redirect('/');
                // break;

                default:
                    return $this->renderHttpException($e);
            }
        }
        else
        {
                return parent::render($request, $e);
        }
    }
}
