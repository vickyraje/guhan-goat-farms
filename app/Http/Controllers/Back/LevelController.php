<?php

namespace App\Http\Controllers\Back;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class LevelController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index(Request $request)
   {
      if($request->ajax()){
         $levels = Level::with(['user:id,username,name', 'whom:id,username,name,pin_id'])->orderBy('id', 'DESC');
         if(Auth::guard('user')->check()){
            $levels->where('user_id', Auth::guard('user')->user()->id);
         }
         return datatables()->of($levels)
            ->addIndexColumn()
            ->addColumn('created_at', function($row){
               return Helper::formatDate($row->created_at);
            })
            ->addColumn('plan', function($row){
               return $row->whom->pin?->plan?->name ?? '-';
            })
            ->make(true);
      }
      if(Auth::guard('user')->check()) {
         return view('user.level');
      }
      return view('admin.level');
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
      //
   }

   /**
    * Display the specified resource.
    */
   public function show(Level $level)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Level $level)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Level $level)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Level $level)
   {
      //
   }
}
