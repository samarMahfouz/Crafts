<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if($request->user() === null){ // if the user doesn not have account
          return redirect('/posts');
        }
        $actions = $request->route()->getAction();
        $roles   = isset($action['roles']) ? $actions['roles'] : null;
        return $next($request);
        if($request->user()->hasAnyRole($roles) || !$roles){
          return $next($request);
        }
        return redirect('/posts');
    }
}
