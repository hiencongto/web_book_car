<?php
namespace App\Repositories\Repository;

use App\Models\City;
use App\Constants\CommonConstant;

use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\CityRepositoryInterface;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function getModel()
    {
        return City::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function check()
    {
        $query = $this->model;
    }

}

