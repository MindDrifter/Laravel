<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'area' => 'required',
            'mail' => 'required'
        ];
    }

        public function messages(){
            return [
                'name.required' => 'Введите имя',
                'mail.required' => 'Введите почту',
                'area.required' => 'Введите текст'
            ];
        }

}
