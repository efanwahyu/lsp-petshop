<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('adminMiddle')->guest()) {
            if($request->ajax()||$request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect(url('admin/login'));
            }
        }
        return $next($request);
    }
}
