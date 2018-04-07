<?php

namespace App\Http\Controllers;

use App\FreeTime;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FreeTimeFormRequest;
use Auth;
use Carbon\Carbon;

class FreeTimeController extends Controller
{
    
    public function __construct(FreeTime $freeTime)
	{
		$this->middleware('auth');
		
		$this->freeTime = $freeTime;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = 'upcoming')
    {
        $user = Auth::user();
        
        if($category == 'awaiting')
		{
			$freeTimes = FreeTime::where('staff_id', '=', $user->id)
			->where('approved', '=', 0)
			->get();
		}
		elseif($category == 'upcoming') 
		{
			$freeTimes = FreeTime::where('staff_id', '=', $user->id)
			->where('approved', '=', 2)
			->get();
		}
		elseif($category == 'denied') 
		{
			$freeTimes = FreeTime::where('staff_id', '=', $user->id)
			->where('approved', '=', 1)
			->get();
		}
		elseif($category == 'all')
		{
			$freeTimes = FreeTime::where('staff_id', '=', $user->id)->get();
		}
        
        return view('freeTime/index', compact('freeTimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('freeTime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\FreeTimeFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FreeTimeFormRequest $request)
    {
        $input = $request->all();
		
	    FreeTime::create($input);
	    
	    return redirect('freetime/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function show(FreeTime $freeTime)
    {
        return view('freeTime.view', compact('freeTime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function edit(FreeTime $freeTime)
    {
        return view('freeTime.update', compact('freeTime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FreeTimeFormRequest  $request
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function update(FreeTimeFormRequest $request, FreeTime $freeTime)
    {
        $freeTime->update($request->all());
        
        return redirect('freetime/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreeTime $freeTime)
    {
        // if FreeTime not approved - can be deleted functionality
    }

}
