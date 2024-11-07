<?php
namespace App\Repositories\Repository;

use App\Models\Status;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\StatusRepositoryInterface;


class StatusRepository extends BaseRepository implements StatusRepositoryInterface
{
    public function getModel()
    {
        return Status::class;
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

