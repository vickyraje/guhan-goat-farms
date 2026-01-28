<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
   protected $casts = [
      'user_id'  => 'integer',
      'plan_id'  => 'integer',
   ];

   public function login_user()
   {
      return $this->belongsTo(LoginUser::class, 'user_id', 'id');
   }

   public function plan()
   {
      return $this->belongsTo(Plan::class, 'plan_id', 'id');
   }
}
