<?php

namespace App\Http\Controllers\Back;

use App\Models\Pin;
use App\Models\Plan;
use App\Models\Level;
use App\Models\Divident;
use App\Models\LoginUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index(Request $request)
   {
      $plans = Plan::select('id', 'name')->withCount([
         'pins as active_pins_count' => function ($q) {
            $q->where('status', 1);
         }
      ])->get();

      $all_data = [];

      $all_data['Total Users'] = ['count' => LoginUser::count(), 'icon' => 'users'];
      $all_data['Today Pins create'] = ['count' => Pin::whereDate('created_at', date('Y-m-d'))->count(), 'icon' => 'calendar'];
      $all_data['Today used  Pins'] = ['count' => Pin::whereDate('used_at', date('Y-m-d'))->count(), 'icon' => 'calendar'];
      $all_data['New Users Today'] = ['count' => LoginUser::whereDate('created_at', date('Y-m-d'))->count(), 'icon' => 'user-plus'];
      $all_data['Commission This Month'] = ['count' => Level::whereDate('created_at', date('Y-m-d'))->sum('amount'), 'icon' => 'money'];
      $all_data['Divident This Month'] = ['count' => Divident::whereDate('created_at', date('Y-m-d'))->sum('amount'), 'icon' => 'money'];
      foreach($plans as $plan){
         $all_data[$plan->name] = ['count' => $plan->active_pins_count, 'icon' => 'server'];
      }
      return view('admin.index', compact('all_data'));
   }

   public function user(Request $request)
   {
      $title = 'User Dashboard';
      $all_data = [];
      $all_data['plan'] = ['count' => Auth::guard('user')->user()->pin?->plan?->name ?? '-', 'icon' => 'server'];
      $all_data['Downline Users'] = ['count' => LoginUser::where('sponsor', Auth::guard('user')->user()->username)->count(), 'icon' => 'users'];
      $all_data['Total Commission Earned'] = ['count' => Level::where('user_id', Auth::guard('user')->id())->sum('amount'), 'icon' => 'money'];
      $all_data['Commission This Month'] = ['count' => Level::where('user_id', Auth::guard('user')->id())->whereDate('created_at', date('Y-m-d'))->sum('amount'), 'icon' => 'money'];
      $all_data['Total Divident Earned'] = ['count' => Divident::where('user_id', Auth::guard('user')->id())->sum('amount'), 'icon' => 'money'];
      $all_data['Divident This Month'] = ['count' => Divident::where('user_id', Auth::guard('user')->id())->whereDate('created_at', date('Y-m-d'))->sum('amount'), 'icon' => 'money'];
      return view('user.index', compact('all_data'));
   }
}
