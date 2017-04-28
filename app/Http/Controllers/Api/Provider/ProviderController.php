<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;

/**
 * Class ProviderController
 * @package App\Http\Controllers\Api\Provider
 */
class ProviderController extends Controller
{
    public function get(string $id) : JsonResponse
    {
        $provider = Provider::find($id);

        return response()->success($provider);
    }
}
