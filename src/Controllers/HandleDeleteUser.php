<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Core\Router;

class HandleDeleteUser
{
    public function __construct(
        private User $user,
        private Router $router
    ) {}

    public function action()
    {
        $user_id = $_SESSION['user_id'];

        $this->user->deleteUser($user_id);

        $this->router->redirect("/logout");
    }
}
