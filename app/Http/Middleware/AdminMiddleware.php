<?php

namespace Doncampeon\Http\Middleware;

use Closure;

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
         if ($request->user()->type != 'A')
        {
            return redirect('/');
        }

        return $next($request);
    }
}
