<?php
namespace App\Http\Middleware;
use Closure;
use Session;

class myauth
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
		if (!Session::get('token'))
		    return redirect('/api/error');
			
		else if(empty(Session::get('token')))
			return redirect('/api/error');
		
		else
			if(!empty(Session::get('token')) )
				return $next($request);
    }
}
