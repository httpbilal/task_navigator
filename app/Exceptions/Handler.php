<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<class-string<Throwable>>
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<string>
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

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof HttpResponseException) {
            return $e->getResponse();
        } elseif ($e instanceof NotFoundHttpException) {
            return response()->json(['error' => 'Resource not found'], Response::HTTP_NOT_FOUND);
        } elseif ($e instanceof ValidationException) {
            return response()->json(['error' => $e->validator->errors()], Response::HTTP_BAD_REQUEST);
        } elseif ($e instanceof ModelNotFoundException) {
            return response()->json(['error' => 'Resource not found'], Response::HTTP_NOT_FOUND);
        } elseif ($e instanceof AuthorizationException) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        } elseif ($e instanceof Exception) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return parent::render($request, $e);
    }
}
