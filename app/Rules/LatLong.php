<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LatLong implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $latitudeRegex = '/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$/';
        $longitudeRegex = '/^[-+]?([1-9]?\d(\.\d+)?|1[0-7]\d(\.\d+)?|180(\.0+)?)$/';

        if (preg_match($latitudeRegex, $value['latitude']) && preg_match($longitudeRegex, $value['longitude'])) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Latitude or Longitude is invalid.';
    }
}
