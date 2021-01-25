<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AuthenticateAccess
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
      $validSecrets=explode(',', env('ACCEPTED_SECRETS'));
//$validSecrets=7MHhCJf3xbMPjXPJqOdlLvqRtabav02K;
      if(in_array($request->header('Authorization'),$validSecrets)){
          //die("aaaaaaaaaa");
        return $next($request);
      }
  //    abort(Response::HTTP_UNAUTHORIZED);
    }
}
