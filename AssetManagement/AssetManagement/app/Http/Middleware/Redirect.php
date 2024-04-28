<?php

namespace App\Http\Middleware;
use Helper;
use Closure;
use Auth;
use Session;
use Cookie;
use Illuminate\Support\Str;
class Redirect
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
       
         $allowed_host = array('10.10.1.11','192.168.1.123','defexpo.gov.in','localhost','aeroindia.gov.in/aeroindia','www.aeroindia.gov.in','aeroindia.gov.in', 'origin06022023-aeroindia.nic.in','www.defexpo.gov.in');
        $server_host = $_SERVER['HTTP_HOST'];
        if(!in_array($server_host,$allowed_host)){
            header($_SERVER['SERVER_PROTOCOL'].'400 Bad Request');
            exit;
        }
        if (Auth::user()) {
           $dt = getusertoken();
           if(session()->has('usertoken')){
           if(session('usertoken') != $dt->user_token){
             Session::flush();
             $uri = $_SERVER["REQUEST_URI"];
           $uriArray = explode('/', $uri);
           $page_url = $uriArray[1];
         $page_url2 = $uriArray[2]; 
          if($page_url2 == 'exhibitionadm'){
             return redirect()->route('ad_login');
         }else{
             return redirect()->route('login');
         }
           
           }
          
        }

        
    }


    


        $curRoute = \Illuminate\Support\Facades\Route::currentRouteName();
        $closedlinks = array('associate-media-partner--','registration.contractor--','catalogue-registe-r','b2b-lounge-stalls','add-co-exhibitor--','customer.contractor.index--','vendor/laravel/framework/src/Illuminate/Encryption/Encrypter.php--');
        if(in_array($curRoute,$closedlinks)){
             return redirect()->route('process-closed');
        }


        $checkUrlLinks = array('new-co-exhibitors');
        if(in_array($curRoute,$checkUrlLinks)){
           $userInfo =  Auth::user();
           $registerType = $userInfo->register_type;
            if($registerType !='1'){
                return redirect()->back();
            }
        }


        
        
        return $next($request);
    }
}
