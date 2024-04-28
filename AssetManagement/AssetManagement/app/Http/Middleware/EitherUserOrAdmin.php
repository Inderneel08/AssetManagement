<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class EitherUserOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(\Illuminate\Support\Facades\Session::get('role')==='ADMIN'||\Illuminate\Support\Facades\Session::get('role')==='USER'){
            $issues = DB::table('issues')->where('delete_flag','=',0)->get()->toArray();

            $watched_issues = DB::table('users')->where('username',\Illuminate\Support\Facades\Session::get('username'))->where('delete_flag','=',0)->first();
    
            $total_difference = ($watched_issues->issues_watched_latest)-(sizeof($issues));
    
            \Illuminate\Support\Facades\View::share('total_difference',$total_difference);
            
            $response = $next($request);

            return $response;
        }
        
        return $next($request);
    }
}
