<?php

namespace App\Http\Controllers\Api\Consumer;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\IConsumerRepository;
use Illuminate\Http\JsonResponse;

/**
 * Class ConsumerController
 * @package App\Http\Controllers\Api\Consumer
 */
class ConsumerController extends Controller
{
    /** @var IConsumerRepository $consumerRepository */
    protected $consumerRepository;

    /**
     * ConsumerController constructor.
     * @param IConsumerRepository $consumerRepository
     */
    public function __construct(
        IConsumerRepository $consumerRepository
    )
    {
        $this->consumerRepository = $consumerRepository;
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function get(string $id) : JsonResponse
    {
        $consumer = $this->consumerRepository->findById($id);

        return response()->success($consumer);
    }
}