<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;

class SickDay extends Model
{
    protected $guarded = ['id'];
    
    protected $dates = ['created_at', 'updated_at', 'sick_from', 'sick_to', 'date_deducted'];
    
    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
    
    use FormAccessible;

    /**
     * Convert sick_from date format
     *
     */
    public function formSickFromAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    
    /**
     * Convert sick_to date format
     *
     */
    public function formSickToAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
