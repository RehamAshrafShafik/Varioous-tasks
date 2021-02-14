<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
        // $this->reportable(function (NotFoundHttpException $e) {
        //     return response()->json("Model not found");
        // });
        
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->json("Model not found");
        });
    
    }
    // public function render($request, Exception $e)
    // {
    //     // dd($e);
    //     if($request->expectsJson()){
                    
    //         if ($e instanceof ModelNotFoundException){
    //             return response()->json('Model Not found',404);
    //         }
    //    }
    //         return parent::render($request, $e);
    // }
}
