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
            'request_date_to' => 'required | date | after_or_equal:request_date_from',
            'hours_requested' => 'required | numeric',
            'saturday' => 'numeric',
        ];
    }
    
    public function messages()
	{
	    return [
	        'hours_requested.required' => 'Days requested is required',
	        'request_date_to.after_or_equal' => 'Your \'to\' date can\'t be before your \'from\' date',
		];
	}
}
