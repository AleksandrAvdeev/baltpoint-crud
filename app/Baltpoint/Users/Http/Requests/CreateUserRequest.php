<?php

namespace App\Baltpoint\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 * @property string|null $phone
 */
class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|string|min:5|max:255|email|unique:App\Baltpoint\Models\User,email',
            'phone' => 'nullable|string|max_digits:255|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email обязателен для заполнения',
            'email.string' => 'Email должен быть строкой',
            'email.min' => 'Email не должен быть короче 5 символов',
            'email.max' => 'Email не должен быть длиннее 255 символов',
            'email.email' => 'Email должен быть действительным адресом электронной почты',
            'email.unique' => 'Email уже существует',
            'phone.string' => 'Телефон должен быть строкой',
            'phone.max_digits' => 'Телефон не должен быть длиннее 255 символов',
            'phone.integer' => 'Телефон должен содержать только числа',
        ];
    }
}
