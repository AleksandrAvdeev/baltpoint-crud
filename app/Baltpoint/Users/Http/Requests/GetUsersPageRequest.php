<?php

namespace App\Baltpoint\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $page
 * @property int $per-page
 */
class GetUsersPageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => 'nullable|integer|min:1',
            'per-page' => 'nullable|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'page.integer' => 'Номер страницы должен быть числом',
            'page.min'  => 'Выводимая страница не может быть меньше единицы',
            'per-page.integer' => 'Количество записей на странице должно быть числом',
            'per-page.min' => 'Количество записей на странице не может быть меньше одной',
        ];
    }
}
