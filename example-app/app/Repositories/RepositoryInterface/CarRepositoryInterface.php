<?php
namespace App\Repositories\RepositoryInterface;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\BaseRepositoryInterface;

interface CarRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);


}

