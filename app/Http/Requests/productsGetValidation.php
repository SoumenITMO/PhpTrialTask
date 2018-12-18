<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class productsGetValidation extends FormRequest
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

    // Validate Get method
    public function rules()
    {
        return [
				'name' => 'required|string|max:50',
        ];
    }
}
