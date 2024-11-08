<?php
namespace App\Repositories\Repository;

use App\Models\Provider;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\ProviderRepositoryInterface;


class ProviderRepository extends BaseRepository implements ProviderRepositoryInterface
{
    public function getModel()
    {
        return Provider::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function check()
    {
        $query = $this->model;
    }
}

