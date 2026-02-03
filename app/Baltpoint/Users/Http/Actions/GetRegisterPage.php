<?php

namespace App\Baltpoint\Users\Http\Actions;

use Illuminate\View\View;

class GetRegisterPage
{
    public function __invoke(): View
    {
        return view('users.create');
    }
}
