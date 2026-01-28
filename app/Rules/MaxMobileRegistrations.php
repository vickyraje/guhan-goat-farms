<?php

namespace App\Rules;

use App\Models\LoginUser;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxMobileRegistrations implements ValidationRule
{
   protected int $max;

   public function __construct(int $max = 3)
   {
      $this->max = $max;
   }

   /**
    * Run the validation rule.
    *
    * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
    */
   public function validate(string $attribute, mixed $value, Closure $fail): void
   {
      $count = LoginUser::where('mobile', $value)->count();

      if ($count >= $this->max) {
         $fail("The {$attribute} {$value} has reached the maximum number of registrations allowed.");
      }
   }
}
