<?php
namespace App\Repositories\RepositoryInterface;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Http\Request;

interface TripRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);

    /**
     * @param Request $request
     * @param int|null $customer_id
     * @return mixed
     */
}

