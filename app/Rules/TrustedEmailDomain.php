<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TrustedEmailDomain implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     protected array $trustedDomains = [
        'gmail.com',
        'outlook.com',
        'hotmail.com',
        'yahoo.com',
        'icloud.com',
        // 'protonmail.com',
    ];
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $domain = strtolower(substr(strrchr($value, '@'), 1));

        if (!in_array($domain, $this->trustedDomains)) {
            $fail("Le domaine de l'adresse e-mail ($domain) n'est pas autorisé.");
        }
    }
}
