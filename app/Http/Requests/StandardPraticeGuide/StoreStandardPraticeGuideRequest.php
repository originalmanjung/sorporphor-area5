<?php

namespace App\Http\Requests\StandardPraticeGuide;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreStandardPraticeGuideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.standardPraticeGuides.create');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->parent_id != null) {
            return [
                'name'=>'required|string|max:255|unique:standard_pratice_guides,name',
                'parent_id' => 'nullable|numeric',
                'file' => 'required|mimes:pdf',
            ];
        } else {
            return [
                'name'=>'required|string|max:255|unique:standard_pratice_guides,name', 
            ];
        }
    }
}
