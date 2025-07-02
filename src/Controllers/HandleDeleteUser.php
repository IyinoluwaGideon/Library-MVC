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
        $user_id = $_SESSION['user_id'];
        // $book_id = $_GET['book_id'];
        $borrowbookEntry = $this->borrow->getBookEntryy();

        if ($borrowbookEntry ===  false) {
            $this->user->deleteUser($user_id,);
            $_SESSION["success"] = "User deleted successfully";
        } else {

                $_SESSION["error"] = "User has borrow history; cancel it to delete user.";
                $this->router->redirect("/dashboard");
            
        }
        $this->router->redirect("/logout");
    }
}
