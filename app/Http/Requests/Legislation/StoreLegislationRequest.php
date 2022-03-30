<?php

namespace App\Http\Requests\Legislation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreLegislationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.legislations.create');
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
            'legislation_list_id' => 'required|exists:legislation_lists,id',
            'names.*'=>'required|string|max:255',
            'files' => 'required',
            'files.*' => 'file|mimes:pdf'
        ];
    }
}
