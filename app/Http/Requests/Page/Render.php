<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Render
 * @package App\Http\Requests\Page
 */
class Render extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'url' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return array
     */
    public function messages()
    {
        return parent::messages();
    }
}