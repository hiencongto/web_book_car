<?php
namespace App\Repositories\RepositoryInterface;

use App\Repositories\BaseRepositoryInterface;

interface StatusRepositoryInterface extends BaseRepositoryInterface
{
    public function logicCreate($data = []);
}

