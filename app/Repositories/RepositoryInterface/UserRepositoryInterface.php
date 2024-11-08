<?php
namespace App\Repositories\RepositoryInterface;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);

    /**
     * customer or driver createHandle
     *
     * @param CreateUserRequest $request
     * @param string|null $role
     * @return mixed|null
     */
    public function createWithRole(CreateUserRequest $request, string $role = null);

    /**
     * @return mixed
     */
    public function getAllDriver();

    public function getUserStatus($email);
}

