<?php

namespace App\Repositories;

use App\Models\Item;
use Carbon\Carbon;

class ItemRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Item();
    }

    public function totalPriceCurrentMonth(){
        $currentMonth = Carbon::now()->month;

        return $this->model->newQuery()->whereMonth('created_at', $currentMonth)->sum('price');
    }

    public function totalPriceAverage(){
        return $this->model->newQuery()->average('price');
    }
}
