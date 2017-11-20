<?php

namespace App\Http\Requests\Site;

use App\Models\Site;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Store
 * @package App\Http\Requests\Site
 */
class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Site::class)->create($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'isPublished' => 'required|boolean',
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ];
    }
}