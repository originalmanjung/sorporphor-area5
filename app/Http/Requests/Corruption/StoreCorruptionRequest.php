<?php

namespace App\Http\Requests\Corruption;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCorruptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.corruptions.create');
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
            'name'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf',
        ];
    }
}
