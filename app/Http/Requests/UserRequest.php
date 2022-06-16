<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = $this->route()->id;
        return [
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email,' . $id,
            'old_password' => 'sometimes|nullable|min:6',
            'password' => 'nullable|confirmed|min:6'
        ];
    }
}
