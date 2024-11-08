<?php
namespace App\Repositories\RepositoryInterface;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\BaseRepositoryInterface;

interface BlogRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);

    /**
     * customer or driver createHandle
     *
     * @param CreateUserRequest $request
     * @param string|null $role
     * @return mixed|null
     */
}

