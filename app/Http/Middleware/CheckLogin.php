<?php
namespace App\Http\Middleware;
use Closure;
use Auth;

class CheckLogin
{
	public function handle($request, Closure $next)
	{
	/*if(!Auth::check())
			return \Redirect::to('login'); */
	return $next($request);
	}
}