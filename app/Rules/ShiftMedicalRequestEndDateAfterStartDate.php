<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ShiftMedicalRequestEndDateAfterStartDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Pega o valor de start_date do request (considerando data e hora)
        $startDate = request()->input('start_date');

        // Verifica se start_date existe e se end_date é menor que start_date
        if ($startDate && strtotime($value) < strtotime($startDate)) {
            $fail('A data e hora de término (:attribute) não pode ser anterior à data e hora de início.');
        }
    }

    /**
     * Obtenha uma mensagem de erro padrão.
     *
     * @return string
     */
    public function message()
    {
        return 'A data de término não pode ser anterior à data de início.';
    }
}
