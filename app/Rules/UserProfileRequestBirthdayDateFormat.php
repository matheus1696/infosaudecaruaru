<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UserProfileRequestBirthdayDateFormat implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $dateAfter = date('1900-01-01');
        $dateBefore = date('Y-m-d',strtotime('-16 years'));

        if ($value > $dateBefore) {
            $fail('A :attribute deve ser anterior há '. date('d/m/Y',strtotime($dateBefore)));
        }        

        if ($value < $dateAfter) {
            $fail('A :attribute deve ser anterior há '. date('d/m/Y',strtotime($dateAfter)));
        }
    }
}
