<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::get('role')!=='ADMIN'){
            return(Redirect::route('home'));
        }

        $issues = DB::table('issues')->where('delete_flag','=',0)->get()->toArray();

        $watched_issues = DB::table('users')->where('username',Session::get('username'))->where('delete_flag','=',0)->first();

        $total_difference = ($watched_issues->issues_watched_latest)-(sizeof($issues));

        View::share('total_difference',$total_difference);

        return $next($request);
    }
}
