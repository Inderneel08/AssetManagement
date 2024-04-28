<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/**
 * Summary of UserController
 */
class UserController extends Controller
{
    /**
     * Summary of unitlogin
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     *
     */

    // public function unitlogin(Request $request)
    // {
        // $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
        //     'password' => 'required',
        //     'email' => 'required|email',
        //     'captcha' => 'required|captcha',
        // ]);
        
        // if($validator->fails()){
        //     return(redirect()->route('toLogin')->withErrors($validator)->withInput());
        // }
        

        // // dd($request);

        // $email=$request->email;

        // $username = DB::table('users')->where('email',$email)->value('username');

        // $password = DB::table('users')->where('email',$email)->value('password');
        
        // $role=DB::table('users')->where('email',$email)->value('role');

        // if($username===''|| $username==null){
        //     return back()->with('error','Email Id does not exists.');
        // }

        // if(Hash::check($request->password,$password)){
        //     session(['username'=> $username,'email'=> $email,'role'=> $role]);

        //     return(redirect()->route('home'));
        // }

        // return back()->with('error','Password Incorrect.');
    // }


    public function attemptLogin(Request $request)
    {
        // dd(1);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
            'password' => 'required',
            'email' => 'required|email',
            'captcha' => 'required|captcha',
        ]);
        
        if($validator->fails()){
            // return(redirect()->route('toLogin')->withErrors($validator)->withInput());
            return back()->with('error','Incorrect Captcha.');
        }
        

        // dd($request);

        $email=$request->email;

        $username = DB::table('users')->where('email',$email)->value('username');

        $password = DB::table('users')->where('email',$email)->value('password');
        
        $role=DB::table('users')->where('email',$email)->value('role');

        if($username===''|| $username==null){
            return back()->with('error','Email Id does not exists.');
        }

        if(Hash::check($request->password,$password)){
            session(['username'=> $username,'email'=> $email,'role'=> $role]);

            return(redirect()->route('home'));
        }

        return back()->with('error','Password Incorrect.');
        
    }

    // protected function validateCaptcha(Request $request)
    // {
    //     return $this->validate($request,['captcha'=>'required|captcha']);
    // }

    public function logout()
    {
        Session::flush();

        return(redirect()->route('toLogin'));
    }


}
