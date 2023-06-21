<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomQueryException;
use App\Helpers\CustomResponse;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Http\Services\ItemsService;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(title="Items Controller", version="0.1")
 */
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
     * Display a listing of the Items.
     * @return JsonResponse
     * @throws CustomQueryException
     * @OA\Get(
     *    path="/api/v1/item",
     *   summary="listing of the Items",
     *   tags={"Items Controller"},
     * @OA\RequestBody(description="listing of the Items",
     * 	@OA\MediaType(mediaType="application/json",
     *   )
     * ),
     * @OA\Response(response=200, description="Successfull operation.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="code", type="integer", example=200),
     *     			@OA\Property(property="data", type="json", example={
    "message": "success",
    "data": {
    {
    "id": 1,
    "name": "Test",
    "price": "12.00",
    "seller": "Test",
    "created_at": "2023-06-19T19:55:18.000000Z",
    "updated_at": "2023-06-19T19:55:18.000000Z"
    },
    {
    "id": 2,
    "name": "Test",
    "price": "12.00",
    "seller": "Test",
    "created_at": "2023-06-19T19:56:36.000000Z",
    "updated_at": "2023-06-19T19:56:36.000000Z"
    },
    {
    "id": 5,
    "name": "asd",
    "price": "12.00",
    "seller": "Test",
    "created_at": "2023-06-19T20:06:34.000000Z",
    "updated_at": "2023-06-19T20:40:25.000000Z"
    }
    }
    })
     *            )
     *        )
     * ),
     *@OA\Response(response=400, description="Invalid service id.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="Invalid data."),
     *            )
     *        )
     * ),
     *@OA\Response(response=500, description="something went wrong please try again later.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="something went wrong please try again later."),
     *            )
     *        )
     * )
     *)
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
     * @OA\Post(
     *    path="/api/v1/item/store",
     *   summary="store Item",
     *   tags={"Items Controller"},
     * @OA\RequestBody(description="store Item",
     * 	@OA\MediaType(mediaType="application/json",
     *   	@OA\Schema(
     *     		@OA\Property(property="name", type="string"),
     *     		@OA\Property(property="price", type="integer"),
     *     		@OA\Property(property="seller", type="integer"),
     *        )
     *   )
     * ),
     * @OA\Response(response=200, description="Successfull operation.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="code", type="integer", example=200),
     *     			@OA\Property(property="data", type="json", example={
    "message": "success",
    "data": {
    "id": 5,
    "name": "asd",
    "price": "12.00",
    "seller": "Test",
    "created_at": "2023-06-19T20:06:34.000000Z",
    "updated_at": "2023-06-19T20:40:25.000000Z"
    }
    })
     *            )
     *        )
     * ),
     *@OA\Response(response=400, description="Invalid Data.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="Invalid Data."),
     *            )
     *        )
     * ),
     *@OA\Response(response=500, description="something went wrong please try again later.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="something went wrong please try again later."),
     *            )
     *        )
     * )
     *)
     *
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
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     * @throws CustomQueryException
     *
     * @OA\Get(
     *    path="/api/v1/item/{id}",
     *   summary="Get Item",
     *   tags={"Items Controller"},
     * @OA\RequestBody(description="store Item",
     * 	@OA\MediaType(mediaType="application/json",
     *   	@OA\Schema(
     *     		@OA\Property(property="id", type="string"),
     *        )
     *   )
     * ),
     * @OA\Response(response=200, description="Successfull operation.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="code", type="integer", example=200),
     *     			@OA\Property(property="data", type="json", example={
    "message": "success",
    "data": {
    "id": 5,
    "name": "asd",
    "price": "12.00",
    "seller": "Test",
    "created_at": "2023-06-19T20:06:34.000000Z",
    "updated_at": "2023-06-19T20:40:25.000000Z"
    }
    })
     *            )
     *        )
     * ),
     *@OA\Response(response=400, description="Invalid Data.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="Invalid Data."),
     *            )
     *        )
     * ),
     *@OA\Response(response=500, description="something went wrong please try again later.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="something went wrong please try again later."),
     *            )
     *        )
     * )
     *)
     *
     */
    public function getOne(int $id): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), new ItemResource($this->itemService->getOneById($id)));
    }

    /**
     * Update the specified resource.
     *
     * @param UpdateItemRequest $request
     * @return JsonResponse
     * @throws CustomQueryException
     * @OA\Put(
     *    path="/api/v1/item/update/{id}",
     *   summary="Update Item",
     *   tags={"Items Controller"},
     * @OA\RequestBody(description="Update Item",
     * 	@OA\MediaType(mediaType="application/json",
     *   	@OA\Schema(
     *     		@OA\Property(property="id", type="string"),
     *     		@OA\Property(property="name", type="string"),
     *     		@OA\Property(property="price", type="string"),
     *     		@OA\Property(property="seller", type="string"),
     *        )
     *   )
     * ),
     * @OA\Response(response=200, description="Successfull operation.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="code", type="integer", example=200),
     *     			@OA\Property(property="data", type="json", example={
    "message": "success",
    "data": {
    "id": 5,
    "name": "asd",
    "price": "12.00",
    "seller": "Test",
    "created_at": "2023-06-19T20:06:34.000000Z",
    "updated_at": "2023-06-19T20:40:25.000000Z"
    }
    })
     *            )
     *        )
     * ),
     *@OA\Response(response=400, description="Invalid Data.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="Invalid Data."),
     *            )
     *        )
     * ),
     *@OA\Response(response=500, description="something went wrong please try again later.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="something went wrong please try again later."),
     *            )
     *        )
     * )
     *)
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
     *   * @OA\Delete(
     *    path="/api/v1/item/delete/{id}",
     *   summary="Delete Item",
     *   tags={"Items Controller"},
     * @OA\RequestBody(description="Delete Item",
     * 	@OA\MediaType(mediaType="application/json",
     *   	@OA\Schema(
     *     		@OA\Property(property="id", type="string"),
     *        )
     *   )
     * ),
     * @OA\Response(response=200, description="Successfull operation.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="code", type="integer", example=200),
     *     			@OA\Property(property="data", type="json", example={
    "message": "success",
    "data": {}
    })
     *            )
     *        )
     * ),
     *@OA\Response(response=400, description="Invalid Data.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="Invalid Data."),
     *            )
     *        )
     * ),
     *@OA\Response(response=500, description="something went wrong please try again later.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="something went wrong please try again later."),
     *            )
     *        )
     * )
     *)
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
     * Get Total price per month the specified resource from storage.
     * @OA\Get(
     *    path="/api/v1/item/total-price-current-month",
     *   summary="Get Total price per month",
     *   tags={"Items Controller"},
     * @OA\RequestBody(description="Get Total price per month",
     * 	@OA\MediaType(mediaType="application/json",
     *   )
     * ),
     * @OA\Response(response=200, description="Successfull operation.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="code", type="integer", example=200),
     *     			@OA\Property(property="data", type="json", example={
    "message": "success",
    "data": {
    "total_price": 24
    }
    })
     *            )
     *        )
     * ),
     *@OA\Response(response=400, description="Invalid Data.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="Invalid data."),
     *            )
     *        )
     * ),
     *@OA\Response(response=500, description="something went wrong please try again later.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="something went wrong please try again later."),
     *            )
     *        )
     * )
     *)
     */
    public function totalPriceCurrentMonth(): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), (object)['total_price' => $this->itemService->totalPriceCurrentMonth()]);
    }

    /**
     * Get Total price the specified resource from storage.
     *
     * @return JsonResponse
     * Get Total price per month the specified resource from storage.
     * @OA\Get(
     *    path="/api/v1/item/total-price-average",
     *   summary="Get Total price Avrage",
     *   tags={"Items Controller"},
     * @OA\RequestBody(description="Get Total price Avrage",
     * 	@OA\MediaType(mediaType="application/json",
     *   )
     * ),
     * @OA\Response(response=200, description="Successfull operation.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="code", type="integer", example=200),
     *     			@OA\Property(property="data", type="json", example={
    "message": "success",
    "data": {
    "total_price_average": 12
    }
    })
     *            )
     *        )
     * ),
     *@OA\Response(response=400, description="Invalid Data.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="Invalid data."),
     *            )
     *        )
     * ),
     *@OA\Response(response=500, description="something went wrong please try again later.",
     *      @OA\MediaType(mediaType="application/json",
     * 			@OA\Schema(
     *     			@OA\Property(property="error_code", type="integer", example=400),
     *     			@OA\Property(property="error_message", type="string", example="something went wrong please try again later."),
     *            )
     *        )
     * )
     *)
     */
    public function totalPriceAverage(): JsonResponse
    {
        return CustomResponse::successResponse(__('success'), (object)['total_price_average' => $this->itemService->totalPriceAverage()]);
    }
}
