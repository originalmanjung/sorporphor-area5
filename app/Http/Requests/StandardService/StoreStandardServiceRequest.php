<?php

namespace App\Http\Requests\StandardService;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreStandardServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.standardServices.create');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if ($this->checkFile == true) {
            return [
                'name'=>'required|string|max:255',
                'parent_id' => 'exists:standard_services,id|numeric',
                'file' => 'required|mimes:pdf',
            ];
        } else {
            return [
                'name'=>'required|string|max:255',
                'parent_id' => 'nullable|numeric|exists:standard_services,id',
            ];
        }

    }
}
