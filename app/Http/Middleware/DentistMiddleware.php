<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DentistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->user_type_id == 2)

            return $next($request);

        // se puede agregar vista para redirigir a page not found
        //return redirect('/');
        return abort(404);
    }
}
