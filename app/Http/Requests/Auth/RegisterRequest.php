<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:2','max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:9','max:12', 'unique:user_infos'],
            'age' => ['required', 'integer', 'min:1','max:99'],
            'location' => ['required', 'string', 'min:2','max:255'],
            'description' => ['required', 'string', 'min:5','max:180'],
            'gender' =>['required', 'in:Male,Female'],
            'relationship' =>['required', 'in:Single,Complicated,Taken,Married'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
