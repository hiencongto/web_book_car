<?php
namespace App\Repositories\RepositoryInterface;

use App\Repositories\BaseRepositoryInterface;

interface ProviderRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);
}

