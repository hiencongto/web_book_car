<?php
namespace App\Repositories\RepositoryInterface;


use App\Repositories\BaseRepositoryInterface;

interface TripServiceRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);

}

