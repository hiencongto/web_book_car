<?php

namespace App\Http\Middleware;

use App\Constants\CommonConstant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleDriver
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
        if ($user->role != CommonConstant::ROLE['driver']) {
            Auth::logout();

            return redirect()->route('show_login');
        }

        return $next($request);
    }
}
