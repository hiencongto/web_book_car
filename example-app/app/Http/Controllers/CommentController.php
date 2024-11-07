<?php

namespace App\Http\Controllers;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateCarRequest;
use App\Repositories\RepositoryInterface\CarRepositoryInterface;
use App\Service\CommentService;
use Illuminate\Http\Request;

use App\Service\CarService;

class CommentController extends Controller
{
    protected $commentService;

    function __construct(
        CommentService $commentService,
    )
    {
        $this->commentService = $commentService;
    }

    public function commentReview()
    {
        dd(123);
    }

}
