<?php

namespace App\Http\Requests\Intergrity;

use Illuminate\Foundation\Http\FormRequest;

class StoreIntergrityRequest extends FormRequest
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
            'parent_id' => 'nullable',
            'name'=>'required|string|max:255|unique:intergrities,name',
            'url' => 'nullable|string|max:255',
            'file' => 'nullable|mimes:pdf',
        ];
    }
}
