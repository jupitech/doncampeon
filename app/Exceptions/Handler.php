<?php

namespace Doncampeon\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        //JWT
        if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
          {
             return response(['Token is invalid'], 401);
          }
          if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
          {
             return response(['Token has expired'], 401);
          }

          return parent::render($request, $e);




        return parent::render($request, $e);
        if ($request->is('api/*')) {
        app('Asm89\Stack\CorsService')->addActualRequestHeaders($response, $request);
    }

    return $response;
    }
}
