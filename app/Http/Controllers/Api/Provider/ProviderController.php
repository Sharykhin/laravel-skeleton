<?php

namespace App\Http\Controllers\Api\Provider;

use App\Events\ProviderRemoved;
use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\IProviderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ProviderController
 * @package App\Http\Controllers\Api\Provider
 */
class ProviderController extends Controller
{
    /** @var IProviderRepository $providerRepository */
    protected $providerRepository;

    /**
     * ProviderController constructor.
     * @param IProviderRepository $providerRepository
     */
    public function __construct(
        IProviderRepository $providerRepository
    )
    {
        $this->providerRepository = $providerRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        $limit = (int) $request->get('limit') ?: 10;
        $offset = (int) $request->get('offset') ?: 0;
        $total = $this->providerRepository->count();
        $providers = $this->providerRepository->findAll($offset ?: 0, $limit);

        return response()->success($providers, compact('total', 'limit', 'offset'));
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function get(string $id) : JsonResponse
    {
        $provider = $this->providerRepository->findById($id);

        return response()->success($provider);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id) : JsonResponse
    {
        $provider = $this->providerRepository->findById($id);

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
        $provider = $this->providerRepository->findById($id);

        $this->authorize('delete', $provider);

        $provider->delete();

        event(new ProviderRemoved($provider));

        return response()->success($provider);
    }
}
