<?php

namespace App\Http\Controllers;


use App\Http\Services\ItemsService;

class ItemsController extends Controller
{
    /**
     * @var ItemsService
     */
    private $itemService;

    public function __construct(ItemsService $itemsService)
    {
        $this->itemService = $itemsService;
    }

    public function list()
    {
        return view('dashboard.items.index', ['items' => $this->itemService->list()]);
    }
}
