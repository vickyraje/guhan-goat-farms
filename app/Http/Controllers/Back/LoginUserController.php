<?php

namespace App\Http\Controllers\Back;

use App\Models\Pin;
use App\Models\City;
use App\Models\Level;
use App\Models\State;
use App\Helpers\Helper;
use App\Models\Divident;
use App\Models\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MaxMobileRegistrations;
use Illuminate\Support\Facades\Cache;

class LoginUserController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index(Request $request)
   {
      if ($request->ajax()) {
         DB::enableQueryLog();
         $mainQuery = LoginUser::with('pin')->orderBy('id','DESC');
         $row = $mainQuery->get();
         /*dd(DB::getQueryLog());*/
         return datatables()->of($row)
            ->addIndexColumn()
            ->editColumn(
               'created_at', function ($row) {
                  return Helper::formatDate($row->created_at);
               }
            )
            ->editColumn(
               'plan', function ($row) {
                  return $row->pin?->plan?->name ?? '-';
               }
            )
            ->editColumn(
               'action', function ($row) {
                  return '<a href="'.route('admin.login_user.edit', $row->id).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
               }
            )
            ->make(true);
      }
      return view('admin.users.index');
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      $states = State::orderBy('id', 'ASC')->get();
      return view('user.new_user', compact('states'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      return DB::transaction(function () use ($request) {
         try {

            $key = 'submit_lock_' . Auth::guard('user')->id();

            if (!Cache::add($key, true, 5)) {
               return back()->with('error', 'Please wait...');
            }

            $request->validate([
               'name'      => 'required',
               'email'     => 'nullable|email|unique:login_users,email',
               'mobile'    => ['required', 'numeric', 'digits:10', 'starts_with:6,7,8,9', new MaxMobileRegistrations],
               'whatsapp'  => 'required|numeric|digits:10|starts_with:6,7,8,9',
               'state'     => 'required',
               'city'      => 'required',
               'password'  => 'required|confirmed|min:7|max:20',
               'pin_id'    => 'required|exists:pins,pin_code,status,0',
            ]);

            /** Username Generation */
            $new_username = Helper::generateUsername();

            $parentData = LoginUser::where('id', Auth::guard('user')->id())->select('id', 'child', 'parent')->first();
            $parent = $parentData->parent ? ','.Auth::guard('user')->user()->parent: '';

            $pin_data = Pin::where('pin_code', $request->pin_id)->where('status', 0)->first();

            if(!$pin_data) {
               return redirect()->route('login_user.create')->with('warning', 'Please check Pin')->withInput();
            }

            $login_user = new LoginUser();
            $login_user->username = $new_username;
            $login_user->password = Hash::make($request->password, ['rounds' => 12]);
            $login_user->password1 = $request->password;
            $login_user->sponsor = Auth::guard('user')->user()->username;
            $login_user->name = ucwords($request->name);
            $login_user->email = strtolower($request->email);
            $login_user->mobile = $request->mobile;
            $login_user->whatsapp = $request->whatsapp;
            $login_user->state = $request->state;
            $login_user->city = $request->city;
            $login_user->pin_id = $pin_data->id;
            $login_user->parent = Auth::guard('user')->id().$parent;
            $login_user->created_at = now();
            $login_user->updated_at = null;

            $login_user->save();

            if($login_user->id){
               $childData = $parentData->child?$parentData->child.",":'';
               $child = $childData.$login_user->id;

               $child_update = LoginUser::find(Auth::guard('user')->id());
               $child_update->child = $child;
               $child_update->save();

               /* Update Pin Status */
               $pin = Pin::with('plan')->find($pin_data->id);
               $pin->status = 1;
               $pin->used_for = $login_user->id;
               $pin->used_at = now();
               $pin->updated_at = now();
               $pin->save();

               /** Commission Split UP */
               $amount = $pin?->plan?->amount;
               /*$commission = [5,4,2,1,1,0.5,0.5,0.5,0.5,0.5,0.25,0.25,0.25,0.25,0.25,0.25,0.25,0.25];*/
               $commission = [10,10,10,8,8,6,6,6,6,6,4,4,2,2,2,2,1,1];
               $parents = array_slice(explode(',', $login_user->parent), 0, 18);
               foreach($parents as $p => $parent){
                  $totalCount = Divident::where('user_id', $parent)->count();
                  $userPlan = LoginUser::with('pin')->findOrfail($parent);
                  $dividentCount = $totalCount > 13 ? 12 : $totalCount;
                  $o_amount = intval($userPlan?->pin?->plan?->amounts[$dividentCount]);
                  $level = new Level();
                  $level->user_id = $parent;
                  $level->whom_id = $login_user->id;
                  $level->level = $p+1;
                  $level->original = $o_amount;
                  $level->percent = $commission[$p];
                  $level->amount = ($o_amount*($commission[$p]/100));
                  $level->created_at = now();
                  $level->updated_at = null;
                  $level->save();
               }

            }
            DB::commit();
            return redirect()->route('user.login_user.create')->with('success', 'New User Created Successfully.');
         } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.login_user.create')->with('warning', $e->getMessage())->withInput();
         } finally {
            Cache::forget($key);
         }
      });
   }

   /**
    * Display the specified resource.
    */
   public function show(LoginUser $loginUser)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(LoginUser $loginUser)
   {
      $states = State::orderBy('id', 'ASC')->get();
      $cities = City::where('sid', $loginUser->state)->orderBy('name', 'ASC')->get();
      return view('admin.users.edit', compact('loginUser', 'states', 'cities'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, LoginUser $loginUser)
   {
      $request->validate([
         'name'      => 'required',
         'email'     => 'required|email|unique:login_users,email,'.$loginUser->id,
         'mobile'    => 'required|numeric|digits:10|starts_with:6,7,8,9',
         'whatsapp'  => 'required|numeric|digits:10|starts_with:6,7,8,9',
         'panno'     => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
         'state'     => 'required',
         'city'      => 'required',
      ]);
      $panUsage = LoginUser::where('panno', $request->panno)->where('id', '!=', $loginUser->id)->count();

      if ($panUsage >= 3) {
         $url = url('admin/loginUser/'.$loginUser->id.'/edit');
         return redirect()->to($url)->with('warning', 'This PAN has already been used 3 times. Registration is not allowed.')->withInput();
      }
      $input = $request->all();
      $loginUser->update($input);
      $url = url('admin/loginUser/');
      return redirect()->to($url)->with('success', 'Updated Successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(LoginUser $loginUser)
   {
      //
   }

   /**
    * Show the form for editing the specified resource using Auth.
    */
   public function profile(Request $request)
   {
      if($request->post()){
         $input = $request->all();
         LoginUser::where('id', Auth::guard('user')->user()->id)->update(['name' => $request->name, 'email' => $request->email, 'mobile' => $request->mobile]);
         return redirect()->route('user.profile')->with('success', 'Updated Successfully.');
      }
      $user = LoginUser::where('id', Auth::guard('user')->user()->id)->first();
      return view('user.profile', compact('user'));
   }

   /**
    * Update the specific resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function changePassword(Request $request)
   {
      if ($request->post()) {
         $request->validate([
               'old'       => 'required',
               'password'  => 'required|confirmed|min:7|max:30',
         ]);
         $user = LoginUser::where('id', Auth::guard('user')->user()->id)->first();
         if (Hash::check($request->old, $user->password)) {
               LoginUser::where('id', Auth::guard('user')->user()->id)->update(['password' => Hash::make($request->password, ['rounds' => 12]), 'password1' => $request->password]);
               return redirect()->route('user.change_password')->with('success', 'Password Changed Successfully.');
         } else {
               return redirect()->route('user.change_password')->with('warning', 'Old Password Incorrect.');
         }
      }
      return view('user.change_password');
   }

   /**
    * Display the genealogyTree.
    *
    * @return \Illuminate\Http\Response
    */
   public function genealogyTree(Request $request, $username='')
   {
      $user = LoginUser::where('id', Auth::guard('user')->user()->id)->first();
      if($username){
         $user = LoginUser::where('username', base64_decode($username))->first();
      }
      return view('user.genealogy_tree', compact('user'));
   }

   /**
    * Fetch the City List.
    *
    * @return \Illuminate\Http\Response
    */
   public function cityList(Request $request)
   {
      $cities = City::where('sid', $request->state)->select('name')->orderBy('name', 'ASC')->get();
      return response()->json(['cities'=> $cities]);
   }

   public function downline(Request $request) {
      if ($request->ajax()) {
         $row = LoginUser::where('sponsor', Auth::guard('user')->user()->username)->orderBy('id', 'ASC')->get();
         return datatables()->of($row)
            ->addIndexColumn()
            ->editColumn(
               'created_at', function ($row) {
                  return Helper::formatDate($row->created_at);
               }
            )
            ->make(true);
      }
      return view('user.downline');
   }
}
