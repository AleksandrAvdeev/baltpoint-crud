<?php

namespace App\Baltpoint\Users\Http\Requests;

use App\Baltpoint\Models\User;

/**
 * @property string $email
 * @property string|null $phone
 *
 * @property User $user
 */
class UpdateUserRequest extends CreateUserRequest
{
    public function rules(): array
    {
        $newRules = [];

        if ($this->user->email === $this->email) {
            $newRules['email'] = 'required|string|min:5|max:255|email';
        }

        return array_merge(parent::rules(), $newRules);
    }
}
