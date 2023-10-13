<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|Max:6|unique:users',
            'first_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
            'salary' => 'required',
            'designation' => 'required',
        ];
    }
}
