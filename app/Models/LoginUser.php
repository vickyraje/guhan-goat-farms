<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class LoginUser extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password', 'password1'
   ];

   public function pin()
   {
      return $this->belongsTo(Pin::class)->with('plan');
   }

   public function levels()
   {
      return $this->hasMany(Level::class, 'user_id', 'id');
   }

   public function dividents()
   {
      return $this->hasMany(Divident::class, 'user_id', 'id');
   }
}
