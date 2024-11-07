<?php
namespace App\Repositories\RepositoryInterface;


use App\Repositories\BaseRepositoryInterface;

interface TripDetailRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);

}

