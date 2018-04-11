<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Rules\AvailableDays;

class HolidayFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'request_date_from' => 'required | date | after:yesterday',
            'request_date_to' => 'required | date | after_or_equal:request_date_from',
            'hours_requested' => 'required | numeric', new AvailableDays,
            'saturday' => 'numeric | available_saturdays',
        ];
    }
    
    public function messages()
	{
	    return [
	        'hours_requested.required' => 'Days requested is required',
	        'hours_requested.available_days' => 'You don\'t have enough days available',
	        'saturday.available_saturdays' => 'You don\'t have enough Saturdays left',
	        'request_date_to.on_or_after' => 'Your \'to\' date can\'t be before your \'from\' date',
		];
	}
}
