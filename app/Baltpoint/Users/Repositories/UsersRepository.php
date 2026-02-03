<?php

namespace App\Baltpoint\Users\Repositories;

use App\Baltpoint\Models\User;
use App\Baltpoint\Users\Services\UsersService;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersRepository
{
    public function getUsers($page = UsersService::PAGE_DEFAULT, int $perPage = UsersService::PER_PAGE_DEFAULT): LengthAwarePaginator
    {
        return User::query()
            ->with('phone')
            ->paginate($perPage, ['*'], 'page', $page);
    }

    public function createUser(string $email): User
    {
        return User::query()
        ->create([
            'email' => $email,
        ]);
    }

    public function updateUser(User $user, string $email): User
    {
        $user->update([
            'email' => $email,
        ]);

        return $user;
    }
}
