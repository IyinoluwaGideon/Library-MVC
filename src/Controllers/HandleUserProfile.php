<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

class HandleUserProfile
{
    public function __construct(private User $user) {}

    public function action()
    {
        $this->user->userProfile();
    }
}
