<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Borrow;
use App\Models\User;
use Core\Router;

class HandleDeleteUser
{
    public function __construct(
        private User $user,
        private Router $router,
        private Borrow $borrow
    ) {}

    public function action()
    {
        $user_id = (int) $_GET['user_id'];
        $this->borrow->deleteUserBorrowDetails($user_id);
        $this->user->deleteUser($user_id,);
        $_SESSION["success"] = "User deleted successfully";

        $this->router->redirect("/userlist");
    }
}
