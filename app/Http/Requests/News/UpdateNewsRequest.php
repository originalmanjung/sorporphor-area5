<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.news.edit');
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
            'content' => 'required|in:general,honest,culture,participation',
            'file' => 'nullable',
            'file.*' => 'image|mimes:jpeg,png,jpg|max:5120',
        ];
    }
}
