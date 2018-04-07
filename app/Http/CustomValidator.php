<?php

namespace App\Http;

use App\Staff;
use App\Holiday;
use App\LieuHour;
use App\User;
use Carbon\Carbon;

use Auth;

class CustomValidator {

    public function validateAvailableDays($attribute, $value, $parameters, $validator)
    {
        $holidays = Holiday::where('staff_id', '=', Auth::user()->staff->id)
                    ->where('approved', !1)->sum('hours_requested');
        $entitlement = User::where('id', '=', Auth::user()->staff->id)->first();
        
        $remaining = $entitlement->staff->holiday_entitlement * 8 - $holidays;
        
        if((int)$value > $remaining)
        {
            return false;
        }
        
        return true;
     }
     
    public function validateAvailableSaturdays($attribute, $value, $parameters, $validator)
    {
        $saturdays = Holiday::where('staff_id', '=', Auth::user()->staff->id)->sum('saturday');
        
        $remaining = 5 - $saturdays;
        
        if((int)$value > $remaining)
        {
            return false;
        }
        
        return true;
     }
     
    public function validateOnOrAfter($attribute, $value, $parameters, $validator)
    {
        
        $comparison = array_get($validator->getData(), $parameters[0]);
        
        if(Carbon::parse($comparison) > Carbon::parse($value))
        {
            return false;
        }
        
        return true;
        
     }
     
     public function validateInAdvance($attribute, $value, $parameters, $validator)
     {
         $weeks = array_get($validator->getData(), $parameters[0]);
         
         $date = Carbon::parse($value);
         
         if($date->addWeeks($weeks))
         {
             return true;
         }
         
         return false;
     }
     
     public function validateInLieu($attribute, $value, $parameters, $validator)
     {
         $weeks = array_get($validator->getData(), $parameters[0]);
         
         $date = Carbon::parse($value);
         
         if($date->addWeeks(-$weeks))
         {
             return true;
         }
         
         return false;
     }
     
     public function validateAvailableTime($attribute, $value, $parameters, $validator)
     {
        $hours = LieuHour::where('staff_id', '=', Auth::user()->staff->id)
                            ->where('approved', 2)->sum('lieu_hours');
        
        $addRemove = array_get($validator->getData(), $parameters[0]);
        
        // dd((int)$addRemove, $hours, $value);
        
        if((int)$addRemove = 1) //add
        {
            if((int)$hours + (int)$value > 6)
            {
                return false;
            }
        }
        
        elseif((int)$addRemove = 2) //redeem
        {
            if((int)$hours - (int)$value < 6)
            {
                return false;
            }
        }

        return true;
        
    }

}