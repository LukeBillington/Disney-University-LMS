<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'prompt' => 'required|string',
            'answer_id' => 'nullable|integer|exists:answers,id',
            'answer_text' => 'nullable|string',
            'resource_url' => 'nullable|url',
        ];
    }
}
