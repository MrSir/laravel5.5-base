<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

/**
 * Class Index
 * @package App\Http\Requests\Page
 */
class Index extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
        //TODO
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'siteId' => 'required|integer|exists:sites,id',
            'createdAtFrom' => 'date',
            'createdAtTo' => 'date',
            'perPage' => 'integer',
            'page' => 'integer',
            'orderColumn' => 'string',
            'orderDirection' => 'string',
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

    /**
     * @param array $errors
     *
     * @return mixed
     */
    public function response(array $errors)
    {
        return Response::json(
            $errors,
            400
        );
    }
}