<?php
namespace App\Repositories\Repository;

use App\Models\Payment;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\PaymentRepositoryInterface;
use App\Repositories\RepositoryInterface\TripRepositoryInterface;
use Illuminate\Http\Request;
use App\Constants\CommonConstant;


class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
    public function getModel()
    {
        return Payment::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function query()
    {
        return Payment::query();
    }

}

