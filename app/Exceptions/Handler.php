<?php

namespace App\Exceptions;


use Exception;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {

    }
    public function render($request, Throwable $exception)
    {

        if ($exception instanceOf TokenInvalidException){
        return response()->json(['error' =>'Token is Invalid'], 400);
        }
        elseif ($exception instanceOf TokenExpiredException ){
        return response()->json(['error' =>'Token is Expired'], 400);
        }
        elseif ($exception instanceOf JWTException ){
        return response()->json(['error' =>'There is problem you with token'], 400);
        }
        return parent::render($request, $exception);
    }
}
