<?php

namespace App\Baltpoint\Users\Http\Actions;

use App\Baltpoint\Models\User;
use App\Baltpoint\Users\Http\Requests\UpdateUserRequest;
use App\Baltpoint\Users\Services\UsersService;
use Illuminate\Http\RedirectResponse;

class UpdateUser
{
    public function __construct(protected UsersService $usersService)
    {
    }

    public function __invoke(UpdateUserRequest $updateUserRequest, User $user): RedirectResponse
    {
        $this->usersService->updateUser(
            $user,
            $updateUserRequest->email,
            $updateUserRequest->phone
        );

        return redirect()->route('home')->with([
            'message' => 'Пользователь успешно изменён',
        ]);
    }
}
