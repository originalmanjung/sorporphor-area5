<?php

namespace App\Http\Requests\Complaint;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest
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
            'type' => 'required|in:general,corrupt',
            'idCardnumber' => 'numeric|digits:13',
            'address'   => 'required|string',
            'email' => 'required|string|email|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf',
        ];
    }
}
