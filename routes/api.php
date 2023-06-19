<?php

use App\Http\Controllers\ItemsController;
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
    Route::get('list', [ItemsController::class, 'findAll'])->name('item.list');
    Route::get('total-price-current-month', [ItemsController::class, 'totalPriceCurrentMonth'])->name('item.total-price');
    Route::get('total-price-average', [ItemsController::class, 'totalPriceAverage'])->name('item.total-price-average');
    Route::post('store', [ItemsController::class, 'store'])->name('item.create');
    Route::get('details/{id}', [ItemsController::class, 'getOne'])->name('item.details');
    Route::put('update/{id}', [ItemsController::class, 'update'])->name('item.update');
    Route::delete('delete/{id}', [ItemsController::class, 'delete'])->name('item.delete');
});
