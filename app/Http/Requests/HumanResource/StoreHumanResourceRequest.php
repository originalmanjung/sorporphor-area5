<?php

namespace App\Http\Requests\HumanResource;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreHumanResourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        Gate::authorize('app.humanResources.create');
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
                'name'=>'required|string|max:255|unique:human_resources,name',
                'subname'=>'required|string|max:255',
                'number'=>'required|string|max:255',
                'parent_id' => 'nullable|numeric',
                'file' => 'required|mimes:pdf',
            ];
        } else {
            return [
                'name'=>'required|string|max:255|unique:human_resources,name',
            ];
        }
    }
}
