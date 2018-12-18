<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productsValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
    }

    /// Request param rules
    public function rules()
    {
        return [
				
        ];
    }
	
	/// On Error Return Messages
    public function messages()
    {
        return [
				
        ];
    }
}
