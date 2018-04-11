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

}
