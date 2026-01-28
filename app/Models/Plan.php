<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
   protected $casts = [
      'name'  => 'string',
      'amount' => 'double',
      'amounts' => 'array'
   ];

   protected function scopeActive($query)
   {
      return $query->where('status', 1);
   }

   public function pins()
   {
      return $this->hasMany(Pin::class, 'plan_id');
   }

}
