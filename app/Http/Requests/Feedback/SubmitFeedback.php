<?php

namespace App\Http\Requests\Feedback;

use App\Helpers\HelperChecks;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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
		Validator::extend('phone_number', function($attribute, $value, $parameters) {
			return HelperChecks::isPhoneNumber($value);
		});

		Validator::replacer('phone_number', function($message, $attribute, $rule, $parameters) {
			return 'Номер должен начинаться на +7 или 8.';
		});

		$rules = [
			'name' => ['required', 'string', 'max:255'],
			'phone' => ['required', 'string', 'min:11', 'max:255', 'phone_number'],
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
