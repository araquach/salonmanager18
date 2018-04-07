<?php

namespace App\Http\Controllers;

use App\FreeTime;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminFreeTimeFormRequest;
use Auth;
use Carbon\Carbon;
use DB;

class AdminFreeTimeController extends Controller
{
    
    public function __construct(FreeTime $freeTime)
	{
		$this->middleware('guest');
		
		$this->freeTime = $freeTime;
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
			$freeTimes = FreeTime::where('approved', '=', 0)->get();
		}
		elseif($category == 'approved') 
		{
			$freeTimes = FreeTime::where('approved', '=', 2)->get();
		}
		elseif($category == 'denied') 
		{
			$freeTimes = FreeTime::where('approved', '=', 1)->get();
		}
		elseif($category == 'all')
		{
			$freeTimes = FreeTime::all();
		}
		
		return View('/freeTime/admin/index', compact('freeTimes'));
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
		
		return View('/freeTime/admin/create', compact('staffs'));
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdminFreeTimeFormRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function store(AdminFreeTimeFormRequest $request)
	{
		$input = $request->all();
		
	    FreeTime::create($input);
		
		return redirect('admin/freetime/index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function show(FreeTime $freeTime) {
		return View('freeTime.admin.view', compact('freeTime'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
	public function edit(FreeTime $freeTime)
    {
        $staffs = Staff::lists('first_name', 'id');
        
        return view('freeTime.admin.update', compact('freeTime', 'staffs'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminFreeTimeFormRequest  $request
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function update(AdminFreeTimeFormRequest $request, FreeTime $freeTime)
    {
        $freeTime->update($request->all());
        
        return redirect('admin/freetime/index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreeTime $freeTime)
    {
        //
    }
    
    /**
     * Authorise the specified resource through an Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function authorise(Request $request, FreeTime $freeTime)
    {
        $freeTime->update($request->all());
        
        return redirect('admin/freetime/index');
    }
	
	
    
}
