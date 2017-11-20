<?php

namespace App\Http\Requests\Page;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Update
 * @package App\Http\Requests\Page
 */
class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Page::class)->update(
            $this->user(),
            $this->route('page')
        );
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'order' => 'sometimes|integer|min:0',
            'name' => 'sometimes|string|max:255',
            'urlSlug' => 'required|string|unique:pages,url_slug,NULL,id,site_id,'.$this->route('page')->site_id,
        ];
    }
}