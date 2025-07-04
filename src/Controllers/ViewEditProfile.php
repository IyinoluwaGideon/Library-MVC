<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Core\Router;

class ViewEditProfile{
    public function __construct(
        private User $user
        )
        {

    }

    public function action()
    {
         $user = $this->user->userProfile([]);
         require_once __DIR__ . '/../Views/editprofile.php';

    }
}