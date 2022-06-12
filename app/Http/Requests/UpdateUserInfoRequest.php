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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:2','max:255',  \Illuminate\Validation\Rule::unique('users')->ignore($this->user()->id)],
            'phone' => ['required', 'regex:/[0-9]{12}/', 'min:9','max:12',  \Illuminate\Validation\Rule::unique('user_infos')->ignore($this->user()->info)],
            'age' => ['required', 'integer', 'min:1','max:99'],
            'location' => ['required', 'string', 'min:2','max:255'],
            'description' => ['required', 'string', 'min:5','max:180'],
            'relationship' => ['required', 'in:Single,Complicated,Taken,Married'],
            'interests.*' => ['nullable','integer','exists:interests,id'],
        ];
    }
}
