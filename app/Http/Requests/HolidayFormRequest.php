<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

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
            'request_date_to' => 'required | date | on_or_after:request_date_from',
            'hours_requested' => 'required | numeric | available_days',
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
