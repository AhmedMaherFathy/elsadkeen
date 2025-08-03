<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoLinksOrPhones implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Regex for URLs
        $urlPattern = '/https?:\/\/[^\s]+|www\.[^\s]+/i';

        // Regex for phone numbers
        $phonePattern = '/(\+?\d[\d\-\s]{7,}\d)/';

        if (preg_match($urlPattern, $value) || preg_match($phonePattern, $value)) {
            if(app()->getLocale() === 'ar')
                $fail("$attribute لا يجب ان يحتوى على رقم هاتف او روابط ");
            else
                $fail("The $attribute must not contain links or phone numbers.");
        }
    }
    
}
