<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
class UpdateUserInfoRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'min:2', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'min:2','max:255',  \Illuminate\Validation\Rule::unique('users')->ignore($this->user()->id)],
            'phone' => ['nullable', 'string', 'min:9','max:12',  \Illuminate\Validation\Rule::unique('user_infos')->ignore($this->user()->info)],
            'age' => ['nullable', 'integer', 'min:1','max:99'],
            'location' => ['nullable', 'string', 'min:2','max:255'],
            'description' => ['nullable', 'string', 'min:5','max:180'],
            'gender' => ['nullable', 'in:Male,Female'],
            'relationship' => ['nullable', 'in:Single,Complicated,Taken,Married'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
