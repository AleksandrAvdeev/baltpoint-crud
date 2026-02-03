<?php

namespace App\Baltpoint\Users\Services;

use App\Baltpoint\Models\User;
use App\Baltpoint\Users\Repositories\UsersRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class UsersService
{
    public const PAGE_DEFAULT = 1;
    public const PER_PAGE_DEFAULT = 25;

    public function __construct(protected UsersRepository $usersRepository)
    {
    }

    public function getUsers($page = self::PAGE_DEFAULT, int $perPage = self::PER_PAGE_DEFAULT): LengthAwarePaginator
    {
        return $this->usersRepository->getUsers($page, $perPage);
    }

    public function createUser(string $email, ?string $phone): void
    {
        DB::beginTransaction();
        try {
            $user = $this->usersRepository->createUser($email);
            if (!is_null($phone)) {
                $user->phone()->create([
                    'value' => $phone,
                ]);
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            Log::error('Ошибка при создании пользователя', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
        }
    }

    public function updateUser(User $user, string $email, ?string $phone): void
    {
        DB::beginTransaction();
        try {
            $user = $this->usersRepository->updateUser($user, $email);
            if (!is_null($phone)) {
                $user->phone()->updateOrCreate(
                    ['user_id' => $user->getKey()],
                    ['value' => $phone]
                );
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            Log::error('Ошибка при обновлении пользователя', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
        }
    }

    public function deleteUser(User $user): void
    {
        DB::beginTransaction();
        try {
            $user->phone()->delete();
            $user->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            Log::error('Ошибка при удалении пользователя', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
        }
    }
}
