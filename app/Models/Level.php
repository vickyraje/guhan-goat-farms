<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
   public function user()
   {
      return $this->belongsTo(LoginUser::class, 'user_id', 'id');
   }

   public function whom()
   {
      return $this->belongsTo(LoginUser::class, 'whom_id', 'id');
   }
}
