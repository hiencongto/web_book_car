<?php

namespace App\Http\Middleware;

use App\Constants\CommonConstant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleUser
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
        if ($user->role != CommonConstant::ROLE['customer']) {
            Auth::logout();

            return redirect()->route('show_login');
        }

        return $next($request);
    }
}
