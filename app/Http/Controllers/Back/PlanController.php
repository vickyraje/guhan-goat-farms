<?php

namespace App\Http\Controllers\Back;

use App\Models\Plan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index(Request $request)
   {
      if($request->ajax()){
         $plans = Plan::select('*');
         return datatables()->of($plans)
               ->addIndexColumn()
               ->addColumn('action', function($row){
                  if($row->status == 1){
                     $status = '<span class="badge btn-sm bg-success"><i class="fa fa-thumbs-up"></i></span>';
                  } else {
                     $status = '<span class="badge btn-sm bg-danger"><i class="fa fa-thumbs-down"></i></span>';
                  }
                  $status .= '&nbsp; <a href="' . route('plan.edit', $row['id']) . '" class="btn btn-sm btn-primary mr-1"><i class="fa fa-edit"></i></a>';
                  return $status;
               })
               ->rawColumns(['action'])
               ->make(true);
      }
      return view('admin.plans.index');
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      return view('admin.plans.add');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      $request->validate([
         'name'                  => 'required|unique:plans,name|max:20',
         'amount'                => 'required|numeric',
         'divident'              => 'required|integer',
         'divident_percentage.*' => 'required|numeric',
         'status'                => 'required|in:0,1',
      ]);

      $amounts = $request->input('divident_percentage');
      $plan               = new Plan();
      $plan->name         = $request->input('name');
      $plan->amount       = $request->input('amount');
      $plan->dividend     = $request->input('divident');
      $plan->amounts      = $amounts;
      $plan->status       = $request->input('status');
      $plan->created_at   = now();
      $plan->updated_at   = null;
      $plan->save();

      return redirect()->route('plan.index')->with('success', 'Plan created successfully.');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Plan $plan)
   {
      return view('admin.plans.edit', compact('plan'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, plan $plan)
   {
      $request->validate([
         'name'                  => 'required|max:20|unique:plans,name,'.$plan->id,
         'amount'                => 'required|numeric',
         'divident'              => 'required|integer',
         'divident_percentage.*' => 'required|numeric',
         'status'                => 'required|in:0,1',
      ]);

      $amounts = $request->input('divident_percentage');
      $plan->name         = $request->input('name');
      $plan->amount       = $request->input('amount');
      $plan->dividend     = $request->input('divident');
      $plan->amounts      = $amounts;
      $plan->status       = $request->input('status');
      $plan->updated_at   = now();
      $plan->save();

      return redirect()->route('plan.index')->with('success', 'Plan updated successfully.');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      //
   }
}
