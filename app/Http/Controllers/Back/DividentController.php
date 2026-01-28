<?php

namespace App\Http\Controllers\Back;

use App\Models\Divident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class DividentController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index(Request $request)
   {
      if($request->ajax()){
         $dividents = Divident::with(['user:id,username,name'])->orderBy('id', 'DESC');
         if(Auth::guard('user')->check()){
            $dividents->where('user_id', Auth::guard('user')->user()->id);
         }
         return datatables()->of($dividents)
            ->addIndexColumn()
            ->addColumn('created_at', function($row){
               return Helper::formatDate($row->created_at);
            })
            ->make(true);
      }
      if(Auth::guard('user')->check()) {
         return view('user.divident');
      }
      return view('admin.divident');
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
   public function show(Divident $divident)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Divident $divident)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Divident $divident)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Divident $divident)
   {
      //
   }
}
