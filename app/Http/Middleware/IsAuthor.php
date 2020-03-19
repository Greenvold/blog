<?php

namespace App\Http\Middleware;

use Closure;

class IsAuthor
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
        $isAuthor = $request->route()->parameter('post')->user_id === auth()->user()->id;

        if (!$isAuthor) {
            return redirect()->route('home');
        } else {
            return $next($request);
        }
    }
}