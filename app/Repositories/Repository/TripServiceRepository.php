<?php
namespace App\Repositories\Repository;

use App\Models\TripService;
use App\Models\User;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateUserRequest;

use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\TripServiceRepositoryInterface;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;


class TripServiceRepository extends BaseRepository implements TripServiceRepositoryInterface
{
    public function getModel()
    {
        return TripService::class;
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

