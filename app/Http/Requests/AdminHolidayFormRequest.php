<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminHolidayFormRequest extends Request
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
            'staff_id' => 'required',
            'request_date_from' => 'required | date | after:yesterday',
            'request_date_to' => 'required | date | after:request_date_from',
            'hours_requested' => 'required | numeric',
        ];
    }
    
    public function messages()
	{
	    return [
	        'hours_requested.required' => 'Days requested is required',
		];
	}
}
