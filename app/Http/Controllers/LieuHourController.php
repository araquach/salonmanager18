<?php

namespace App\Http\Controllers;

use App\LieuHour;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LieuHourFormRequest;
use Auth;
use Carbon\Carbon;

class LieuHourController extends Controller
{
    
    public function __construct(LieuHour $lieuHour)
	{
		$this->middleware('auth');
		
		$this->lieuHour = $lieuHour;
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
			$lieuHours = LieuHour::where('staff_id', '=', $user->id)
			->where('approved', '=', 0)
			->get();
		}
		elseif($category == 'upcoming') 
		{
			$lieuHours = LieuHour::where('staff_id', '=', $user->id)
			->where('approved', '=', 2)
			->get();
		}
		elseif($category == 'denied') 
		{
			$lieuHours = LieuHour::where('staff_id', '=', $user->id)
			->where('approved', '=', 1)
			->get();
		}
		elseif($category == 'all')
		{
			$lieuHours = LieuHour::where('staff_id', '=', $user->id)->get();
		}
        
        return view('lieuHour/index', compact('lieuHours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lieuHour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LieuHourFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LieuHourFormRequest $request)
    {
        $input = $request->all();
		
	    LieuHour::create($input);
	    
	    return redirect('lieu/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function show(LieuHour $lieuHour)
    {
        return view('lieuHour.view', compact('lieuHour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function edit(LieuHour $lieuHour)
    {
        return view('lieuHour.update', compact('lieuHour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LieuHourFormRequest  $request
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function update(LieuHourFormRequest $request, LieuHour $lieuHour)
    {
        $lieuHour->update($request->all());
        
        return redirect('lieu/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(LieuHour $lieuHour)
    {
        // if LieuHour not approved - can be deleted functionality
    }
    
}
