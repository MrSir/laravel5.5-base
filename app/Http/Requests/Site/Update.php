<?php

namespace App\Http\Requests\Site;

use App\Models\Site;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Update
 * @package App\Http\Requests\Site
 */
class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Site::class)->update(
            $this->user(),
            $this->route('site')
        );
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'isPublished' => 'sometimes|boolean',
            'title' => 'sometimes|string|max:255',
            'url' => 'sometimes|string|max:255',
        ];
    }
}