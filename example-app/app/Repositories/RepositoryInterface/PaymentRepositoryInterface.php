<?php
namespace App\Repositories\RepositoryInterface;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\BaseRepositoryInterface;

interface PaymentRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);


}

