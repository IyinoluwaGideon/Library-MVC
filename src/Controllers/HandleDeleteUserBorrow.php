<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Borrow;
use Core\Router;

class HandleDeleteUserBorrow
{
    public function __construct(
        private Borrow $borrow,
        private Router $router
    ) {}

    public function action()
    {
        $user_id = $_SESSION['user_id'];
        $borrowDetails = $this->borrow->deleteUserBorrowDetails($user_id);

        if ($borrowDetails) {
            $_SESSION['success'] = "User's borrow details is deleted successfully";

        } else {
            $_SESSION['error'] = "User's borrow details not found";
        }

        $this->router->redirect("/dashboard");
    }
}
