<?php
namespace App\Repositories\Repository;

use App\Models\Trip;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\TripRepositoryInterface;
use Illuminate\Http\Request;
use App\Constants\CommonConstant;


class TripRepository extends BaseRepository implements TripRepositoryInterface
{
    public function getModel()
    {
        return Trip::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function query()
    {
        return Trip::query();
    }

    public function where($column, $value)
    {
        // Assuming the model for the Trip is 'Trip'
        return Trip::where($column, $value)->first();
    }

}

