<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\ServiceProvider;
use Response;

/**
 * Class ResponseServiceProvider
 * @package App\Providers
 */
class ResponseServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        Response::macro('success', function ($data, array $meta = null, int $code = JsonResponse::HTTP_OK) {
            return Response::json([
                'success' => true,
                'data' => $data,
                'meta' => $meta
            ], $code);
        });

        Response::macro('created', function ($data, array $meta = null, int $code = JsonResponse::HTTP_CREATED) {
            return Response::json([
                'success' => true,
                'data' => $data,
                'meta' => $meta
            ], $code);
        });


        Response::macro('notFound', function (string $message = 'Resource could not be found', int $code = JsonResponse::HTTP_NOT_FOUND) {
            return Response::json([
                'success' => false,
                'message' => $message
            ], $code);
        });

        Response::macro('badRequest', function ($errors, int $code = JsonResponse::HTTP_BAD_REQUEST) {
            $error = is_array($errors) ? array_shift($errors) : $errors;
            return Response::json([
                'success' => false,
                'message' => $error
            ], $code);
        });

        Response::macro('error', function (string $error, int $code = JsonResponse::HTTP_INTERNAL_SERVER_ERROR) {
            return Response::json([
                'success' => false,
                'message' => $error
            ], $code);
        });

        Response::macro('notAuthorized', function (string $error = 'Not authorized', int $code = JsonResponse::HTTP_UNAUTHORIZED) {
            return Response::json([
                'success' => false,
                'message' => $error
            ], $code);
        });
    }
}