<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divident extends Model
{
   public function user()
   {
      return $this->belongsTo(LoginUser::class, 'user_id', 'id');
   }
}
