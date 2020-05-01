<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class agriculteur
{
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if(Auth::user()->type == 'agriculteur') return $next($request);
    return abort(403, 'Your have no right to access this page');
  }
}
