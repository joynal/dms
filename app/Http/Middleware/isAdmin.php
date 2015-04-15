<?php namespace App\Http\Middleware;

use Closure;

class isAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = $request->user();

		if ($user && $user->isAdmin())
		{
			return $next($request);
		}
		return new RedirectResponse(url('/'));
	}

}
