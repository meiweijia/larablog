<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Auth;

class AuthMiddleware {
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */


    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		 if (!Auth::check())
		 {
			 if ($request->ajax())
			 {
				 return response('Unauthorized.', 401);
			 }
			 else
			 {
				 return redirect('login');
			 }
		 }
		 return $next($request);
		

        /*if (!Session::has('account'))
        {
            return redirect('login');
        }
        return $next($request);*/
		

    }

}
?>
