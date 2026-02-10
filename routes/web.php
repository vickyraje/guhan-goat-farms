<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronController;
use App\Http\Controllers\Back\PinController;
use App\Http\Controllers\Back\PlanController;
use App\Http\Controllers\Back\LevelController;
use App\Http\Controllers\Back\DividentController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\LoginUserController;
use App\Http\Controllers\Back\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
   Route::get('/', [LoginController::class, 'index']);
   Route::get('login', [LoginController::class, 'index'])->name('login');
   Route::get('logout', [LoginController::class, 'logout'])->name('logout');
   Route::post('login-submit', [LoginController::class, 'loginSubmit']);

   Route::group(['middleware' => 'auth'],function () {
      Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

      /* user */
      Route::resource('/login_user', LoginUserController::class)->names('admin.login_user');
      /*Route::put('loginUser/update/{id}', [LoginUserController::class, 'update'])->name('user.update');*/
      Route::post('city_list', [LoginUserController::class, 'cityList'])->name('admin.city_list');

      /* Plan */
      Route::resource('/plan', PlanController::class);
      Route::post('plan/datatable', [PlanController::class, 'index'])->name('plan.datatable');

      /* Pin */
      Route::resource('/pin', PinController::class)->names('admin.pin');
      Route::post('pin/datatable', [PinController::class, 'index'])->name('admin.pin.datatable');
      Route::post('pin/fetch_user', [PinController::class, 'fetchUserName'])->name('pin.fetch_user');

      /** Level */
      Route::resource('level', LevelController::class)->names('admin.level');
      Route::post('level/datatable', [LevelController::class, 'index'])->name('admin.level.datatable');
      Route::match(['GET', 'POST'], 'business', [LevelController::class, 'business'])->name('admin.business');

      /** Divident */
      Route::resource('divident', DividentController::class)->names('admin.divident');
      Route::post('divident/datatable', [DividentController::class, 'index'])->name('admin.divident.datatable');
      Route::match(['GET', 'POST'], 'investor', [DividentController::class, 'investor'])->name('admin.investor');
   });
});

Route::prefix('user')->group(function () {
   Route::get('/', [LoginController::class, 'user']);
   Route::get('login', [LoginController::class, 'user'])->name('user.login');
   Route::get('logout', [LoginController::class, 'userLogout'])->name('user.logout');
   Route::post('login-submit', [LoginController::class, 'userSubmit'])->name('user.loginsubmit');

   Route::group(['middleware' => 'auth:user'],function () {
      Route::get('dashboard', [DashboardController::class, 'user'])->name('dashboard');

      /* Pin */
      Route::resource('/pin', PinController::class)->names('user.pin');
      Route::post('pin/datatable', [PinController::class, 'index'])->name('user.pin.datatable');
      Route::post('pin/validate_pin', [PinController::class, 'validatePin'])->name('validate_pin');

      /* login user*/
      Route::resource('/login_user', LoginUserController::class)->names('user.login_user');

      /** Profile */
      Route::post('city_list', [LoginUserController::class, 'cityList'])->name('city_list');
      Route::match(['GET', 'PUT'], 'profile', [LoginUserController::class, 'profile'])->name('user.profile');
      Route::match(['GET', 'PUT'], 'change_password', [LoginUserController::class, 'changePassword'])->name('user.change_password');

      /** Genealogy Tree */
      Route::get('genealogy_tree', [LoginUserController::class, 'genealogyTree'])->name('user.genealogy_tree');
      Route::get('genealogy_tree/{username}', [LoginUserController::class, 'genealogyTree'])->name('user.genealogy_tree_search');

      /** Downline Members */
      Route::match(['GET', 'POST'], 'downline', [LoginUserController::class, 'downline'])->name('user.downline');

      /** Level */
      Route::resource('level', LevelController::class)->names('user.level');
      Route::post('level/datatable', [LevelController::class, 'index'])->name('user.level.datatable');

      /** Divident */
      Route::resource('divident', DividentController::class)->names('user.divident');
      Route::post('divident/datatable', [DividentController::class, 'index'])->name('user.divident.datatable');
   });
});

Route::prefix('/')->group(function () {
   Route::get('/', [FrontController::class, 'index'])->name('home');
   Route::get('about', [FrontController::class, 'about'])->name('about');
   Route::get('contact', [FrontController::class, 'contact'])->name('contact');
});

Route::prefix('cron')->group(function () {
   Route::get('mor_cron', [CronController::class, 'morCron'])->name('mor_cron');
   Route::get('eve_cron', [CronController::class, 'eveCron'])->name('eve_cron');
   Route::post('test_cron', [CronController::class, 'testCron'])->name('test_cron');
   Route::get('month', [CronController::class, 'month'])->name('month');
});
