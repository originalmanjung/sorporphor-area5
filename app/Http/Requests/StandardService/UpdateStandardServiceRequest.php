<?php

namespace App\Http\Requests\StandardService;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateStandardServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.standardServices.edit');
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
            'name'=>'required|string|max:255',
            'parent_id' => 'nullable|numeric',
            'file' => 'nullable|mimes:pdf',
        ];
    }
}
