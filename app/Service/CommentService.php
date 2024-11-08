<?php

namespace App\Service;

use App\Repositories\RepositoryInterface\CommentRepositoryInterface;

class CommentService
{
    protected $commentRepository;

    function __construct(
        CommentRepositoryInterface $commentRepository,
    )
    {
        $this->commentRepository = $commentRepository;
    }

    public function getAllCity()
    {
        return $this->cityRepository->getAll();
    }


}
