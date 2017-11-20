<?php

namespace App\Http\Requests\Page;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Store
 * @package App\Http\Requests\Page
 */
class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Page::class)->create($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'siteId' => 'required|integer|exists:sites,id',
            'order' => 'required|integer|min:0',
            'name' => 'required|string|max:255',
            'urlSlug' => 'required|string|unique:pages,url_slug,NULL,id,site_id,'.$this->get('siteId'),
        ];
    }
}