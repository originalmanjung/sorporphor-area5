<?php

namespace App\Http\Requests\HumanResource;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateHumanResourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.humanResources.edit');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return [
        //     'name'=>'string|max:255|unique:human_resources,name,'.$this->humanResource->id,
        //     'parent_id' => 'nullable|numeric',
        //     'file' => 'nullable|mimes:pdf',
        // ];

        if ($this->parent_id != null) {
            return [
                'name'=>'string|max:255|unique:human_resources,name,'.$this->humanResource->id,
                'subname'=>'required|string|max:255',
                'number'=>'required|string|max:255',
                'parent_id' => 'nullable|numeric',
                'file' => 'nullable|mimes:pdf',
            ];
        } else {
            return [
                'name'=>'string|max:255|unique:human_resources,name,'.$this->humanResource->id,
            ];
        }
    }
}
