<?php

namespace CockstarGays\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
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
        if (! Auth::check() || ! Auth::user()->isAdmin()) {
            session()->flash('messages.danger', 'You are not authorized to view this page.');
            return redirect()->route('login');
        }
        return $next($request);
    }
}
