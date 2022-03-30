<?php

namespace App\Http\Requests\Opinion;

use Illuminate\Foundation\Http\FormRequest;

class StoreOpinionRequest extends FormRequest
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
            'g-recaptcha-response' => 'required|captcha',
            'name'   => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }
}
