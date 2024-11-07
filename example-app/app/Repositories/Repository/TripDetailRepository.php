<?php
namespace App\Repositories\Repository;

use App\Models\Trip;
use App\Models\TripDetail;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\TripDetailRepositoryInterface;
use App\Repositories\RepositoryInterface\TripRepositoryInterface;
use Illuminate\Http\Request;
use App\Constants\CommonConstant;


class TripDetailRepository extends BaseRepository implements TripDetailRepositoryInterface
{
    public function getModel()
    {
        return TripDetail::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function query()
    {
        return TripDetail::query();
    }

    public function isExist(int $customer_id, int $trip_id)
    {
        // TODO: Implement isExist() method.
        return $this->model
            ->where('customer_id', $customer_id)
            ->where('trip_id', $trip_id)
            ->where('status_id', '<>', CommonConstant::STATUS_ID['trip_detail_cancel'])
            ->get()
            ->count();
    }
}

