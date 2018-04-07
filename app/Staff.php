<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded = ['id'];
    
    protected $dates = ['created_at', 'updated_at'];
    
    // protected $with = ['user'];
    
    protected $table = 'staffs';
    
    public function user()
    {
        return $this->hasOne('App\User');
    }
    
    public function holiday()
    {
        return $this->hasMany('App\Holiday', 'staff_id');
    }
}
