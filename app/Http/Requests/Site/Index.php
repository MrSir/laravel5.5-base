<?php

namespace App\Http\Requests\Site;

use App\Models\Site;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Index
 * @package App\Http\Requests\Site
 */
class Index extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Site::class)->index($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|max:255',
            'isPublished' => 'boolean',
            'createdAtFrom' => 'date',
            'createdAtTo' => 'date',
            'perPage' => 'integer',
            'page' => 'integer',
            'orderColumn' => 'string',
            'orderDirection' => 'string',
        ];
    }
}