<?php

namespace App\Http\Services;

use App\Exceptions\CustomQueryException;
use App\Models\Item;
use App\Repositories\ItemRepository;

class ItemsService
{
    /**
     * @var ItemRepository
     */
    private $itemRepository;

    public function __construct(ItemRepository $repository)
    {
        $this->itemRepository = $repository;
    }

    /**
     * @return mixed
     * @throws CustomQueryException
     */
    public function list()
    {
        return $this->itemRepository->findAll();
    }

    /**
     * @param array $data
     * @return Item
     * @throws CustomQueryException
     */
    public function create(array $data): Item
    {
        return $this->itemRepository->create($data);
    }

    /**
     * @param int $id
     * @return Item
     * @throws CustomQueryException
     */
    public function getOneById(int $id): Item
    {
        return $this->itemRepository->findOneBy(['id' => $id]);
    }

    /**
     * @param array $data
     * @return Item
     * @throws CustomQueryException
     */
    public function update(array $data): Item
    {
        $this->itemRepository->update($this->itemRepository->findOneBy(['id' => $data['id']]), $data);
        return $this->itemRepository->findOneBy(['id' => $data['id']]);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws CustomQueryException
     */
    public function delete(int $id): bool
    {
        $this->itemRepository->findOneBy(['id' => $id]);
        return $this->itemRepository->delete($id);
    }

    /**
     * @return int
     */
    public function totalPriceCurrentMonth(): int
    {
        return $this->itemRepository->totalPriceCurrentMonth();
    }

    /**
     * @return float
     */
    public function totalPriceAverage(): float
    {
        return round($this->itemRepository->totalPriceAverage(), 2);
    }
}
