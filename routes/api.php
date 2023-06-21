<?php

use App\Http\Controllers\ItemsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#### Items Routes
Route::prefix('v1/item')->group(function (){
    Route::get('list', [ItemsApiController::class, 'findAll'])->name('item.list');
    Route::get('total-price-current-month', [ItemsApiController::class, 'totalPriceCurrentMonth'])->name('item.total-price');
    Route::get('total-price-average', [ItemsApiController::class, 'totalPriceAverage'])->name('item.total-price-average');
    Route::post('store', [ItemsApiController::class, 'store'])->name('item.create');
    Route::get('details/{id}', [ItemsApiController::class, 'getOne'])->name('item.details');
    Route::put('update/{id}', [ItemsApiController::class, 'update'])->name('item.update');
    Route::delete('delete/{id}', [ItemsApiController::class, 'delete'])->name('item.delete');
});
