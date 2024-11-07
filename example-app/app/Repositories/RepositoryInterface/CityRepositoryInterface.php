<?php
namespace App\Repositories\RepositoryInterface;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\BaseRepositoryInterface;

interface CityRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);
}

