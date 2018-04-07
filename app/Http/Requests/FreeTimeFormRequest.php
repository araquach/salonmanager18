<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FreeTimeFormRequest extends Request
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
            'date_regarding' => 'required | date',
            'free_time_hours' => 'required | numeric',
            'description' => 'required',
        ];
    }
    
    public function messages()
	{
	    return [
	        '' => '',
		];
	}
}
