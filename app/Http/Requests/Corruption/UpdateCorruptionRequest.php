<?php

namespace App\Http\Requests\Corruption;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCorruptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.corruptions.edit');
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
            'name'=>'required|string|max:255|unique:corruptions,name,'.$this->corruption->id,
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf',
        ];
    }
}
