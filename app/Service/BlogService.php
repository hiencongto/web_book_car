<?php

namespace App\Service;

use App\Repositories\RepositoryInterface\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogService
{
    protected $blogRepository;
    protected $imageService;

    function __construct(
        BlogRepositoryInterface $blogRepository,
        ImageService $imageService,
    )
    {
        $this->blogRepository = $blogRepository;
        $this->imageService = $imageService;
    }

    /**
     * @param Request $request
     * @return false|mixed
     */
    public function createBlogForAdmin(Request $request)
    {
        try {
            if ($request->hasFile('image'))
            {
                $image_name = $this->imageService->addNewImage($request->file('image'), 'image/blogs');
            }
            else $image_name = 'blog_icon_dft.jpg';

            $data = [
                'title' => $request->title,
                'content' => $request->content_blog,
                'image' => $image_name,
            ];

            return $this->blogRepository->create($data);
        }catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @return false|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        try {
            return $this->blogRepository->query()->orderBy('created_at', 'desc')->paginate(3);
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find( $id)
    {
//        try {
            return $this->blogRepository->find($id);
//        }
//        catch (\Exception $exception)
//        {
//            return false;
//        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return false|mixed
     */
    public function updateBlogForAdmin(Request $request, $id)
    {
        try {
            $blog = $this->blogRepository->find($id);

            if ($request->hasFile('image'))
            {
                $this->imageService->deleteImage($blog->image, 'image/blogs');
                $image_blog = $this->imageService->addNewImage($request->file('image'), 'image/blogs');
            }
            else $image_blog = $blog->image;

            $data = [
                'title' => $request->title ?? $blog->title,
                'content' => $request->content_blog ?? $blog->content,
                'image' => $image_blog,
            ];

            return $this->blogRepository->update($id, $data);
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @param $id
     * @return false|mixed
     */
    public function delete($id)
    {
        try {
            return $this->blogRepository->delete($id);
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }
}
