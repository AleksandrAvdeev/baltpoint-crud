<?php

namespace App\Baltpoint\Users\Http\Actions;

use App\Baltpoint\Users\Http\Requests\CreateUserRequest;
use App\Baltpoint\Users\Services\UsersService;
use Illuminate\Http\RedirectResponse;

class Register
{
    public function __construct(protected UsersService $usersService)
    {
    }

    public function __invoke(CreateUserRequest $createUserRequest): RedirectResponse
    {
         $this->usersService->createUser(
            $createUserRequest->email,
            $createUserRequest->phone,
        );

        return redirect()->route('home')->with([
            'message' => 'Пользователь успешно создан',
        ]);
    }
}
