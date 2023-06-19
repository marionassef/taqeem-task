<?php


namespace App\Repositories;


interface AbstractRepositoryInterface
{
    public function create(array $data);

    public function update(object $item, array $data);

    public function findAll(array $filters = []);

    public function delete(int $id);
}
