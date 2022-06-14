<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required|string',
            'max_users' => 'required|integer',
            'expired_at' => 'required',
            'active' => 'required',
            'avatar' => 'file|max:2048|mimes:png,jpg'
        ];
    }
}
