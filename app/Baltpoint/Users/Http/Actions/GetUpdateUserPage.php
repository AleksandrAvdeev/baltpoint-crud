<?php

namespace App\Baltpoint\Users\Http\Actions;

use App\Baltpoint\Models\User;
use Illuminate\View\View;

class GetUpdateUserPage
{
    public function __invoke(User $user): View
    {
        return view('users.edit')->with([
            'user' => $user,
        ]);
    }
}
