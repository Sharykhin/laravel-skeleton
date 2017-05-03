<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ProviderController
 * @package App\Http\Controllers\Api\Provider
 */
class ProviderController extends Controller
{
    /**
     * @param string $id
     * @return JsonResponse
     */
    public function get(string $id) : JsonResponse
    {
        $provider = Provider::findOrFail($id);

        return response()->success($provider);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id) : JsonResponse
    {
        $provider = Provider::findOrFail($id);

        $this->authorize('update', $provider);

        $provider->fill($request->all())->save();

        return response()->success($provider);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id) : JsonResponse
    {
        $provider = Provider::findOrFail($id);

        $this->authorize('delete', $provider);

        $provider->delete();

        return response()->success($provider);
    }
}
