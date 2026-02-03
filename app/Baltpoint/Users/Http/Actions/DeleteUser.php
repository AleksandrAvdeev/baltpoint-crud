<?php

namespace App\Baltpoint\Users\Http\Actions;

use App\Baltpoint\Models\User;
use App\Baltpoint\Users\Services\UsersService;
use Illuminate\Http\RedirectResponse;

class DeleteUser
{
    public function __construct(protected UsersService $usersService)
    {
    }

    public function __invoke(User $user): RedirectResponse
    {
        $this->usersService->deleteUser($user);

        return redirect()->route('home')->with([
            'message' => 'Пользователь успешно удалён',
        ]);
    }
}
