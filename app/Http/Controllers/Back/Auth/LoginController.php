<?php

namespace App\Http\Controllers\Back\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{
   public function index()
   {
      if (Auth::check()) {
         return redirect()->intended(url('/admin/dashboard'));
      }
      return view('admin.login');
   }

   public function loginSubmit(Request $request)
   {
      $credentials = ['email' => $request->email, 'password' => $request->password];

      if(!Auth::attempt($credentials)):
            return redirect()->intended(url('/admin/dashboard'));
      endif;

      return redirect(url('/admin'))->withInput()->with('error', 'User name or password does not matched');
   }

   public function logout()
   {
      return redirect('/admin')->with(Auth::logout());
   }

   public function user()
   {
      if (Auth::guard('user')->check()) {
            return redirect()->intended(url('/user/dashboard'));
      }
      return view('admin.user_login');
   }

   public function userSubmit(Request $request)
   {
      $request->validate([
         'username' => 'required|string',
         'password' => 'required|string',
      ]);

      $throttleKey = Str::lower($request->username) . '|' . $request->ip();

      if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
         return back()->withErrors([
            'username' => 'Too many login attempts. Please try again later.'
         ]);
      }
      $credentials = ['username' => $request->username, 'password' => $request->password, 'status' => 1];

      if(Auth::guard('user')->attempt($credentials)){
         $request->session()->regenerate();
         RateLimiter::clear($throttleKey);
         return redirect()->intended(url('/user/dashboard'));
      }

      RateLimiter::hit($throttleKey, 60);
      return redirect(url('/user'))->withInput()->with('error', 'User name or password does not matched');
   }

   public function userLogout()
   {
      return redirect('/user')->with(Auth::guard('user')->logout());
   }
}
