<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;
use App\Holiday;

class AvailableDays implements Rule
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
        $holidays = Holiday::where('staff_id', '=', Auth::user()->staff->id)
                    ->where('approved', !1)->sum('hours_requested');
        $entitlement = User::where('id', '=', Auth::user()->staff->id)->first();
        
        $remaining = $entitlement->staff->holiday_entitlement * 8 - $holidays;
        
        if((int)$value > $remaining)
        {
            return false;   
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
