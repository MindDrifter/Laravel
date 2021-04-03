<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'theme' => 'required',
            'title' => 'required',
            'body' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'theme.required' => 'Введите тему карты',
            'title.required' => 'Введите нахвание карты',
            'body.required' => 'Введите текст карты'
        ];
    }
}
