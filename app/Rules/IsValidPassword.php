<?php

namespace App\Rules;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class isValidPassword implements Rule
{
    
    /**
     * Determine if the Uppercase Validation Rule passes.
     *
     * @var boolean
     */
    public $uppercasePasses = true;

      /**
     * Determine if the Lowercase Validation Rule passes.
     *
     * @var boolean
     */
    public $lowercasePasses = true;

    /**
     * Determine if the Numeric Validation Rule passes.
     *
     * @var boolean
     */
    public $numericPasses = true;

    /**
     * Determine if the Special Character Validation Rule passes.
     *
     * @var boolean
     */
    public $specialCharacterPasses = true;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->uppercasePasses = (Str::upper($value) !== $value);
        $this->lowercasePasses = (Str::lower($value) !== $value);
        $this->numericPasses = ((bool) preg_match('/[0-9]/', $value));
        $this->specialCharacterPasses = ((bool) preg_match('/[^A-Za-z0-9]/', $value));

        return ($this->uppercasePasses && $this->lowercasePasses && $this->numericPasses && $this->specialCharacterPasses);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case ! $this->uppercasePasses
                && $this->lowercasePasses
                && $this->numericPasses
                && $this->specialCharacterPasses:
                return 'The :attribute must be contain at least one uppercase character.';

            case ! $this->lowercasePasses
                && $this->uppercasePasses
                && $this->numericPasses
                && $this->specialCharacterPasses:
                return 'The :attribute must be contain at least one lowercase character.';


            case ! $this->numericPasses
                && $this->uppercasePasses
                && $this->lowercasePasses
                && $this->specialCharacterPasses:
                return 'The :attribute must be contain at least one number.';

            case ! $this->specialCharacterPasses
                && $this->uppercasePasses
                && $this->lowercasePasses
                && $this->numericPasses:
                return 'The :attribute must be at least 10 characters and contain at least one special character.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && $this->specialCharacterPasses:
                return 'The :attribute must be contain at least one uppercase character and one number.';
            case ! $this->lowercasePasses
                && ! $this->numericPasses
                && $this->specialCharacterPasses:
                return 'The :attribute must be contain at least one lowercase character and one number.';

            case ! $this->uppercasePasses
                && ! $this->specialCharacterPasses
                && $this->numericPasses:
                return 'The :attribute must be contain at least one uppercase character and one special character.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && ! $this->lowercasePasses
                && ! $this->specialCharacterPasses:
                return 'The :attribute must be contain at least one uppercase, lowercase character, one number, and one special character.';

            default:
                return 'The :attribute must be alphanumeric and should contain special character';
        }
    }
}
