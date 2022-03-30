<?php

namespace App\Http\Requests\BlogSchool;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreBlogSchoolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.blogSchools.create');
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
            'title'   => 'required|string|max:255',
            'descriptions' => 'nullable|string',
            'file' => 'nullable',
            'file.*' => 'image|mimes:jpeg,png,jpg|max:5120',
        ];
    }
}
