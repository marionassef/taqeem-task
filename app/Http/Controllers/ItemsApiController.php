<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomQueryException;
use App\Helpers\CustomResponse;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Http\Services\ItemsService;
use Illuminate\Http\JsonResponse;

class ItemsApiController extends Controller
{
    /**
     * @var ItemsService
     */
    private $itemService;

    public function __construct(ItemsService $itemsService)
    {
        $this->itemService = $itemsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function findAll(): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), ItemResource::collection($this->itemService->list()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateItemRequest $request
     * @return JsonResponse
     * @throws CustomQueryException
     */
    public function store(CreateItemRequest $request): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), new ItemResource($this->itemService->create($request->validated())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws CustomQueryException
     */
    public function getOne(int $id): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), new ItemResource($this->itemService->getOneById($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateItemRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws CustomQueryException
     */
    public function update(UpdateItemRequest $request): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), new ItemResource($this->itemService->update($request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws CustomQueryException
     */
    public function delete(int $id): JsonResponse
    {
        $this->itemService->delete($id);
        return CustomResponse::successResponse(__('success'), (object)[]);
    }

    /**
     * Get Total price the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function totalPriceCurrentMonth(): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), (object)['total_price' => $this->itemService->totalPriceCurrentMonth()]);
    }

    /**
     * Get Average price the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function totalPriceAverage(): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), (object)['total_price_average' => $this->itemService->totalPriceAverage()]);
    }
}
