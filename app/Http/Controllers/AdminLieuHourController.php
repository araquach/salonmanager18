<?php

namespace App\Http\Controllers;

use App\LieuHour;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminLieuHourFormRequest;
use Auth;
use Carbon\Carbon;
use DB;

class AdminLieuHourController extends Controller
{
    
    public function __construct(LieuHour $lieuHour)
	{
		$this->middleware('admin');
		
		$this->lieuHour = $lieuHour;
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
			$lieuHours = LieuHour::where('approved', '=', 0)->get();
		}
		elseif($category == 'approved') 
		{
			$lieuHours = LieuHour::where('approved', '=', 2)->get();
		}
		elseif($category == 'denied') 
		{
			$lieuHours = LieuHour::where('approved', '=', 1)->get();
		}
		elseif($category == 'all')
		{
			$lieuHours = LieuHour::all();
		}
		
		return View('/lieuHour/admin/index', compact('lieuHours'));
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
		
		return View('/lieuHour/admin/create', compact('staffs'));
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdminLieuHourFormRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function store(AdminLieuHourFormRequest $request)
	{
		$input = $request->all();
		
	    LieuHour::create($input);
		
		return redirect('admin/lieu/index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function show(LieuHour $lieuHour) {
		return View('lieuHour.admin.view', compact('lieuHour'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
	public function edit(LieuHour $lieuHour)
    {
        $staffs = Staff::lists('first_name', 'id');
        
        return view('lieuHour.admin.update', compact('lieuHour', 'staffs'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminLieuHourFormRequest  $request
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function update(AdminLieuHourFormRequest $request, LieuHour $lieuHour)
    {
        $lieuHour->update($request->all());
        
        return redirect('admin/lieuhour/index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(LieuHour $lieuHour)
    {
        //
    }
	
	/**
     * Authorise the specified resource through an Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function authorise(Request $request, LieuHour $lieuHour)
    {
        $lieuHour->update($request->all());
        
        return redirect('admin/lieu/index');
    }
    
}
