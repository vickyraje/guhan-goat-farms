<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Divident;
use App\Models\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CronController extends Controller
{
   public function testCron(Request $request)
   {
      $request->validate([
         'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
      ]);

      $file = $request->file('image');

      $fileName = Helper::imageUpload($file);

      return response()->json(Storage::disk('spaces')->url($fileName));
   }

   public function month() {
      return DB::transaction(function () {
         try {
            $loginUsers = LoginUser::with('pin')->where('divident_close', 0)->get();
            foreach($loginUsers as $loginUser) {
               $totalCount = Divident::where('user_id', $loginUser->id)->count();
               if($totalCount > 13){
                  $amount = intval($loginUser?->pin?->plan?->amounts[$totalCount]);
                  $divident = new Divident();
                  $divident->user_id = $loginUser->id;
                  $divident->amount = $amount;
                  $divident->created_at = now();
                  $divident->updated_at = null;
                  $divident->save();

                  if($divident) {
                     $dividentCount = $totalCount+1;
                     if($dividentCount == 12){
                        $loginUser->divident_close = 1;
                        $loginUser->updated_at = now();
                        $loginUser->save();
                     }
                  }
               }
            }
         } catch (\Exception $e) {
            DB::rollBack();
         }
      });
   }
}
