<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        //     'secret' => config('services.recaptcha.secret_key'),
        //     'response' => $value,
        // ])->json();
        // dd($response);
        // if (!($response['success'] ?? false)) {
        //     $fail('reCAPTCHA verification failed.');
        // }
        $response = Http::timeout(30)->asForm()
            ->withOptions(['verify' => false,])
            ->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
            ])->json();
            if (!($response['success'] ?? false)) {
                $fail('reCAPTCHA verification failed.');
            }
    }
}
