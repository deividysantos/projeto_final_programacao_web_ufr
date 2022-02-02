<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewBookRequest extends FormRequest
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
            'title' => 'required | max:255',
            'author' => 'required | max: 255',
            'ISBN' => 'required',
            'price' => 'required | numeric',
            'publishingCompany' => 'required | string | max: 255',
            'releaseYear' => 'required | string'
        ];
    }
}
