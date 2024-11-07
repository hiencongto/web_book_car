<?php
namespace App\Repositories\Repository;

use App\Models\City;
use App\Constants\CommonConstant;

use App\Models\Comment;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\CityRepositoryInterface;
use App\Repositories\RepositoryInterface\CommentRepositoryInterface;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        return Comment::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function check()
    {
        $query = $this->model;
    }

    public function query()
    {
        return Comment::query();
    }
}

