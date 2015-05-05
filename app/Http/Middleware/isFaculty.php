<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class isFaculty {

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

        if($user && $user->isFaculty())
        {
            return $next( $request );
        }
        return new RedirectResponse(url('/'));
	}

}
