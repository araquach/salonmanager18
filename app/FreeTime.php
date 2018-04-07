<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;

class FreeTime extends Model
{
    protected $guarded = ['id'];
    
    protected $table = 'free_times';
    
    protected $dates = ['created_at', 'updated_at', 'date_regarding'];
    
    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
    
    use FormAccessible;

    /**
     * Convert request_date_from date format
     *
     */
    public function formDateRegardingAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
