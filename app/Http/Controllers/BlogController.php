<?php

namespace App\Http\Controllers;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateCarRequest;
use App\Repositories\RepositoryInterface\CarRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

use App\Service\BlogService;

class BlogController extends Controller
{
    protected $blogService;

    function __construct(
       BlogService $blogService,
    )
    {
        $this->blogService = $blogService;
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function listBlogForCustomer()
    {
        try {
            $blogs = $this->blogService->getAll();

            if ($blogs)
            {
                return view('customer.blog.all_blogs', compact('blogs'));
            }

            return redirect()->back()
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page-404')
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
        }
    }

    /**
     * @param $id
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function blogDetailForCustomer($id)
    {
        try {
            $blog = $this->blogService->find($id);

            if ($blog)
            {
                return view('customer.blog.blog_detail', compact('blog'));
            }

            return redirect()->back()
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
        }
        catch (Exception $exception)
        {
            return view('404');
        }
    }

    /*
    * ----------------------------D-----
    * ADMIN
    * ---------------------------------
    */

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showAddBlogForAdmin()
    {
        try {
            return view('admin.blog.add_new_blog');
        }
        catch (\Exception $exception)
        {
            return view('admin.404_admin');
        }
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function listBlogForAdmin()
    {
        $blogs = $this->blogService->getAll();

        return view('admin.blog.all_blogs', compact('blogs'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function addBlogForAdmin(Request $request)
    {
        $blog = $this->blogService->createBlogForAdmin($request);

        if ($blog)
        {
            return redirect()->route('list_blog')
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_create']]);
        }

        return redirect()->back()
            ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create']]);
    }

    /**
     * @param $id
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showBlogEditForAdmin($id)
    {
        try {
            $blog = $this->blogService->find($id);

            if ($blog)
            {
                return view('admin.blog.edit_blog', compact('blog'))
                    ->with('activeRouteEditBlog', 'edit_blog_admin');
            }

            return redirect()->back();
        }
        catch (Exception $exception)
        {
            return view('admin.404_admin');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function updateBlogForAdmin(Request $request, $id)
    {
        try {
            $blog = $this->blogService->updateBlogForAdmin($request, $id);

            if ($blog)
            {
                return redirect()->route('list_blog')
                    ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_update']]);
            }
            return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_update']]);
        }
        catch (Exception $exception)
        {
            return view('admin.404_admin');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteBlogForAdmin($id)
    {
        try {
            $blog = $this->blogService->delete($id);

            if ($blog)
            {
                return redirect()->route('list_blog')
                    ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_delete']]);
            }

            return redirect()->back();
        }
        catch (Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }

    }
}
