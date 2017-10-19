<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // default handle function
        // return parent::render($request, $exception);
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        return parent::render($request, $exception);

        // It If you’re using Laravel to serve other pages, you have to edit the code to work with the Accept header, otherwise 404 errors from regular requests will return a JSON as well.
        // This will replace our 404 response with
        // a JSON response.
        // if ($exception instanceof ModelNotFoundException &&
        //     $request->wantsJson())
        // {
        //     return response()->json([
        //         'data' => 'Resource not found'
        //     ], 404);
        // }

        // return parent::render($request, $exception);
    }
}
