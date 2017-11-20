<?php

namespace App\Http\Requests\Element;

use App\Models\Element;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Store
 * @package App\Http\Requests\Element
 */
class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Element::class)->create($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'pageId' => 'required|integer|exists:pages,id',
            'order' => 'required|integer|min:0',
            'type' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'attributes' => 'sometimes|array',
            'attribtues.*.key' => 'required_with:attributes|string|max:255',
            'attribtues.*.value' => 'required_with:attributes|string|max:255',
        ];
    }
}