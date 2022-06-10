<?php

namespace App\Http\Requests;

use App\Models\Interest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInterestRequest extends FormRequest
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

        request()->merge(['id' => request()->route('id')]);
        $this->merge(['id' => request()->id]);
        $ignoreId = Interest::find(request()->id);

        return [
            'name' => ['required', 'string', 'min:1', 'max:255', \Illuminate\Validation\Rule::unique('interests')->ignore($ignoreId)],
            'icon' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}
