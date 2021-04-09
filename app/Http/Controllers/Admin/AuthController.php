<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Show the application login.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the application post login.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function login(Request $request)
    {
        $credentials = $request->only('email','password');
        if(Auth::guard('admin')->attempt($credentials,$request->remember)) {
        	$user = Admin::where('email',$request->email)->first();
        	Auth::guard('admin')->login($user);
        	return redirect()->route('admin.dashboard')->with('status','You are successfully logged in!');
        } else {
        	return redirect()->route('admin.login')->with('status','Failed to process login.');
        }
    }*/

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin.dashboard')->with('status','You are successfully logged in!');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return redirect()->route('admin.login')->with('status','You are successfully logged out!');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
