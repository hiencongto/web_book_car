<?php
namespace App\Repositories\Repository;

use App\Models\Car;


use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\CarRepositoryInterface;


class CarRepository extends BaseRepository implements CarRepositoryInterface
{
    public function getModel()
    {
        return Car::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function check()
    {
        $query = $this->model;
    }

    public function query()
    {
        return Car::query();
    }
}

