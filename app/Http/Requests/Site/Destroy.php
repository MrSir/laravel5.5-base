<?php

namespace App\Http\Requests\Site;

use App\Models\Site;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Destroy
 * @package App\Http\Requests\Site
 */
class Destroy extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return policy(Site::class)->delete(
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
            //TODO
        ];
    }
}