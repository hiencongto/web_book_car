<?php
namespace App\Repositories\Repository;

use App\Mail\ConfirmAccountMail;
use App\Models\Blog;
use App\Models\User;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateUserRequest;

use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\BlogRepositoryInterface;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Support\Facades\Mail;


class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    public function getModel()
    {
        return Blog::class;
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
        return Blog::query();
    }
}

