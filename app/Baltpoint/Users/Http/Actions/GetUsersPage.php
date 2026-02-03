<?php

namespace App\Baltpoint\Users\Http\Actions;

use App\Baltpoint\Users\Http\Requests\GetUsersPageRequest;
use App\Baltpoint\Users\Services\UsersService;
use Illuminate\View\View;

class GetUsersPage
{
    public function __construct(protected UsersService $usersService)
    {
    }

    public function __invoke(GetUsersPageRequest $getUsersPageRequest): View
    {
        $users = $this->usersService->getUsers(
            (int)$getUsersPageRequest->get('page', UsersService::PAGE_DEFAULT),
            (int)$getUsersPageRequest->get('per-page', UsersService::PER_PAGE_DEFAULT)
        );

        return view('users.index')->with([
            'paginator' => $users,
        ]);
    }
}
