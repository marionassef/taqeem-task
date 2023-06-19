<?php

namespace App\Http\Services;

use App\Exceptions\CustomQueryException;
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
     * @return mixed
     * @throws CustomQueryException
     */
    public function create(array $data)
    {
        return $this->itemRepository->create($data);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws CustomQueryException
     */
    public function getOneById(int $id)
    {
        return $this->itemRepository->findOneBy(['id' => $id]);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws CustomQueryException
     */
    public function update(array $data)
    {
        $this->itemRepository->update($this->itemRepository->findOneBy(['id' => $data['id']]), $data);
        return $this->itemRepository->findOneBy(['id' => $data['id']]);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws CustomQueryException
     */
    public function delete(int $id)
    {
        $this->itemRepository->findOneBy(['id' => $id]);
        return $this->itemRepository->delete($id);
    }

    /**
     * @return mixed
     */
    public function totalPriceCurrentMonth()
    {
        return $this->itemRepository->totalPriceCurrentMonth();
    }

    /**
     * @return mixed
     */
    public function totalPriceAverage()
    {
        return round($this->itemRepository->totalPriceAverage(), 2);
    }
}
