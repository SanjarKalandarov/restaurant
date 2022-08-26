<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
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
        $pickupDate=Carbon::parse($value);
        $pickupTime=Carbon::createFromTime($pickupDate->hour,$pickupDate->minute,$pickupDate->second);
        $earliestTime=Carbon::createFromTimeString('17:00:00');
        $lasttTime=Carbon::createFromTimeString('23:00:00');
        return  $pickupTime->between($earliestTime,$lasttTime)? true :false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '17:00 dan 23:00 gacha bo\'lgan vaqtni tanlang';
    }
}
