<?php

namespace App\Http\Controllers;

use App\Holiday;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminHolidayFormRequest;
use Auth;
use Carbon\Carbon;
use DB;

class AdminHolidayController extends Controller
{
    
    public function __construct(Holiday $holiday)
	{
		$this->middleware('guest');
		
		$this->holiday = $holiday;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = 'awaiting')
	{
		if($category == 'awaiting')
		{
			$holidays = Holiday::where('approved', '=', 0)->get();
		}
		elseif($category == 'approved') 
		{
			$holidays = Holiday::where('approved', '=', 2)
			->where('request_date_from', '>=', Carbon::now())
			->get();
		}
		elseif($category == 'denied') 
		{
			$holidays = Holiday::where('approved', '=', 1)->get();
		}
	    elseif($category == 'all')
		{
			$holidays = Holiday::all();
		}
		
		return View('/holiday/admin/index', compact('holidays'));
	}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
	{
		$staffs = Staff::select(
        	DB::raw("CONCAT(first_name,' ', second_name) AS full_name, id")
    		)->lists('full_name', 'id');
		
		return View('/holiday/admin/create', compact('staffs'));
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HolidayFormRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function store(AdminHolidayFormRequest $request)
	{
		$input = $request->all();
		
	    Holiday::create($input);
		
		return redirect('admin/holiday/index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday) {
		return View('holiday.admin.view', compact('holiday'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
	public function edit(Holiday $holiday)
    {
        $staffs = Staff::lists('first_name', 'id');
        
        return view('holiday.admin.update', compact('holiday', 'staffs'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminHolidayFormRequest  $request
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(AdminHolidayFormRequest $request, Holiday $holiday)
    {
        $holiday->update($request->all());
        
        return redirect('admin/holiday/index');
    }
    
    /**
     * Authorise the specified resource through an Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function authorise(Request $request, Holiday $holiday)
    {
        $holiday->update($request->all());
        
        return redirect('admin/holiday/index');
    }

}
