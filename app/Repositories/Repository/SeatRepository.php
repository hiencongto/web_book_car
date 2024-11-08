<?php
namespace App\Repositories\Repository;

use App\Models\Seat;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateUserRequest;

use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\SeatRepositoryInterface;


class SeatRepository extends BaseRepository implements SeatRepositoryInterface
{
    public function getModel()
    {
        return Seat::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function query()
    {
        $query = $this->model;
        return $query;
    }

    public function where($column, $value)
    {
        return $this->model->where($column, $value);
    }
}

