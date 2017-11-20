<?php

namespace App\Http\Requests\Element;

use App\Models\Element;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Update
 * @package App\Http\Requests\Element
 */
class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Element::class)->update(
            $this->user(),
            $this->route('element')
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
            'type' => 'sometimes|string|max:255',
            'content' => 'sometimes|string|max:255',
            'attributes' => 'sometimes|array',
            'attribtues.*.id' => 'sometimes|integer|exists:element_attributes,id',
            'attribtues.*.key' => 'required_with:attributes|string|max:255',
            'attribtues.*.value' => 'required_with:attributes|string|max:255',
        ];
    }
}