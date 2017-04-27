<?php

namespace App\Http\Controllers\Api\Provider;

use App\Models\Provider;
use Illuminate\Http\JsonResponse;

class ProviderController
{
    public function get(string $id) : JsonResponse
    {
        $provider = Provider::find($id);

        return response()->success($provider);
    }
}