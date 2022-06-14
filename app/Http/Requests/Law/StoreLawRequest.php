<?php

namespace App\Http\Requests\Law;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreLawRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.laws.create');
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
                'name'=>'required|string|max:255|unique:laws,name',
                'parent_id' => 'nullable|numeric',
                'file' => 'required|mimes:pdf|max:10000',
            ];
        } else {
            return [
                'name'=>'required|string|max:255|unique:laws,name', 
            ];
        }
    }
}
