<?php

namespace App\Http\Requests\Element;

use App\Models\Element;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Destroy
 * @package App\Http\Requests\Element
 */
class Destroy extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Element::class)->delete(
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
            //TODO
        ];
    }
}