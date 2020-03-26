<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class SubmitFeedback extends FormRequest
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
		$rules = [
			'name' => ['required', 'string', 'max:255'],
			'phone' => ['required', 'string', 'max:255'],
			'message' => ['required', 'string', 'max:255'],
		];

        return $rules;
    }

    public function messages()
	{
		return [
			'name.required' => 'Укажите имя',
			'phone.required'  => 'Укажите номе телефона',
			'message.required'  => 'Заполните сообщение',
		];
	}
}
