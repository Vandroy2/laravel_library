<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CityCreateRequest extends FormRequest
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
            'city_name' => ['required','string','min:3','max:255',],
        ];
    }
    public function messages()
    {

        return [
            'city_name.required' => 'Введите имя',
            'city_name.min' => 'Недостаточно символов',



        ];
    }
}
