<?php

namespace App\Http\Controllers;

use App\SickDay;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminSickDayFormRequest;
use Auth;
use Carbon\Carbon;
use DB;

class AdminSickDayController extends Controller
{
    
    public function __construct(SickDay $sickDay)
	{
		$this->middleware('admin');
		
		$this->sickDay = $sickDay;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = 'awaiting')
	{
		if($category == 'deducted')
		{
			$sickDays = SickDay::where('deducted', '=', 1)->get();
		}
		elseif($category == 'awaiting')
		{
		    $sickDays = SickDay::where('deducted', '=', 0)->get();
		}
		elseif($category == 'all')
		{
		    $sickDays = SickDay::all();
		}
		
		return view('/sickDay/admin/index', compact('sickDays'));
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
		
		return View('/sickDay/admin/create', compact('staffs'));
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdminSickDayFormRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function store(AdminSickDayFormRequest $request)
	{
		$input = $request->all();
		
	    SickDay::create($input);
		
		return redirect('admin/sick/index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
    public function show(SickDay $sickDay) {
		return View('sickDay.admin.view', compact('sickDay'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
	public function edit(SickDay $sickDay)
    {
        $staffs = Staff::lists('first_name', 'id');
        
        return view('sickDay.admin.update', compact('sickDay', 'staffs'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminSickDayFormRequest  $request
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
    public function update(AdminSickDayFormRequest $request, SickDay $sickDay)
    {
        $sickDay->update($request->all());
        
        return redirect('admin/sick/index');
    }
    
    /**
     * Authorise the specified resource through an Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
    public function deduct(Request $request, SickDay $sickDay)
    {
        $holiday->update($request->all());
        
        return redirect('admin/sick/index');
    }

}
