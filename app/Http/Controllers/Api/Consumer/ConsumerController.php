<?php

namespace App\Http\Controllers\Api\Consumer;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use Illuminate\Http\JsonResponse;

/**
 * Class ConsumerController
 * @package App\Http\Controllers\Api\Consumer
 */
class ConsumerController extends Controller
{
    public function get(string $id) : JsonResponse
    {
        $consumer = Consumer::find($id);

        return response()->success($consumer);
    }
}