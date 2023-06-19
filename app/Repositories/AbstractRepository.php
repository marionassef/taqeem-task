<?php

namespace App\Repositories;

use App\Exceptions\CustomQueryException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class AbstractRepository implements AbstractRepositoryInterface
{
    public $model;

    /**
     * @param $data
     * @return mixed
     * @throws CustomQueryException
     */
    public function create(array $data)
    {
        try {
            return $this->model->query()->create($data);
        } catch (QueryException $exception) {
            Log::debug($exception);
            throw new CustomQueryException($exception->getMessage());
        }
    }

    /**
     * @param $item
     * @param $data
     * @return mixed
     * @throws CustomQueryException
     */
    public function update(object $item, array $data)
    {
        try {
            return $item->update($data);
        } catch (QueryException $exception) {
            Log::debug($exception);
            throw new CustomQueryException($exception->getMessage());
        }
    }

    /**
     * @param array $filters
     * @return mixed
     * @throws CustomQueryException
     */
    public function findAll(array $filters = [])
    {
        try {
            return $this->model->query()
                ->where($filters)->get();
        } catch (QueryException $exception) {
            Log::debug($exception);
            throw new CustomQueryException($exception->getMessage());
        }
    }

    /**
     * @param array $filters
     * @return mixed
     * @throws CustomQueryException
     */
    public function findOneBy(array $filters = [])
    {
        try {
            return $this->model->query()->where($filters)->firstOrFail();
        } catch (QueryException $exception) {
            Log::debug($exception);
            throw new CustomQueryException($exception->getMessage());
        }
    }

    /**
     * @param int $id
     * @return mixed
     * @throws CustomQueryException
     */
    public function delete(int $id)
    {
        try {
            return $this->model->destroy($id);
        } catch (QueryException $exception) {
            Log::debug($exception);
            throw new CustomQueryException($exception->getMessage());
        }
    }

}
