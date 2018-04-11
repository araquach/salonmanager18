<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;

class Holiday extends Model
{
    protected $guarded = ['id'];
    
    protected $dates = ['created_at', 'updated_at', 'request_date_from', 'request_date_to'];
    
    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
    
    use FormAccessible;

    /**
     * Convert request_date_from date format
     *
     */
    public function formRequestDateFromAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    
    /**
     * Convert request_date_to date format
     *
     */
    public function formRequestDateToAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    
    public static function boot()
    {
        parent::boot();
        
        self::creating(function($model)
        {
            
            if ($model->request_date_from > Carbon::now()->addWeeks(2))

            return $model->prebooked = 1;
            
        });

        self::creating(function($model)
        {

            $start = new DateTime($model->request_date_from);
            $end = new DateTime($model->request_date_to);

            $interval = new DateInterval('P1D');
            $daterange = new DatePeriod($start, $interval ,$end);

            $saturdays = 0;
            foreach($daterange as $date){
                $days = $date->format('D');
                if ($days == 'Sat') {
                    $saturdays++;
                }
            }

            return $saturdays;
        });
    }


}
