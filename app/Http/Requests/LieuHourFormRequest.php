<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LieuHourFormRequest extends Request
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
            'add_redeem' => 'required | numeric',
            'date_regarding' => 'required | date | in_advance:2 | in_lieu:2',
            'lieu_hours' => 'required | numeric | max:4',
            'description' => 'required',
        ];
    }
    
    public function messages()
	{
	    return [
	        'date_regarding.in_advance' => 'You can\'t book more than two weeks in advance',
	        'date_regarding.in_lieu' => 'You can\'t redeem more than two weeks back',
		];
	}
}
