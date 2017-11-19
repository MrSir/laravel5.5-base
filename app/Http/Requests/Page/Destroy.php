<?php

namespace App\Http\Requests\Page;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Destroy
 * @package App\Http\Requests\Page
 */
class Destroy extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Page::class)->delete(
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
            //TODO
        ];
    }
}