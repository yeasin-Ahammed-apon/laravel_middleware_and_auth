<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class user_auth_check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->exists("logedin") && ($request->path() != '/login_page' or $request->path() != '/register_page')) {
            return redirect('/login_page')->with("massage","you are not loged in plz , first login");
        }
        
        return $next($request)
        ->header('Cache-Control','no-cache,no-store,max-age-0,must-age-0,must-revalidate')
                              -> header('Pragma','no-cache')                       
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
