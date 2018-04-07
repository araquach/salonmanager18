<?php

namespace App\Http\Controllers;

use App\SickDay;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SickDayFormRequest;
use Auth;
use Carbon\Carbon;

class SickDayController extends Controller
{
    
    public function __construct(SickDay $sickDay)
	{
		$this->middleware('auth');
		
		$this->sickDay = $sickDay;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = 'deducted')
    {
        $user = Auth::user();
        
        if($category == 'deducted')
		{
			$sickDays = SickDay::where('staff_id', '=', $user->id)
			->where('deducted', '=', 1)
			->get();
		}
		elseif($category == 'awaiting')
		{
		    $sickDays = SickDay::where('staff_id', '=', $user->id)
			->where('deducted', '=', 0)
			->get();
		}
		elseif($category == 'all')
		{
		    $sickDays = SickDay::where('staff_id', '=', $user->id)->get();
		}
		
		return view('sickDay/index', compact('sickDays'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
    public function show(SickDay $sickDay)
    {
        return view('sickDay.view', compact('sickDay'));
    }
}
