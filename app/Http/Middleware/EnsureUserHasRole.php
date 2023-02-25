<?php

namespace App\Http\Middleware;

use App\Models\RolesRelation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next, string $role)
  {
    // dd($role);

    $id = Auth::user()->id;
    $roles =  RolesRelation::where('user_id', $id)->first();
    if ($roles->role_id == $role) {
      return $next($request);
    }

    abort(403);
    // return $next($request);
  }
}
