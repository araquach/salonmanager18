<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Holiday;
use App\LieuHour;
use App\SickDay;
use App\FreeTime;
use App\User;
use App\Staff;
use Auth;

class WidgetServiceProvider extends ServiceProvider
{
    
    
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Staff Widgets
        
        view()->composer('widgets.holiday', function($view){
            $view->with('total', Holiday::where('staff_id', '=', Auth::user()->id)
                ->where('approved', 2)->sum('hours_requested') / 8);
            
            $view->with('entitlement', User::where('id', '=', Auth::user()->id)->first());
            
            $view->with('remainingSat', 5 - Holiday::where('staff_id', '=', Auth::user()->id)
                ->where('approved', 2)->sum('saturday'));
        });
        
        view()->composer('widgets.lieuHour', function($view){
            $view->with('total', LieuHour::where('staff_id', '=', Auth::user()->id)
                 ->where('approved', 2)->sum('lieu_hours'));
                 
        });
        
        view()->composer('widgets.sickDay', function($view){
            $view->with('total', SickDay::where('staff_id', '=', Auth::user()->id)
                 ->where('deducted', 1)->sum('sick_hours') / 8);
                 
             $view->with('warning', SickDay::where('staff_id', '=', Auth::user()->id)
                 ->where('deducted', 1)->count('sick_hours'));   
        });
        
        view()->composer('widgets.freeTime', function($view){
            $view->with('entitlement', User::where('id', '=', Auth::user()->id)->first());
            
            $view->with('total', FreeTime::where('staff_id', '=', Auth::user()->id)
                ->where('approved', 2)->sum('free_time_hours'));
        });
        
        // Admin Widgets
        
        view()->composer('widgets.admin.holiday', function($view){
        
            $view->with('total', Holiday::where('approved', 0)->count('hours_requested'));
        });
            
        view()->composer('widgets.admin.lieuHour', function($view){
            
            $view->with('total', LieuHour::where('approved', 0)->count('lieu_hours'));
            
        });
        
        view()->composer('widgets.admin.sickDay', function($view){
            
            $view->with('total', SickDay::where('deducted', 0)->count('sick_hours'));
            
        });
            
        view()->composer('widgets.admin.freeTime', function($view){
            
            $view->with('total', FreeTime::where('approved', 0)->count('free_time_hours'));
        
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
