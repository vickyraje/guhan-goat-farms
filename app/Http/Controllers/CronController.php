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
            $loginUsers = LoginUser::whereDay('created_at', now()->day)->whereDate('created_at', '<', now()->toDateString())->where('divident_close', 0)->get();
            $rows = [];
            foreach($loginUsers as $loginUser) {
               $totalCount = Divident::where('user_id', $loginUser->id)->count();
               if($totalCount < 13){
                  $amount = intval($loginUser?->pin?->plan?->amounts[$totalCount]);

                  $rows[] = [
                     'user_id'    => $loginUser->id,
                     'amount'     => $amount,
                     'date'       => now()->toDateString(),
                     'created_at' => now(),
                     'updated_at' => now(),
                  ];

                  if ($totalCount + 1 == 12) {
                     $loginUser->divident_close = 1;
                     $loginUser->updated_at = now();
                     $loginUser->save();
                  }
               }
            }
            Divident::upsert($rows, ['user_id', 'date'], []);
            DB::commit();
            echo "Cron job executed successfully ". now();
         } catch (\Exception $e) {
            DB::rollBack();
            echo 'Error: ' . $e->getMessage();
         }
      });
   }
}
