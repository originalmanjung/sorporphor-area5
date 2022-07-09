<?php

namespace App\Http\Requests\StandardPraticeGuide;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateStandardPraticeGuideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.standardPraticeGuides.edit');
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
            'name'=>'string|max:255|unique:standard_pratice_guides,name,'.$this->standardPraticeGuide->id,
            'parent_id' => 'nullable|numeric',
            'file' => 'nullable|mimes:pdf',
        ];
    }
}
