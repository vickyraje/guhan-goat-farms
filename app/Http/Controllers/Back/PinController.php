<?php

namespace App\Http\Controllers\Back;

use App\Models\Pin;
use App\Models\Plan;
use App\Helpers\Helper;
use App\Models\LoginUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PinController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index(Request $request)
   {
      if($request->ajax()){
         $pins = Pin::with(['login_user', 'plan'])->orderBy('id', 'DESC');
         if(Auth::guard('user')->check()){
            $pins->where('user_id', Auth::guard('user')->user()->id);
         }
         return datatables()->of($pins)
               ->addIndexColumn()
               ->addColumn('created_at', function($row){
                  return Helper::formatDate($row->created_at);
               })
               ->addColumn('username', function($row){
                  return ucwords($row?->login_user->name)."<br />".$row?->login_user?->username;
               })
               ->addColumn('action', function($row){
                  $status = $row->status ? '<span class="badge bg-success">Used</span>' : '<span class="badge bg-primary">Unused</span>';
                  return $status;
               })
               ->rawColumns(['username','action'])
               ->make(true);
      }
      if(Auth::guard('user')->check()) {
         return view('user.pin');
      }
      $plans = Plan::active()->get();
      return view('admin.pins.index', compact('plans'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      $request->validate([
         'user_id' => 'required|exists:login_users,username',
         'plan_id' => 'required|exists:plans,id',
         'quantity' => 'required|integer|min:1'
      ]);

      $loginUser = LoginUser::where('username', $request->user_id)->firstOrFail();

      $existingPins = Pin::pluck('pin_code')->toArray();
      $existingPins = array_flip($existingPins);

      $quantity = (int) $request->quantity;
      $data = []; $now = now();

      while (count($data) < $quantity) {
         $pin = strtoupper(Str::random(6));
         if (isset($existingPins[$pin])) {
            continue;
         }
         $existingPins[$pin] = true;
         $data[] = [
            'user_id'     => $loginUser->id,
            'plan_id'     => $request->plan_id,
            'pin_code'    => $pin,
            'created_at'  => $now,
            'updated_at'  => null,
         ];
      }
      DB::transaction(function () use ($data) {
         Pin::insert($data);
      });
      return redirect()->route('admin.pin.index')->with('success', "{$quantity} pins generated successfully");
   }

   /**
    * Display the specified resource.
    */
   public function show(Pin $pin)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Pin $pin)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Pin $pin)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Pin $pin)
   {
      //
   }

   public function fetchUserName(Request $request)
   {
      return DB::transaction(function () use ($request) {
         try {
            $request->validate([
               'username' => 'required|string|exists:login_users,username'
            ]);
            $loginUser = LoginUser::where('username', $request->username)->first();
            if($loginUser){
               $data = [
                  'status' => 1,
                  'name' => $loginUser->name
               ];
            } else {
               $data = [
                  'status' => 0,
                  'name' => ''
               ];
            }
            return response()->json($data);
         } catch (\Exception $e) {
            return response()->json([
               'status' => 0,
               'message' => $e->getMessage()
            ]);
         }
      });
   }

   public function validatePin(Request $request)
   {
      return DB::transaction(function () use ($request) {
         try {
            $request->validate([
               'pin_code' => 'required|string|exists:pins,pin_code,status,0'
            ]);
            $pin = Pin::where('pin_code', $request->pin_code)->first();
            if($pin && $pin->status == 0){
               $data = [
                  'status' => 1,
                  'plan_name' => $pin->plan?->name ?? ''
               ];
            } else {
               $data = [
                  'status' => 0,
                  'plan_name' => ''
               ];
            }
            return response()->json($data);
         } catch (\Exception $e) {
            return response()->json([
               'status' => 0,
               'message' => $e->getMessage()
            ]);
         }
      });
   }
}
