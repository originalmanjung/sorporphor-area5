<?php

namespace App\Http\Requests\Legislation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateLegislationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.legislations.edit');
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
            'names.*'=>'nullable|string|max:255',
            'files.*' => 'file|mimes:pdf'
        ];
    }
}
