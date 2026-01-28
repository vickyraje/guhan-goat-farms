<?php

namespace App\Helpers;

use App\Models\LoginUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class Helper {

   public static function slugify($text, string $divider = '-')
   {
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
      $text = preg_replace('~[^-\w]+~', '', $text);
      $text = trim($text, $divider);
      $text = preg_replace('~-+~', $divider, $text);
      $text = strtolower($text);
      if (empty($text)) {
         return 'n-a';
      }
      return $text;
   }

   public static function formatDate($date) {
      return date('d-m-Y H:i:s', strtotime($date));
   }

   public static function num($num){
      return '&#8377; '.number_format($num, 2);
      /*return number_format($num, 2);*/
   }

   public static function build_child($oldID, $exclude) {
      global $depth;
      $tempTree = "";
      $childMainQuery = DB::table('login_users')->where('sponsor', $oldID)->select('id', 'username', 'sponsor', 'name', 'gender', 'position', 'total_left', 'total_right', 'created_at');
      $childCount = $childMainQuery->count();;
      $tempTree .= "<ul>";
      if($childCount == 2){
         $childQuery = $childMainQuery->get();
         foreach($childQuery as $child){
               if ($child->username != $child->sponsor){
                  for ($c=0;$c<$depth;$c++){
                     $tempTree .= " ";
                  }
                  $tempTree .= "<li class='".ucfirst($child->position)."'>
                  <p class='popupLink'>
                     <a href=".route('user.genealogy_tree_search', base64_encode($child->username)).">
                           <i class='fa fa-".$child->gender." fa-4x'></i><br />
                           ".strtolower($child->username)."
                     </a>
                     <span class='txtBox'>
                           Name : ".$child->name."<br />
                           DOJ : ".date('d-m-Y',strtotime($child->created_at))."<br />
                           Left : ".$child->total_left."<br />
                           Right : ".$child->total_right."
                     </span>
                  </p>";
                  $depth++;
                  $depth--;
                  array_push($exclude, $child->username);
               }
         }
         $tempTree .= "</li>";

      } elseif($childCount == 1){
         $childQuery = $childMainQuery->get();
         foreach($childQuery as $child){
               if ($child->username != $child->sponsor){
                  for ($c=0;$c<$depth;$c++){
                     $tempTree .= " ";
                  }
                  if($child->position == 'left'){
                     $tempTree .= "<li class='".ucfirst($child->position)."'>
                           <p class='popupLink'>
                              <a href=".route('user.genealogy_tree_search', base64_encode($child->username)).">
                                 <i class='fa fa-".$child->gender." fa-4x'></i><br />
                                 ".strtolower($child->username)."
                              </a>
                              <span class='txtBox'>
                                 Name : ".$child->name."<br />
                                 DOJ : ".date('d-m-Y',strtotime($child->created_at))."<br />
                                 Left : ".$child->total_left."<br />
                                 Right : ".$child->total_right."
                              </span>
                           </p>
                     </li>
                     <li>
                           <a class='mty' style='cursor:pointer'><i class='fa fa-user-plus fa-4x'></i></a><br />
                           <span class='mty'></span>
                     </li>";
                  } elseif($child->position == 'right'){
                     $tempTree .= "<li>
                           <a class='mty' style='cursor:pointer'><i class='fa fa-user-plus fa-4x'></i></a><br />
                           <span class='mty'></span>
                     </li>
                     <li class='".ucfirst($child->position)."'>
                           <p class='popupLink'>
                              <a href=".route('user.genealogy_tree_search', base64_encode($child->username)).">
                                 <i class='fa fa-".$child->gender." fa-4x'></i><br />
                                 ".strtolower($child->username)."
                              </a>
                              <span class='txtBox'>
                                 Name : ".$child->name."<br />
                                 DOJ : ".date('d-m-Y',strtotime($child->created_at))."<br />
                                 Left : ".$child->total_left."<br />
                                 Right : ".$child->total_right."
                              </span>
                           </p>
                     </li>";
                  }
                  $depth++;
                  $depth--;
                  array_push($exclude, $child->username);
               }
         }
      } elseif($childCount == 0){
         $tempTree .= "<li>
               <a class='mty' style='cursor:pointer'><i class='fa fa-user-plus fa-4x'></i></a><br />
               <span class='mty'></span>
         </li>
         <li>
               <a class='mty' style='cursor:pointer'><i class='fa fa-user-plus fa-4x'></i></a><br />
               <span class='mty'></span>
         </li>";
      }
      $tempTree .= "</ul>";
      return $tempTree;
   }

   public static function imageUpload($file) {

      $manager = new ImageManager(new Driver());
      $image = $manager->read($file);
      $encoded = $image->toWebp(75);
      $fileName = 'cholagold/'.Str::uuid() . '.webp';
      Storage::disk('spaces')->put($fileName, $encoded, ['visibility' => 'public']);
      return $fileName;
   }

   public static function generateUsername()
   {
      return DB::transaction(function () {

         $lastUsername = LoginUser::where('username', 'like', 'GH%')
            ->orderByRaw("CAST(SUBSTRING(username, 3) AS UNSIGNED) DESC")
            ->lockForUpdate()
            ->value('username');

         if (!$lastUsername) {
            return 'GH003';
         }

         $number = (int) substr($lastUsername, 2);
         return 'GH' . str_pad($number + 1, 3, '0', STR_PAD_LEFT);
      });
   }
}
