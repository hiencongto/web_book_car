<?php
namespace App\Repositories\RepositoryInterface;

use App\Repositories\BaseRepositoryInterface;

interface SeatRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);

}

