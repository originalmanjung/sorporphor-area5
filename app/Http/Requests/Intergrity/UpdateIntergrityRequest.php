<?php

namespace App\Http\Requests\Intergrity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateIntergrityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.intergrities.edit');
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
            'parent_id' => 'nullable|numeric',
            'name'=>'required|string|max:255|unique:intergrities,name,'.$this->intergrity->id,
            'url' => 'nullable|string|max:255',
            'file' => 'nullable|mimes:pdf',
        ];
    }
}
